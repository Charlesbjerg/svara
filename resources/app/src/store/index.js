import {createStore} from "vuex";
import auth from './modules/auth';
import util from "./modules/util";
import projects from './modules/projects';
import clients from "./modules/clients";

export default createStore({
    modules: {
        'auth': auth,
        'util': util,
        'projects': projects,
        'clients': clients,
    }
});
