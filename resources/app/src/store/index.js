import { createStore } from "vuex";
import auth from './modules/auth';
import util from "./modules/util";

export default createStore({
  modules: {
    'auth': auth,
    'util': util,
  }
});
