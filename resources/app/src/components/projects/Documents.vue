<template>
    <div class="project-documents">
        <h2>Project Documents</h2>
<!--        <ul v-if="project.documents.length > 0">-->
<!--           <li v-for="document in project.documents" :key="document.id">{{ document }}</li>-->
<!--        </ul>-->
    </div>
</template>

<script>
export default {
    name: "Documents",
    computed: {
        project() {
            return this.$store.state.projects.currentProject;
        }
    },
    async mounted() {
        console.log(this.$store.state.projects);
        const response = await this.$api(`api/projects/${this.project.id}/documents`);
        this.$store.commit('projects/setProjectDocuments', response.data);
    }
}
</script>

<style scoped>

</style>
