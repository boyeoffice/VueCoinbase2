<template lang="html">
  <div class="panel panel-default login-wrapper">
    <div class="panel-heading">
      <p class="logo">Boyecms</p>
      <p class="text">Sign in to start session</p>
    </div>
    <div class="panel-body">
      <form @submit.prevent="login">
        <div class="form-group">
          <label for="email" class="control-label">
            Email
            <sup>*</sup>
          </label>
          <input type="text" class="form-control" id="" placeholder="" v-model="form.email">
          <p class="help-block">Help text here.</p>
        </div>
        <div class="form-group">
          <label for="email" class="control-label">
            Password
            <sup>*</sup>
          </label>
          <input type="password" class="form-control" id="" placeholder="" v-model="form.password">
          <p class="help-block">Help text here.</p>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-theme">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      form:{},
      method: 'post'
    }
  },
  methods: {
    login(){
      axios[this.method]('/api/login', this.form).then(res => {
        alert('it working')
      })
    }
  }
}
</script>

<style lang="css">
</style>
