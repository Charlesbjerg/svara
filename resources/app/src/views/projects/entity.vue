<template>
    <section>
        <page-head :title="entity.name" :subtitle="`For ${project.name}`" />
		<breadcrumbs :breadcrumbs="viewBreadcrumbs" v-if="viewBreadcrumbs.length > 0" />
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
import Breadcrumbs from "../../components/common/Breadcrumbs";

export default {
    name: "Projects.Entity",
    components: {
		Breadcrumbs,
        PageHead,
        Boards,
        Checklists,
        Documents,
        SignOff,
    },
    data() {
        return {
            entity: {},
			viewBreadcrumbs: []
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

        // If no current project selected - Fetch it
        await this.$nextTick(async () => {
        	if (this.project.name === undefined) {
        		const response = await this.$api(`api/projects/${this.entity.project_id}`);
        		this.$store.commit('projects/setCurrentProject', response.data);
			}
        	this.viewBreadcrumbs = [
				{ name: 'Projects', href: '/projects' },
				{ name: this.project.name, href: `/projects/${this.project.id}` },
				{ name: this.entity.entity_label, active: true },
			];
        	console.log(this.viewBreadcrumbs);
		});

    }
}
</script>
