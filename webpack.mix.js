const mix = require('laravel-mix');
const fs = require('fs');
let getFiles = function (dir) {
    return fs.readdirSync(dir).filter(file => {
        return fs.statSync(`${dir}/${file}`).isFile();
    });
};
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps(false, undefined).version().disableNotifications();
getFiles('resources/js/pages').forEach(function (filepath) {
    mix.js('resources/js/pages/' + filepath, 'public/js/pages')
        .sourceMaps(false, undefined).version().disableNotifications();
});
