# Build a static preview and push to GitHub Pages (stays online with PC off).
$ErrorActionPreference = 'Stop'
$root = Split-Path $PSScriptRoot -Parent
Set-Location $root

$owner = (gh api user --jq .login).Trim()
$repo  = 'CNE-Site'
$base  = "/$repo"
$siteUrl = "https://$owner.github.io$base"
$out = Join-Path $root '_site'
$origin = "http://127.0.0.1:8000"

Write-Host "Preview URL will be: $siteUrl"

# Ensure built assets exist
if (-not (Test-Path 'dist/app.css')) { npm run build }

# Start PHP if needed
$phpUp = $false
try {
  $r = Invoke-WebRequest -Uri $origin -UseBasicParsing -TimeoutSec 3
  $phpUp = $true
} catch {}
$phpProc = $null
if (-not $phpUp) {
  $env:CNE_SITE_URL = $siteUrl
  $phpProc = Start-Process -FilePath php -ArgumentList '-S','127.0.0.1:8000','index.php' -WorkingDirectory $root -PassThru -WindowStyle Hidden
  Start-Sleep -Seconds 2
} else {
  # Running server may still have old SITE_URL; set for child requests via... can't.
  # Restart briefly with env for correct canonicals.
  Write-Host 'Restarting PHP with preview SITE_URL...'
  Get-NetTCPConnection -LocalPort 8000 -ErrorAction SilentlyContinue | ForEach-Object {
    Stop-Process -Id $_.OwningProcess -Force -ErrorAction SilentlyContinue
  }
  Start-Sleep -Seconds 1
  $env:CNE_SITE_URL = $siteUrl
  $phpProc = Start-Process -FilePath php -ArgumentList '-S','127.0.0.1:8000','index.php' -WorkingDirectory $root -PassThru -WindowStyle Hidden
  Start-Sleep -Seconds 2
}

if (Test-Path $out) { Remove-Item $out -Recurse -Force }
New-Item -ItemType Directory -Path $out | Out-Null

# Collect URLs from sitemap
$env:CNE_SITE_URL = $siteUrl
$sitemap = (Invoke-WebRequest -Uri "$origin/sitemap.xml" -UseBasicParsing).Content
$urls = [regex]::Matches($sitemap, '<loc>(.*?)</loc>') | ForEach-Object { $_.Groups[1].Value }
# Also ensure home
if ($urls -notcontains $siteUrl -and $urls -notcontains "$siteUrl/") {
  $urls = @("$siteUrl/") + $urls
}

function Save-Page([string]$absUrl) {
  $path = $absUrl.Replace($siteUrl, '').Replace('https://cargonortheast.com', '')
  if ([string]::IsNullOrWhiteSpace($path) -or $path -eq '/') { $path = '/' }
  $local = if ($path -eq '/') {
    Join-Path $out 'index.html'
  } else {
    $dir = Join-Path $out ($path.Trim('/').Replace('/', [IO.Path]::DirectorySeparatorChar))
    New-Item -ItemType Directory -Force -Path $dir | Out-Null
    Join-Path $dir 'index.html'
  }

  $fetch = $origin + ($(if ($path -eq '/') { '/' } else { $path.TrimEnd('/') + '/' }))
  try {
    $html = (Invoke-WebRequest -Uri $fetch -UseBasicParsing).Content
  } catch {
    Write-Warning "Skip $fetch : $_"
    return
  }

  # Rewrite root-absolute URLs for GitHub Pages project site
  $html = $html -replace 'href="/(?!/)', "href=`"$base/"
  $html = $html -replace "href='/(?!/)", "href='$base/"
  $html = $html -replace 'src="/(?!/)', "src=`"$base/"
  $html = $html -replace "src='/(?!/)", "src='$base/"
  $html = $html -replace 'content="/(?!/)', "content=`"$base/"
  $html = $html -replace 'https://cargonortheast.com', $siteUrl

  [IO.File]::WriteAllText($local, $html)
  Write-Host "  $path"
}

Write-Host "Crawling $($urls.Count) pages..."
foreach ($u in $urls) {
  # Normalize to path against production or preview host
  $u2 = $u -replace 'https://cargonortheast.com', $siteUrl
  Save-Page $u2
}

# Static files
Copy-Item -Recurse dist (Join-Path $out 'dist')
New-Item -ItemType Directory -Force -Path (Join-Path $out 'assets') | Out-Null
Copy-Item -Recurse assets\img (Join-Path $out 'assets\img')
if (Test-Path 'robots.txt') { Copy-Item robots.txt $out }
# Preview robots: allow indexing of preview? noindex via meta already maybe — keep simple
Set-Content -Path (Join-Path $out '.nojekyll') -Value ''

# Push gh-pages
$tmp = Join-Path $env:TEMP "cne-gh-pages-$(Get-Random)"
New-Item -ItemType Directory -Path $tmp | Out-Null
Push-Location $tmp
git init -b gh-pages | Out-Null
git config user.email 'preview@cargonortheast.local'
git config user.name 'CNE Preview'
Copy-Item -Recurse -Force "$out\*" .
git add -A
git commit -m "Publish static preview" | Out-Null
git remote add origin "https://github.com/$owner/$repo.git"
git push -f origin gh-pages
Pop-Location
Remove-Item $tmp -Recurse -Force

# Enable GitHub Pages from gh-pages branch
try {
  gh api "repos/$owner/$repo/pages" -X PUT -f build_type=legacy -f 'source[branch]=gh-pages' -f 'source[path]=/' 2>$null
} catch {
  try {
    gh api "repos/$owner/$repo/pages" -X POST -f build_type=legacy -f 'source[branch]=gh-pages' -f 'source[path]=/' 2>$null
  } catch {
    Write-Host "If Pages is not enabled yet, turn it on in GitHub repo Settings → Pages → gh-pages."
  }
}

if ($phpProc) { Stop-Process -Id $phpProc.Id -Force -ErrorAction SilentlyContinue }

Write-Host ""
Write-Host "Live preview (PC can be off): $siteUrl/"
Write-Host "GitHub may take 1–2 minutes to publish."
