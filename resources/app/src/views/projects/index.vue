<template>
  <div class="projects-index">
    <header>
      Some info about all projects, maybe a graph.
    </header>
    <section class="grid">
      <ProjectCard v-for="(project, index) in projects" :key="index" :project="project" />
    </section>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import ProjectCard from "@/components/projects/ProjectCard";
export default {
  name: "ProjectsIndex",
  components: {
    ProjectCard,
  },
  computed: {
    ...mapGetters({
      projects: 'projects/getAllProjects',
    }),
  },
  async mounted() {
    const response = await this.$api('api/projects', 'GET');
    this.$store.commit('projects/setProjects', response.data);
  }
};
</script>

<style lang="scss">
.grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 20px;
}
</style>
