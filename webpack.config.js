// webpack.config.js:
const { GenerateSW } = require('workbox-webpack-plugin');

module.exports = {
  // Other webpack configs...
  plugins: [
    // Other plugins...
    new GenerateSW({
      option: 'value',
    })
  ]
};