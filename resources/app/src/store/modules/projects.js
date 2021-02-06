const state = () => ({
  projects: []
});

const getters = {
  getAllProjects: state => {
    return state.projects;
  }
};

const actions = {};

const mutations = {
  setProjects: (state, payload) => {
    state.projects = payload;
  }
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};
