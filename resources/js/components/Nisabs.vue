<template>
    <div class="container-fluid">
        <h4 class="text-center">All nisab</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nisab</th>
               
                <th>Statement</th>
               
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="nisab in nisabs" :key="nisab.id">
                <td>{{ nisab.id }}</td>
                <td>{{ nisab.nisab }}</td>
                <td>{{ nisab.statement }}</td>
               
                <td>{{ nisab.created_at }}</td>
                <td>{{ nisab.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editnisab', params: { id: nisab.id }}" class="btn btn-sm btn-primary">Edit nisab
                        </router-link>
                        <button class="btn btn-danger btn-sm" @click="deletenisab(nisab.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-success" @click="this.$router.push('/nisabs/add')">Add nisab</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nisabs: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/nisabs')
                .then(response => {
                    this.nisabs = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deletenisab(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/nisabs/delete/${id}`)
                    .then(response => {
                        let i = this.nisabs.map(item => item.id).indexOf(id); // find index of your object
                        this.nisabs.splice(i, 1)
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
