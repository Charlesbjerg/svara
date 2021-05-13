<template>
    <div class="projects-single" v-if="projectIsset">
        <page-head :title="project.name" :subtitle="projectSubtitle">
			{{ project.state.state }}
        </page-head>
		<tabs v-model="selectedTab" class="project-tabs">
            <tab
                :class="'tab-outer ' + getActiveTab(i)"
                v-for="(tab, i) in tabs"
                :key="`t${i}`"
                :val="tab.name"
                :label="tab.name"
                :indicator="true"
            />
        </tabs>
		<Breadcrumbs :breadcrumbs="viewBreadcrumbs" v-if="viewBreadcrumbs.length > 0" />
		<tab-panels v-model="selectedTab" :animate="true">
            <tab-panel v-for="(tab, i) in tabs" :key="i" :val="tab.name">
                <component :is="tab.component"></component>
            </tab-panel>
        </tab-panels>
    </div>
</template>

<script>
import PageHead from "@/components/common/PageHead";
import Overview from '@/components/projects/Overview';
import Pipeline from '@/components/projects/Pipeline';
import MessageThreads from '@/components/projects/MessageThreads';
import Meetings from '@/components/projects/Meetings';
import Documents from '@/components/projects/Documents';
import { Tabs, Tab, TabPanels, TabPanel } from 'vue3-tabs';
import Breadcrumbs from "../../components/common/Breadcrumbs";

export default {
    name: "ProjectsSingle",
    components: {
		Breadcrumbs,
        PageHead,
        Tabs,
        Tab,
        TabPanels,
        TabPanel,
        Overview,
        Pipeline,
        MessageThreads,
        Meetings,
        Documents
    },
    data() {
        return {
            project: {},
            tabs: [
                { component: 'Overview', name: 'Overview', icon: 'shuttle' },
                { component: 'Pipeline', name: 'Pipeline', icon: 'share' },
                { component: 'MessageThreads', name: 'Message Threads', icon: 'envelope-open' },
                // { component: 'Meetings', name: 'Meetings', icon: 'handshake' },
                { component: 'Documents', name: 'Documents', icon: 'folder' },
            ],
            selectedTab: 0,
			viewBreadcrumbs: [],
        };
    },
    computed: {
        projectIsset() {
            return this.project !== undefined && Object.keys(this.project).length > 0
        },
        projectSubtitle() {
            return `For ${this.project.client.name}`;
        }
    },
    methods: {
        getActiveTab(index) {
            return index === 0 ? 'active' : '';
        },
    },
    watch: {
        // Remove active state from first tab
        selectedTab(newTabName) {
            if (newTabName !== this.tabs[0].name) {
                document.querySelectorAll('.project-tabs .tab-outer.active').forEach(elem => elem.classList.remove('active'));
            }
        },
    },
    // Fetch project data and commit to store
    async mounted() {
        this.$store.commit('util/enableLoader');
        const response = await this.$api(`api/projects/${this.$route.params.id}`)
        this.project = response.data;
        this.$store.commit('projects/setCurrentProject', response.data);
        this.$store.commit('util/disableLoader');
        this.viewBreadcrumbs = [
			{ name: 'Projects', href: '/projects' },
			{ name: this.project.name, active: true },
		];
    }
};
</script>

<style lang="scss">
.project-tabs {
    margin: -30px -30px 0;
    .tab-outer {
        flex: 1;
        text-align: center;
        background-color: $light-grey;
        font-size: $font-sm;
        font-family: $font-heading;
        padding: 5px 15px;
        position: relative;
        cursor: pointer;
        @include transition-default;
        &::after {
            content: "";
            display: block;
            height: 3px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transform: scaleY(0);
            transform-origin: top;
            @include gradient-purple;
            @include transition-bounce;
        }
        &.active,
        &:hover {
            background-color: darken($light-grey, 10%);
            border-bottom: 0;
            color: $accent-colour;
            &::after {
                opacity: 1;
                transform: scaleY(1);
            }
        }
    }
}
.tab-panels {
    margin: 0 -20px;
}
.tab-panel {
    padding: 30px 20px;
}
</style>
