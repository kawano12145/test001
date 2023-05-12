import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import Input from "postcss/lib/input";

export default defineConfig({
    plugins: [laravel(["resources/css/app.css", "resources/js/app.js"])],

    server: {
        hmr: {
            host: "localhost",
        },
    },
});
