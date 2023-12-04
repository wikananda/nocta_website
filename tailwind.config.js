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
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'darkblue': '#0B3954',
            'greenblue': '#087E8B',
            'whiteblue': '#BFD7EA',
            'lightred': '#FF5A5F',
            'solidred': '#C81D25',
        },
    },

    plugins: [forms],
};
