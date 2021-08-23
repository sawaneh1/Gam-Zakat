<template>
    <div>
        <h4 class="text-center">All blog</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Rates</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="blog in blogs" :key="blog.id">
                <td>{{ blog.id }}</td>
                <td>{{ blog.title }}</td>
                <td>{{ blog.text }}</td>
               
                <td>{{ blog.created_at }}</td>
                <td>{{ blog.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editblog', params: { id: blog.id }}" class="btn btn-primary">Edit blog
                        </router-link>
                        <button class="btn btn-danger" @click="deleteblog(blog.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/blogs/add')">Add blog</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            blogs: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/blogs')
                .then(response => {
                    this.blogs = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteblog(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/blogs/delete/${id}`)
                    .then(response => {
                        let i = this.blogs.map(item => item.id).indexOf(id); // find index of your object
                        this.blogs.splice(i, 1)
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
