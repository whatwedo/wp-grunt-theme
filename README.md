# wp-grunt-theme

A grunt theme boilerplate, compiles and minifies files and copy them from the ```theme-src```to a ```theme```and ```theme-dev```folder.

**Important: This repository is no longer maintained by whatwedo. As we frequently change our workflow and processes, we started a new project with Gulp. See [gulp-wp-theme](https://github.com/whatwedo/gulp-wp-theme).** For an alternative to the Grunt theme, try the more popular [grunt-wp-theme](https://github.com/10up/grunt-wp-theme).

## 1. Installation
1. Copy all files and folders to ```/wp-content/themes/<Themename>-src/``` 
2. Use ```make install``` inside your terminal to get all NPM modules and bower dependencies.

## 2. Configuration

### Theme Banner / Name
Edit ```Gruntfile.js``` somewhere around line 125, to customize the WordPress Theme Banner, which will be shown in the theme options in WordPress.

### Build folders for development and productive

Edit ```package.json``` to set development and productive folder names. Also edit theme name, author, etc. which are used as grunt manifest.

### Javascript resources, vendors, plugins and bower manifest

Edit ```bower.json``` to add additional Javascript resources and plugins you want to use in your theme. Also edit theme name, author, etc. which are used as bower manifest.

### *(optional)* Adding required plugins

You can ensure that your theme users install the required plugins without writing them 10 pages of manual. Just extend the ```library/WPFW/Plugins.php``` with additional plugins. We already added some of the plugins we use regulary. You are free to remove them.

## 3. Working with the wp-grunt-theme

### Server-side code & functions.php

The wp-grunt-theme extends the functions.php with own files to keep the code clean and easy. You can use the ```library/Theme/Theme.php```to add server-side code you normally would add to the functions.php. The ```library/app.php```then includes your program code from your subfolder. The functions.php is going to include both, the framework.php and the app.php.

You are free to rename Theme.php or its folder, also the reference in the app.php, mirror your naming and theme conventions.

We mostly use the theme's name as best practice, being able to use it as namespace too.

### Building your theme for development and production

Access your theme folder via terminal and use ```grunt``` to build your theme or one of the shortcuts. Depending on the command you use, you get several folders:

- ```themename-dev``` - Your themes files like SCSS are compiled, but not combined or minifed, so your are able to debug things in browser.
- ```themename``` - That's your theme for productions. Files are compiled, minified and combined to enhance speed and performance.

#### Shortcuts

You can either use these shortcuts to enhance your workflow, or use default grunt commands. There are 3 shortcuts:

```
make dev     # Complete build for development
make prod    # Complete build for production
make watch   # Activates the watcher which compiles your theme as soon changes are made
```

#### Grunt commands

If you are using the grunt commands, you get some more options to customize your build:

```
grunt        # Complete build for development and production
grunt js     # Compiles javascript and coffee script only
grunt assets # Compiles assets (Templates, Library, ...) only
grunt sass   # Compiles SCSS only
grunt watch  # Activates the watcher which compiles your theme as soon changes are made
```

Every command can be expanded with the flags ```--env=dev``` (default) to only build a development version, or ```--env=prod``` to only build a production version.

#### Live Editing
While ```grunt watch``` is active, the LiveReload Browser plugin can be used to mirror all changes to the browser as soon they are compiled.  <http://goo.gl/CK03sy>

---

## What's inside?

### Gems
* **bundler** - installs gem packages set in the ```Gemfile```
* **compass** - CSS Authoring Framework
* **oily_png** - Compress PNGs faster with ChunkyPNG thanks to a native c library. Used for sprites.

### NPM
Node Packages to enhance the build workflow for productive and development state.

* **grunt** - Runs automatic tasks when you start building your theme
  * **grunt-yui-compressor** - Compresses things, you know
  * **grunt-contrib-clean** - Cleans folders for new builds
  * **grunt-contrib-copy** - Copies files
  * **grunt-contrib-coffee** - Doesn't make coffee, but compiles coffee script
  * **grunt-contrib-sass** - Compiles SASS/SCSS
  * **grunt-contrib-concat** - Merges files
  * **grunt-contrib-watcher** - Watches your files for changes
* **bower** - Package management for Javascript files

### Bower
Package manager to handle external Javascript files (i.e. jQuery or plugins). 

* **Zurb Foundation** - mobile-first SCSS boilerplate, Version 5
* **jQuery** - C'mon, everybody knows jQuery. (version 2.*)
* **modernizr** - To check for browser features
* **TGM Plugin Activation** - PHP Library to set required theme plugins

## Folders and files

```
/images             # Images your theme is using
/javascripts        # Your javascript files (shouldn't be used for external files)
/javascripts/coffee # Coffee script files
/library            # Your server-side code
/scss               # SCSS files
/templates          # The WordPress Template files you already should know
```

## Thanks
* [bones starter theme](https://github.com/eddiemachado/bones) for inspiration and a cool boilerplate.
