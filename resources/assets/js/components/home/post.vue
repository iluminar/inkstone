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
                <a class="card-footer-item" :href="url">Read More</a>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        data: () => ({
            content: '',
            url: ''
        }),
        mounted() {
            this.content = converter.makeHtml(this.post.content.substring(0, 400));
            this.url = 'posts/' + this.post.slug
        }
    }  
</script>
