import { createStore } from "vuex";
import auth from './modules/auth';
import util from "./modules/util";
import projects from './modules/projects';

export default createStore({
  modules: {
    'auth': auth,
    'util': util,
    'projects': projects,
  }
});
