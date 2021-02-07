const state = () => ({
    projects: [],
    currentProject: {},
});

const getters = {
    getAllProjects: state => {
        return state.projects;
    },
    getCurrentProject: state => {
        return state.currentProject;
    }
};

const actions = {};

const mutations = {
    setProjects: (state, payload) => {
        state.projects = payload;
    },
    setCurrentProject: (state, payload) => {
        state.currentProject = payload;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
