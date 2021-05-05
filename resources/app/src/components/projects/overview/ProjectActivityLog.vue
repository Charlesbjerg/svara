<template>
    <section class="project-log">
        <h2 class="project-log__title">Activity Log</h2>
        <!-- TODO: Needs to loop through all items -->
        <article class="activity-item" v-for="(entry, index) in log" :key="index">
            <figure class="activity-item__avatar">
				<i class="fas fa-exclamation"></i>
            </figure>
            <div class="activity-item__message">
                {{ entry }}
            </div>
        </article>
    </section>
</template>

<script>
export default {
    name: "ProjectActivityLog",
	data() {
    	return {
    		log: [],
		};
	},
    async mounted() {
    	const response = await this.$api(`api/projects/${this.$route.params.id}/activity`);
    	this.log = response.data;
	},
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
    align-items: center;
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
		display: flex;
		align-items: center;
		justify-content: center;
    }
    &__message {
        flex: 1;
        margin-bottom: 0;
    }
}
</style>
