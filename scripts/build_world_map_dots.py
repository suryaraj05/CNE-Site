"""Generate a dotted world-map SVG from Natural Earth land TopoJSON."""
import json

with open("assets/img/_countries.json", encoding="utf-8") as f:
    topo = json.load(f)

scale = topo["transform"]["scale"]
translate = topo["transform"]["translate"]
arcs = topo["arcs"]


def decode_arc(arc):
    x = y = 0
    pts = []
    for dx, dy in arc:
        x += dx
        y += dy
        lon = x * scale[0] + translate[0]
        lat = y * scale[1] + translate[1]
        pts.append((lon, lat))
    return pts


def ring_from_arcs(arc_idxs):
    ring = []
    for idx in arc_idxs:
        reverse = idx < 0
        arc = arcs[~idx if reverse else idx]
        pts = decode_arc(arc)
        if reverse:
            pts = list(reversed(pts))
        if ring:
            pts = pts[1:]
        ring.extend(pts)
    return ring


def lonlat_to_xy(lon, lat, w=1000, h=480):
    x = (lon + 180.0) / 360.0 * w
    y = (90.0 - lat) / 180.0 * h
    return x, y


land = topo["objects"]["land"]
paths = []
for g in land["geometries"]:
    coords = g.get("arcs")
    if g["type"] == "Polygon":
        polys = [coords]
    elif g["type"] == "MultiPolygon":
        polys = coords
    else:
        continue
    for poly in polys:
        ring = ring_from_arcs(poly[0])
        if len(ring) < 3:
            continue
        parts = []
        for i, (lon, lat) in enumerate(ring):
            x, y = lonlat_to_xy(lon, lat)
            cmd = "M" if i == 0 else "L"
            parts.append(f"{cmd}{x:.2f},{y:.2f}")
        parts.append("Z")
        paths.append("".join(parts))

path_d = "".join(paths)
print(f"polygons={len(paths)} path_chars={len(path_d)}")

svg = f"""<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 480" fill="none" aria-hidden="true">
  <defs>
    <pattern id="cne-world-dots" width="5" height="5" patternUnits="userSpaceOnUse">
      <circle cx="1.25" cy="1.25" r="1.1" fill="#9bb0d4"/>
    </pattern>
    <pattern id="cne-world-dots-b" width="5" height="5" patternUnits="userSpaceOnUse" patternTransform="translate(2.5 2.5)">
      <circle cx="1.25" cy="1.25" r="1.0" fill="#9bb0d4"/>
    </pattern>
    <clipPath id="cne-world-land">
      <path d="{path_d}"/>
    </clipPath>
  </defs>
  <g opacity="0.55">
    <rect width="1000" height="480" fill="url(#cne-world-dots)" clip-path="url(#cne-world-land)"/>
    <rect width="1000" height="480" fill="url(#cne-world-dots-b)" clip-path="url(#cne-world-land)" opacity="0.9"/>
  </g>
  <g stroke="#5b6f99" stroke-linecap="round" fill="none" opacity="0.65">
    <path d="M220 155 C340 70, 470 80, 540 135 S700 195, 820 155" stroke-width="1.5" stroke-dasharray="4.5 5.5"/>
    <path d="M240 215 C360 195, 500 240, 610 205 S760 175, 860 215" stroke-width="1.35" stroke-dasharray="4 6" opacity="0.85"/>
    <path d="M540 145 C600 220, 670 265, 760 300 S840 335, 880 355" stroke-width="1.25" stroke-dasharray="3.5 5.5" opacity="0.75"/>
  </g>
</svg>
"""

out = "assets/img/world-map-dots.svg"
with open(out, "w", encoding="utf-8") as f:
    f.write(svg)
print(f"wrote {out} ({len(svg)} bytes)")
