<template>
    <div class="container-fluid">
        <h4 class="text-center">All blog</h4><br/>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Text</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="blog in blogs" :key="blog.id">
                <td>{{ blog.id }}</td>
                <td>{{ blog.title }}</td>
                <td>{{ blog.text }}</td>
               
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editblog', params: { id: blog.id }}" class="btn btn-primary btn-sm">Edit
                        </router-link>
                      <button class="btn btn-danger btn-sm" @click="deleteblog(blog.id)">Delete</button>
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
