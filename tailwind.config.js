module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
      require('flowbite/plugin')
  ],
}


module.exports = {
  content: [
    './node_modules/flowbite/**/*.js', // Tambahkan ini
    './src/**/*.{html,js}', // Direktori file HTML dan JS Anda
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),

    require('flowbite/plugin') // Tambahkan plugin Flowbite
  ],
};
