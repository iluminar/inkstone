<template>
    <div class="column is-6 is-offset-3">
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
                <a class="card-footer-item">Save</a>
                <a class="card-footer-item">Edit</a>
                <a class="card-footer-item">Delete</a>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        data: () => ({
            content: '',
        }),
        mounted() {
            this.content = converter.makeHtml(this.post.content.substring(0, 250))
        }
    }  
</script>
