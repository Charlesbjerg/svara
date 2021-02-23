<template>
    <div class="clients-index">
        <PageHead title="Clients" :subtitle="pageSubtitle"></PageHead>
        <div class="filters">
            <client-filters />
        </div>
        <section class="grid">
            <client-card v-for="(client, index) in clients" :key="index" :client="client"/>
        </section>
    </div>
</template>

<script>
import PageHead from "../../components/common/PageHead";
import ClientCard from "../../components/clients/ClientCard";
import ClientFilters from "../../components/clients/ClientFilters";
import {mapGetters} from "vuex";

export default {
    name: "ClientsIndex",
    components: {
        ClientCard,
        PageHead,
        ClientFilters
    },
    computed: {
        ...mapGetters({
            clients: 'clients/getAllClients',
            searchTerm: 'clients/getSearchTerm',
        }),
        pageSubtitle() {
            return `Your currently have ${this.clients.length} clients`;
        }
    },
    async mounted() {
        this.$store.commit('util/enableLoader');
        const response = await this.$api('api/clients', 'GET');
        this.$store.commit('clients/setClients', response.data);
        this.$store.commit('util/disableLoader');
    },
    watch: {
        
    }
}
</script>

<style lang="scss">
.grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
    @include custom-scrollbar;
}
.filters {
    width: 100%;
    margin-bottom: 2rem;
}
</style>
