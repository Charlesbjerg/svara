<template>
 <div class="project-pipeline">
     <h2>Pipeline for the project.</h2>
     <div v-if="pipeline" class="pipeline-phases">
        <pipeline-phase v-for="phase in pipeline" :key="phase.id" :phase="phase" />
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
        }
    }
}
</script>

<style lang="scss" scoped>
.pipeline-phases {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

</style>
