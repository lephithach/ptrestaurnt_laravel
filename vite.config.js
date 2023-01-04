import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/scss/index.css",
                "resources/js/app.js",
                "resources/js/form-maloai.js",
                "resources/js/function.js",
                "resources/js/client/cart.js",
                "resources/js/client/modal.js",
            ],
            refresh: true,
        }),
    ],
});
