/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        outfit: ['Outfit', 'sans-serif'],
      },
      colors: {
        background: '#020617',
        primary: {
          DEFAULT: '#6366f1',
          hover: '#4f46e5',
        },
        accent: {
          DEFAULT: '#10b981',
          glow: '#34d399',
        }
      },
      backgroundImage: {
        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
        'glass-card': 'linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%)',
      },
      boxShadow: {
        'neon-indigo': '0 0 20px rgba(99, 102, 241, 0.2)',
        'neon-emerald': '0 0 20px rgba(16, 185, 129, 0.2)',
      }
    },
  },
  plugins: [],
}
