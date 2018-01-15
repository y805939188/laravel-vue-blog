<template>
    <div> <!-- vue的子组件中的template下必须有个div 并且第一层的div是不会被渲染到页面上的 所以css样式对这个div无效 -->
        <!-- <div id="Filter"></div> -->
    </div>
</template>

<script>
export default {
    name: 'app',

    data() {
        return {
            msg: 'ding'
        }
    },


}
</script>

<style scope>
</style>