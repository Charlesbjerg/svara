<template>
    <article class="project-card">
        <router-link :to="projectUrl">
            <header class="project-card__top">
                <div class="project-card__client">
                    <img :src="projectClientLogo" :alt="projectClientLogoAlt" class="project-card__logo"/>
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
                <div class="project-card__avatar"></div>
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
    @include transition-bounce;
    &:hover {
        transform: translate3d(0, -5px, 0);
        @include box-shadow-hover;
    }
    &__top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    &__client {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    &__client-name {
        font-size: $font-xxs;
    }
    &__logo {
        border-radius: $border-radius;
        border: 2px solid $light-grey;
        width: 30px;
        height: 30px;
        object-fit: cover;
        object-position: center;
        margin-right: 10px;
    }
    &__name {
        font-size: $font-sm;
        margin-bottom: 0.3rem;
    }
    &__phase {
        display: inline-block;
        margin-bottom: 0.75rem;
        font-size: $font-xs;
    }
    &__bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    &__completion {
        font-size: $font-xs;
    }
    &__avatar {
        width: 30px;
        height: 30px;
        border-radius: $border-radius;
        border: 2px solid $light-grey;
        @include gradient-purple;
    }
}

.state {
    padding: 5px 15px;
    border-radius: 10px;
    color: #fff;
    font-size: $font-xxs;
    @include gradient-red;
}
</style>
