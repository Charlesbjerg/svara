const state = () => ({
    projects: [],
    currentProject: {},
    currentStep: 0,
    entityModalActive: false,
    entityModalSection: null,
    newProject: {
        newPipeline: false,
        usingTemplate: false,
        staff: [],
    },
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
    },
    addNewProjectStaff: (state, payload) => {
        state.newProject.staff.concat(payload);
    },
    newProjectNewPipeline: state => {
        // Make sure opposite option is false
        state.newProject.usingTemplate = false;
        state.newProject.newPipeline = true;
    },
    newProjectUsingTemplate: state => {
        // Make sure opposite option is false
        state.newProject.newPipeline = false;
        state.newProject.usingTemplate = true;
    },
    openEntityModal: (state, payload) => {
        state.entityModalActive = true;
        state.entityModalSection = payload;
    },
    closeEntityModal: state => {
        state.entityModalActive = false;
        state.entityModalSection = null;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
