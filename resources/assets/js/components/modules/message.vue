<template>
    <div v-if="isActive" :class="color" class="ui negative message transition">
        <i class="close icon" @click="close"></i>
        <div class="header">
            {{title}}
        </div>
        <p>{{message}}</p>
        <ul v-if="items" class="list">
            <li v-for="item in items">
                <span v-for="message in item">{{message}}</span>
            </li>
        </ul>
    </div>
</template>
<style media="screen">

</style>
<script>
    export default {
        props:{
            isActive:{
                default : () => false,
            },
            title:{
                default : () => 'Warning',
            },
            color:{
                default : () => 'orange',
            },
            message:{
                default : () => '',
            },
            items:{
                default : () => null,
            }
        },
        data() {
            return {
            }
        },
        methods:{
            close(){
                this.$emit('message-close');
            }
        },
        mounted() {
            console.log('Message mounted.')
        }
    }
</script>
