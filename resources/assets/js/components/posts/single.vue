<template>
    <div class="column is-8 is-offset-2">
        <div class="card">
            <header class="card-header">
                <a :href="post.url" class="card-header-title title is-3">
                {{ post.title }}
                </a>
            </header>
            <div class="card-content">
                <div class="content" v-html="content">
                </div>
            </div>
            <footer class="card-footer">
                <a class="card-footer-item">
                    <span class="icon is-medium" @click="togglePostPublishStatus(post.slug)">
                        <i v-bind:class="[{ 'fa fa-toggle-off' : draft, 'fa fa-toggle-on' : !draft}]"></i>
                    </span>
                </a>
                <a class="card-footer-item" :href="'/posts/' + post.slug + '/edit'">
                    <span class="icon is-medium">
                        <i class="fa fa-edit"></i>
                    </span>
                </a>
                <a class="card-footer-item" :href="'/posts/' + post.slug + '/delete'">
                    <span class="icon is-medium">
                        <i class="fa fa-close"></i>
                    </span>
                </a>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        data: () => ({
            content: '',
            draft: true
        }),
        mounted() {
            this.content = converter.makeHtml(this.post.content.substring(0, 400));
            this.draft = this.post.draft;
        },
        methods: {
            togglePostPublishStatus(slug, e) {
                axios.patch('/posts/' + slug + '/publish')
                     .then((response) => {
                        this.draft = !this.draft;
                     });
            }
        }
    }
</script>
