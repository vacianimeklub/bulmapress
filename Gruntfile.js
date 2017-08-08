module.exports = function(grunt) {
  grunt.initConfig({
    makepot: {
      target: {
          options: {
              potFilename: 'template.pot',                  // Name of the POT file.
              potHeaders: {
                  poedit: true,                 // Includes common Poedit headers.
                  'x-poedit-keywordslist': true // Include a list of all possible gettext functions.
              },                                // Headers to add to the generated POT file.
              type: 'wp-theem',                // Type of project (wp-plugin or wp-theme).
          }
      }
    }
  });
  grunt.loadNpmTasks('grunt-wp-i18n');

  grunt.registerTask('default', ['makepot']);


};
