<template>
    <div>
        <div class="column is-6 is-offset-3">
            <div class="card">
                <header class="card-header">
                    <a href="" class="card-header-title">
                    {{ page.name }}
                    </a>
                </header>
                <div class="card-content">
                    <div class="content" v-html="content">
                    </div>
                </div>
                <footer class="card-footer">
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            page: data.page,
            content: ''
        }),
        mounted() {
            this.content = converter.makeHtml(this.page.content)
        }
    }
</script>