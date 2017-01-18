<template>
    <div v-if="isActive" class="ui segment fullscreen">
      <div class="ui active dimmer">
        <div class="ui text loader">{{text}}</div>
      </div>
      <p></p>
    </div>
</template>
<style media="screen">
.segment.fullscreen {
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 1000;
}
</style>
<script>
    export default {
        props:{
            isActive:{
                default : () => false,
            },
            text:{
                default : () => 'Loading...',
            },
        },
        mounted() {
            console.log('Progress mounted.')
        }
    }
</script>
