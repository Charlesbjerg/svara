const state = () => ({
    clients: [],
    currentClient: {},
});

const getters = {
    getAllClients: state => {
        return state.clients;
    },
    getCurrentClient: state => {
        return state.currentClient;
    }
};

const actions = {};

const mutations = {
    setClients: (state, payload) => {
        state.clients = payload;
    },
    setCurrentClient: (state, payload) => {
        state.currentClient = payload;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
