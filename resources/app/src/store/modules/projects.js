const state = () => ({
    projects: [],
    currentProject: {
        messageThreads: [],
        documents: []
    },
    currentStep: 0,
    entityModalActive: false,
    entityModalSection: null,
    newProject: {
        newPipeline: false,
        usingTemplate: false,
        staff: [],
        pipeline: [],
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
    },
    getCurrentPhase: state => {
        return state.currentProject.pipeline.find(item => item.id === state.currentProject.currentPhaseId);
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
	addProjectLead: (state, payload) => {
    	state.newProject.staff.push(payload);
    	console.log(payload, state.newProject.staff);
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
    },
    // Adds a pipeline to a new project
    addPipelineToProject: (state, payload) => {
        state.newProject.pipeline = payload;
    },
    // Adds pipeline data to existing/current project
    setProjectPipeline: (state, payload) => {
        state.currentProject.pipeline = payload;
    },
	updateActivePipelinePhase: (state, payload) => {
		state.currentProject.currentPhaseId = payload;
	},
    setSelectedThread: (state, payload) => {
        state.currentProject.selectedThread = payload;
    },
    addMessageToCurrentThread: (state, payload) => {
        state.currentProject.selectedThread.messages.push(payload);
    },
    addNewThread: (state, payload) => {
        state.currentProject.messageThreads.push(payload)
    },
    setProjectDocuments: (state, payload) => {
        state.currentProject.documents = payload;
    },
	updateCurrentProjectState: (state, payload) => {
    	state.currentProject.state = payload;
	}
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
