var elixir = require('laravel-elixir'),
    gulp    = require('gulp'),
    htmlmin = require('gulp-htmlmin');

elixir.extend('compress', function() {
    new elixir.Task('compress', function() {
        return gulp.src('./storage/framework/views/*')
            .pipe(htmlmin({
                collapseWhitespace:    true,
                removeAttributeQuotes: true,
                removeComments:        true,
                minifyJS:              false,
            }))
            .pipe(gulp.dest('./storage/framework/views/'));
    })
    .watch('./storage/framework/views/*');
});

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

elixir(function(mix) {
    mix
    .styles([
        "css/grid24.css",
        "css/responsive.css",
        "css/responsiveHomepage.css",
        "css/animate.css",
        "css/hint.min.css",
        "css/tagging.css",
        "css/jquery.slotmachine.css",
    ], 'public/css', 'public')
    .styles([
        "css/materialize.min.css",
        "css/animate.css",
        "css/mobileLayout.css",
        "css/mobileFront.css",
        "css/hint.min.css",
        "css/tagging.css",
        "css/jrate.css",
    ], 'public/css/mobile.all.css', 'public')
    .styles([
        "css/reset.min.css",
        "css/grid24.css",
        "css/responsive.css",
        "css/clubhouse.css",
        "css/animate.css",
        "css/croppie.css"
    ], 'public/css/clubhouse-all.css', 'public')
    .styles([
        "css/home/homepage.master.css"
    ], 'public/css/home/homepage.master.min.css', 'public')
    .styles([
        "css/home/layout.master.css"
    ], 'public/css/home/layout.master.min.css', 'public')
    .styles([
        "css/home/single.master.css"
    ], 'public/css/home/single.master.min.css', 'public')
    .scripts([
        'js/jquery.unveil.js',
        'js/jquery.easing.1.3.js',
        'js/jquery.leanModal.min.js',
        'js/jquery.lazyimage.js',
        'js/jquery.sharrre.min.js',
        'js/jquery.slimscroll.min.js',
        'js/interact.min.js',
        'js/jquery.bxslider.min.js',
        'js/gameSearch.js',
        'js/moment.min.js',
        'js/moment-timezone.min.js',
        'js/livestamp.min.js',
        'js/home.js',
        'js/jquery.slotmachine.js',
        'js/jquery.caret.js',
        'js/tagging.js',
        'js/classie.js',
        'js/privateMessaging.js',
     ], 'public/js/custom/main.js','public')
    .scripts([
        'js/jquery-1.12.0.js',
        'js/CSSPlugin.min.js',
        'js/TweenLite.min.js',
        'js/clubhouse.plugins.js',
        'js/jquery.unveil.js',
        'js/jquery.easing.1.3.js',
        'js/modernizr.custom.js',
        'js/jquery.leanModal.min.js',
        'js/jquery.lazyimage.js',
        'js/jquery.slimscroll.min.js',
        'js/interact.min.js',
        'js/jquery.mobile.min.js',
        'js/tour.js',
        'js/moment.min.js',
        'js/moment-timezone.min.js',
        'js/livestamp.min.js',
        'js/privateMessaging.js',
     ], 'public/js/custom/clubhouse-all.js','public')
    .scripts([
        'js/jquery.js',
        'js/jquery.sharrre.min.js',
        'js/moment.min.js',
        'js/moment-timezone.min.js',
        'js/livestamp.min.js',
        'js/materialize.min.js',
        'js/app.min.js',
        'js/jonasRate.js',
        'js/sockets.io.js',
     ], 'public/js/custom/main.mobile.js','public')
    .version(['public/css/all.css','public/js/custom/main.js','public/css/clubhouse-all.css','public/js/custom/clubhouse-all.js','public/css/mobile.all.css','public/js/custom/main.mobile.js','public/css/home/layout.master.min.css','public/css/home/homepage.master.min.css','public/css/home/single.master.min.css'])
    .compress();

});
