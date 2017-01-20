var path = require('path');
module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
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
        },
		gitadd:{
			task: {
				options: {
					force: true,
					all: true,
					cwd: path.resolve()
				}
			}
		},
		gitcommit: {
			your_target: {
				options: {
					message: 'Repository updated on ' + grunt.template.today(),
					allowEmpty: true
				}
			}
		},gitpush: {
			task: {
				options: {
					remote: 'origin',
					branch: 'master',
					cwd: path.resolve()
				}
			}
		}
    });
	
	grunt.registerTask('git', [
		'gitadd','gitcommit','gitpush'
	]);
	
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-git');
	
    grunt.registerTask('default', [
		'jshint', 'cssmin', 'uglify', 'git'
	]);
};
