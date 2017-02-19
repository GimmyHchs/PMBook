<template lang="html">
    <table class="ui compact celled definition table">
    <thead class="full-width">
        <tr>
            <th></th>
            <th>專案名稱</th>
            <th>專案代號</th>
            <th>建立者</th>
            <th>建立時間</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(project, index) in projects">
            <td class="collapsing">
                <div class="ui fitted slider checkbox">
                    <input type="checkbox" @click="toggleCheck(project.id)"><label></label>
                </div>
            </td>
            <td @click="chooseProject(project)">{{project.prefix}}/{{project.name}}</td>
            <td>{{project.nick}}</td>
            <td>{{project.creator_name}}</td>
            <td>{{project.created_at}}</td>
        </tr>
    </tbody>
    <tfoot class="full-width">
        <tr>
            <th></th>
            <th colspan="4">
            <button type="submit" class="ui small orange button">
                刪除
            </button>
            </th>
        </tr>
    </tfoot>
    </table>
</template>

<script>
export default {
    data(){
        return {
            selected_ids:[],
            resource: this.$resource('/project{/id}'),
        }
    },
    computed:{
        projects(){
            return this.$store.state.projects;
        }
    },
    methods:{
        chooseProject(project){
            this.$store.commit('changeProject', project);
        },
        toggleCheck(id){
            var indexOfId = this.selected_ids.indexOf(id);

            if(indexOfId == -1){
                this.selected_ids.push(id);
            }else {
                this.selected_ids.splice(indexOfId, 1);
            }
        },
    },
    mounted(){
        this.$store.dispatch('fetchProjects');
    }
}
</script>

<style lang="css">
</style>
