module.exports = {
    devServer: {
      proxy: {
        '/cockpit': {
          target: 'https://pavillonnoir-fishing.ch/',
          changeOrigin: true
        }
      }
    }
  }
  