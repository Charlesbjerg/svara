<template>
 <div class="project-pipeline">
     <h2>Pipeline for the project.</h2>
     <div v-if="pipelineData">
        <article v-for="phase in pipelineData" :key="phase.id">
            <h3>{{ phase.name }} <em>{{ isCurrentPhase(phase.id) }}</em></h3>
            <ul>
                <li v-for="(entity, index) in phase.entities" :key="index">{{ entity.name }}</li>
            </ul>
        </article>
     </div>
     <div v-else>
         <strong>No pipeline found</strong>
     </div>
 </div>
</template>

<script>
export default {
    name: "Pipeline",
    data() {
        return {
            pipelineData: [],
        };
    },
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
        this.pipelineData = response.data;
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

<style scoped>

</style>
