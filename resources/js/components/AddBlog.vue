<template>
    <div class="blog">
        <h4 class="text-center">Add Blog</h4>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="addBlog">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="blog.title">
                    </div><br>
                    <div class="form-group">
                        <label>content</label>
                        
                        <textarea rows="10" cols="80" class="form-control" v-model="blog.text"></textarea>

                    </div><br>
                    <button type="submit" class="btn btn-primary">Add blog</button>
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
    methods: {
        addBlog() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/blogs/add', this.blog)
                    .then(response => {
                        this.$router.push({name: 'blogs'})
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