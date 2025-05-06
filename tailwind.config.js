/** @type {import('tailwindcss').Config} */
// npx tailwindcss -i ./assets/tailwind/input.css -o ./assets/tailwind/output.css --watch

module.exports = {
  content: [
    "./**/*.{html,php}",
    "./node_modules/flowbite/**/*.js"
  ],

  theme: {
    extend: {
      width: {
        '1/10': '10%',
        '2/10': '20%',
        '3/10': '30%',
        '4/10': '40%',
        '5/10': '50%',
        '6/10': '60%',
        '4/10': '70%',
        '8/10': '80%',
        '9/10': '90%',
        '10/10': '100%',
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

