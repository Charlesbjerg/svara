module.exports = {
  // local Laravel server address for api proxy
  devServer: { proxy: "http://127.0.0.1:8000" },

  // outputDir should be Laravel public dir
  outputDir: "../../public",
  publicPath: "/",

  // for production we use blade template file
  // indexPath: process.env.NODE_ENV === 'production'
  // ? '../resources/views/app.blade.php'
  // : 'index.html',
  indexPath: "../resources/views/app.blade.php",
  lintOnSave: false,

  css: {
    loaderOptions: {
      scss: {
        // List all imports here
        prependData: `
          @import "~@/scss/_variables.scss";
          @import "~@/scss/_normalize.scss";
          @import "~@/scss/_base.scss";
        `
      },
    }
  }

};
