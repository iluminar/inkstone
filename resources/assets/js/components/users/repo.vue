<template>
    <div>
        <div class="column is-6 is-offset-3">
            <form role="form" method="POST" :action="url">
                <input type="hidden" name="_token" :value="token">
                <div class="card">
                    <header class="card-header">
                        <a href="" class="card-header-title title">
                        {{ repo.name }}
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <label class="label">Document Root</label>
                            <p class="control">
                                <input id="document_path" class="input" type="text" name="document_path" placeholder="path/to/docs/folder">
                                <span class="help is-danger" v-if="errors">{{ errors.document_path }}</span>
                            </p>
                            <p class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="readme" checked>
                                    Keep Readme as Main Page
                                </label>
                            </p>
                            <p class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="menu">
                                    Add Sidebar Menu
                                </label>
                            </p>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <div class="card-footer-item">
                            <button type="submit" class="button is-primary">Save</button>
                        </div>
                    </footer>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            repo: data.repo,
            errors: data.errors,
            token: Laravel.csrfToken,
            url: '/' + data.username + '/' + data.repo.name
        })
    }
</script>