<template>
    <div>
        <h1>Admin Dashboard</h1>
        <inertia-link href="/" class="btn btn-outline-primary">Main page</inertia-link>
    </div>

    <form id="post-create" @submit.prevent="send">
        <input type="text" v-model="title" name="title" class="form-control">
        <input type="text" v-model="body" name="body" class="form-control">
        <input type="submit" name="submit" value="Save">
    </form>
    <p>{{ form_response }}</p>
</template>

<script>
export default {
    name: "Admin",
    data(){
        return {
            body:'',
            title:'',
            form_response: '',
        }
    },
    methods: {
        send() {
            axios.post('/create-post', {
                title: this.title,
                body: this.body,
                author_id: this.$page.props.auth.user.id
            })
            .then((response) => {
                this.form_response = 'Post saved';
                this.body = '';
                this.title = '';
            })
            .catch((error) => {
                this.form_response = error;
            });
        }
    }
}
</script>

