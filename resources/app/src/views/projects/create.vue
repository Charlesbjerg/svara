<template>
    <div class="projects-create">
        <page-head title="Create a New Project" />
        <project-create-wizard />
    </div>
</template>

<script>
import PageHead from "../../components/common/PageHead";
import ProjectCreateWizard from "../../components/projects/wizard/ProjectCreateWizard";

export default {
    name: "ProjectsCreate",
    components: {
        PageHead,
        ProjectCreateWizard,
    },
}
</script>

<style lang="scss">

</style>
