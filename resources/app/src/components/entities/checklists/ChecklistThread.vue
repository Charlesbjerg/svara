<template>
	<section class="checklist-thread panel">
		<h2>{{ thread.name }}</h2>
		<ul class="checklist-thread__items" v-if="thread.items">
			<li v-for="(item, index) in thread.items" :key="index">
				<checklist-item :item="item" :blank="item.blank !== undefined" @openModal="setSelectedItem"/>
			</li>
		</ul>
		<div v-else>
			<p>Add your first item to this checklist.</p>
		</div>
		<button class="btn btn-default" @click="addItem">
			Add Item
			<i class="far fa-plus-square ml-5"></i>
		</button>
		<action-modal v-if="selectedItem" :title="selectedItem.name" @close="selectedItem = null">
			<checklist-item-info :item="selectedItem" />
		</action-modal>
	</section>
</template>

<script>
import ChecklistItem from "./ChecklistItem";
import ActionModal from "../../company/ActionModal";
import ChecklistItemInfo from "./ChecklistItemInfo";
export default {
	name: "ChecklistThread",
	components: {ChecklistItemInfo, ActionModal, ChecklistItem},
	props: {
		thread: {
			type: Object,
			required: true,
		},
		newThread: {
			type: Boolean,
			require: false,
			default: false,
		}
	},
	data() {
		return {
			selectedItem: null
		};
	},
	methods: {
		addItem() {
			this.thread.items.push({
				name: '',
				complete: false,
				blank: true,
			})
		},
		setSelectedItem(item) {
			this.selectedItem = item;
		}
	}
};
</script>

<style lang="scss">
.checklist-thread {
	&__items {
		list-style-type: none;
		padding: 0;
		margin: 0;
		> li {
			margin-bottom: 15px;
		}
	}
}
</style>
