<template>
    <div class="column is-8 is-offset-2">
        <div class="card">
            <header class="card-header">
                <a href="" class="card-header-title">
                {{ post.title }}
                </a>
            </header>
            <div class="card-content">
                <div class="content" v-html="content">
                </div>
            </div>
            <footer class="card-footer">
                <a class="card-footer-item" :href="'/posts/' + post.slug + '/edit'">Edit</a>
                <a class="card-footer-item" :href="'/posts/' + post.slug + '/delete'">Delete</a>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            post: data.post,
            content: ''
        }),
        mounted() {
            this.content = converter.makeHtml(this.post.content)
        }
    }
</script>
