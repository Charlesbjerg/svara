<template>
    <article class="inline-result">
        <figure v-if="image">
            <img :src="image" alt="" />
        </figure>
        <span>{{ result }}</span>
    </article>
</template>

<script>
export default {
    name: "InlineSearchResult.vue",
    props: {
        image: {
            required: false,
            type: String,
        },
        result: {
            required: true,
            type: String,
        },
    }
}
</script>

<style lang="scss">

</style>
