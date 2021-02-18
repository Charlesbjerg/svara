<template>
    <section class="po-mini">
        <h2 class="po-mini__title">Overview</h2>
        <p class="po-mini__item">3 Message Threads</p>
        <p class="po-mini__item">2 Upcoming Meetings</p>
        <p class="po-mini__item">2 out of 4 phases remaining</p>
    </section>
</template>

<script>
export default {
    name: "ProjectOverviewMini"
}
</script>

<style lang="scss" scoped>
.po-mini {
    background-color: $background-grey;
    color: #fff;
    padding: 30px;
    @include box-shadow;
    &__title {
        font-weight: $font-weight-heading;
        font-size: $font-md;
        font-family: $font-heading;
        display: block;
    }
    &__item {
        margin: 0 0 5px;
    }
}
</style>
