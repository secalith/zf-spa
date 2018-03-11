module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // uglify: {
        //     options: {
        //         banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
        //     },
        //     build: {
        //         src: 'node_modules/jquery/dist/jquery.js',
        //         dest: 'build/<%= pkg.name %>.min.js'
        //     }
        // },
        copy: {
            js: {
                expand: true,
                cwd: './node_modules',
                dest: './public/assets/scripts/',
                flatten: true,
                filter: 'isFile',
                src: [
                    './bootstrap/dist/js/bootstrap.js',
                    './jquery/dist/jquery.js'
                ],
            },
            css: {
                expand: true,
                cwd: './node_modules',
                dest: './public/assets/styles',
                flatten: true,
                filter: 'isFile',
                src: [
                    './bootstrap/dist/css/bootstrap.css',
                    './bootstrap/dist/css/bootstrap-theme.css'
                ]
            },
            fonts: {
                processContentExclude: ['**/*.{png,gif,jpg,ico,psd}'],
                expand: true,
                cwd: './node_modules',
                dest: './public/assets/fonts',

                src: [
                    './bootstrap/fonts/glyphicons-halflings-regular.eot',
                    './bootstrap/fonts/glyphicons-halflings-regular.woff',
                    './bootstrap/fonts/glyphicons-halflings-regular.svg',
                    './bootstrap/fonts/glyphicons-halflings-regular.woff2',
                    './bootstrap/fonts/glyphicons-halflings-regular.ttf',
                    './bootstrap/dist/css/bootstrap-theme.css'
                ]
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', [
        'copy'
    ]);
    grunt.registerTask('fonts', [
        'copy:fonts'
    ]);

};