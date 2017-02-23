module.exports = function(grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
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

    // Default task(s).
    grunt.registerTask('default', ['less']);
};
