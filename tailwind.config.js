import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', 'sans-serif'],
                serif: ['Source Serif Pro', 'serif'],
            },
            colors: {
                'text': '#e5f3ef',
                'background': '#050b09',
                'primary': '#8fffe3',
                'secondary': '#3f3978',
                'accent': '#9572bc',
            },
        },
    },

    plugins: [forms, typography],
};
