<template>
    <form class="filter-bar">
        <div class="filter-bar__input form-item">
            <label for="clientSearch">{{ searchTerm }}</label>
            <input type="text" name="clientSearch" id="clientSearch" placeholder="Search Clients" v-model="searchTerm" />
        </div>
        <div class="filter-bar__input form-item">
<!--            <label for="clientAccountManager">Filter By Account Manager</label>-->
            <input type="text" name="clientAccountManager" id="clientAccountManager" placeholder="Filter by Account Manager" />
        </div>
        <div class="filter-bar__input form-item">
<!--            <label for="clientProjectLead">Filter By Project Lead</label>-->
            <input type="text" name="clientProjectLead" id="clientProjectLead" placeholder="Filter by Project Lead" />
        </div>
        <div class="filter-bar__input form-item">
<!--            <label for="clientSortBy">Sort By</label>-->
            <select id="clientSortBy" name="clientSortBy">
                <option selected disabled>Sort By</option>
                <option value="nameAsc">Name (Asc)</option>
                <option value="nameDesc">Name (Desc)</option>
                <option value="total">Number of Projects</option>
            </select>
        </div>
    </form>
</template>

<script>
export default {
    name: "ClientFilters.vue",
    computed: {
        searchTerm: {
            get() {
                return this.$store.state.clients.searchTerm;
            },
            set(value) {
                this.$store.commit('clients/setSearchTerm', value);
            }
        }
    },
}
</script>

<style lang="scss" scoped>
.filter-bar {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0 100px;
}
</style>
