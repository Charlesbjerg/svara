const state = () => ({
    clients: [],
    currentClient: {},
    searchTerm: '',
});

const getters = {
    getAllClients: state => {
        return state.clients;
    },
    getCurrentClient: state => {
        return state.currentClient;
    },
    getSearchTerm: state => {
        return state.searchTerm;
    }
};

const actions = {};

const mutations = {
    setClients: (state, payload) => {
        state.clients = payload;
    },
    setCurrentClient: (state, payload) => {
        state.currentClient = payload;
    },
    setSearchTerm: (state, payload) => {
        console.log(payload);
        state.searchTerm = payload;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
