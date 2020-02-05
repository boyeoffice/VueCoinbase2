<template lang="html">
  <header class="main-header">
    <router-link :to="{ name: '', params: {} }" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Boye</b>CMS</span>
    </router-link>
    <nav class="navbar navbar-static-top">
      <a href="javascript:void(0)" @click="sidebarClick" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom">
        <ul class="nav navbar-nav">
          <li class="dropdown message-menu"></li>
          <li class="dropdow notification-menu"></li>
          <li class="dropdown tasks-menu"></li>
          <li class="dropdown user user-menu"></li>
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  data(){
    return{
      screenSizes: {
        xs: 480,
        sm: 768,
        md: 992,
        lg: 1200
      }
    }
  },
  methods: {
    sidebarClick(){
          //Enable sidebar push menu
            if ($(window).width() > (this.screenSizes.sm - 1)) {
              if ($("body").hasClass('sidebar-collapse')) {
                $("body").removeClass('sidebar-collapse').trigger('expanded.pushMenu');
              } else {
                $("body").addClass('sidebar-collapse').trigger('collapsed.pushMenu');
              }
            }
            //Handle sidebar push menu for small screens
            else {
              if ($("body").hasClass('sidebar-open')) {
                $("body").removeClass('sidebar-open').removeClass('sidebar-collapse').trigger('collapsed.pushMenu');
              } else {
                $("body").addClass('sidebar-open').trigger('expanded.pushMenu');
              }
            }
    }
  }
}
</script>

<style lang="css">
</style>
