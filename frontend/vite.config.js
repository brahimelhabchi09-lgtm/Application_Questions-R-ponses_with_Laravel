import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import { fileURLToPath, URL } from 'node:url'

export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  },
  server: {
    proxy: {
      '/api': {
        // When running Vite inside Docker, "localhost" points to the container itself.
        // Use VITE_API_TARGET=http://nginx (or http://nginx:80) in docker-compose.
        target: process.env.VITE_API_TARGET || 'http://localhost:3535',
        changeOrigin: true,
      }
    }
  }
})
