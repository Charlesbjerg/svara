<template>
    <div class="company-index">
        <page-head title="Company Info"/>
        <div class="company-data">
            <section class="project-meta-outer">
                <h2>Project Metadata</h2>
                <p>The fields below allow you to setup the metadata that can be captured per project.</p>
                <div class="project-meta">
                    <editable-meta-item v-for="(item, index) in metaItems" :key="index" :meta="item" />
                    <hr style="margin: 20px 0;" v-if="metaItems.length > 0" />
                    <button class="btn btn-default" @click="addItem">Add meta item</button>
                </div>
            </section>
            <section>
                <h2>Company Data</h2>
                <p>View some of the company wide stats</p>
            </section>
        </div>
    </div>
</template>
<script>
import PageHead from "../../components/common/PageHead";
import EditableMetaItem from "../../components/company/EditableMetaItem";

export default {
    components: {
        EditableMetaItem,
        PageHead
    },
    data() {
        return {
            metaItems: [],
        }
    },
    async mounted() {
        // TODO: Fetch the existing metadata setup
    },
    methods: {
        addItem() {
            this.metaItems.push({
                title: 'Meta Item Name',
                sortable: false,
                dataType: null,
            });
        }
    }
};
</script>

<style lang="scss">
.company-data {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 30px;
}
.project-meta {
    padding: 20px;
    background-color: $light-grey;
    border-radius: $border-radius;
}
</style>
