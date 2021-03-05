<template>
    <section>
        <h3>Use a Pipeline Template</h3>
        <div class="pw-pipe-template__selected">
            <article class="pipe-template">
                <h4 class="pipe-template__name">{{ selectedTemplate.name }}</h4>
                <p class="pipe-template__elements">{{ formatElementsList(selectedTemplate) }}</p>
            </article>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="pw-pipe-template__list">
            <article class="pipe-template" v-for="template in templates" :key="template.id">
                <h4 class="pipe-template__name">{{ template.name }}</h4>
                <p class="pipe-template__elements">{{ formatElementsList(template) }}</p>
            </article>
        </div>
    </section>
</template>

<script>
export default {
    name: "PipelineTemplates",
    data() {
        return {
            templates: [],
            selectedTemplate: {
                name: 'Standard Web Build',
                elements: 'Discovery -> Design -> Development -> Beta -> Deployment'
            }
        }
    },
    methods: {
        async init() {
            const response = await this.$api('api/pipeline/templates');
            this.templates = response.data;
        },
        formatElementsList(template) {
            return template.elements;
        }
    }
}
</script>

<style lang="scss">
.pipe-template {
    border-radius: $border-radius;
    background-color: $light-grey;
    padding: 15px 20px;
    @include box-shadow;
    &__name {
         font-size: $font-md;
         margin: 0 0 10px;
     }
    &__elements {
         margin: 0 0 5px;
         font-family: $font-heading;
         font-style: italic;
     }
}
</style>
