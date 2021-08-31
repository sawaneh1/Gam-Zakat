<template>
    <div class="blog">
        <h4 class="text-center">Edit Blog</h4>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="updateBook">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="blog.title">
                    </div><br>
                    <div class="form-group">
                        <label>Content</label>
                        <!-- <input type="text" class="form-control" v-model="blog.text"> -->
                        <textarea rows="10" cols="80" class="form-control" v-model="blog.text"></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Update Blog</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            blog: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/blogs/edit/${this.$route.params.id}`)
                .then(response => {
                    this.blog = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateBook() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/blogs/update/${this.$route.params.id}`, this.blog)
                    .then(response => {
                        this.$router.push({name: 'blogs'});
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
<style>
.blog{
    width:100vw !important;
    margin:auto;
    display:grid !important;
    place-items: center !important;
}

</style>