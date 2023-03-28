/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
        inset: {
            '1/10': '10%',
            '1/2' : '50%',
        },
    extend: {},
  },
  plugins: [],
}
