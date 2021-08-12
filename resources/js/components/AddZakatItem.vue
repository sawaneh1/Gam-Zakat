<template>
    <div>
        <h4 class="text-center">Add zakat Item</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addZakatItem">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="zakatitem.name">
                    </div><br>
                    <div class="form-group">
                        <label>rate</label>
                        <input type="number" class="form-control" v-model="zakatitem.rate">
                    </div><br>
                    <div class="form-group">
                        <label>categoty</label>
                        <input type="text" class="form-control" v-model="zakatitem.category">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Add zakat item</button>
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
    methods: {
        addZakatItem() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/zakatitems/add', this.zakatitem)
                    .then(response => {
                        this.$router.push({name: 'zakatitems'})
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
