<template>
    <div class="container-fluid">
        <h4 class="text-center">All Faq</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>QUESTION</th>
                <th>ANSWER</th>
                
                
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="faq in faqs" :key="faq.id">
                <td>{{ faq.id }}</td>
                <td>{{ faq.question }}</td>
                <td>{{ faq.answer }}</td>
               
               
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editfaq', params: { id: faq.id }}" class="btn btn-sm btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger btn-sm" @click="deletefaq(faq.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/faqs/add')">Add faq</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            faqs: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/faqs')
                .then(response => {
                    this.faqs = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deletefaq(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/faqs/delete/${id}`)
                    .then(response => {
                        let i = this.faqs.map(item => item.id).indexOf(id); // find index of your object
                        this.faqs.splice(i, 1)
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
