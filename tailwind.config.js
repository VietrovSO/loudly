/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'drakula': "#2d3436",
            },
            backgroundImage: {
                'login': "url('/images/login.jpg')",
                'admin': "url('/images/admin.jpg')",
            }
        },
    },
    plugins: [],
}