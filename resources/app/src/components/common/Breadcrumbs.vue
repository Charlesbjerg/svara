<template>
	<div class="breadcrumbs">
		<ul class="breadcrumbs__inner">
			<li v-for="(item, index) in breadcrumbs" :key="index" class="breadcrumbs__item">
				<span class="breadcrumbs__link active" v-if="item.active">{{ item.name }}</span>
				<router-link class="breadcrumbs__link" :to="item.href" v-else>{{ item.name }}</router-link>
				<breadcrumb-separator v-if="!item.active" />
			</li>
		</ul>
	</div>
</template>

<script>
import BreadcrumbSeparator from "./BreadcrumbSeparator";
export default {
	name: 'Breadcrumbs',
	components: {BreadcrumbSeparator},
	props: {
		breadcrumbs: {
			type: Array,
			required: true,
		},
	},
};
</script>

<style lang="scss">
.breadcrumbs {
	display: flex;
	align-items: center;
	margin-bottom: 30px;
	&__inner {
		list-style-type: none;
		margin: 0;
		padding: 0;
		display: flex;
		align-items: center;
		justify-content: flex-start;
	}
	&__item {
		display: flex;
		align-items: center;
	}
	&__link {
		display: block;
		padding-right: 15px;
		font-family: $font-heading;
		@include transition-default;
		&:hover {
			color: $accent-colour;
		}
		&.active {
			color: $accent-colour;
			font-weight: $font-weight-heading;
			cursor: default;
		}
	}
	&__separator {

	}
}
</style>
