<template>
    <div class="container-fluid">
        <h4 class="text-center">Add faq</h4>
        <div class="row container-fluid">
            <div class="alert-success text-center" v-if="loading">adding faq.......</div>
            <div class="col-md-12">
                <form @submit.prevent="addFaq">
                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" class="form-control" v-model="faq.question">
                    </div><br>
                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" class="form-control" v-model="faq.answer">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Add faq</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            faq: {},
            loading: false
        }
    },
    methods: {
        addFaq() {
            this.loading = true
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/faqs/add', this.faq)
                    .then(response => {
                        this.$router.push({name: 'faqs'})
                        
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
