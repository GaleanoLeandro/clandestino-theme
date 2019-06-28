import gulp from 'gulp'
import browserSync from 'browser-sync'
import plumber from 'gulp-plumber'
import sass from 'gulp-sass'
import sourcemaps from 'gulp-sourcemaps'
import autoprefixer from 'gulp-autoprefixer'
import cleanCSS from 'gulp-clean-css'
import browserify from 'browserify'
import babelify from 'babelify'
import source from 'vinyl-source-stream'
import buffer from 'vinyl-buffer'
import jsmin from 'gulp-jsmin'
import concat from 'gulp-concat'
import zip from 'gulp-zip'

const reload = browserSync.reload
const reloadFiles = [
  './script.js',
  './style.css',
  './**/*.php'
]
const proxyOptions = {
  proxy: 'dev.nahueclandestino.com',
  injectChanges: true,
  notify: false
}

const ignoreFiles = [
  '.vscode',
  'js/**',
  'scss/**',
  '.babelrc',
  '.gitignore',
  '*.zip',
  'gulpfile.babel.js',
  '**/node_modules/**',
  'package.json',
  'package.lock.json',
]

gulp.task('server', () => {
  browserSync.init(reloadFiles, proxyOptions)

  gulp.watch('./scss/**/*.scss', gulp.series('scss'))
  gulp.watch('./js/**/*.js', gulp.series('js'))
})

gulp.task('scss', () => {
  return gulp.src('./scss/style.scss')
    .pipe(sass())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(plumber())
    .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./'))
    .pipe(reload({ stream: true }))
})

gulp.task('js', () => {
  return browserify('./js/index.js')
    .transform(babelify)
    .bundle()
    .on('error', err => console.log(err.message))
    .pipe(source('script.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sourcemaps.write('./'))
    .pipe(jsmin())
    .pipe(gulp.dest('./'))
    .pipe(reload({ stream: true }))
})

gulp.task('libs', () => {
  return gulp.src(['./js/all.min.js', './js/bootstrap.min.js', './js/simple-lightbox.min.js'])
    .pipe(concat('libraries.js'))
    .pipe(gulp.dest('./'))
})

// Construye .zip ya listo para subir a wordpress, ignorando archivos innecesarios
gulp.task('zip', () => {
  return gulp.src('./**', { ignore: ignoreFiles })
    .pipe(zip('clandestino.zip'))
    .pipe(gulp.dest('./')) 
})

gulp.task('default', gulp.parallel('server', 'scss', 'js'))