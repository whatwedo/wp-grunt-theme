module.exports = function(grunt) {

    /**
     * Requirements
     */
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-coffee');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-yui-compressor');

    /**
     * reads package.json
     */
    pkg = grunt.file.readJSON('package.json');

    /**
     * sets build config based on parameter (--dev (default) / --prod)
     */
    build = {
        env: (grunt.option('env') == "prod") ? "prod" : "dev",
        folder: (grunt.option('env') == "prod") ? pkg.folders.build_prod : pkg.folders.build_dev,
    };

    /**
     * ordered list of JS files
     **/
    grunt.option('jsSrc', [
            'javascripts/test.js',
            'javascripts/coffee/test.js', // originally javascripts/coffee/test.coffee
    ]);

    /**
     * Builds JavaScript 
     */
    grunt.registerTask('js', [
        'coffee:compile',
        (build.env == "prod") ? 'min:scripts' : 'concat:scripts',
        'clean:coffee',
    ]);

    /**
     * copies required assets
     */
    grunt.registerTask('assets', [
        'copy:images',
        'copy:library',
        'copy:templates',
        'copy:jquery',
        'copy:modernizr',
        'copy:tgm'
    ]);

    /**
     * Builds whole project for productive env
     */
    grunt.registerTask('build', [
        'clean:build',
        'js',
        'sass',
        'assets'
    ]);

    /**
     * Default
     */
    grunt.registerTask('default', [
        'build'
    ]);

    /**
     * Build-Steps
     */
    grunt.initConfig({

        build: grunt.option('build'),

        /**
         * Watchers
         */
        watch: {
            options: {
                debounceDelay: 100,
                livereload: true, // use this extension: http://goo.gl/CK03sy
            },
            images: {
                files: ['images/**/*'],
                tasks: ['copy:images']
            },
            templates: {
                files: ['templates/**/*'],
                tasks: ['copy:templates']
            },
            library: {
                files: ['library/**/*'],
                tasks: ['copy:library']
            },
            vendor: {
                files: ['vendor/**/*'],
                tasks: ['grunt'],
                options: {
                    interrupt: true,
                    debounceDelay: 1000,
                }
            },
            javascript: {
                files: ['javascripts/**/*'],
                tasks: ['js']
            },
            sass: {
                files: ['scss/**/*'],
                tasks: ['sass']
            }
        },

        /**
         * SASS / SCSS inkl. WordPress-Banner
         */
        sass: {
            dist: {
                options: {
                    banner: [
                        '/**',
                        ' * Theme Name: My fancy theme' + (build.env == "dev" ? " (Development)" : ""),
                        ' * Theme URI: http://whatwedo.ch/',
                        ' * Author: whatwedo.ch-Team',
                        ' * Author URI: http://whatwedo.ch',
                        ' * Version: 1.0' + (build.env == "dev" ? " -dev" : ""),
                        ' **/\n'
                    ].join('\n'),
                    style: build.env == "dev" ? 'expanded' : 'compressed'
                },
                files: {
                    '<%= grunt.option(\'build\').folder %>/style.css': 'scss/app.scss',
                }
            }
        },

        /**
         * CoffeeScript
         */
        coffee: {
            /**
             * Compiles CoffeeScript into /javascripts/coffee
             */
            compile: {
                options: {
                    bare: true // enabled CoffeeScript Bare-Mode
                },
                files: [
                    {
                        expand: true,
                        cwd: 'javascripts/coffee',
                        src: ['{,*/}*.coffee'],
                        dest: 'javascripts/coffee',
                        rename: function(dest, src) {
                            return dest + '/' + src.replace(/\.coffee$/, '.js');
                        }
                    }
                ]
            }
        },

        /**
         * Concatenate
         */
        concat: {
            /**
             * outputs a single JavaScript file for dev env
             */
            scripts: {
                src: grunt.option('jsSrc'),
                dest: '<%= grunt.option(\'build\').folder %>/javascripts/scripts.js',
            },
        },

        /**
         * YUI Compressor JavaScript
         */
        min: {
            /**
             * compresses all JavaScripts files for prod env
             */
            scripts: {
                src: grunt.option('jsSrc'),
                dest: '<%= grunt.option(\'build\').folder %>/javascripts/scripts.js'
            }
        },

        /**
         * Clean-up tasks
         */
        clean: {
            options: {
                force: true 
            },

            /**
             * removes .js files generated by CoffeeScript
             */
            coffee: [
                'javascripts/coffee/*.js'
            ],

            /**
             * removes productive build
             */
            build: [
                '<%= grunt.option(\'build\').folder %>'
            ],
        },

        /**
         * File Copy Tasks
         */
        copy: {
            /**
             * image assets
             */
            images: {
                expand: true,
                src: [
                    'images/**'
                ],
                dest: '<%= grunt.option(\'build\').folder %>/'
            },

            /**
             * copy WordPress Templates (like index.php, archive.php)
             */
            templates: {
                files: [
                    {
                        expand: true,
                        cwd: 'templates/',
                        src: ['**'],
                        dest: '<%= grunt.option(\'build\').folder %>/'
                    }
                ]
            },

            /**
             * copy Template Library (custom functions)
             */
            library: {
                files: [
                    {
                        expand: true,
                        cwd: 'library/',
                        src: ['**'],
                        dest: '<%= grunt.option(\'build\').folder %>/library'
                    }
                ]
            },

            /**
             * copy jQuery-fallback
             */
            jquery: {
                src: [
                    'vendor/foundation/js/vendor/jquery.js'
                ],
                dest: '<%= grunt.option(\'build\').folder %>/javascripts/vendor/jquery.js'
            },

            /**
             * copy Modernizr
             */
            modernizr: {
                src: [
                    'vendor/foundation/js/vendor/custom.modernizr.js'
                ],
                dest: '<%= grunt.option(\'build\').folder %>/javascripts/vendor/modernizr.js'
            },

            /**
             * copy TGM Plugin Activation (PHP Library)
             */
            tgm: {
                src: [
                    'vendor/tgm-plugin-activation/tgm-plugin-activation/class-tgm-plugin-activation.php'
                ],
                dest: '<%= grunt.option(\'build\').folder %>/library/vendor/class-tgm-plugin-activation.php'
            }
        },

    });

    grunt.option('build', build);

};