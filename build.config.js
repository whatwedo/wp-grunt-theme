/**
 * This file/module contains all configuration for the build process.
 */
module.exports = {
    /**
     * The `dev_build_dir` folder is where our projects are compiled during
     * development and the `prod_build_dir` folder is where our WordPress site resides once it's
     * completely built.
     */

    prod_build_dir: "../themename",
    dev_build_dir: "../themename-dev",
    cache_dir: "build-cache",

    /**
     * This is a collection of file patterns that refer to our app code. 
     * These file paths are used in the configuration of
     * build tasks. `js` is all project javascript. `templates` are just our
     * main PHP files.
     */
    app_files: {
        js: [
            'javascripts/test.js',
            'javascripts/coffee/test.js'
        ],

        //coffee: ['javascripts/coffee/**/*.coffee'],

        templates: ['templates/**/*.php'],

        sasscwd: 'scss',
        sasssrc: ['**/*.scss', '!**/_*.scss'],
        sass: ['<%= app_files.sasscwd %>/**/*.scss', '!<%= app_files.sasscwd %>/**/_*.scss'],
    },

    /**
     * This is the same as `app_files`, except it contains patterns that
     * reference vendor code (`vendor/`) that we need to place into the build
     * process somewhere. While the `app_files` property ensures all
     * standardized files are collected for compilation, it is the user's job
     * to ensure non-standardized (i.e. vendor-related) files are handled
     * appropriately in `vendor_files.js`.
     *
     * The `vendor_files.js` property holds files to be automatically
     * concatenated and minified with our project source files.
     *
     * The `vendor_files.css` property holds any CSS files to be automatically
     * included in our app.
     *
     * The `vendor_files.assets` property holds any assets to be copied along
     * with our app's assets. This structure is flattened, so it is not
     * recommended that you use wildcards.
     */
    vendor_files: {
        js: [
            'javascripts/coffee/test.js'
        ],
        css: [],
        assets: []
    },

    /**
     * Loads predefined vendor files defered/asynchronously after full page load.
     * Only add files that are not necessary for initial page load
     * i.e. Key bindings, advanced functions, lazy loading stuff.
     * http://www.feedthebot.com/pagespeed/defer-loading-javascript.html
     */
    files_async: {
        js: []
    },
};