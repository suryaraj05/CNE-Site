import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

// Fixed output names so PHP can link /dist/app.css and /dist/app.js directly;
// cache-busting is handled by asset() in includes/config.php (filemtime).
export default defineConfig({
  plugins: [tailwindcss()],
  base: '/dist/',
  publicDir: false,
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      input: 'assets/js/app.js',
      output: {
        entryFileNames: '[name].js',
        assetFileNames: '[name][extname]',
      },
    },
  },
});
