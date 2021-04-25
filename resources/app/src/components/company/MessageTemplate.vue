<template>
	<div>
		<div class="form-item">
			<label for="name">Template Name</label>
			<input type="text" id="name" placeholder="Design Sign-off" v-model="template.name" @keyup="update" />
		</div>
		<div class="form-item">
			<label for="message">Message</label>
			<editor
				id="message"
				class="content-editor__wrap"
				initialValue="Write your message here."
				apiKey="2jbjcyf0lfyi82ml1rcyh4ys7wfcidwxwmmi5cdl9xzoeuyc"
				v-model="template.message"
				@keyup="update"
				:init="{
                height: 400,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap',
                    'print preview anchor insertdatetime media',
                    'paste code help table'
                ],
                toolbar:
                    'formatselect | bold italic | \
                    bullist numlist | help'
            }">
			</editor>
		</div>
	</div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'

export default {
	name: "MessageTemplate",
	components: {
		Editor,
	},
	computed: {
		template() {
			return this.$store.state.entities.signOff.selected;
		},
	},
	data() {
		return {
			updateTimeout: null,
		};
	},
	methods: {
		async update() {
			const self = this;
			clearTimeout(this.updateTimeout);
			this.updateTimeout = await setTimeout(async () => {
				if (self.template.name !== ""  && self.template.message !== "") {
					let response;
					if (self.template.hasOwnProperty('id')) {
						response = await this.$api(`api/projects/pipeline/signoffs/templates/${self.template.id}`, 'PATCH', self.template);
					} else {
						response = await this.$api('api/projects/pipeline/signoffs/templates', 'POST', self.template);
					}
					this.$store.commit('entities/updateTemplate', response.data);
				}
			}, 5000);
		}
	}
}
</script>

<style scoped>

</style>
