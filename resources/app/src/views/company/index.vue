<template>
    <div class="company-index">
        <page-head title="Company Info"/>
        <div class="company-data">
            <section class="project-meta-outer">
                <h2>Project Metadata</h2>
                <p>The fields below allow you to setup the metadata that can be captured per project.</p>
                <div class="company-data__card">
                    <editable-meta-item v-for="(item, index) in metaItems" :key="index" :meta="item" :index="index" @delete="removeItem" />
                    <hr style="margin: 20px 0;" v-if="metaItems.length > 0" />
                    <button class="btn btn-default" @click="addItem">Add meta item</button>
                </div>
            </section>
            <section>
                <h2>User Control</h2>
                <p>Create, Delete or reset passwords for your existing users.</p>
                <div class="company-data__card">
                    <div class="company-data__btn-group">
                        <button @click="userAction('AddUser', 'Add a New User')" class="company-data__btn">
                            <i class="fas fa-user-plus"></i>
                            Add New User
                        </button>
                        <button @click="userAction('DeactivateUser', 'Deactivate a User')" class="company-data__btn">
                            <i class="fas fa-user-times"></i>
                            Deactivate User
                        </button>
                        <button @click="userAction('ResetPassword', 'Reset a User\'s Password')" class="company-data__btn">
                            <i class="fas fa-user-cog"></i>
                            Reset User's Password
                        </button>
                    </div>
                </div>
            </section>
        </div>
        <action-modal v-if="modalActive" :component="modalComponent" :title="modalTitle" @close="closeModal" />
    </div>
</template>

<script>
import PageHead from "../../components/common/PageHead";
import EditableMetaItem from "../../components/company/EditableMetaItem";
import ActionModal from "../../components/company/ActionModal";

export default {
    components: {
        ActionModal,
        EditableMetaItem,
        PageHead
    },
    data() {
        return {
            metaItems: [],
            modalActive: false,
            modalComponent: '',
            modalTitle: '',
        }
    },
    async mounted() {
        const response = await this.$api('api/project-meta');
        this.metaItems = response.data;
    },
    methods: {
        addItem() {
            this.metaItems.push({
                title: 'Meta Item Name',
                sortable: false,
                dataType: null,
            });
        },
        removeItem(item) {
            // TODO: Remove item from the array
            // TODO: Remove from API if has an id
        },
        userAction(component, modalTitle) {
            this.modalActive = true;
            this.modalComponent = component;
            this.modalTitle= modalTitle;
        },
        closeModal() {
            this.modalActive = false;
            this.modalComponent = '';
            this.modalTitle = '';
        },
    }
};
</script>

<style lang="scss">
.company-data {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 30px;
    &__card {
        padding: 20px;
        background-color: $light-grey;
        border-radius: $border-radius;
    }
    &__btn-group {
        display: flex;
        align-items: stretch;
        justify-content: space-between;
        margin: 0 -30px;
    }
    &__btn {
        height: auto;
        margin: 0 30px;
        flex: 1;
        padding: 30px;
        border-radius: $border-radius;
        background-color: #fff;
        font-family: $font-heading;
        font-weight: $font-weight-heading;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 0;
        cursor: pointer;
        @include box-shadow-sm;
        @include transition-default;
        i {
            font-size: 40px;
            margin: 0 0 15px;
        }
        &:hover {
            @include box-shadow;
            transform: translate3d(0, -2px, 0);
        }
    }
}
</style>
