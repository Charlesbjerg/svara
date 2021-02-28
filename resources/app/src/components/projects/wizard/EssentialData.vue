<template>
    <article class="pw-data">
        <h2>Setup a New Project</h2>
        <div class="form-item">
            <label for="projectName">Project Name</label>
            <input type="text" name="projectName" id="projectName"  />
        </div>
        <div class="form-item">
            <label for="client">Client</label>
            <input type="text" name="client" id="client" @keyup="findClient" />
            <div class="search-results" v-if="clientResults.length !== 0">
                <article class="search-results__result" v-for="client in clientResults" :key="client.id" @click="selectClient(client)">
                    <span class="search-results__name">{{ client.name }}</span>
                </article>
            </div>
        </div>
        <div class="form-item">
            <label for="team">Project Team</label>
            <select id="team" name="team">
                <option disabled selected>Select a Team</option>
                <option v-for="team in teams" :key="team.id" :value="team.id">{{ team.name }}</option>
            </select>
        </div>
        <div class="form-item">
            <label for="projectLead">Project Lead</label>
            <input type="text" name="projectLead" id="projectLead" @keyup="findProjectLead" />
            <div class="search-results" v-if="projectLeadResults.length !== 0">
                <article class="search-results__result" v-for="user in projectLeadResults" :key="user.id" @click="selectProjectLead(user)">
                    <span class="search-results__name">{{ user.name }}</span>
                </article>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    name: "EssentialData",
    data() {
        return {
            projectName: '',
            clientResults: [],
            client: null,
            teams: [],
            projectLeadResults: [],
            projectLead: null
        };
    },
    methods: {
        async findClient(e) {
            const searchTerm = e.target.value;
            const response = await this.$api('/api/clients', 'GET', { name: searchTerm });
            this.clientResults = response.data;
        },
        selectClient(client) {
            this.client = client;
            this.clientResults = [];
            document.getElementById('client').value = client.name;
        },
        async findProjectLead(e) {
            const searchTerm = e.target.value;
            const response = await this.$api('/api/users/staff', 'GET', { name: searchTerm });
            this.projectLeadResults = response.data;
        },
        selectProjectLead(user) {
            this.projectLead = user;
            this.projectLeadResults = [];
            document.getElementById('projectLead').value = user.name;
        }
    },
    async mounted() {
        const response = await this.$api('/api/teams');
        this.teams = response.data;
    }
}
</script>

<style lang="scss">
.search-results {
    padding: 20px;
    background-color: #fff;
    @include box-shadow-hover;
    &__result {
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid $accent-colour;
        cursor: pointer;
        @include transition-bounce;
        &:last-child {
            border-bottom: 0;
            margin-bottom: 0;
            padding-bottom: 0;
        }
    }
    &__name {
        display: inline-block;
        @include transition-bounce;
    }
    &__result:hover &__name {
        transform: translate3d(10px, 0 ,0);
    }
}
</style>
