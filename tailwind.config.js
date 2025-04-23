import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            keyframes: {
                dance: {
                    '0%, 100%': { transform: 'translateX(0)' },
                    '50%': { transform: 'translateX(75%)' },
                },
                progress: {
                    '0%': { transform: ' translateX(0) scaleX(0)' },
                    '40%': { transform: 'translateX(0) scaleX(0.4)' },
                    '100%': { transform: 'translateX(100%) scaleX(0.5)' },
                },
            },
            animation: {
                dance: 'dance 1s ease-in-out infinite',
                progress: 'progress 1s infinite linear',
            },
            transformOrigin: {
                'left-right': '0% 50%',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [forms],
};
