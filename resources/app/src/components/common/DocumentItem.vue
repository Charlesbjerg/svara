<template>
    <div class="document-item">
        <i class="document-item__icon fas fa-file"></i>
        <span class="document-item__meta">
            <strong class="document-item__name">{{ document.name }}</strong>
            <em>Uploaded at {{ formattedDate(document.createdAt) }}</em>
        </span>
        <a :href="downloadLink(document.id)" aria-label="Download this file" class="document-item__link" target="_blank">
            <i class="fas fa-file-download"></i>
        </a>
    </div>
</template>

<script>
export default {
    name: "DocumentItem",
    props: {
        document: {
            required: true,
            type: Object,
        },
    },
    methods: {
        downloadLink(id) {
        	if (process.env.NODE_ENV === 'production') {
				return `/api/projects/pipeline/documents/download/${id}`;
			} else {
        		return `http://app.svara.io:8000/api/projects/pipeline/documents/download/${id}`;
			}
        },
        formattedDate(dateString) {
            const date = new Date(dateString);
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()} - ${date.getHours()}:${date.getMinutes()}`;
        },
    }
}
</script>

<style lang="scss">
.document-item {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 20px;
    background-color: $light-grey;
    border-radius: $border-radius;
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
		overflow-wrap: anywhere;
    }
    &__link {
        flex-basis: 20px;
        max-width: 20px;
        text-align: right;
		margin-left: 10px;
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
