const { VueLoaderPlugin } = require("vue-loader");

module.exports = {
  // local Laravel server address for api proxy
  devServer: {
    proxy: "http://app.svara.io:8000",
    host: 'app.svara.io',
    port: 1024
  },

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
          @import "~@/scss/_mixins.scss";
          @import "~@/scss/_normalize.scss";
          @import "~@/scss/_animate.scss";
          @import "~@/scss/_base.scss";
          @import "~@/scss/_ui.scss";
          @import "~@/scss/_utils.scss";
          @import "~@/scss/_icons.scss";
        `
      }
    }
  },
    // plugins: [
    //     new VueLoaderPlugin(),
    // ],
  // chainWebpack: config => {
  //   // Only convert .svg files that are imported by these files as Vue component
  //   const FILE_RE = /\.(vue|js|ts|svg)$/;
  //
  //   // Use vue-cli's default rule for svg in non .vue .js .ts files
  //   config.module.rule("svg").issuer(file => !FILE_RE.test(file));
  //
  //   // Use our loader to handle svg imported by other files
  //   config.module
  //     .rule("svg-component")
  //     .test(/\.svg$/)
  //     .issuer(file => FILE_RE.test(file))
  //     .use("vue")
  //     .loader("vue-loader")
  //     .end()
  //     .use("svg-to-vue-component")
  //     .loader("svg-to-vue-component/loader");
  // }
};
