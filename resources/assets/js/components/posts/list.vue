<template>
    <div class="columns is-multiline">
        <div class="column is-6 is-offset-3" v-if="!posts.length">
            <a href="/posts/create" class="button is-primary is-outlined is-fullwidth">Create New Post</a>
        </div>
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
