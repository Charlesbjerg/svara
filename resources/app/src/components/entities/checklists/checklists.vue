<template>
	<div class="checklists">
		<aside class="checklists__checklists">
			<div class="checklist">
				<h2>Project Checklists</h2>
				<ul v-if="checklists.length > 0" class="checklist__list">
					<li class="checklist__item" v-for="(checklist, index) in checklists" :key="index"
						@click="selectThread(checklist, $event)">
						<input class="checklist__item-input" type="text" name="name" v-if="checklist.editingName" v-model="checklist.name" @blur="saveThread(index)" />
						<span class="checklist__title" v-else>{{ checklist.name }}</span>
						<em>Contains {{ checklist.items.length}} items</em>
					</li>
				</ul>
				<button class="btn btn-default btn-block" @click="createNewThread">
					Create New Checklist
					<i class="far fa-plus-square ml-5"></i>
				</button>
			</div>
		</aside>
		<div class="checklists__main">
			<div class="message-checklist-outer" v-if="selectedThread">
				<checklist-thread :thread="selectedThread" :newThread="selectedThread.id === 0" />
			</div>
			<div class="checklist-none" v-else>
				<i class="fas fa-clipboard-list"></i>
				<h3>Select a Checklist</h3>
			</div>
		</div>
	</div>
</template>

<script>
import ChecklistThread from "./ChecklistThread";
import NewChecklist from "./NewChecklist";
import ActionModal from "../../company/ActionModal";

export default {
	name: "checklists",
	components: {
		ActionModal,
		ChecklistThread,
		NewChecklist,
	},
	data() {
		return {
			checklists: {},
		};
	},
	computed: {
		selectedThread() {
			return this.$store.state.entities.checklist.selected;
		},
	},
	async mounted() {
		const response = await this.$api(`api/projects/pipeline/checklists/${this.$route.params.id}`);
		this.checklists = response.data;
	},
	methods: {
		selectThread(checklist, event) {
			document.querySelectorAll('.checklist__item.active').forEach(elem => elem.classList.remove('active'));
			event.target.classList.add('active');
			this.$store.commit('entities/setSelectedChecklist', checklist);
		},
		createNewThread() {
			this.$store.commit('entities/unsetSelectedChecklist');
			this.checklists.push({
				name: 'New Checklist',
				items: [],
				editingName: true,
			});
		},
		async saveThread(index) {
			this.checklists[index].editingName = false;
			const response = await this.$api(`api/projects/pipeline/checklists/${this.$route.params.id}`, 'POST', this.checklists[index]);
			this.checklists[index] = response.data;
		}
	}
}
</script>

<style lang="scss">
.checklists {
	display: grid;
	grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
	gap: 30px;
}

//.checklists__main,
.checklist {
	background-color: $light-grey;
	padding: 20px;
	border-radius: $border-radius;
	@include box-shadow-sm;
}

.checklist {
	&__list {
		list-style-type: none;
		padding: 0;
		margin: 0 0 15px;
	}

	&__item {
		padding: 10px;
		margin-bottom: 15px;
		border-radius: $border-radius;
		background-color: #fff;
		border: 2px solid #fff;
		cursor: pointer;
		@include box-shadow-sm;
		@include transition-default;

		&.active {
			border-color: $accent-colour;
		}

		&:hover {
			transform: translate3d(-2px, -2px, 0);
			@include box-shadow;
		}
	}

	&__title {
		font-family: $font-heading;
		font-weight: $font-weight-heading;
		display: block;
		margin-bottom: 5px;
	}

	&__item-input {
		font-family: $font-heading;
		font-weight: $font-weight-heading;
		padding: 7px 10px;
		border: 1px solid $grey;
		border-radius: $border-radius;
		display: block;
		margin: 0 0 5px;
		max-width: 325px;
		width: 100%;
	}

}

.checklist-none {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	height: 100%;
	padding: 20px;
	border-radius: $border-radius;
	background-color: $light-grey;

	i {
		font-size: 40px;
		margin-bottom: 10px;
	}
}
</style>
