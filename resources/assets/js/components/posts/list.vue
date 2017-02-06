<template>
    <div class="columns is-multiline">
        <div class="column is-8 is-offset-2" v-for="post in posts">
            <div class="card">
                <header class="card-header">
                    <a :href="post.url" class="card-header-title title is-3">
                    {{ post.title }}
                    </a>
                </header>
                <div class="card-content">
                    <div class="content" v-html="post.content">
                    </div>
                </div>
                <footer class="card-footer">
                    <a class="card-footer-item" href="url">
                        <span class="icon is-medium">
                            <i class="fa fa-toggle-off" v-if="post.draft"></i>
                            <i class="fa fa-toggle-on" v-else></i>
                        </span>
                    </a>
                    <a class="card-footer-item" href="url">
                        <span class="icon is-medium">
                            <i class="fa fa-edit"></i>
                        </span>
                    </a>
                    <a class="card-footer-item" href="url">
                        <span class="icon is-medium">
                            <i class="fa fa-close"></i>
                        </span>
                    </a>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            posts: data.posts.data.map((item) => {
                item.content = converter.makeHtml(item.content.substring(0, 400));
                item.url = '/posts/' + item.slug;
                return item;
            })
        })
    }
</script>
