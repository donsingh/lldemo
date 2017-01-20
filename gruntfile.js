var path = require('path');

module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
		phplint: {
			options: {
				stdout: true,
				stderr: true
			},
			all: {
				// src: 'application/**/*.php'
				src: '**/*.php'
			}
		},
        jshint:{
            all:['gruntfile.js','assets/js/*.js']
        },
        cssmin:{
            build:{
                files:{
                    'assets/css/compressed/style.min.css':'assets/css/style.css'
                }
            }
        },
        uglify:{
			options:{
				compress: true,
				preserveComments:false
			},
            my_target:{
                files:{
                    'assets/js/compressed/app.min.js' : [
                        'assets/js/app.js'
                    ]
                }
            }
        }
		watch: {
			// scripts: {
				// files: ['assets/**/*'],
				// tasks: ['test']
			// }
			css:{
				files: ['assets/**/*.css'],
				tasks: ['cls', 'newer:cssmin:build']
			},
			js:{
				files: ['assets/**/*.js'],
				tasks: ['cls', 'newer:jshint:all', 'newer:uglify:my_target']
			},
			php:{
				files: ['application/**/*.php'],
				tasks: ['cls', 'newer:phplint:all']
			}
		},
		shell: {
			options: {
				stderr: false
			},
			target: {
				command: 'clear'
			}
		}
    });
	
	
	require('load-grunt-tasks')(grunt);
    // grunt.loadNpmTasks('grunt-contrib-jshint');
    // grunt.loadNpmTasks('grunt-contrib-cssmin');
    // grunt.loadNpmTasks('grunt-contrib-uglify');
	// grunt.loadNpmTasks('grunt-contrib-imagemin');
	// grunt.loadNpmTasks("grunt-phplint");
	// grunt.loadNpmTasks('grunt-newer');
	// grunt.loadNpmTasks('grunt-contrib-watch');
	// grunt.loadNpmTasks('grunt-shell');
	
	grunt.registerTask('cls', ['shell']);
    grunt.registerTask('test', [
		'newer:jshint:all', 'newer:cssmin:build', 'newer:uglify:my_target', 'newer:phplint:all'
	]);
	
	grunt.registerTask('git', [
		'gitadd','gitcommit'
	]);
	
	grunt.registerTask('default', [
		'jshint', 'cssmin', 'uglify:my_target', 'phplint','git'
	]);
	
};

//check https://github.com/sindresorhus/jshint-stylish
