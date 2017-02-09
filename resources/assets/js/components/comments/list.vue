<template>
    <div>
        <comment v-for="comment in comments" :comment="comment"></comment>
    </div>
</template>

<script>
import comment from './single.vue'
    export default {
        components: {
            comment
        },
        props: ['comments']
    }
</script>
