const mix = require('laravel-mix');

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

mix.js('resources/js/bootstrap.js', 'public/js')
  	mix.sass('resources/sass/app.scss', 'public/css')
   	.sass('resources/sass/blog.scss','public/css')
   	.browserSync({
		proxy:'localhost:8000',
		files:[
			'public/**/*.html','public/css/**/*.css','public/js/**/*.js',
			'resources/views/**/*.blade.php'
		 ]
   	})
//  .options({
//   processCssUrls: false // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//  })
   ;
