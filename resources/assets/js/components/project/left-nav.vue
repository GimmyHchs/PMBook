<template lang="html">
    <div class="ui vertical menu container">
      <div class="item">
        <div class="header">Project <span class="left-project-name">{{projectName}}</span></div>
        <div class="menu">
          <a class="item" :href="index_url">專案列表</a>
          <a class="item">檢視專案</a>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            index_url:'/project',
        };
    },
    computed:{
        projectName(){
            return this.$store.getters.projectName;
        }
    },
}
</script>

<style lang="css">
</style>
