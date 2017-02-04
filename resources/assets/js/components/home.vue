<template>
    <posts :posts="posts"></posts>
</template>

<script>
import posts from './posts.vue'
    export default {
        components: {
            posts
        },
        data: () => ({
            posts: data.posts.data
        }),
        ready() {
            console.log(data)
        }
    }
</script>
