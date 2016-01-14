({
  baseUrl: 'wp-content/themes/bcsg-demo-theme',

  out: 'js/main.min.js',
  optimize: 'uglify2',

  name: 'libs/almond',
  include: ['main'],
  exclude: ['coffee-script'],
  stubModules: ['cs', 'text'],
  wrap: true,

  paths: {
    backbone: 'libs/backbone-amd',
    underscore: 'libs/underscore-amd',
    jquery: 'libs/jquery',
    cs: 'libs/cs',
    'coffee-script': 'libs/coffee-script',
    text: 'libs/text'
  }
})