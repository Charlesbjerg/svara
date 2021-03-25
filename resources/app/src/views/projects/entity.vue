<template>
    <section>
        <page-head :title="entity.name" :subtitle="`For ${project.name}`" />
        <component :is="entity.component_name" :data="entity" />
    </section>
</template>

<script>
import { mapGetters } from 'vuex';
import PageHead from "../../components/common/PageHead";
import Boards from "../../components/entities/boards/boards";
import Checklists from "../../components/entities/checklists/checklists";
import Documents from "../../components/entities/documents/documents";
import SignOff from "../../components/entities/sign-off/sign-off";

export default {
    name: "Projects.Entity",
    components: {
        PageHead,
        Boards,
        Checklists,
        Documents,
        SignOff,
    },
    data() {
        return {
            entity: {},
        };
    },
    computed: {
        ...mapGetters({
            project: 'projects/getCurrentProject',
        }),
        id() {
            return this.$route.params.id;
        }
    },
    async mounted() {
        const response = await this.$api(`api/projects/pipeline/entities/${this.id}`);
        this.entity = response.data;
    }
}
</script>
