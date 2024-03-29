import { fileURLToPath, URL } from "url";

import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import { VitePWA } from 'vite-plugin-pwa';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    VitePWA({
      registerType: 'autoUpdate',
      devOptions: {
        enabled: true
      },
      manifest: {
        name: "Coincharts",
        short_name: "Coincharts",
        icons: [
          {
            src: "/icons/icon-btc-72x72.png",
            sizes: "72x72",
            type: "image/png",

          },
          {
            src: "/icons/icon-btc-96x96.png",
            sizes: "96x96",
            type: "image/png",

          },
          {
            src: "/icons/icon-btc-128x128.png",
            sizes: "128x128",
            type: "image/png",

          },
          {
            src: "/icons/icon-btc-144x144.png",
            sizes: "144x144",
            type: "image/png",

          },
          {
            src: "/icons/icon-btc-152x152.png",
            sizes: "152x152",
            type: "image/png",

          },
          {
            src: "/icons/icon-btc-192x192.png",
            sizes: "192x192",
            type: "image/png"
          },
          {
            src: "/icons/icon-btc-384x384.png",
            sizes: "384x384",
            type: "image/png"
          },
          {
            src: "/icons/icon-btc-512x512.png",
            sizes: "512x512",
            type: "image/png"
          }
        ]
      },
    })
  ],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", import.meta.url)),
    },
  },
});
