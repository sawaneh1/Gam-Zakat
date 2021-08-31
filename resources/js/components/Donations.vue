<template>
    <div class="container-fluid">
        <h4 class="text-center">All donations</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>PHONE</th>
                <th>Address</th>
                <th>DONATED At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="donation in donations" :key="donation.id">
                <td>{{ donation.id }}</td>
                <td>{{ donation.from }}</td>
                <td>{{ donation.phone }}</td>
                <td>{{ donation.address }}</td>
                <td>{{ donation.amount }}</td>
                <td>{{ donation.created_at }}</td>
    
                <td>
                    <div class="btn-group" role="group">
                        
                        <button class="btn btn-danger" @click="deletedonation(donation.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        
    </div>
</template>

<script>
export default {
    data() {
        return {
            donations: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/donations')
                .then(response => {
                    this.donations = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deletedonation(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/donations/delete/${id}`)
                    .then(response => {
                        let i = this.donations.map(item => item.id).indexOf(id); // find index of your object
                        this.donations.splice(i, 1)
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
