/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {


    extend: {    fontFamily: {
/*       sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'], */
      'ubuntu': ['Ubuntu', 'sans-serif'],
    }},
  },
  plugins: [],


}
