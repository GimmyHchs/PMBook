<template>
    <div class="ui modal create">

        <!-- 額外模組 loading -->
        <loading :isActive="true" :text="'Test...'"></loading>

        <!-- 額外模組 message -->
        <message
            @message-close="toggleError('hidden')"
            :isActive="isError"
            color="orange"
            style="margin: 10px;"
            :title="message.title"
            :items="message.content">
        </message>

        <!-- create modal content-->
        <i class="close icon"></i>
        <div class="header">
            建立專案
        </div>
        <div class="content">
            <div class="description">
                <h4 class="ui horizontal divider header">
                    <i class="book icon"></i>
                    專案資訊
                </h4>
                <form class="ui form">
                    <div class="field">
                        <div class="two fields">
                            <div class="field required">
                                <label>專案名稱</label>
                                <div class="ui labeled input">
                                  <div class="ui label">
                                    {{user.project_prefix}} /
                                  </div>
                                  <input type="text" name="name" placeholder="專案名稱" v-model="inputs.name">
                                </div>
                            </div>
                            <div class="field required">
                                <label>專案代號</label>
                                <input type="text" name="nick" placeholder="專案代號" v-model="inputs.nick">
                            </div>
                        </div>
                    </div>
                </form>
                <h4 class="ui horizontal divider header">
                    <i class="browser icon"></i>
                    額外資訊
                </h4>
                <form class="ui form">
                    <div class="field">
                        <label>專案描述</label>
                        <input type="text" name="description" placeholder="專案描述" v-model="inputs.description">
                    </div>
                </form>
            </div>
        </div>
        <!-- create modal content-->

        <!-- create modal actions-->
        <div class="actions">
            <div class="ui black deny button">取消</div>
            <div class="ui positive right labeled icon button" @click.stop.prevent="create()">
                建立
                <i class="checkmark icon"></i>
            </div>
        </div>
        <!-- create modal actions-->

    </div>
</template>
<script type="text/javascript">
export default {
    data(){
        return {
            isActive: true,
            resource: this.$resource('/project{/id}'),
            message:{title:'警告', content:'警告!'},
            user: PmbData.user,
            inputs:{
                prefix: 'default',
                name: 'Myproject',
                nick: 'mp1',
                description: '我的第一個專案，最厲害那種',
            },
            old_inputs:null,
            isError : false,
        };
    },
    methods:{
        // 發送 post ， 建立專案
        create(){
            this.toggleActive();
            this.inputs.prefix = this.user.project_prefix;
            this.resource.save(null, this.inputs).then((response) => {
                console.log(response.data);
                this.clearInputs();
                this.toggleActive();
            }, (response) => {
                this.toggleActive();
                this.handleError(response);
            });
        },
        // 清空input
        clearInputs(){
            for (var input in this.inputs) {
                input = '';
            }
        },
        toggleActive(){
            this.isActive = !this.isActive;
        },
        toggleError(val='auto'){
            if(val == 'show'){
                this.isError = true;
            }else if (val == 'hidden') {
                this.isError = false;
            }else {
                this.isError = !this.isError;
            }
        },
        // 處理回傳的Error.
        handleError(response){
            console.log(response);
            this.message.content = response.data;
            this.toggleError('show');
        },
    },
    mounted() {
        console.log('Create mounted.')
    }
}
</script>
