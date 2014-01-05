module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

    
        uglify: {
            build: {
                src: 'js/api.js',
                dest: 'js/api.min.js'
            }
        },
        
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'images/original',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'images/'
                }]
            }
        },
        
        compass: {
            dist: {
                options: {
                    sassDir: 'css/sass',
                    cssDir: 'css/stylesheets',
                    config: 'css/config.rb'
                }
            }
        },
        
        watch: {
            scripts: {
                files: ['js/*.js'],
                tasks: ['uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['**/*.scss'],
                tasks: ['compass']
            },
            images: {
                files: ['images/**/*.{png,jpg,gif}', 'images/*.{png,jpg,gif}'],
                tasks: ['imagemin'],
                options: {
                    spawn: false,
                }
            }
        }    
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['imagemin', 'compass', 'watch', 'uglify']);
};