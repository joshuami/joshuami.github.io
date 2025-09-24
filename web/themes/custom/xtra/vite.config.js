import { defineConfig } from 'vite';
import { resolve } from 'path';
import { glob } from 'glob';
import autoprefixer from 'autoprefixer';
import fs from 'fs';

export default defineConfig({
  plugins: [
    {
      name: 'copy-components',
      writeBundle() {
        const buildDir = resolve(__dirname, 'build');
        const componentsDir = resolve(__dirname, 'components');
        
        // Helper function to copy directory recursively
        const copyDir = (source, target) => {
          if (!fs.existsSync(target)) {
            fs.mkdirSync(target, { recursive: true });
          }
          
          const files = fs.readdirSync(source);
          files.forEach(file => {
            const sourcePath = resolve(source, file);
            const targetPath = resolve(target, file);
            
            if (fs.statSync(sourcePath).isDirectory()) {
              copyDir(sourcePath, targetPath);
            } else {
              fs.copyFileSync(sourcePath, targetPath);
            }
          });
        };
        
        // Component CSS files are not processed since there are no component SCSS source files
        // All component styles are included in the main CSS build
        
        // Component JS files are not processed since there are no JavaScript source files
        // The existing JS files in components are build artifacts that don't need processing
      }
    }
  ],
  css: {
    preprocessorOptions: {
      scss: {
        // Disable URL processing to match Laravel Mix behavior
        importer: [
          function(url) {
            if (url.startsWith('~')) {
              return { file: url.slice(1) };
            }
            return null;
          }
        ],
        // Suppress deprecation warnings from dependencies (like Bootstrap)
        quietDeps: true,
        // Silence deprecation warnings
        silenceDeprecations: ['import', 'global-builtin', 'color-functions']
      }
    },
    postcss: {
      plugins: [
        autoprefixer
      ]
    }
  },
  build: {
    // Output to build directory instead of dist
    outDir: 'build',
    // Generate source maps
    sourcemap: true,
    // Enable minification for production builds
    minify: 'esbuild',
    // Copy assets to component directories after build
    copyPublicDir: false,
    rollupOptions: {
      input: {
        // Main CSS files
        'main-style': resolve(__dirname, 'src/scss/main.style.scss'),
        'ckeditor-style': resolve(__dirname, 'src/scss/ckeditor.style.scss'),
        // Main JS file
        'main-script': resolve(__dirname, 'src/js/main.script.js'),
      },
      output: {
        // Custom output configuration to match Laravel Mix structure
        entryFileNames: (chunkInfo) => {
          const name = chunkInfo.name;
          
          // Handle main JS file
          if (name === 'main-script') {
            return 'js/main.script.js';
          }
          
          // Default JS output
          return 'js/[name].js';
        },
        assetFileNames: (assetInfo) => {
          const name = assetInfo.name;
          
          // Handle main CSS files
          if (name === 'main-style.css') {
            return 'css/main.style.css';
          }
          if (name === 'ckeditor-style.css') {
            return 'css/ckeditor.style.css';
          }
          
          // Handle other assets
          if (name.match(/\.(png|jpe?g|gif|svg|webp|ico)$/)) {
            return 'assets/images/[name][extname]';
          }
          if (name.match(/\.(woff2?|eot|ttf|otf)$/)) {
            return 'fonts/[name][extname]';
          }
          
          // Default asset output
          return 'assets/[name][extname]';
        }
      }
    }
  },
  // Development server configuration
  server: {
    port: 3000,
    host: true
  }
});
