FROM node:24-alpine AS assets
WORKDIR /build
COPY package.json package-lock.json ./
RUN npm ci
COPY assets ./assets
COPY vite.config.js ./
RUN npm run build

FROM dunglas/frankenphp:1-php8.4-alpine
WORKDIR /app

COPY --from=assets /build/dist ./dist
COPY assets ./assets
COPY content ./content
COPY includes ./includes
COPY index.php robots.txt ./
COPY Caddyfile /etc/caddy/Caddyfile

ENV PORT=80
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
