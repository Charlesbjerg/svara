<template>
	<div class="form-item form-item--autocomplete">
		<label :for="`${label}Search`">{{ label }}</label>
		<input type="text" name="itemSearch" v-model="searchTerm" :id="`${label}Search`" @keyup="findItem" ref="searchInput" />
		<div class="autocomplete" v-if="results.length !== 0">
			<article class="autocomplete__result" v-for="item in results" :searchKey="item.id"
					 @click="selectItem(item)">
				<span class="autocomplete__name">{{ item.name }}</span>
				<i class="far fa-check-circle"></i>
			</article>
		</div>
	</div>
</template>

<script>
export default {
	name: "Autocomplete",
	props: {
		// URL used for querying the API (eg api/clients/search)
		url: {
			required: true,
			type: String,
		},
		// Label for the entity (eg Client)
		label: {
			required: true,
			type: String,
		},
		// Key that will be searched by (eg name)
		searchKey: {
			required: true,
			type: String,
		},
		// The searchKey used when the data is returned (eg accountManager)
		filterKey: {
			required: true,
			type: String,
		}
	},
	data() {
		return {
			searchTerm: '',
			searchKeyupTimeout: null,
			results: [],
		};
	},
	methods: {
		async findItem() {
			clearTimeout(this.searchKeyupTimeout);
			this.searchKeyupTimeout = await setTimeout(async () => {
				const data = {};
				data[this.searchKey] = this.searchTerm;
				const response = await this.$api(this.url, 'GET', data);
				this.results = response.data;
			}, 500);
		},
		selectItem(item) {
			this.searchTerm = item.name;
			this.$emit('selected', { key: this.filterKey, value: item });
			this.results = [];
		},
	}
}
</script>

<style lang="scss">
.autocomplete {
	padding: 20px 10px;
	background-color: #fff;
	position: absolute;
	top: calc(100% + 5px);
	left: 0;
	width: 100%;
	max-width: 300px;
	z-index: 5;
	border: 2px solid $grey;
	border-radius: $border-radius;
	@include box-shadow-hover;
	&__result {
		margin-bottom: 5px;
		border-radius: $border-radius;
		padding: 5px 10px;
		cursor: pointer;
		display: flex;
		justify-content: space-between;
		align-items: center;
		@include transition-short;
		&:last-child {
			border-bottom: 0;
			margin-bottom: 0;
		}
	}
	&__result i {
		opacity: 0;
		color: $accent-colour;
		@include transition-short;
	}
	&__name {
		display: inline-block;
	}
	&__result:hover {
		background-color: $light-grey;
		i {
			opacity: 1;
		}
	}
}
</style>
