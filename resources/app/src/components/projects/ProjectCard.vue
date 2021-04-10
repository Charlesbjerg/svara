<template>
    <article class="project-card">
        <router-link :to="projectUrl">
            <header class="project-card__top">
                <div class="project-card__client">
                    <img :src="projectClientLogo" :alt="projectClientLogoAlt" class="project-card__logo"/>
                    <span class="project-card__client-name">{{ client.name }}</span>
                </div>
                <div class="project-card__state">
                    <span class="state state--overdue">{{ state }}</span>
                </div>
            </header>
            <div class="project-card__body">
                <h2 class="project-card__name">{{ project.name }}</h2>
                <span class="project-card__phase" v-if="project.hasOwnProperty('currentPhase')">{{ project.currentPhase.name }}</span>
            </div>
            <footer class="project-card__bottom">
                <span class="project-card__completion" v-if="project.hasOwnProperty('meta') && project.meta.length > 0">
                    {{ project.meta[0].key }}: {{ projectMeta }}
                </span>
                <div v-else></div>
                <div class="project-card__avatar"></div>
            </footer>
        </router-link>
    </article>
</template>

<script>
export default {
    name: "ProjectCard",
    props: {
        project: {
            type: Object,
            required: true,
        },
    },
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
            return `http://app.svara.io:8000/${this.project.client.logoPath}`;
        },
        projectClientLogoAlt() {
            return `Logo for ${this.client.name}`;
        },
        projectMeta() {
            if (this.project.meta[0].valueType === 'date') {
                return this.$dateFormatter(this.project.meta[0].value, false);
            }
        },
    },
    methods: {
        formattedDate(dateString) {
            const date = new Date(dateString);
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
        }
    },
    mounted() {
        console.log(this.project);
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
