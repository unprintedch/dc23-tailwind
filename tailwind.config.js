const _ = require("lodash");
const theme = require('./theme.json');
const tailpress = require("./dc23-theme.js");


module.exports = {
    tailpress,
    content: [
        './template-parts/*.php',
        '*.php',
        './blocks/**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './resources/css/safelist.txt'
    ],
  
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '2rem',
                sm: '2rem',
                lg: '0rem'
            },
            margin: {
                DEFAULT: '5rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
        },   
        screens: {
            'sm': '640px',
            'md': '640px',
            'lg': '640px',
            'xl': tailpress.theme('settings.layout.contentSize', theme),
            '2xl': tailpress.theme('settings.layout.contentSize', theme)
        },
        fontFamily: {
            'display': ['"Krona One"', 'times', 'sans-serif'], 
            'body': ['"Inter"', 'times', 'sans-serif'],
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        tailpress.tailwind,
    ]
};
