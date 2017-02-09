<template>
    <div class="card">
        <div class="card-content">
            <div class="media">
                <div class="media-left">
                    <figure class="image">
                        <img :src="comment.author.socials[0].avatar">
                    </figure>
                </div>
                <div class="media-content">
                    <p class="title is-4">{{ comment.author.name }}</p>
                    <p class="subtitle is-6">{{ comment.created_at }} ago</p>
                    <div class="content" v-html="content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['comment'],
        data: () => ({
            content: ''
        }),
        mounted() {
            this.content = converter.makeHtml(this.comment.content);
        }
    }
</script>
