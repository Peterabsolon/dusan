/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var elixir = require('laravel-elixir');
var svgSprite = require("gulp-svg-sprites");
var gulp = require('gulp');

elixir.config.sourcemaps = false;

elixir(function(mix) {
	mix
		.browserSync({
			proxy : 'localhost:8000',
			notify: false,
			files : [
				{
					match: ['public/assets/**/*']
				}
			]
		})

		.sass('app.scss', 'public/assets/css/app.css')

		.scripts([
			'app.js'
		], 'public/assets/js/app.js')

		.scripts([
			'vendor/jquery.min.js',
			'vendor/smoothscroll.js',
			'vendor/picturefill.min.js',
			'vendor/fastclick.js',
			'vendor/wow.js',
			'vendor/featherlight.min.js',
			'vendor/featherlight.gallery.min.js'
		], 'public/assets/js/libs.js');
});

// TODO
gulp.task('sprites', function () {
    return gulp.src('testik/*.svg')
        .pipe(svgSprite())
        .pipe(gulp.dest('sprites'));
});