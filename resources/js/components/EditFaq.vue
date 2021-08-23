<template>
    <div>
        <h4 class="text-center">Edit faq</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateFaq">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="faq.title">
                    </div><br>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" class="form-control" v-model="faq.text">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Update faq</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            faq: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/faqs/edit/${this.$route.params.id}`)
                .then(response => {
                    this.faq = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateFaq() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/faqs/update/${this.$route.params.id}`, this.faq)
                    .then(response => {
                        this.$router.push({name: 'faqs'});
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
