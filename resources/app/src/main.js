import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import api from './modules/api/index';
import mixins from './modules/mixins';

const app = createApp(App);
app.use(store);
app.use(router);
app.use(api);
app.use(mixins)
app.mount("#app");
