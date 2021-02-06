<template>
    <article class="project-card">
        <router-link :to="projectUrl">
            <header class="project-card__top">
                <div class="project-card__client">
                    <img :src="projectClientLogo" :alt="projectClientLogoAlt"/>
                    <span class="project-card__client-name">{{ client.name }}</span>
                </div>
                <div class="project-card__state">
                    <!-- TODO: Need to come up with a way of handling all these states -->
                    <span class="state state--overdue">{{ state }}</span>
                </div>
            </header>
            <div class="project-card__body">
                <h2 class="project-card__name">{{ project.name }}</h2>
                <span class="project-card__phase">Need to fetch the current phase.</span>
            </div>
            <footer class="project-card__bottom">
                <span class="project-card__completion">Est Completion Date</span>
                <div class="project-card__avatar">
                    Staff Lead Img
                </div>
            </footer>
        </router-link>
    </article>
</template>

<script>
export default {
    name: "ProjectCard",
    computed: {
        client() {
            return this.project.client;
        },
        state() {
            return this.project.state.state;
        },
        projectUrl() {
            return `/projects/${this.project.id}`;
        },
        projectClientLogo() {
            return `http://app.svara.io:8000/${this.project.client.logo_path}`;
        },
        projectClientLogoAlt() {
            return `Logo for ${this.client.name}`;
        }
    },
    props: {
        project: {
            type: Object,
            required: true,
        }
    }
}
</script>

<style lang="scss">
.project-card {
    padding: 15px 20px;
    border: 1px solid $light-grey;
    @include box-shadow;
}
</style>
