module.exports = function(grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
          app: {
            files: {
              'web/compiled/app/scripts.min.js': [
                    'web/files/js/retina.js',
                    'web/files/js/jquery.pace.js',
                    'web/files/js/jquery.easing.1.3.js',
                    'web/files/js/jquery.easing.compatibility.js',
                    'web/files/js/jquery.bgvideo.min.js',
                    'web/files/js/jquery.counter.min.js',
                    'web/files/js/jquery.fancybox.pack.js',
                    'web/files/rs-plugin/js/jquery.themepunch.tools.min.js',
                    'web/files/rs-plugin/js/jquery.themepunch.revolution.min.js',
                    'web/files/js/jquery.parallax.min.js',
                    'web/files/js/jquery.isotope.min.js',
                    'web/files/js/jquery.fitvids.min.js',
                    'web/files/js/jquery.scroll.min.js',
                    'web/files/js/jquery.visible.min.js',
                    'web/files/js/jquery.owl.carousel.min.js',
                    'web/files/js/pond-form.js',
                    'web/files/js/pond-header.js',
                    'web/files/js/script.js'
                ]
            }
          }
        },
        less: {
            app: {
                options: {
                    paths: ['src/AppBundle/Resources/public/less'],
                    compress: true
                },
                files: {
                    'web/compiled/app/styles.min.css': 'src/AppBundle/Resources/public/less/*.less'
                }
            },
            admin: {
                options: {
                    paths: ['src/AdminBundle/Resources/public/less'],
                    compress: true
                },
                files: {
                    'web/compiled/admin/styles.min.css': 'src/AdminBundle/Resources/public/less/*.less'
                }
            }
        }
    });

    // Load the plugin that provides the "less" task.
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Default task(s).
    grunt.registerTask('default', ['less', 'uglify']);
};
