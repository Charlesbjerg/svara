<template>
    <div class="card-modal-outer" :class="modalActive">
        <aside class="card-modal">
            <header class="card-modal__head">
                <div>
                    <input type="text" name="cardName" class="card-modal__input" v-if="edit" v-model="card.name" @blur.native="edit = false" autocomplete="off" />
                    <h2 class="card-modal__title" v-else @click="edit = true">{{ card.name }}</h2>
                </div>
                <button class="card-modal__close" @click="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </header>
            <div class="card-modal__body" v-if="dataLoaded">

                <p class="card-modal__staff-title">Created by</p>
                <div class="card-modal__staff" v-if="card.createdBy">
                    <project-staff-member :member="card.createdBy" />
                </div>
                <p class="card-modal__staff-title">Assigned To</p>
                <div class="card-modal__staff" v-if="card.assignedTo">
                    <project-staff-member :member="card.assignedTo" />
                </div>
                <div class="card-modal__staff-picker" v-else>
                    <span>Assign to staff member</span>
                </div>
                <div class="card-modal__timestamps">
                    <div class="card-modal__created-at" v-if="datesEqual(card.createdAt, card.updatedAt)">
                        Created: {{ formattedDate(card.createdAt) }}
                    </div>
                    <div class="card-modal__created-at" v-else>
                        Last Updated: {{ formattedDate(card.updatedAt) }}
                    </div>
                </div>

                <!-- TODO: Integrate fields for: user assigned to, description, label and attached image -->

                <div class="card-modal__section">
                    <h3 class="card-modal__subtitle">Description</h3>
                    <div class="card-modal__description">
                        <textarea class="card-modal__textarea" v-if="descriptionEdit" v-model="card.description" @blur.native="descriptionEdit = false; cardUpdated()"></textarea>
                        <div v-else @click="descriptionEdit = true">{{ card.description }}</div>
                    </div>
                </div>

                <!-- TODO: To be enabled at a later date -->
                <div class="card-modal__section" v-if="attachmentsEnabled">
                    <h3 class="card-modal__subtitle">Attachments</h3>
                    <div class="card-modal__attachments" v-if="hasAttachments">
                        <card-attachment v-for="attachment in card.attachments" />
                    </div>
                    <file-dropzone ref="attachmentDropzone" id="attachmentDropzone" :options="dropzoneOptions" />
                </div>

                <!-- TODO: To be enabled at a later date -->
                <div class="card-modal__section" v-if="commentsEnabled">
                    <h3 class="card-modal__subtitle">Comments</h3>
                    <div class="card-modal__attachments" v-if="hasComments">
                        <card-comment v-for="comment in card.comments" />
                    </div>
                    <card-comment-field />
                </div>

                <div class="card-modal__controls">
                    <!-- TODO: Add controls to archive/assign card -->
                    <button class="btn btn-alt">Archive Card</button>
                </div>

            </div>
        </aside>
        <div class="card-modal-overlay"></div>
    </div>
</template>

<script>
import CardAttachment from "./CardAttachment";
import CardComment from "./CardComment";
import CardCommentField from "./CardCommentField";
import VueDropzone from 'vue2-dropzone';
import ProjectStaffMember from "../../projects/overview/ProjectStaffMember";

export default {
    name: "CardModal",
    components: {
        ProjectStaffMember,
        CardAttachment,
        CardComment,
        CardCommentField,
        FileDropzone: VueDropzone,
    },
    data() {
        return {
            edit: false,
            descriptionEdit: false,
            dataLoaded: false,
            attachmentsEnabled: false,
            commentsEnabled: false,
            dropzoneOptions: {
                url: 'api/projects/pipeline/boards/attachment-upload',
                thumbnailWidth: 150,
                maxFilesize: 0.5,
                headers: { "My-Awesome-Header": "header value" }
            }
        };
    },
    computed: {
        card() {
            return this.$store.state.entities.board.openCard;
        },
        modalActive() {
            return this.card !== null ? 'active' : '';
        },
        hasComments() {
            return this.card.comments !== undefined && this.card.comments.length > 0;
        },
        hasAttachments() {
            return this.card.attachments !== undefined && this.card.attachments.length > 0;
        },
    },
    async mounted() {
        const response = await this.$api(`api/projects/pipeline/boards/card/${this.card.id}`);
        console.log(response);
        this.$store.commit('entities/setOpenCard', response.data);
        this.dataLoaded = true;
    },
    methods: {
        closeModal() {
            this.$store.commit('entities/closeCardModal');
        },
        formattedDate(dateString) {
            const date = new Date(dateString);
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()} - ${date.getHours()}:${date.getMinutes()}`;
        },
        datesEqual(created, updated) {
            return created === updated;
        },
        async cardUpdated() {
            const response = await this.$api(`api/projects/pipeline/boards/card/${this.card.id}`, 'PATCH', this.card);
            this.card = response.data;
        }
    }
};
</script>

<style lang="scss">
.card-modal-outer {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 100;
    pointer-events: none;
    visibility: hidden;
}
.card-modal-overlay {
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0);
    @include transition-default;
}
.card-modal {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    width: 100%;
    max-width: 600px;
    padding: 20px 90px 20px 30px;
    background-color: #fff;
    transform: translate3d(100%, 0, 0);
    @include transition-bounce;
    &__head {
        margin-bottom: 1em;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    &__close {
        @include gradient-red;
        border: 0;
        border-radius: $border-radius;
        width: 32px;
        height: 32px;
        color: #fff;
        cursor: pointer;
        @include box-shadow-sm;
        @include transition-default;
        i {
            transform-origin: center;
            @include transition-bounce;
        }
        &:hover {
            transform: rotate(-10deg);
        }
        &:hover i {
            transform: rotate(190deg);
        }
    }
    &__staff-picker,
    &__staff {
        padding: 10px;
        background-color: $light-grey;
        border-radius: $border-radius;
        width: 100%;
        margin-bottom: 15px;
    }
    &__staff-title {
        margin: 0 0 5px;
        font-family: $font-heading;
        font-weight: $font-weight-heading;
    }
    &__staff-picker:hover > span {
        opacity: 1;
    }
    &__staff-picker > span {
        cursor: pointer;
        opacity: 0.5;
        font-family: $font-heading;
        font-weight: $font-weight-heading;
        text-align: center;
        display: block;
        @include transition-default;
    }
    &__timestamps {
        margin: 0 0 15px;
    }
    &__section {
        margin-bottom: 2em;
    }
    &__subtitle {
        font-size: $font-sm;
    }
    &__description {
        padding: 0.75em;
        background-color: $light-grey;
        border-radius: $border-radius;
        min-height: 200px;
        @include box-shadow-sm;
        > div {
            min-height: 200px;
            height: 100%;
        }
    }
    &__textarea {
        width: 100%;
        background-color: $light-grey;
        border-radius: $border-radius;
        border: 2px solid $grey;
        padding: 0.5em;
        min-height: 200px;
    }
}

.active {
    &.card-modal-outer {
        pointer-events: all;
        visibility: visible;
    }
    .card-modal-overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }
    .card-modal {
        transform: translate3d(10%, 0, 0);
    }
}
</style>
