module.exports = function (grunt) {
  grunt.initConfig({
    // Watch task config
    watch: {
        styles: {
            files: "*.scss",
            tasks: ['sass', 'postcss'],
        },
    },
    sass: {
        dist: {
            files: {
                "style.min.css" : "style.scss"
            }
        }
    },
    postcss: {
        options: {
            map: {
                inline: false
            },
            processors: [
                require('pixrem')(), // add fallbacks for rem units
                require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
                require('cssnano')() // minify the result
            ]
        },
        dist: {
            src: 'style.min.css',
        }
    },
  });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', 'watch');
};
