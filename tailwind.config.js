import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/*/.blade.php",
        "./resources/*/.blade.php",
        "./resources/*/.js",
        "./resources/*/.vue",
    ],
    theme: {
        extend: {
            colors: {
                warna1: "#2B263B",
                darkgrey: "#2B263B",
                lightgrey: "#C8BEBC",
                smoothgrey: "#D9D9D9",
                smoothergrey: "#EFEAE7",
                nicegrey: "#E6E6E6",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                small: ["10px", "15px"],
            },
            screens: {
                mini: "375px",
                laptop: "1024px",
            },
        },
    },
    plugins: [forms],
};  

