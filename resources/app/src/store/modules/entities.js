const state = () => ({
    board: {
        openCard: null,
        data: {}
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
    },
    setBoardData: (state, payload) => {
        state.board.data = payload;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
