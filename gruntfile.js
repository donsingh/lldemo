module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        jshint:{
            all:['assets/js/*.js']
        },
        cssmin:{
            build:{
                files:{
                    'assets/css/compressed/style.min.css':'assets/css/style.css'
                }
            }
        },
        uglify:{
            my_target:{
                files:{
                    'assets/js/compressed/app.min.js' : [
                        'assets/js/*.js'
                    ]
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['jshint', 'cssmin', 'uglify']);
};
