const state = () => ({
    projects: [],
    currentProject: {},
    currentStep: 0,
    newProject: {},
});

const getters = {
    getAllProjects: state => {
        return state.projects;
    },
    getCurrentProject: state => {
        return state.currentProject;
    },
    getCurrentStep: state => {
        return state.currentStep;
    },
    getNewProject: state => {
        return state.newProject;
    }
};

const actions = {};

const mutations = {
    setProjects: (state, payload) => {
        state.projects = payload;
    },
    setCurrentProject: (state, payload) => {
        state.currentProject = payload;
    },
    setCurrentStep: (state, payload) => {
        state.currentStep = payload;
    },
    addNewProjectData: (state, payload) => {
        for (const [key, value] of Object.entries(payload)) {
            state.newProject[key] = value;
        }
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
