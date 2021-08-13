<template>
    <div>
        <h4 class="text-center">All zakatitems</h4><br/>
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
            <tr v-for="zakatitem in zakatitems" :key="zakatitem.id">
                <td>{{ zakatitem.id }}</td>
                <td>{{ zakatitem.name }}</td>
                <td>{{ zakatitem.rate }}</td>
                <td>{{ zakatitem.category}}</td>
                <td>{{ zakatitem.created_at }}</td>
                <td>{{ zakatitem.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editzakatitem', params: { id: zakatitem.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletezakatitem(zakatitem.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/zakatitems/add')">Add zakatitem</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            zakatitems: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/zakatitems')
                .then(response => {
                    this.zakatitems = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deletezakatitem(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/zakatitems/delete/${id}`)
                    .then(response => {
                        let i = this.zakatitems.map(item => item.id).indexOf(id); // find index of your object
                        this.zakatitems.splice(i, 1)
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
