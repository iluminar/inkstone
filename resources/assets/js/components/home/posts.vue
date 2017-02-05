<template>
    <div class="columns is-multiline">
      <post v-for="post in posts" :post="post"></post>
    </div>
</template>

<script>
    import post from './post.vue'
    export default {
        components: {
            post
        },
        props: ['posts']
    }
</script>
