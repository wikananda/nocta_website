import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'spartan': ['League Spartan', 'sans-serif'],
                'alternates': ['Montserrat Alternates', 'sans-serif'],
            },
            height: theme => ({
                "screen/2": "50vh",
                "screen/3": "calc(100vh / 3)",
                "screen/4": "calc(100vh / 4)",
                "screen/5": "calc(100vh / 5)",
                "screen-4/6": "calc(100vh * 4 / 6)",
                "screen-5/6": "calc(100vh * 5 / 6)",
              }),

            width: theme => ({
                "screen/2": "50vw",
                "screen/3": "calc(100vw / 3)",
                "screen/4": "calc(100vw / 4)",
                "screen/5": "calc(100vw / 5)",
                "screen-4/6": "calc(100vw * 4 / 6)",
                "screen-5/6": "calc(100vw * 5 / 6)",
                "1/6": "16.6666667%",
                "1/7": "14.2857143%",
                "1/8": "12.5%",
                "1/9": "11.1111111%",
                "1/10": "10%",
                "1/11": "9.09090909%",
                "1/12": "8.33333333%",
                "1/20": "5%",
              }),
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'darkblue': '#0B3954',
            'greenblue': '#087E8B',
            'whiteblue': '#BFD7EA',
            'lightred': '#FF5A5F',
            'darkred': '#C81D25',
            'white': '#FFFFFF',
        },
    },

    plugins: [forms],
};
