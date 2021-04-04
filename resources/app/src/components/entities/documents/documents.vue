<template>
    <div class="documents">
        <div class="documents__list">
            <ul class="documents__list-inner" v-if="documents.length > 0">
                <li class="document-list-item" v-for="document in documents" :key="document.id">
                    <i class="document-list-item__icon fas fa-file"></i>
                    <span class="document-list-item__meta">
                        <strong class="document-list-item__name">{{ document.name }}</strong>
                        <em>Uploaded at {{ formattedDate(document.createdAt) }}</em>
                    </span>
                    <a :href="downloadLink(document.id)" aria-label="Download this file" class="document-list-item__link">
                        <i class="fas fa-file-download"></i>
                    </a>
                </li>
            </ul>
            <div class="documents__none" v-else>
                <span class="documents__none-msg">
                    <i class="fas fa-info-circle"></i>
                    No Documents Found - Upload Some!
                </span>
            </div>
        </div>
        <aside class="documents__upload">
            <file-upload />
        </aside>
    </div>
</template>

<script>
import FileUpload from "./FileUpload";
export default {
    name: "documents",
    components: {FileUpload},
    data() {
        return {
            documents: [],
            loading: true,
        }
    },
    async mounted() {
        const response = await this.$api(`api/projects/pipeline/documents/${this.$route.params.id}`);
        this.documents = response.data;
    },
    methods: {
        downloadLink(id) {
            return `/api/projects/pipeline/documents/download/${id}`;
        },
        formattedDate(dateString) {
            const date = new Date(dateString);
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()} - ${date.getHours()}:${date.getMinutes()}`;
        },
    }
}
</script>

<style lang="scss">
.documents {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    &__list,
    &__upload {
        padding: 20px;
        background-color: $light-grey;
        border-radius: $border-radius;
    }
    &__upload {
        height: 100%;
    }
    &__list-inner {
        padding: 0;
        margin: 0;
        list-style-type: none;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    &__none {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    &__none-msg {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: $font-md;
        font-family: $font-heading;
        opacity: 0.5;
        i {
            font-size: $font-lg;
            margin-bottom: 10px;
        }
    }
}
.document-list-item {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    &__icon {
        font-size: 30px;
        margin-right: 15px;
        flex-basis: 20px;
        max-width: 20px;
    }
    &__meta {
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    &__name {
        font-family: $font-heading;
        font-weight: $font-weight-heading;
        font-size: 18px;
    }
    &__link {
        flex-basis: 20px;
        max-width: 20px;
        text-align: right;
        i {
            font-size: 25px;
            @include transition-default;
        }
        &:hover i {
            color: $accent-colour;
        }
    }
}
</style>
