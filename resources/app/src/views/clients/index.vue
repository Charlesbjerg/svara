<template>
  <div class="clients-index">
    Clients Index
  </div>
    <div class="clients-index">
        <PageHead title="Clients" :subtitle="pageSubtitle"></PageHead>
        <div class="filters">
            Project Filters to appear here
        </div>
        <section class="grid">
            <client-card v-for="(client, index) in clients" :key="index" :client="client"/>
        </section>
    </div>
</template>

<script>
import PageHead from "../../components/common/PageHead";
import ClientCard from "../../components/clients/ClientCard";
import {mapGetters} from "vuex";

export default {
    name: "ClientsIndex",
    components: {
        ClientCard,
        PageHead,
    },
    computed: {
        ...mapGetters({
            clients: 'clients/getAllClients',
        }),
        pageSubtitle() {
            return `There are currently ${this.clients.length} in the pipeline`;
        }
    },
    async mounted() {
        const response = await this.$api('api/clients', 'GET');
        this.$store.commit('clients/setClients', response.data);
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
