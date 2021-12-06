const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            white:colors.white,
            black:colors.black,
            blueGray:colors.blueGray,
            coolGray:colors.coolGray,
            gray:colors.gray,
            trueGray:colors.trueGray,
            warmGray:colors.warmGray,
            red:colors.red,
            orange:colors.orange,
            amber:colors.amber,
            yellow:colors.yellow,
            lime:colors.lime,
            green:colors.green,
            emerald:colors.emerald,
            teal:colors.teal,
            cyan:colors.cyan,
            sky:colors.sky,
            blue:colors.blue,
            indigo:colors.indigo,
            violet:colors.violet,
            purple:colors.purple,
            fuchsia:colors.fuchsia,
            pink:colors.pink,
            rose:colors.rose,
        }
    },
    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),
        require('daisyui'),
    ],
}
