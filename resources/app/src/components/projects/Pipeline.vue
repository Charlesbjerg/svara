<template>
 <div class="project-pipeline">
	 <header class="pipeline__head">
	     <h2 class="pipeline__title">Project Pipeline</h2>
		 <div class="pipeline__label state" v-if="projectComplete">
			 Project Complete
		 </div>
	 </header>
     <div v-if="pipeline" class="pipeline-phases">
        <pipeline-phase v-for="phase in pipeline" :key="phase.id" :phase="phase" :ref="phaseRefName(phase.id)" @phaseCompleted="phaseCompleted(phase)" />
     </div>
     <div v-else>
         <strong>No pipeline found</strong>
     </div>
 </div>
</template>

<script>
import PipelinePhase from "./pipeline/PipelinePhase";
export default {
    name: "Pipeline",
    components: {PipelinePhase},
    computed: {
        pipeline() {
            return this.$store.state.projects.currentProject.pipeline;
        },
        project() {
            return this.$store.state.projects.currentProject;
        },
		projectComplete() {
			return !this.pipeline.find(item => item.complete === 0);
		}
    },
    async mounted() {
        const response = await this.$api(`api/projects/pipeline/${this.project.id}`);
        this.$store.commit('projects/setProjectPipeline', response.data);
    },
    methods: {
        isCurrentPhase(id) {
            if (this.project.currentPhaseId === id) {
                return 'Current Phase';
            }
        },
        phaseRefName(id) {
            return `phase-${id}`;
        },
        async phaseCompleted(phase) {
        	this.$store.commit('util/enableLoader');
            const response = await this.$api(`api/projects/pipeline/phase/${phase.id}/complete`, 'POST');
			phase.complete = true;
			if (!response.data.hasOwnProperty('success')) {
	        	this.$store.commit('projects/updateActivePipelinePhase', response.data.nextPhase.id)
			}
			this.$store.commit('util/disableLoader');
        },
    }
}
</script>

<style lang="scss" scoped>
.pipeline-phases {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.pipeline {
	&__head {
		//display: flex;
		//align-items: center;
		//justify-content: space-between;
		margin: 0 0 30px;
	}
	&__title {
		margin: 0 0 10px;
	}
	&__label {
		display: inline-block;
		padding: 5px 10px;
		border-radius: $border-radius;
		color: #fff;
		font-size: 14px;
		@include gradient-green;
	}
}
</style>
