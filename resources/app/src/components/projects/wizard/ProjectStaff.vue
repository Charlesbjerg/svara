<template>
    <article class="pw-staff">
        <h2 class="pw-staff__title">Project Wizard - Project Staff</h2>
        <!-- TODO: List all members of the team  -->
        <!-- TODO: Add a search to find extra members to be added -->
        <div class="pw-staff__team">
            <h3>{{ team.name }} Team</h3>
            <div class="pw-staff__team-list">
                <staff-member-card v-for="user in team.members" :key="user.id" :user="user" />
            </div>
        </div>
        <div class="pw-staff__search">
            <h3>Add Additional Staff to Project</h3>
            <div class="form-item">
                <label for="search">Search</label>
                <input type="text" name="search" id="search" placeholder="Search by Name" autocomplete="off"
                       v-model="searchTerm"
                       @keyup="searchStaff">
                <div class="search-results" v-if="staffSearchResults.length !== 0">
                    <article class="search-results__result" v-for="user in staffSearchResults" :key="user.id"
                             @click="addStaffMember(user)">
                        <span class="search-results__name">{{ user.name }}</span>
                        <i class="far fa-check-circle"></i>
                    </article>
                </div>
            </div>
            <div class="pw-staff__team-list">
                <staff-member-card v-for="user in extraStaffMembers" :key="user.id" :user="user"
                                   :deletable="true"
                                   @deleted="removeStaffMember(user)" />
            </div>
        </div>
        <button class="btn btn-default" @click="nextStep">Next Step</button>
    </article>
</template>

<script>
import StaffMemberCard from "./StaffMemberCard";

export default {
    name: "ProjectStaff",
    components: {
        StaffMemberCard
    },
    data() {
        return {
            team: [],
            searchTerm: '',
            extraStaffMembers: [],
            staffSearchResults: [],
        };
    },
    computed: {
        teamId() {
            return this.$store.state.projects.newProject.team;
        },
        currentStep() {
            return this.$store.state.projects.currentStep;
        }
    },
    watch: {
        currentStep(newValue, oldValue) {
            if (newValue === 2) {
                this.init();
            }
        },
    },
    methods: {
        async init() {
            this.$store.commit('util/enableLoader');
            const response = await this.$api(`/api/teams/${this.teamId}`);
            this.team = response.data;
            this.$store.commit('util/disableLoader');
        },
        async searchStaff() {
            if (this.searchTerm !== "") {
                const response = await this.$api('/api/users/staff', 'GET', { name: this.searchTerm });
                this.staffSearchResults = response.data;
                // TODO: Need to filter results to show staff that haven't already been selected
            }
        },
        addStaffMember(user) {
            this.extraStaffMembers.push(user);
            this.searchTerm = '';
            this.staffSearchResults = [];
        },
        removeStaffMember(user) {
            this.extraStaffMembers.forEach((staffUser, index) => {
                if (user.id === staffUser.id) {
                    this.extraStaffMembers.splice(index, 1);
                }
            })
        },
        nextStep() {
            // Keep track of all team members
            this.$store.commit('projects/addNewProjectStaff', this.extraStaffMembers.concat(this.team));
            this.$store.commit('projects/setCurrentStep', 3);
        }
    }
}
</script>

<style lang="scss">
.pw-staff {
    &__title {
        margin-bottom: 30px;
    }
    &__team-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid $light-grey;
    }
    &__search &__team-list {
        border-bottom: 0;
    }
}
</style>
