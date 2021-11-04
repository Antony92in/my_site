<template>
    <div class="container">
       <div v-for="post in posts" id="posts">
           <h3 id="title">{{ post.title }}</h3>
           <p id="content" v-html="post.content"></p>
           <hr>
       </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            posts: this.$page.props.posts
        }
    }
}
</script>
