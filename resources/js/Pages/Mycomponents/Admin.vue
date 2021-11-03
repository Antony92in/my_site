<template>
    <div>
        <h1>Admin Dashboard</h1>
        <inertia-link href="/" class="btn btn-outline-primary">Main page</inertia-link>
    </div>

    <form id="post-create" @submit.prevent="send">
        <label>Title</label>
        <input type="text" v-model="title" name="title" class="form-control">
        <label>Category</label>
        <select v-model="category" name="category"  class="form-select">
            <option v-for="(cat, name) in $page.props.post_categories" :value="cat">{{ name }}</option>
        </select>
        <label>Content</label>
        <textarea name="body" class="form-control" v-model="body" rows="5">
        </textarea>
        <br>
        <input type="submit" name="submit" value="Save" class="btn btn-outline-primary">
    </form>
    <p>{{ form_response }}</p>
    <ul v-if="form_errors">
        <li v-for="error in form_errors">{{ error[0] }}</li>
    </ul>
</template>
<script>
export default {
    name: "Admin",
    data(){
        return {
            title:'',
            category:'',
            body:'',
            form_response: '',
            form_errors: '',
        }
    },
    methods: {
        send() {
            axios.post('/create-post', {
                title: this.title,
                body: this.body,
                category: this.category,
                author_id: this.$page.props.auth.user.id
            })
            .then((response) => {
                this.form_response = 'Added';
                this.body = '';
                this.title = '';
                this.category = '';
            })
            .catch((error) => {
                this.form_errors = error.response.data.errors
            });
        }
    }
}
</script>

<style>
 #post-create {
     max-width: 700px;
     padding: 10px;
 }
</style>

