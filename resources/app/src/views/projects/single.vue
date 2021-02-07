<template>
    <div class="projects-single" v-if="projectIsset">
        <PageHead :title="project.name" :subtitle="projectSubtitle">
            Need project state pills to appear below title
        </PageHead>
        <tabs v-model="selectedTab" class="project-tabs">
            <tab
                class="tab"
                v-for="(tab, i) in tabs"
                :key="`t${i}`"
                :val="tab.name"
                :label="tab.name"
                :indicator="true"
            />
        </tabs>
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

export default {
    name: "ProjectsSingle",
    components: {
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
                { component: 'Meetings', name: 'Meetings', icon: 'handshake' },
                { component: 'Documents', name: 'Documents', icon: 'folder' },
            ],
            selectedTab: 0,
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
    async mounted() {
        console.log(this.tabs);

        this.$store.commit('util/enableLoader');
        const response = await this.$api(`/api/projects/${this.$route.params.id}`)
        console.log(response);
        this.project = response.data;
        this.$store.commit('projects/setCurrentProject', response.data);
        this.$store.commit('util/disableLoader');
    }
};
</script>

<style lang="scss">
.project-tabs {
    margin: 0 -30px;
    .tab {
        flex: 1;
        text-align: center;
        background-color: $light-grey;
        font-size: $font-sm;
        font-family: $font-heading;
    }
}
</style>
