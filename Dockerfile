FROM node:22-alpine AS assets
WORKDIR /build
COPY package.json package-lock.json ./
RUN npm ci
COPY assets ./assets
COPY vite.config.js ./
COPY includes ./includes
COPY content ./content
COPY index.php ./
RUN npm run build

FROM php:8.3-cli-alpine
WORKDIR /app
COPY . .
COPY --from=assets /build/dist ./dist
ENV PORT=8080
EXPOSE 8080
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT} index.php"]
