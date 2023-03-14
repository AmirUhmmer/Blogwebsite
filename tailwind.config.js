/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.html'],
      theme: {
          screens: {
            sm: '300px',
            md: '768px',
            lg: '976px',
            xl: '1440px',
          },
          fontFamily: {
            'sans': ['Poppins', 'sans-serif'],
          },
            extend: {
                colors: {
                    brown: '#250902',
                    verydark_red: '#38040E',
                    dark_red: '#640D14',
                    red: '#800E13',
                    pink_red: '#AD2831',
                    light_blue: '#80FFDB',
                    whish: '#F1FAEE',
                },
            },
        },
        plugins: [],
}
