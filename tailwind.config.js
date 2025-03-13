/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#9B59B6",
        secondary: "#8E44AD",
        accent: "#FFD600",
        danger: "#FF6B6B",
        info: "#4A90E2"
      },
    },
  },
  plugins: [],
}