// tailwind.config.js
export default {
  darkMode: 'class', // 👈 AÑADÍ esta línea para sacar el darkmode

  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    '../../storage/framework/views/*.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
