<template>
<div>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <!-- for logged-in user-->
                <div class="navbar-nav" v-if="isLoggedIn">
                    <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                    <!-- <router-link to="/donationss" class="nav-item nav-link">Books</router-link> -->
                    <router-link to="/blogs" class="nav-item nav-link">Books</router-link>

                    <router-link to="/nisabs" class="nav-item nav-link">Nisabs</router-link>

                    <router-link to="/faqs" class="nav-item nav-link">Faqs</router-link>

                    <router-link to="/donations" class="nav-item nav-link">Donations</router-link>

                    <router-link to="/Zakat-requests" class="nav-item nav-link">Zakat Requests</router-link>

                    <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
                </div>
                <!-- for non-logged user-->
                <div class="navbar-nav" v-else>
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/login" class="nav-item nav-link">login</router-link>
                    <router-link to="/register" class="nav-item nav-link">Register </router-link>
                    
                </div>
            </div>
        </nav>
<router-view/>
</div>

</template>

<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    },
    methods: {
        logout(e) {
            console.log('ss')
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
</script>
