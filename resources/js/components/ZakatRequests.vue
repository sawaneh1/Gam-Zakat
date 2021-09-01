<template>
    <div class="container-fluid">
        <h4 class="text-center">All zakatRequests</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>PHONE</th>
                <th>Address</th>
                <th>reason</th>
                <th>Actions</th>
               
            </tr>
            </thead>
            <tbody>
            <tr v-for="zakatRequest in zakatRequests" :key="zakatRequest.id">
                <td>{{ zakatRequest.id }}</td>
                <td>{{ zakatRequest.name }}</td>
                <td>{{ zakatRequest.phone }}</td>
                <td>{{ zakatRequest.address }}</td>
                <td>{{ zakatRequest.reason }}</td>
        
                <td>
                    <div class="btn-group" role="group">
                        
                        <button class="btn btn-success" @click="deletezakatRequest(zakatRequest.id)">Approve Request</button>
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
            zakatRequests: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/zakat-requests')
                .then(response => {
                    this.zakatRequests = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deletezakatRequest(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/zakat-requests/delete/${id}`)
                    .then(response => {
                        let i = this.zakatRequests.map(item => item.id).indexOf(id); // find index of your object
                        this.zakatRequests.splice(i, 1)
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
