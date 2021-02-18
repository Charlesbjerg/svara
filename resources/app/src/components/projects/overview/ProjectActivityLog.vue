<template>
    <section class="project-log">
        <h2 class="project-log__title">Activity Log</h2>
        <!-- TODO: Needs to loop through all items -->
        <article class="activity-item" v-for="i in 3" :key="i">
            <figure class="activity-item__avatar">
            </figure>
            <div class="activity-item__message">
                Sophie H. completed 'Set up social media assets on Canva
            </div>
        </article>
        <button class="btn btn-default" @click="viewMoreActivity">View More</button>
    </section>
</template>

<script>
// TODO: Need to fetch activity items from vuex store or from API
// Just grab it from wherever its available
export default {
    name: "ProjectActivityLog",
    methods: {
        viewMoreActivity() {
            // TODO: Implement this method, potential open an off canvas menu from the right side with a full log
        }
    }
}
</script>

<style lang="scss" scoped>
.project-log {
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
}

.activity-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    &:last-child {
        margin-bottom: 0;
    }
    &__avatar {
        margin: 0 15px 0 0;
        @include gradient-red;
        border-radius: $border-radius;
        width: 40px;
        height: 40px;
        flex-basis: 40px;
    }
    &__message {
        flex: 1;
    }
}
</style>
