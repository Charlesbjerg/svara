const state = () => ({
    board: {},
    checklist: {},
    signOff: {},
    documents: {},
});

const getters = {};

const actions = {};

const mutations = {
    setEntityData: (state, { entityType, data }) => {
        state[entityType] = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
