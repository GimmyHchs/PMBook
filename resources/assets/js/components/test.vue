<template lang="html">
    <div class="margin-fix">
        {{message}}
    </div>
</template>

<style lang="css">
    .margin-fix{
        margin-top: 15px;
    }
</style>

<script>
export default {
    props:{
        
    },
    data() {
        return {
            message: "Basic Component"
        }
    },
    mounted() {
        console.log('component mounted.');
    }
}
</script>
