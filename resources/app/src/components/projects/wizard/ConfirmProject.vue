<template>
    <article class="pw-data">
        <h2>Confirm New Project</h2>
        <pre>{{ projectData }}</pre>
    </article>
</template>

<script>
export default {
    name: "ConfirmProject",
    computed: {
        projectData() {
            return this.$store.state.projects.newProject;
        }
    }
}
</script>

<style lang="scss">

</style>
