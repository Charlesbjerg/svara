<template>
    <section>
        <h1>Entity View</h1>
        <p>Looking for entity with ID of {{ id }}</p>
        <code>{{ data }}</code>
    </section>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: "Projects.Entity",
    data() {
        return {
            data: {},
        };
    },
    computed: {
        ...mapGetters({
            project: 'projects/getCurrentProject',
        }),
        id() {
            return this.$route.params.id;
        }
    },
    async mounted() {
        const response = await this.$api(`api/projects/pipeline/entities/${this.id}`);
        this.data = response.data;
    }
}
</script>
