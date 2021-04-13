<template>
	<div class="checklist-thread">
		<ul v-if="thread.items">
			<li v-for="(item, index) in thread.items" :key="index">
				<checklist-item :item="item" />
			</li>
		</ul>
		<button class="btn btn-default" @click="addItem">
			Add Item
			<i class="far fa-plus-square ml-5"></i>
		</button>
	</div>
</template>

<script>
import ChecklistItem from "./ChecklistItem";
export default {
	name: "ChecklistThread",
	components: {ChecklistItem},
	props: {
		thread: {
			type: Object,
			required: true,
		},
	},
	methods: {
		addItem() {
			// TODO: Add a new item to the list
		}
	}
};
</script>

<style scoped>

</style>
