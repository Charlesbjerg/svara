const state = () => ({
    user: {},
});

const getters = {
    isUserAuthenticated: state => {
        return Object.keys(state.user).length !== 0;
    },
    getUser: state => {
        return state.user;
    },
};

const actions = {};

const mutations = {
    setUser: (state, payload) => {
        state.user = payload;
    },
    unsetUser: (state) => {
        state.user = {};
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
