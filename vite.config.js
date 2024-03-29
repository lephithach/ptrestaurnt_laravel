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
                "resources/js/handle-tao-mon-an.js",
                "resources/js/handle-tao-don-hang.js",
                "resources/js/client/cart.js",
                "resources/js/client/modal.js",
                "resources/js/client/show-modal-product.js",
                "resources/js/client/comment.js",
            ],
            refresh: true,
        }),
    ],
});
