<template>
    <div class="container-fluid">
        <h4 class="text-center">Add Nisab</h4>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="addBook">
                    <div class="form-group">
                        <label>Nisab</label>
                        <input type="Number" class="form-control" v-model.number="nisab.nisab">
                    </div><br>
                    <div class="form-group">
                        <label>content</label>
                        <input type="text" class="form-control" v-model="nisab.statement">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Add Nisab</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
        nisab: {}
        }
    },
    methods: {
        addBook() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/nisabs/add', this.nisab)
                    .then(response => {
                        this.$router.push({name: 'nisabs'})
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
