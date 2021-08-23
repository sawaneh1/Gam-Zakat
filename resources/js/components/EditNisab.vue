<template>
    <div>
        <h4 class="text-center">Edit Nisab</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateNisab">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="nisab.nisab">
                    </div><br>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" class="form-control" v-model="nisab.statement">
                    </div><br>
                    <button type="submit" class="btn btn-primary">update Nisab</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nisab:{}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/nisabs/edit/${this.$route.params.id}`)
                .then(response => {
                    this.nisab = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateNisab() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/nisabs/update/${this.$route.params.id}`, this.nisab)
                    .then(response => {
                        this.$router.push({name: 'nisabs'});
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

