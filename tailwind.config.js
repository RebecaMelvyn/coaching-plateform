import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui'],
            },
            colors: {
                primary: {
                    DEFAULT: '#2563eb', // bleu profond
                    light: '#60a5fa',
                    dark: '#1e40af',
                },
                accent: {
                    DEFAULT: '#a78bfa', // violet
                    light: '#c4b5fd',
                },
                success: '#22c55e', // vert
                background: '#f4f6fa',
                surface: '#fff',
                muted: '#e5e7eb',
                dark: '#111827',
            },
            boxShadow: {
                'xl-glass': '0 8px 32px 0 rgba(31, 38, 135, 0.18)',
            },
            borderRadius: {
                'xl': '1.5rem',
                '2xl': '2rem',
            },
        },
    },

    plugins: [forms],
};
