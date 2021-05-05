const state = () => ({
    board: {
        openCard: null,
        data: {}
    },
    checklist: {
    	selected: null,
	},
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
    },
	updateColumn: (state, payload) => {
		state.board.data.columns.cards = payload;
	},
	updateColumnId: (state, payload) => {
		const columnIndex = state.board.data.columns.findIndex(column => column.id === null);
		state.board.data.columns[columnIndex].id = payload.id;
	},
	updateNewCard: (state, payload) => {
    	const columnIndex = state.board.data.columns.findIndex(column => column.id === payload.column);
    	if (columnIndex !== -1) {
    		const cardIndex = state.board.data.columns[columnIndex].cards.findIndex(card => card.id === null);
			state.board.data.columns[columnIndex].cards[cardIndex] = payload.data;
		}
	},
	setSelectedChecklist: (state, payload) => {
    	state.checklist.selected = payload;
	},
	unsetSelectedChecklist: state => {
    	state.checklist.selected = false;
	},
	updateBlankChecklistItem: (state, payload) => {
		const index = state.checklist.selected.items.findIndex(item => item.id === undefined);
		state.checklist.selected.items[index] = payload;
	},
	updateChecklistItem: (state, payload) => {
    	const index = state.checklist.selected.items.findIndex(item => item.id === payload.id);
		state.checklist.selected.items[index] = payload;
    },
	createBlankTemplate: state => {
    	state.signOff.selected = {
    		name: '',
			message: '',
		};
	},
	updateTemplate: (state, payload) => {
    	state.signOff.selected = payload;
	},
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
