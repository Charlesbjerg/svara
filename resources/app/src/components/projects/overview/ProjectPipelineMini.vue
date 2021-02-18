<template>
    <section class="pp-mini">
        <h2 class="pp-mini__title">Implementation Phase</h2>
        <div class="pp-mini__cards">
            <!-- TODO: Add summary cards for current phase -->
            Lists and Boards
        </div>
        <!-- TODO: Figure out if a custom method can change tab -->
        <button class="btn btn-default">View Pipeline</button>
    </section>
</template>

<script>
export default {
    name: "ProjectPipelineMini",
}
</script>

<style lang="scss" scoped>
.pp-mini {
    background-color: $background-grey;
    color: #fff;
    padding: 30px;
    @include box-shadow;
    &__title {
        font-weight: $font-weight-heading;
        font-size: $font-md;
        font-family: $font-heading;
    }
    &__cards {
        margin-bottom: 20px;
    }
}
</style>
