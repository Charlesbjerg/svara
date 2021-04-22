<template>
    <div class="deact-user">
        <p>Resets a users password. They will have an email sent to them directly from Svara, allowing them to reset their password.</p>
        <div class="form-item">
            <label for="user">Find User (By Name)</label>
            <input type="text" name="user" id="user" @keyup="findUser" autocomplete="off" />
            <div class="search-results" v-if="userResults.length !== 0">
                <article class="search-results__result" v-for="user in userResults" :key="user.id"
                         @click="selectUser(user)">
                    <span class="search-results__name">{{ user.name }}</span>
                    <i class="far fa-check-circle"></i>
                </article>
            </div>
        </div>
        <staff-member-card v-if="user" :user="user" />
        <button class="btn btn-default" @click="resetPassword">Reset User's Password</button>
    </div>
</template>

<script>
import StaffMemberCard from "../projects/wizard/StaffMemberCard";
export default {
    name: "ResetPassword",
    components: {StaffMemberCard},
    data() {
        return {
            userResults: [],
            user: null
        }
    },
    methods: {
        async findUser(e) {
			const searchTerm = e.target.value;
        	if (searchTerm !== "") {
				const response = await this.$api('api/users', 'GET', { name: searchTerm });
				this.userResults = response.data;
			} else {
        		this.userResults = [];
			}
        },
        selectUser(user) {
            this.user = user;
            this.userResults = [];
        },
        async resetPassword() {
			const response = await this.$api(`api/auth/forgot-password/${this.user.id}`, 'POST');
            this.$emit('close');
        }
    },
};
</script>

<style lang="scss">
.deact-user {
    .btn {
        margin-top: 10px;
    }
}
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
</style>
