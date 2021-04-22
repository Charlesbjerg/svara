<template>
	<div>
		<div class="form-item">
			<label for="name">Template Name</label>
			<input type="text" id="name" placeholder="Design Sign-off" v-model="template.name" @keyup="update" />
		</div>
		<div class="form-item">
			<label for="message">Message</label>
			<textarea id="message" placeholder="We require you to sign off this piece of work." rows="8" v-model="template.message" @keyup="update"></textarea>
		</div>
	</div>
</template>

<script>
export default {
	name: "MessageTemplate",
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
			}, 500);
		}
	}
}
</script>

<style scoped>

</style>
