module.exports = function(grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        copy: {
            // Copy node_modules js to common [tmp] location
            js_modules: {
                expand: true,
                cwd: './node_modules',
                dest: './build/tmp/scripts/',
                flatten: true,
                filter: 'isFile',
                src: [
                    './jquery/dist/jquery.js',
                    './bootstrap/dist/js/bootstrap.js',
                    './jquery.scrollbar/jquery.scrollbar.js'

                ]
            },
            css_modules: {
                expand: true,
                cwd: './node_modules',
                dest: './build/tmp/styles/',
                flatten: true,
                filter: 'isFile',
                src: [
                    './bootstrap/dist/css/bootstrap.css',
                    './bootstrap/dist/css/bootstrap-theme.css',
                    './jquery.scrollbar/jquery.scrollbar.css'
                ]
            },
            // Copy application_js to common location
            js_application_common: {
                expand: true,
                cwd: './build/application_frontend/scripts/common',
                dest: './build/tmp/scripts/',
                flatten: true,
                filter: 'isFile',
                src: [
                    '*.js'
                ]
            },
            css_application_common: {
                dest: './build/tmp/styles/',
                expand: true,
                flatten: true,
                src: [
                    './build/application_frontend/styles/common/chat.css',
                    './build/application_frontend/styles/common/common.css'
                ]
            },
            css_application_editor: {
                dest: './build/tmp/styles/',
                expand: true,
                flatten: true,
                src: [
                    './build/application_frontend/styles/editor/editor.css'
                ]
            },
            // Copy application_js to common location
            js_application_editor: {
                expand: true,
                cwd: './build/application_frontend/scripts/editor',
                dest: './build/tmp/scripts/',
                flatten: true,
                filter: 'isFile',
                src: [
                    '*.js'
                ]
            }
        },
        cssmin: {
            options: {
                level: {
                    1: {
                        specialComments: 0
                    }
                }
            },
            modules: {
                files: [{
                    expand: false,
                    src: ['./build/tmp/styles/*.css','!./build/tmp/styles/*.min.css'],
                    dest: './public/assets/styles/styles.min.css'
                }]
            },
            application_common: {
                files: [{
                    expand: false,
                    src: ['./build/tmp/styles/*.css','!./build/tmp/styles/*.min.css'],
                    dest: './public/assets/styles/common.min.css'
                }]
            },
            application_editor: {
                files: [{
                    expand: false,
                    src: ['./build/tmp/styles/*.css','!./build/tmp/styles/*.min.css'],
                    dest: './public/assets/styles/editor.min.css'
                }]
            }
        },
        concat: {
            options: {},
            files: {
                './public/assets/css/styles.css': ['./build/tmp/css/*.css']
            }
        },
        clean: {
            css_all: {
                src: [ './build/tmp/styles' ]
            },
            js_all: {
                src: [ './build/tmp/scripts' ]
            },
            tmp: {
                src: [ './build/tmp' ]
            }
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> lib - v<%= pkg.version %> -' +
                '<%= grunt.template.today("yyyy-mm-dd") %> */'
            },
            modules: {
                files: {
                    './public/assets/scripts/modules.min.js': [
                        './build/tmp/scripts/jquery.js',
                        './build/tmp/scripts/bootstrap.js',
                        './build/tmp/scripts/jquery.scrollbar.js'
                    ]
                }
            },
            js_application_common: {
                files: {
                    './public/assets/scripts/common.min.js': [
                        './build/tmp/scripts/*.js',
                        '!./build/tmp/scripts/*.min.js'
                    ]
                }
            },
            js_application_editor: {
                files: {
                    './public/assets/scripts/editor.min.js': [
                        './build/tmp/scripts/*.js',
                        '!./build/tmp/scripts/*.min.js'
                    ]
                }
            }
        },
        watch: {
            src: {
                files: [
                    'Gruntfile.js',
                    './build/application_frontend/styles/common/*.css',
                    './build/application_frontend/styles/editor/*.css',
                    './build/application_frontend/scripts/common/*.js',
                    './build/application_frontend/scripts/editor/*.js'
                ],
                tasks: ['default']
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify-es');

    grunt.registerTask('default', [
        'clean:tmp',

        // JS for npm modules first
        'copy:js_modules',
        'uglify:modules',
        'clean:js_all',

        // common JS
        'copy:js_application_common',
        'uglify:js_application_common',
        'clean:js_all',

        // editor JS
        'copy:js_application_editor',
        'uglify:js_application_editor',
        'clean:js_all',

        'copy:css_modules',
        'cssmin:modules',
        'clean:css_all',
        'copy:css_application_common',
        'cssmin:application_common',
        'clean:css_all',
        'copy:css_application_editor',
        'cssmin:application_editor',
        'clean:css_all',

        'clean:tmp',
        'watch'
    ]);
};