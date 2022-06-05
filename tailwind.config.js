module.exports = {
  mode: 'jit',
  content: ["**/*.{html,php,svg}"],
  theme: {
    container: {
      center: true,
      padding: '1rem',
    },
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1140px',
    },
    extend: {
      colors: {
        'primary-color': '#ff841b',
        'dark-blue-color': '#001a53',
        'text-color': '#676767',
        'light-text-color': '#9b9b9b',
        'border-color': '#eaeaea',
      },
      spacing: {
        '26': '6.5rem',
      },
      fontSize: {
        '1.5xl': ['1.375rem', '1.375rem'],
        '5.2xl': ['3.125rem', '3.125rem'],
      },
      transitionProperty: {
        'height': 'height',
        'spacing': 'margin, padding',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
