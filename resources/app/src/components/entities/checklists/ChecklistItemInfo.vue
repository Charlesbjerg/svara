<template>
	<div>
		<div class="item-modal__section">
			<div class="item-modal__staff" v-if="item.assignedTo">
				<p class="item-modal__staff-title">Assigned To</p>
				<project-staff-member :member="item.assignedTo" />
			</div>
			<div class="item-modal__staff-picker" v-else>
				<span>Assign to staff member</span>
			</div>
		</div>
			<div class="item-modal__section">
				<div class="item-modal__created-at">
					Last Updated: {{ $dateFormatter(item.updatedAt) }}
				</div>
			</div>
		<div class="item-modal__section">
			<h3 class="item-modal__subtitle">Description</h3>
			<div class="item-modal__description">
				<textarea class="item-modal__textarea" v-if="descriptionEdit" v-model="item.description" @blur.native="descriptionEdit = false; itemUpdated()"></textarea>
				<div v-else @click="descriptionEdit = true">{{ item.description }}</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "ChecklistItemInfo",
	props: {
		item: {
			required: true,
			type: Object,
		},
	},
	methods: {
	},
}
</script>

<style lang="scss">
.item-modal {
	&__section {
		margin-bottom: 2em;
	}
	&__staff-picker:hover > span {
		opacity: 1;
	}
	&__staff-picker > span {
		font-family: $font-heading;
		font-weight: $font-weight-heading;
		background-color: $light-grey;
		border-radius: $border-radius;
		display: block;
		padding: 0.75em;
		text-align: center;
		opacity: 0.5;
		cursor: pointer;
		@include transition-default;
	}
	&__description {
		padding: 0.75em;
		background-color: $light-grey;
		border-radius: $border-radius;
		min-height: 200px;
		@include box-shadow-sm;
		> div {
			min-height: 200px;
			height: 100%;
		}
	}
	&__textarea {
		width: 100%;
		background-color: $light-grey;
		border-radius: $border-radius;
		border: 2px solid $grey;
		padding: 0.5em;
		min-height: 200px;
	}
}
</style>
