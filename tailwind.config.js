/** @type {import('tailwindcss').Config} */
export default {
    content: ["./index.html", "./resources/**/*.{js,ts,jsx,tsx,vue}"],
    theme: {
        extend: {
            colors: {
                dark: "#363853",
                primary: "#0012FF",
                green: "#67D4CA",
                red: "#F28080",
            },
        },
    },
    plugins: [],
};
