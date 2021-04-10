<template>
    <article class="mp-card" v-if="project">
        <router-link :to="`/projects/${project.id}`" class="mp-card__inner">
            <header class="mp-card__head">
                <h3 class="mp-card__title">{{ project.name }}</h3>
                <span class="state state--overdue">{{ state }}</span>
            </header>
            <div class="mp-card__main">
                <p>Currently in the {{ project.currentPhase.name }} phase</p>
                <p v-if="project.projectLead">Project is led by {{ project.projectLead.name }}</p>
            </div>
            <footer class="mp-card__meta">
                <span class="mp-card__meta-item" v-for="(item, index) in project.meta" :key="index">
                    {{ item.key }} {{ item.value }}
                </span>
            </footer>
        </router-link>
    </article>
</template>

<script>
export default {
    name: "MiniProjectCard",
    props: {
        project: {
            type: Object,
            required: true,
        },
    },
    computed: {
        state() {
            return this.project.state.state;
        },
        projectUrl() {
            return `/projects/${this.project.id}`;
        },
    }
};
</script>

<style lang="scss">
.mp-card {
    background-color: #fff;
    border-radius: $border-radius;
    padding: 20px;
    @include box-shadow-sm;
    &__inner {
        display: block;
        height: 100%;
    }
    &__head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 0 0 20px;
    }
    &__title {
        margin: 0;
    }
    &__meta-item {
        display: inline-block;
        padding: 5px 10px;
        border-radius: $border-radius;
        background-color: $light-grey;
        font-family: $font-heading;
        font-size: $font-xs;
        font-weight: $font-weight-subheading;
        margin: 0 5px 5px 0;
    }
}
.state {
    padding: 5px 15px;
    border-radius: 10px;
    color: #fff;
    font-size: $font-xxs;
    @include gradient-purple;
}
</style>
