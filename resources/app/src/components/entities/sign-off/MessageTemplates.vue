<template>
	<div class="templates">
		<ul v-if="templates.length > 0" class="templates__list">
			 <li v-for="template in templates" :key="template.id" @click="selectTemplate(template)" class="template panel">
				 <strong class="template__name">{{ template.name }}</strong>
				<div class="template__snippet" v-html="template.snippet"></div>
			</li>
		</ul>
		<div v-else>
			No templates have been setup, see your company settings page for more.
		</div>
	</div>
</template>

<script>
export default {
	name: "MessageTemplates",
	data() {
		return {
			templates: [],
		};
	},
	async mounted() {
		const response = await this.$api('api/projects/pipeline/signoffs/templates');
		this.templates = response.data;
	},
	methods: {
		selectTemplate(message) {
			this.$emit('selected', message);
		}
	}
}
</script>

<style lang="scss">
.templates {
	&__list {
		list-style-type: none;
		padding: 0;
		margin: 0;
	}
}
.template{
	border: 2px solid transparent;
	cursor: pointer;
	margin-bottom: 15px;
	@include transition-default;
	&:hover {
		@include box-shadow;
		transform: translate3d(0, -3px, 0);
		border: 2px solid $accent-colour;
	}
	&__name {
		font-family: $font-heading;
		font-weight: $font-weight-heading;
		font-size: $font-sm;
		display: block;
		margin: 0 0 10px;
	}
}
</style>
