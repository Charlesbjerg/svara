<template>
    <section class="pp-mini">
        <h2 class="pp-mini__title">{{ currentPhase.name }} Phase</h2>
        <div class="pp-mini__cards">
            <!-- TODO: Add summary cards for current phase -->
            <ul v-if="currentPhase.entities">
				<li v-for="item in currentPhase.entities" :key="item.id">{{ item.name }}</li>
			</ul>
        </div>
        <!-- TODO: Figure out if a custom method can change tab -->
        <button class="btn btn-default" @click="goToPipeline">View Pipeline</button>
    </section>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: "ProjectPipelineMini",
	computed: {
		...mapGetters({
			currentPhase: 'projects/getCurrentPhase',
			project: 'projects/getCurrentProject',
	   }),
	},
  methods: {
      goToPipeline() {

	  }
  }
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
