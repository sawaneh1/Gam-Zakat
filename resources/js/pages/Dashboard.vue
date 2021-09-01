<template>
<div class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/avatar.png" alt="Gamzakat" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="Gamzakat" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GamZakat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">  Salam {{ name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
        
            <li class="nav-item">
    
             <router-link to="/zakatitems" class="nav-link"><i class="nav-icon fas fa-th"></i>
               Zakat items
              </router-link>
            
          </li>
            <!-- <li class="nav-item">
    
             <router-link to="/dashboard" class="nav-link"><i class="nav-icon fas fa-th"></i>
               Mosques
              </router-link>
            
          </li> -->
            <li class="nav-item">
    
             <router-link to="/zakat-requests" class="nav-link"><i class="nav-icon fas fa-th"></i>
              zakat Requests
              </router-link>
            
          </li>
            <li class="nav-item">
    
             <router-link to="/donations" class="nav-link"><i class="nav-icon fas fa-th"></i>
               Donations
              </router-link>
            
          </li>
            <li class="nav-item">
    
             <router-link to="/blogs" class="nav-link"><i class="nav-icon fas fa-th"></i>
               Zakat info-blog
              </router-link>
            
          </li>
          <li class="nav-item">
    
             <router-link to="/nisabs" class="nav-link"><i class="nav-icon fas fa-th"></i>
                 Nisab
              </router-link>
            
          </li>
           <li class="nav-item">
    
             <router-link to="/faqs" class="nav-link"><i class="nav-icon fas fa-th"></i>
                 Faqs
              </router-link>
            
          </li>
         
          
                  
        </ul>
<router-view/>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{zakatitems.length}}</h3>

                <p>Zakat items</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{donations.length}}<sup style="font-size: 20px"></sup></h3>

                <p>Donations</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
           <router-link to="/donations" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i>
               more info
              </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner" v-for="nisab in nisabs" :key="nisab">
                <h3>{{nisab.nisab}}</h3>

                <p>is{{nisab.statement}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{zakatRequests.length}}</h3>

                <p>Donation Requests</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
               <router-link to="/donations" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i>
               more info
              </router-link>
             
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
      </div>
        </section>
      </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 GamZAkat.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Suprem Islamic Coucil</b> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
</div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            name: null,
            zakatRequests:[],
            donations: [],
            zakatitems:[],
            nisabs:[]

        }
    },
     mounted() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/zakat-requests')
                .then(response => {
                    this.zakatRequests = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        }),
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/nisabs')
                .then(response => {
                    this.nisabs = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        }),
         this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/donations')
                .then(response => {
                    this.donations = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        }),
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
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
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
<style scoped>
.layout-fixed{
    margin-top: -5%;
}
</style>