const _ = require("lodash");
const theme = require('./theme.json');
const dc23Process = require("./dc23-theme.js");
const includePreflight = 'editor' === process.env._STYLE_TARGET ? false : true;

console.log("here: "+includePreflight);


module.exports = {
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
            colors: dc23Process.colorMapper(dc23Process.theme('settings.color.palette', theme)),
        },   
        screens: {
            'sm': '640px',
            'md': '640px',
            'lg': '640px',
            'xl': dc23Process.theme('settings.layout.contentSize', theme),
            '2xl': dc23Process.theme('settings.layout.contentSize', theme)
        },
        fontFamily: {
            'display': ['tt-nooks', 'times', 'sans-serif'], 
            'body': ['elza-text', 'times', 'sans-serif'],
        }
    },
    corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
    plugins: [
        require('@tailwindcss/forms'),
    ]
};
