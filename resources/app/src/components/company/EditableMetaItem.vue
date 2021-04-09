<template>
    <article class="editable-meta">
        <input type="text" class="editable-meta__title editable-meta__title--input"
               aria-label="Edit the meta item title"
               v-model="meta.title"
               @blur.native="editingTitle = false; updateMeta()"
               v-if="editingTitle" />
        <h3 class="editable-meta__title" @click="editingTitle = true" v-else>{{ meta.title }}</h3>
        <div class="form-item">
            <label for="dataType">Data Type:</label>
            <select v-model="meta.dataType" id="dataType" @change="updateMeta">
                <option value="null" selected disabled>Select a Data Type</option>
                <option value="text">Text</option>
                <option value="number">Number</option>
                <option value="date">Date</option>
            </select>
        </div>
        <div class="form-item--checkbox form-item">
            <label for="sortable">
                <input type="checkbox" v-model="meta.sortable" id="sortable" @change="updateMeta" />
                Meta data can be used to sort the list of projects
            </label>
        </div>
    </article>
</template>

<script>
export default {
    name: "EditableMetaItem",
    props: {
        meta: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            editingTitle: false,
        }
    },
    methods: {
        async updateMeta() {
            console.log(this.meta)
            if (this.meta.title !== null && this.meta.dataType != null) {
                // If meta has just been created, create new with API - Otherwise update existing
                const reqMethod = this.meta.hasOwnProperty('id') ? 'PUT' : 'POST';
                const url = this.meta.hasOwnProperty('id') ? `api/project-meta/${this.meta.id}` : 'api/project-meta';
                const response = await this.$api(url, reqMethod, this.meta);
                this.$emit('update', response.data);
            }
        },
        deleteItem() {
            this.$emit('delete', meta.id);
        }
    }
}
</script>

<style lang="scss">
.editable-meta {
    position: relative;
    padding: 20px;
    border-radius: $border-radius;
    background-color: #fff;
    margin-bottom: 20px;
    @include box-shadow-sm;
    &__title {
        font-family: $font-heading;
        font-weight: $font-weight-heading;
        margin-right: 30px;
        &--input {
            padding: 5px;
            margin-bottom: 10px;
        }
    }
    &__close {
        position: absolute;
        top: 0;
        right: 0;
        width: 30px;
        height: 30px;
    }
}
</style>
