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
        background: '#0a0e27',
        primary: {
          DEFAULT: '#7c3aed',
          hover: '#6d28d9',
          light: '#a78bfa',
        },
        secondary: {
          DEFAULT: '#3b82f6',
          hover: '#2563eb',
          light: '#60a5fa',
        },
        accent: {
          DEFAULT: '#06b6d4',
          glow: '#22d3ee',
        },
        dark: {
          bg: '#0f1729',
          card: '#1a1f3a',
          border: '#2d3748',
        }
      },
      backgroundImage: {
        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
        'neuro-card': 'linear-gradient(135deg, #1a1f3a 0%, #1f2847 100%)',
        'gradient-primary': 'linear-gradient(135deg, #7c3aed 0%, #3b82f6 100%)',
        'gradient-secondary': 'linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%)',
      },
      boxShadow: {
        'neuro': '8px 8px 16px rgba(0, 0, 0, 0.4), -4px -4px 12px rgba(124, 58, 237, 0.08)',
        'neuro-inset': 'inset 2px 2px 5px rgba(0, 0, 0, 0.3), inset -1px -1px 3px rgba(124, 58, 237, 0.1)',
        'neuro-hover': '12px 12px 24px rgba(0, 0, 0, 0.5), -6px -6px 16px rgba(124, 58, 237, 0.12)',
        'glow-primary': '0 0 30px rgba(124, 58, 237, 0.3)',
        'glow-secondary': '0 0 30px rgba(59, 130, 246, 0.3)',
      }
    },
  },
  plugins: [],
}
