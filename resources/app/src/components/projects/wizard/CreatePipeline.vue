<template>
    <section>
        <h2>Create Pipeline</h2>
        <em>Pipeline can be adjusted after project creation.</em>

        <div class="pc-sections">
            <!-- TODO: Cards need to be draggable -->
            <article class="pc-card">
                <i class="pc-card__line"></i>
                <div class="pc-card__inner">
                    <!-- TODO: Need to be able to click to edit name inline -->
                    <h3 class="pc-card__name">Initial Consult</h3>
                    <em class="pc-card__total">3 Entities in Phase</em>
                    <!-- TODO: Add arrow icon as ::after -->
                </div>
                <div class="pc-card__entities">
                    <!-- TODO: Should be its own component -->
                    <article class="pc-entity">
                        <h4 class="pc-entity__name">Project Design Must Have's</h4>
                        <p class="pc-entity__type">Board</p>
                        <!-- TODO: Add minus icon as ::after -->
                    </article>
                </div>
            </article>
        </div>

        <!-- Create Pipeline Section - Needs a name -->
        <!-- Add Elements to Section - Choose from list of entities -->

    </section>
</template>

<script>
export default {
    name: "CreatePipeline",
    data() {
        return {
            entities: [],
            name: "",
            pipelineSections: [],
        };
    },
    async mounted() {
        this.$store.commit('util/enableLoader');
        const response = await this.$api('api/pipeline/entities');
        this.entities = response.data;
        this.$store.commit('util/disableLoader');
    }
}
</script>

<style lang="scss">

</style>
