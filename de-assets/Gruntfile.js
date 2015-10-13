module.exports = function(grunt) {

  'use strict';
  
 // require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    /**
     * Set banner
     */
    banner: '/**\n' +
    '<%= pkg.title %> - <%= pkg.version %>\n' +
    '<%= pkg.homepage %>\n' +
    'Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>\n' +
    'License: <%= pkg.license %>\n' +
    '*/\n',


    /**
     * Set directory paths
     */
    dir: {
      js: 'js',
      css: 'css',
      sass: 'css/sass',
      img: 'img'
    },


    /**
     * JSHint
     * @github.com/gruntjs/grunt-contrib-jshint
     */
    jshint: {
      gruntfile: 'Gruntfile.js',
      baseFiles: ['<%= dir.js %>/src/*.js', '!<%= dir.js %>/src/concat/**/*','!<%= dir.js %>/src/**/*.min.js'],
      pluginsFiles: ['<%= dir.js %>/src/plugins/*.js', '!<%= dir.js %>/src/concat/**/*','!<%= dir.js %>/src/**/*.min.js'],
      files: ['<%= dir.js %>/src/pages/*.js', '!<%= dir.js %>/src/concat/**/*','!<%= dir.js %>/src/**/*.min.js'],
      options: {
        jshintrc: '.jshintrc'
      }
    },


    /**
     * Concatenate
     * @github.com/gruntjs/grunt-contrib-concat
     */
    concat: {
      options: {
        stripBanners: true,
        banner: '<%= banner %>',
         separator: ';'
      },     
   
      js: {
        files: [
          {dest:'<%= dir.js %>/src/concat/global.js', 
              src:['<%= dir.js %>/src/jquery-1.9.1.min.js',
              '<%= dir.js %>/src/others/jquery.SuperSlide.2.1.1.js',
               '<%= dir.js %>/src/app.js'
                ]
          },
          {dest:'<%= dir.js %>/src/concat/form.js', 
              src:['<%= dir.js %>/src/plugins/ui/jgrowl/jquery.jgrowl.min.js', 
                '<%= dir.js %>/src/plugins/forms/uniform/jquery.uniform.min.js',
                '<%= dir.js %>/src/plugins/forms/validation/jquery.validate.js',
                '<%= dir.js %>/src/plugins/forms/switch/bootstrapSwitch.js',
                ]
          },
          {dest:'<%= dir.js %>/src/concat/pages/login.js', 
              src:['<%= dir.js %>/src/plugins/forms/uniform/jquery.uniform.min.js', 
                '<%= dir.js %>/src/plugins/forms/validation/jquery.validate.js',
                '<%= dir.js %>/src/pages/login.js'
                ]
          },
          {dest:'<%= dir.js %>/src/concat/acl.js', 
              src:['<%= dir.js %>/src/plugins/treeview/jquery.treeview.js',
              '<%= dir.js %>/src/base/acl.js'
                ]
          },
          {dest:'<%= dir.js %>/src/concat/pages/media.js', 
              src:['<%= dir.js %>/src/pages/media.js'
                ]
          },
          {dest:'<%= dir.js %>/src/concat/pages/qrcode.js', 
              src:['<%= dir.js %>/src/pages/qrcode.js'
                ]
          },
        ]
      }
    },

    /**
     * Minify
     * @github.com/gruntjs/grunt-contrib-uglify
     */
    uglify: {

      // Uglify options
      options: {
        banner: '<%= banner %>'
      },

      // Minify js files in js/src/
      dist: {
        expand: true,
        cwd: '<%= dir.js %>/src/concat/',
        ext: '.min.js',
        src: ['**/*.js'],
        dest: '<%= dir.js %>/'
      },
    },


    /**
     * Sass compiling
     * @github.com/gruntjs/grunt-contrib-sass
     */
    sass: {

      // Global
      glo: {
        options: {
          style: 'compressed',
          // sourcemap: true, // Requires Sass 3.3.0 alpha: `sudo gem install sass --pre`
          trace: false,
          debugInfo: false
        },
        files: [{
          expand: true,
          src: ['<%= dir.sass %>/global.scss'],
          dest: '<%= dir.css %>',
          ext: '.css',
          flatten : true
        }]
      },


      dev: {
        options: {
          style: 'compressed',
          // sourcemap: true, // Requires Sass 3.3.0 alpha: `sudo gem install sass --pre`
          trace: false,
          debugInfo: false
        },
        files: [{
          expand: true,
          src: ['<%= dir.sass %>/*.scss', '! <%= dir.sass %>/global.scss'],
          dest: '<%= dir.css %>',
          ext: '.css',
          flatten : true
        }]
      },

      // Distribution options
      dist: {
        options: {
          style: 'compressed'
        },
        files: [{
          expand: true,
          src: ['<%= dir.sass %>/*.scss'],
          dest: '<%= dir.css %>',
          ext: '.css',
          flatten : true
        }]
      }
    },


    cssmin: {
            build: {
                src: '<%= dir.css %>/src/**/*.css',
                dest: '<%= dir.css %>/global.css'
            }
        },


    copy: {
      cssImg : {
        files: [{
          expand: true,
          dot: true,
          cwd: '<%= dir.sass %>',
          src: ['**/*.jpg', '**/*.png', '**/*.gif', '**/*.jpeg', '**/*.swf'],
          dest: '<%= dir.css %>/images',
          flatten : true
        }]
      },
      dist: {
        files: [{
   //       expand: true,
            dot: true,
  //        cwd: '<%= yeoman.app %>',
          dest: '<%= dir.css %>/global.css',
          src: '<%= dir.css %>/src/**/*.css'
        }]
      }
    },

    /**
     * Watch
     * @github.com/gruntjs/grunt-contrib-watch
     */
    watch: {

      // JShint Gruntfile
      gruntfile: {
        files: 'Gruntfile.js',
        tasks: ['jshint:gruntfile'],
      },

      // JShint, concat + uglify JS on change
      js: {
        //files: '<%= dir.js %>/src/**/*.js',
        files: '<%= jshint.files %>',
        tasks: ['jshint', 'concat', 'uglify']
      },

      // JShint, concat + uglify JS on change
      baseJs: {
        //files: '<%= dir.js %>/src/**/*.js',
        files: '<%= jshint.baseFiles %>',
        tasks: ['jshint', 'concat', 'uglify']
      },

      // JShint, concat + uglify JS on change
      pluginsJs: {
        //files: '<%= dir.js %>/src/**/*.js',
        files: '<%= jshint.pluginsFiles %>',
        tasks: ['jshint', 'concat', 'uglify']
      },

      glo: {
        files: '<%= dir.sass %>/global.scss',
        tasks: ['sass:glo', 'copy:cssImg']
      }, 

      sass: {
        files: '<%= dir.sass %>/**/*',
        tasks: ['sass:dev', 'copy:cssImg']
      } 


    }

  });

  /**
   * Default Task
   * run `grunt`
   */
  grunt.registerTask('default', [
    'jshint',           // JShint
    'concat:js',        // Concatenate main JS files
    'uglify',           // Minifiy concatenated JS file
    'copy'
  ]);

 
  /**
   * Production tast, use for deploying
   * run `grunt production`
   */
  grunt.registerTask('production', [
    'jshint',           // JShint
    'concat:js',        // Concatenate main JS files
    'uglify',           // Minifiy concatenated JS file
    'cssmin',
 //   'imagemin',         // Compress jpg/jpeg + png files
  ]);

  grunt.registerTask('sass-dev', ['sass:dev']);

   grunt.registerTask('css', ['cssmin']);

  /**
   * Load the plugins specified in `package.json`
   */
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
   grunt.loadNpmTasks('grunt-contrib-sass');
};