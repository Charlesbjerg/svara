import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from 'axios';
import api from './modules/api/index';

const app = createApp(App);
app.use(store);
app.use(router);
app.use(api);
app.mount("#app");
