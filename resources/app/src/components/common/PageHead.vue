<template>
    <header class="page-head">
        <div class="page-head__titles">
            <h1 class="page-head__title">{{ title }}</h1>
            <h2 class="page-head__subtitle" v-if="subtitle">{{ subtitle }}</h2>
        </div>
        <div class="page-head__aside">
            <slot></slot>
        </div>
    </header>
</template>

<script>
export default {
    name: "PageHead",
    props: {
        title: {
            type: String,
            required: true
        },
        subtitle: {
            type: String,
            required: false,
        }
    }
}
</script>

<style lang="scss">
.page-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0 -30px;
    background-color: $background-grey;
    color: #fff;
    padding: 40px 30px;
    margin-bottom: 30px;
    &__title {
        @include title($font-xl, 10px);
    }
    &__subtitle {
        font-weight: $font-weight-subheading;
        margin-bottom: 0;
    }
}
</style>
