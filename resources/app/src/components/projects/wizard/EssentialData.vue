<template>
    <article class="pw-data">
        <h2>Setup a New Project</h2>
        <form @submit.prevent="nextStep" autocomplete="off">
            <div class="form-item">
                <label for="name">Project Name *</label>
                <input type="text" name="name" id="name" required/>
            </div>
            <div class="form-item">
                <label for="client">Client *</label>
                <input type="text" name="client" id="client" @keyup="findClient" required/>
                <div class="search-results" v-if="clientResults.length !== 0">
                    <article class="search-results__result" v-for="client in clientResults" :key="client.id"
                             @click="selectClient(client)">
                        <span class="search-results__name">{{ client.name }}</span>
                        <i class="far fa-check-circle"></i>
                    </article>
                </div>
            </div>
            <div class="form-item">
                <label for="team">Project Team *</label>
                <select id="team" name="team" required>
                    <option disabled selected>Select a Team</option>
                    <option v-for="(team, index) in teams" :key="index" :value="index">{{ team.name }}</option>
                </select>
            </div>
            <div class="form-item">
                <label for="projectLead">Project Lead</label>
                <input type="text" name="projectLead" id="projectLead" @keyup="findProjectLead" />
                <div class="search-results" v-if="projectLeadResults.length !== 0">
                    <article class="search-results__result" v-for="user in projectLeadResults" :key="user.id"
                             @click="selectProjectLead(user)">
                        <span class="search-results__name">{{ user.name }}</span>
                        <i class="far fa-check-circle"></i>
                    </article>
                </div>
            </div>
            <div v-if="meta.length > 0">
                <h3>Project Extra Data</h3>
                <div class="form-item" v-for="(metaItem, index) in meta">
                    <label :for="`meta-item-${index}`">{{ metaItem.name }}</label>
                    <input type="text" :name="metaItem.key" :id="`meta-item-${index}`" v-model="meta[index].value" />
                </div>
            </div>
            <button type="submit" class="btn btn-default">Next Step</button>
        </form>
    </article>
</template>

<script>
export default {
    name: "EssentialData",
    data() {
        return {
            name: '',
            clientResults: [],
            client: null,
            teams: [],
            projectLeadResults: [],
            projectLead: null,
            meta: []
        };
    },
    methods: {
        async findClient(e) {
            const searchTerm = e.target.value;
            const response = await this.$api('api/clients', 'GET', { name: searchTerm });
            this.clientResults = response.data;
        },
        selectClient(client) {
            this.client = client;
            this.clientResults = [];
            document.getElementById('client').value = client.name;
        },
        async findProjectLead(e) {
            const searchTerm = e.target.value;
            const response = await this.$api('api/users/staff', 'GET', { name: searchTerm });
            this.projectLeadResults = response.data;
        },
        selectProjectLead(user) {
            this.projectLead = user;
            this.projectLeadResults = [];
            document.getElementById('projectLead').value = user.name;
        },
        nextStep(e) {

            // TODO: Need to add some kind of validation check for clients and project lead
            // May also need to check the project name is unique for that client

			// Setup initial data
			let data = {
				name: this.name,
				client: this.client,
				projectLead: this.projectLead,
			};

			// Loop over form data and update
            const formData = new FormData(e.target);
            formData.forEach((item, key) => {
                if (key === 'team') {
                    data[key] = this.teams[item];
				// Don't allow client/projectLead object to be overwritten
                } else if (key !== 'client' && key !== 'projectLead') {
                	data[key] = item;
				}
            });
			console.log(data);

            // Iterate through selected team, if project lead isn't present add to extra staff
			if (this.projectLead) {
				const projectLeadPresent = data.team.members.find(user => user.id === this.projectLead.id);
				if (!projectLeadPresent) {
					this.$store.commit('projects/addProjectLead', this.projectLead);
				}
			}

            this.$store.commit('projects/addNewProjectData', data);
            this.$store.commit('projects/setCurrentStep', 2);

        }
    },
    async mounted() {
        const response = await this.$api('api/teams');
        this.teams = response.data;
        const metaOptions = await this.$api('api/project-meta');
        this.meta = metaOptions.data;
    }
}
</script>

<style lang="scss">
.search-results {
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
.pw-data .form-item {
    position: relative;
}
</style>
