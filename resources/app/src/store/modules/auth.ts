import {ActionContext, ActionHandler, Commit} from "vuex";

const state = () => ({
   // State
});

const getters = {};

const actions = {
    getUser(context: Commit){
        // Get the current user
        const user = {};
        context.commit('getUser', user);
    }
};

const mutations = {
    setUser(state, user) {
        state.user = user;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};