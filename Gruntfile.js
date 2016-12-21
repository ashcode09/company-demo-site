module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      dist: {
        options: {
          style: 'expanded',
          sourcemap: 'none'
        },
        files: {
          'vanilla-clone.css':'scss/style.scss'
        }
      },
      dist: {
        options: {
          style: 'compressed',
          sourcemap: 'none'
        },
        files: {
          'css/vanilla-clone.min.css':'scss/style.scss'
        }
      }
    },

    concat: {
      options: {
        separator: '// ----'
      },
      dist: {
        src: ['js/variables/*.js', 'js/bcsg-support-help-page/*.js', 'js/navbar-module/*.js', 'js/home-page/*.js', 'js/product-pages/*.js', 'js/*.js','js/on-page-load/*.js'],
        dest: 'src/main.js'
      }
    },

    uglify: {
      dist: {
        files: {
          'src/main.min.js': 'src/main.js'
        }
      }
    },

    watch: {
      css: {
        files: 'scss/**/*.scss',
        tasks: ['sass']
      },
      js: {
        files: 'js/**/*.js',
        tasks: ['concat', 'uglify']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['watch', 'concat', 'uglify']);
  
};










