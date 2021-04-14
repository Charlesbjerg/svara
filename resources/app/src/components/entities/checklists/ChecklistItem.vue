<template>
	<article class="checklist-item" :class="isChecked">
		<div class="checklist-item__checkbox">
			<input type="checkbox" name="complete" v-model="item.complete" @change="update" />
		</div>
		<div class="checklist-item__main">
			<input class="checklist-item__input" type="text" v-model="item.name" v-if="editTitle" @blur="editTitle = false; update()" />
			<h3 class="checklist-item__name" v-else @click="editTitle = true">{{ item.name }}</h3>
		</div>
		<div class="checklist-item__info">
			<button class="btn btn-default" @click="viewMore" aria-label="View more information">
				<i class="fas fa-ellipsis-v"></i>
			</button>
		</div>
	</article>
</template>

<script>
export default {
	name: "ChecklistItem",
	props: {
		item: {
			type: Object,
			required: true,
		},
		blank: {
			type: Boolean,
			required: false,
			default: false,
		},
	},
	data() {
		return {
			editTitle: false,
		};
	},
	computed: {
		isChecked() {
			return this.item.complete ? 'checklist-item--complete' : '';
		}
	},
	mounted() {
		console.log(this.item)
		if (this.blank) {
			this.item = {
				complete: false,
				name: '',
				description: '',
				assignedUser: null,
			};
			this.editTitle = true;
		}
	},
	methods: {
		async update() {
			const response = await this.$api(`api/projects/pipeline/checklists/${this.item.checklistId}/items/${this.item.id}`, 'PATCH', this.item);
		},
		viewMore() {
			this.$emit('openModal', this.item);
		},
	},
};
</script>

<style lang="scss">
.checklist-item {
	display: flex;
	align-items: center;
	padding: 10px 20px;
	border-radius: $border-radius;
	background-color: #fff;
	@include box-shadow-sm;
	&__name {
		margin: 0;
	}
	&__input {
		padding: 5px 10px;
		font-family: $font-heading;
		width: 100%;
		border-radius: $border-radius;
		border: 1px solid $grey;
	}
	&__checkbox {
		flex-basis: 30px;
		max-width: 30px;
		input {
			width: 18px;
			height: 18px;
		}
	}
	&__main {
		flex: 1;
		margin-right: 15px;
	}
	&__info {
		flex-basis: 40px;
		max-width: 40px;
	}

	/* Modifiers */
	&--complete &__name {
		text-decoration: line-through;
	}

}
</style>
