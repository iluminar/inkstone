<template>
    <div class="columns is-multiline">
        <post v-for="post in posts" :post="post"></post>
    </div>
</template>

<script>
import post from './single.vue'
    export default {
        components: {
            post
        },
        data: () => ({
            posts: data.posts.data
        })
    }
</script>
