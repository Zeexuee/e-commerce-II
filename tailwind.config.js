/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#2E7D32',      // Hijau Utama
        'accent': '#66BB6A',       // Hijau Muda
        'cream': '#F5EEDC',        // Krem/Padi
        'brown': '#A67C52',        // Coklat Padi
        'neutral': '#F2F2F2',      // Abu Netral
      },
    },
  },
  plugins: [],
}

