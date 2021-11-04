<template>
    <div class="container">
        <div class="row align-items-center" id="nav-header">
            <h1 class="col-7">IT-Notes</h1>
            <h2 class="col-md-auto article-type">Алгоритмы</h2>
            <h2 class="col-md-auto article-type">Паттерны</h2>
            <h2 class="col-md-auto article-type">Статьи</h2>
        </div>
        <div class="row">
            <div class="col-10">
                <search></search>
            </div>
            <div class="col" v-if="$page.props.auth.user" id="buttons">
                <div v-if="$page.props.auth.user.admin == 1">
                    <inertia-link href="/admin" class="btn btn-outline-primary">Admin page</inertia-link>
                </div>
                <inertia-link href="/logout" method="POST" class="btn btn-outline-secondary">Logout</inertia-link>
            </div>
            <div class="col" v-else>
            </div>
        </div>
    </div>
</template>
<script>
import Search from './Search';

export default {
    components: {
        Search,
    }
}
</script>
