import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'sea-pink': {
                    '50': '#fdf3f4',
                    '100': '#fbe8eb',
                    '200': '#f6d5da',
                    '300': '#ea9daa',
                    '400': '#e58799',
                    '500': '#d75c77',
                    '600': '#c13d60',
                    '700': '#a22e4f',
                    '800': '#882947',
                    '900': '#752642',
                    '950': '#411020',
                },
            }
        },

    },

    plugins: [forms, typography],
};
