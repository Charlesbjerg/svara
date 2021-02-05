const state = () => ({
  globalNotifMessage: '',
  globalNotifType: '',
  globalShowLoader: false,
});

const getters = {
  getLoaderState: state => {
    return state.globalShowLoader;
  }
};

const actions = {
};

const mutations = {
  setGlobalNotif: (state, { message, type }) => {
    console.log(message, type);
    state.globalNotifMessage = message;
    state.globalNotifType = type;
  },
  enableLoader: state => {
    state.globalShowLoader = true;
  },
  disableLoader: state => {
    state.globalShowLoader = false;
  }
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};
