/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // Archivos Blade (vistas de Laravel)
    "./resources/**/*.blade.php",
    // Archivos JS (incluyendo app.js y componentes)
    "./resources/**/*.js",
    // Si usas Vue.js o componentes Vue
    "./resources/**/*.vue",
    // Si tienes componentes en otras carpetas (ajusta según tu estructura)
    // "./components/**/*.blade.php",  // Ejemplo si usas @include en componentes
    // "./app/Livewire/**/*.php",     // Si usas Livewire
  ],
  theme: {
    extend: {
      // Aquí puedes extender temas si necesitas customizaciones
      // Por ejemplo, colores personalizados:
      // colors: {
      //   primary: '#your-color',
      // },
      // O breakpoints custom para responsive (opcional, los default son buenos):
      // screens: {
      //   'sm': '640px',
      //   'md': '768px',
      //   'lg': '1024px',
      //   'xl': '1280px',
      //   '2xl': '1536px',
      // },
      // Fonts custom (opcional):
      // fontFamily: {
      //   sans: ['Inter', 'sans-serif'],
      // },
    },
  },
  plugins: [
    // Plugins opcionales, como forms o typography si los usas
    // require('@tailwindcss/forms'),
    // require('@tailwindcss/typography'),
  ],
}