<template>
    <div>
        <h4 class="text-center">Edit zakatitem</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateZakatItem">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="zakatitem.name">
                    </div><br>
                    <div class="form-group">
                        <label>rate</label>
                        <input type="number" class="form-control" v-model="zakatitem.rate">
                    </div><br>
                    <div class="form-group">
                        <label>category</label>
                        <input type="text" class="form-control" v-model="zakatitem.category">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Update zakatitem</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            zakatitem: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/zakatitems/edit/${this.$route.params.id}`)
                .then(response => {
                    this.zakatitem = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateZakatItem() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/zakatitems/update/${this.$route.params.id}`, this.zakatitem)
                    .then(response => {
                        this.$router.push({name: 'zakatitems'});
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
