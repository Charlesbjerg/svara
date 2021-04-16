<template>
    <section>
        Project Sign Off
    </section>
</template>

<script>
export default {
    name: "sign-off",
	props: {
    	data:{
    		type: Object,
			required: true,
		},
	},
	mounted() {
    	console.log(this.data);
	}
}
</script>

<style scoped>

</style>
