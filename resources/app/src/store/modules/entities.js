const state = () => ({
    board: {
        openCard: null,
    },
    checklist: {},
    signOff: {},
    documents: {},
});

const getters = {};

const actions = {};

const mutations = {
    setEntityData: (state, { entityType, data }) => {
        state[entityType] = data;
    },
    setOpenCard: (state, payload) => {
        state.board.openCard = payload;
    },
    closeCardModal: state => {
        state.board.openCard = null;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
