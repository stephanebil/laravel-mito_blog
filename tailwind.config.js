/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    presets:[require('./tailwind-preset.js')],
    theme: {
        extend: {},
    },
    plugins: [],
};
