const state = () => ({
	globalNotifMessage: '',
	globalNotifType: '',
	globalShowLoader: false,
});

const getters = {
	getLoaderState: state => {
		return state.globalShowLoader;
	},
	getNotification: state => {
		return state.globalNotifMessage;
	},
	getNotificationType: state => {
		return state.globalNotifType;
	},
};

const actions = {};

const mutations = {
	setGlobalNotif: (state, {message, type}) => {
		state.globalNotifMessage = message;
		state.globalNotifType = type;
	},
	unsetGlobalNotif: state => {
		state.globalNotifMessage = null;
		state.globalNotifType = null;
	},
	enableLoader: state => {
		state.globalShowLoader = true;
	},
	disableLoader: state => {
		state.globalShowLoader = false;
	},
};

export default {
	namespaced: true,
	state,
	getters,
	actions,
	mutations
};
