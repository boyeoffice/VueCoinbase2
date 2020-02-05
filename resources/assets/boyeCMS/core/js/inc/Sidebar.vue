<template lang="html">
  <aside class="main-sidebar">
    <section class="sidebar" style="height: auto">
      <div class="user-panel">
        <div class="pull-left image">
          <img v-if="profile.avatar === null" src="/adcom/img/default.png" class="img-circle" alt="User Image">
          <img v-else src="" class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info">
          <p>Olakunle Boye</p>
          <a href="javascript:void(0)">
            <i class="fa fa-circle text-success"></i>
            Online
          </a>
          <a href="javascript:void(0)" @click="logout">
            <i class="fa fa-power-off text-warning"></i>
            Logout
          </a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <router-link to="/" tag="li">
          <a>
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </router-link>
        <router-link :to="{ name: 'Users', params: {} }" tag="li">
          <a>
            <i class="fa fa-users"></i>
            <span>Users</span>
          </a>
        </router-link>
        <router-link :to="{ name: 'Posts', params: {} }" tag="li">
          <a>
            <i class="fa fa-file-word-o"></i>
            <span>Posts</span>
          </a>
        </router-link>
        <router-link :to="{ name: 'Pages', params: {} }" tag="li">
          <a>
            <i class="fa fa-file-text-o"></i>
            <span>Pages</span>
          </a>
        </router-link>
        <router-link :to="{ name: 'Category', params: {} }" tag="li">
          <a>
            <i class="fa fa-file-text-o"></i>
            <span>Category</span>
          </a>
        </router-link>
        <router-link :to="{ name: 'Tag', params: {} }" tag="li">
          <a>
            <i class="fa fa-file-text-o"></i>
            <span>Tag</span>
          </a>
        </router-link>
        <li class="treeview">
          <a href="javascript:void(0)">
            <i class="fa fa-cog"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <router-link :to="{name: 'General', params: {}}" tag="li">
              <a>General</a>
            </router-link>
          </ul>
        </li>
        <router-link :to="{ name: 'Update', params: {} }" tag="li">
          <a>
            <i class="fa fa-upload"></i>
            <span>Update</span>
          </a>
        </router-link>
      </ul>
    </section>
  </aside>
</template>

<script>
  import { mapGetters } from 'vuex'
export default {
  computed: 
  mapGetters(['profile']),
  methods: {
    logout(){
      axios.post('/adcom-json/logout').then(res => {
        window.location = '/'
      })
    }
  }
}
</script>

<style lang="css">
</style>
