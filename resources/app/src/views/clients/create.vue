<template>
	<div class="client-create">
		<page-head title="Add new Client"/>
		<div class="client-create__main">
			<div class="panel client-create__inner">
				<h2>Create a new Client in Svara</h2>
				<p>This is just the initial information about the client, each client user will be added after.</p>
				<div class="form-item--double">
					<div class="form-item">
						<label for="name">Company Name</label>
						<input type="text" id="name" v-model="name" />
					</div>
					<div class="form-item">
						<label for="accountManager">Account Manager</label>
						<input type="text" name="accountManager" id="accountManager" @keyup="findAccountManager" />
						<div class="search-results" v-if="accountManagerResults.length !== 0">
							<article class="search-results__result" v-for="user in accountManagerResults" :key="user.id"
									 @click="selectAccountManager(user)">
								<span class="search-results__name">{{ user.name }}</span>
								<i class="far fa-check-circle"></i>
							</article>
						</div>
					</div>
<!--					<div class="form-item">-->
<!--						<label for="logo">Logo</label>-->
<!--						<input type="file" id="logo" name="logo" />-->
<!--					</div>-->
				</div>
				<div class="form-item--double">
					<div class="form-item">
						<label for="name">Contact Number</label>
						<input type="text" id="number" v-model="number" />
					</div>
					<div class="form-item">
						<label for="name">Contact Email</label>
						<input type="email" id="email" v-model="email" />
					</div>
				</div>
				<button class="btn btn-default" @click="createClient">Create Client <i class="far fa-plus-square"></i></button>
			</div>
		</div>
	</div>
</template>
<script>
import PageHead from "../../components/common/PageHead";
export default {
	components: {
		PageHead
	},
	data() {
		return {
			name: '',
			email: '',
			number: '',
			accountManagerResults: [],
			accountManager: null,
			keypressTimeout: null
		};
	},
	methods: {
		async findAccountManager(e) {
			clearTimeout(this.keypressTimeout);
			this.keypressTimeout = await setTimeout(async () => {
				const searchTerm = e.target.value;
				if (searchTerm !== "" && searchTerm.length >= 3) {
					const response = await this.$api('api/users/staff', 'GET', {
						name: searchTerm,
					});
					this.accountManagerResults = response.data;
				}
			}, 300);
		},
		selectAccountManager(user) {
			this.accountManager = user;
			this.accountManagerResults = [];
			document.getElementById('accountManager').value = user.name;
		},
		async createClient() {
			const response = await this.$api('api/clients', 'POST', {
				name: this.name,
				contact_email: this.email,
				contact_number: this.number,
				accountManager: this.accountManager,
			});
			await this.$router.push(`/clients/${response.data.id}`);
		}
	}
}
</script>

<style lang="scss">
.client-create {
	&__main {
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		padding-top: 30px;
	}
	&__inner {
		width: 100%;
		max-width: 1200px;
		//height: 900px;
		background-color: #fff;
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
