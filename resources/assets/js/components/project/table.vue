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
                    <input type="checkbox"><label></label>
                </div>
            </td>
            <td>{{project.prefix}}/{{project.name}}</td>
            <td>{{project.nick}}</td>
            <td></td>
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
    props:{
        projects:{
            default : () => null,
        },
    },
    data(){
        return {
            selected_ids:[],
            selected_now:null,
        }
    }
}
</script>

<style lang="css">
</style>
