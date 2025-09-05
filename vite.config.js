import { defineConfig } from 'vite'
import { resolve } from 'path'
import { copyFileSync, existsSync, mkdirSync } from 'fs'

export default defineConfig({
  root: 'web/presentations',
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'web/presentations/index.html'),
        template: resolve(__dirname, 'web/presentations/template.html')
      },
      output: {
        // Keep assets in dist folder
        assetFileNames: 'assets/[name]-[hash][extname]',
        chunkFileNames: 'assets/[name]-[hash].js',
        entryFileNames: 'assets/[name]-[hash].js'
      }
    }
  },
  server: {
    port: 8080,
    open: '/template.html'
  },
  resolve: {
    alias: {
      'reveal.js': resolve(__dirname, 'node_modules/reveal.js')
    }
  },
})
