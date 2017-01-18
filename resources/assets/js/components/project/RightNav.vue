<template>
    <span>
        <div class="ui vertical menu container">
            <div class="item">
                <div class="ui input"><input type="text" placeholder="Search..."></div>
            </div>
            <a class="item" href="#" @click="popupCreate()">
                <i class="fa right-icon fa-plus-square-o" aria-hidden="true"></i> 建立專案
            </a>
        </div>
        <project-create></project-create>
    </span>
</template>

<script>
    export default {
        props:{
        },
        data(){
            return {
            };
        },
        methods:{
            popupCreate(){
                $('.ui.modal.create').modal('show')
            },
        },
        mounted() {
            console.log('Delivery Right Nav mounted.')
        }
    }
</script>
