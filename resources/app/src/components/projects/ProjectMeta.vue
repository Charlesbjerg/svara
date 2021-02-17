<template>
    <article class="project-meta">
        <i :class="iconClass" v-if="icon"></i>
        <div class="project-meta__content">
            <span class="project-meta__key" v-if="metaKey">{{ metaKey }}</span>
            <strong class="project-meta__value">{{ value }}</strong>
        </div>
    </article>
</template>

<script>
export default {
    name: "ProjectMeta.vue",
    props: {
        icon: {
            required: false,
            type: String,
        },
        metaKey: {
            required: false,
            type: String,
        },
        value: {
            required: true,
            type: String,
        }
    },
    computed: {
        iconClass() {
            return `far fa-${this.icon}`;
        }
    }
}
</script>

<style lang="scss" scoped>
.project-meta {
    display: flex;
    padding: 10px 20px;
    color: #fff;
    font-family: $font-heading;
    @include box-shadow;
    @include gradient-purple;
    &__key {
        display: block;
        margin-bottom: 5px;
        font-size: 20px;
        font-weight: $font-weight-subheading;
    }
    &__value {
        display: block;
        font-size: $font-md;
        font-weight: $font-weight-heading;
    }
}
</style>
