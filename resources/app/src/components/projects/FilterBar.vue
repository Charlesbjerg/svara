<template>
	<div class="filter-bar">
		<div class="form-item">
			<label for="name">Name</label>
			<input type="text" id="name" v-model="name" placeholder="Search by Project Name" @keyup="filterByName" autocomplete="off" />
		</div>
		<autocomplete label="Client" url="api/clients" filterKey="client" searchKey="name" @selected="addFilter" />
<!--		<autocomplete label="Account Manager" url="api/users/account-managers" filterKey="accountManager" searchKey="name" @selected="addFilter" />-->
		<autocomplete label="Project Lead" url="api/users/project-leads" filterKey="projectLead" searchKey="name" @selected="addFilter" />
		<button class="btn btn-alt filter-bar__clear" @click="clearFilters">Clear <i class="fas fa-filter ml-5"></i></button>
	</div>
</template>

<script>
import Autocomplete from "./Autocomplete";

export default {
	name: "FilterBar",
	components: {
		Autocomplete
	},
	data() {
		return {
			name: '',
			meta: null,
			filters: [],
			keyupTimeout: null,
		};
	},
	methods: {
		filterByName() {
			clearTimeout(this.keyupTimeout);
			this.keyupTimeout = setTimeout(() => {
				this.addFilter({key: 'name', value: self.name })
			}, 500);
		},
		addFilter(filter) {
			// Update or add new filter to array
			const index = this.filters.findIndex(item => item.key === filter.key);
			if (index !== -1) {
				this.filters[index].value = filter.value;
			} else {
				this.filters.push(filter);
			}
			// Update projects
			this.filterResults();
		},
		async filterResults() {
			this.$store.commit('util/enableLoader');

			// Give filters correct key/values
			let filters = [];
			this.filters.forEach(filter => {
				if (filter.value.hasOwnProperty('id')) {
					filters[filter.key] = filter.value.id;
				} else {
					filters[filter.key] = filter.value;
				}
			});
			// Fetch data and emit update to parent
			const response = await this.$api('api/projects/filter' , 'GET', filters);
			this.$emit('update', response.data);
			this.$store.commit('util/disableLoader');
		},
		clearFilters() {
			this.name = '';
			this.meta = null;
			this.filters = [];
			document.querySelectorAll('.filter-bar input').forEach(elem => elem.value = '');
			this.$emit('reset');
		}
	}
}
</script>

<style lang="scss">
.filter-bar {
	width: 100%;
	margin-right: 30px;
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(200px, 300px));
	gap: 15px 30px;
	&__clear {
		max-width: 110px;
		padding: 10px;
		height: 40px;
	}
	.form-item {
		margin: 0;
	}
	.form-item label {
		font-size: 0.001px;
		margin: 0;
	}

}
</style>
