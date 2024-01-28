const _ = require("lodash");
const theme = require('./theme.json');
const tailpress = require("./tm21-theme.js");


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
            'md': '768px',
            'lg': '1024px',
            'xl': tailpress.theme('settings.layout.contentSize', theme),
            '2xl': tailpress.theme('settings.layout.contentSize', theme)
        },
        fontFamily: {
            'display': ['"SuisseIntl-Bold"', 'times', 'sans-serif'], 
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        tailpress.tailwind,
    ]
};
