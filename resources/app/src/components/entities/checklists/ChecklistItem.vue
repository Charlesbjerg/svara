<template>
	<article>
		<input type="text" v-model="item.name" v-if="editTitle" @blur="editTitle = false;" />
		<h3 v-else @click="editTitle = true">{{ item.name }}</h3>
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
	},
	data() {
		return {
			editTitle: false,
		};
	},
	methods: {
		checkItem() {
			// TODO: This should be toggleable
		},
		update() {
			// TODO: Send to API
		},
	},
};
</script>

<style scoped>

</style>
