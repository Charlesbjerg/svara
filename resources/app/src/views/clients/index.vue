<template>
    <div class="clients-index">
        <PageHead title="Clients" :subtitle="pageSubtitle"></PageHead>
		<div v-if="hasClients">
			<div class="filters">
				<client-filters @update="updateClients" />
				<router-link to="/clients/create" class="btn btn-default">Add New Client</router-link>
			</div>
			<section class="grid">
				<client-card v-for="(client, index) in clients" :key="index" :client="client"/>
			</section>
		</div>
		<section v-else class="no-clients">
			<h2 class="no-clients__title">No clients have been setup!</h2>
			<p class="no-clients__message">Create your first now!</p>
			<router-link to="/clients/create" class="btn btn-default">Add a Client</router-link>
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
	data() {
    	return {
    		clients: [],
		};
	},
    computed: {
        ...mapGetters({
            searchTerm: 'clients/getSearchTerm',
        }),
        pageSubtitle() {
            return `Your currently have ${this.clients.length} clients`;
        },
		hasProjects() {
			return this.clients.length > 0;
		}
    },
    async mounted() {
        this.$store.commit('util/enableLoader');
        const response = await this.$api('api/clients', 'GET');
        this.clients = response.data;
        this.$store.commit('util/disableLoader');
    },
	methods: {
    	updateClients(filteredClients) {
    		this.clients = filteredClients;
		}
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
	display: flex;
	align-items: center;
	justify-content: space-between;
	.btn {
		flex-basis: 200px;
		max-width: 200px;
		text-align: center;
		margin-left: 30px;
	}
}
.no-clients {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	min-height: 350px;
	&__title,
	&__message {
		opacity: 0.8;
	}
}
</style>
