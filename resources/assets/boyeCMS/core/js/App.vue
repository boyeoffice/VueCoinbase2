<template>
  <div class="wrapper">
    <navbar></navbar>
    <sidebar></sidebar>
    <div class="content-wrapper">
      <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
     </section>
      <transition name="page" mode="out-in">
        <router-view></router-view>
      </transition>
    </div>
    <main-footer></main-footer>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import Navbar from './inc/Navbar.vue'
import Sidebar from './inc/Sidebar.vue'
import MainFooter from './inc/Footer.vue'
  export default {
    components: {
      Navbar,
      Sidebar,
      MainFooter
    },
    computed: 
      mapGetters(['profile', 'update']),
    mounted(){
      this.fetchUser()
    },
    methods: {
      ...mapActions(['storeProfile', 'storeUpdate']),
      fetchUser(){
        axios.get('/adcom-json/user').then(res => {
          this.storeProfile(res.data)
          this.fetchData()
        })
      },
      fetchData(){
        axios.get('/local/update.json').then(res => {
          this.storeUpdate(res.data)
        })
      }
    }
  }
</script>

<style>
</style>
