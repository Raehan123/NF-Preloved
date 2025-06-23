import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/imagePreview.js",
                "resources/js/heartToggle.js",
                "resources/js/popup.js",
                "resources/js/popupDelete.js",
                "resources/js/toggle.js",
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: "public/build",
        manifest: true,
        emptyOutDir: true,
    },
});
