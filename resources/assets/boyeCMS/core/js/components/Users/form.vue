<template>
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">{{ title }}</h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button class=" btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">Options <span class="caret"></span></button>
							<ul class="dropdown-menu dropdown-menu-arrow pull-right">
								<li><a href="javascript:void(0)" v-on:click="showField = false">Hide password field</a></li>
								<li><a href="javascript:void(0)" v-on:click="showField = true">Show password field</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="box-body">
					<form action="" class="form-horizontal">
						<div :class="{'form-group': true, 'has-error': errors.name}">
							<label for="" class="col-lg-4">Full Name <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Full Name"></i></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" v-model="form.name">
							</div>
						</div>
						<div :class="{'form-group': true, 'has-error': errors.username}">
							<label for="" class=" col-lg-4">Username <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Username"></i></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" v-model="form.username">
							</div>
						</div>
						<div :class="{'form-group': true, 'has-error': errors.email}">
							<label for="" class=" col-lg-4">Email <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Email"></i></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" v-model="form.email">
							</div>
						</div>
						<div v-show="showField" :class="{'form-group': true, 'has-error': errors.password}">
							<label for="" class=" col-lg-4">Password <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Password"></i></label>
							<div class="col-lg-8">
								<input type="password" class="form-control" v-model="form.password">
							</div>
						</div>
						<div v-show="showField" :class="{'form-group': true, 'has-error': errors.password}">
							<label for="" class=" col-lg-4">Repeat Password <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Repeat Password"></i></label>
							<div class="col-lg-8">
								<input type="password" class="form-control" v-model="form.password_confirmation"> 
							</div>
						</div>
					</form>
				</div>
				<div class="box-footer">
					<div class="form-group pull-left" style="margin-bottom: 0px;">
						<router-link to="/users" class="btn btn-default">Cancel</router-link>
					</div>
					<div class="form-group pull-right" style="margin-bottom: 0px;">
						<button class="btn btn-danger" v-if="showButton" v-on:click="clearForm">Clear</button>
						<button class="btn btn-danger" v-else v-on:click="deleteUser">Delete</button>
						<button class="btn btn-primary" v-if="isSaving" disabled><i class="fa fa-circle-o-notch fa-spin"></i></button>
						<button class="btn btn-primary" v-else v-on:click="Save">Save</button>
					</div>
				</div>
			   </div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</section>
</template>

<script>
	export default {
		data(){
			return {
				form: {},
				title: 'Create New User',
				errors: {},
				store: '/adcom-json/users',
				method: 'post',
				initialize: '/users',
				showField: true,
				isSaving: false,
				showButton: true
			}
		},
		mounted: function(){
			if(this.$route.meta.mode === 'edit'){
				this.store = '/adcom-json/users/' + this.$route.params.id
				this.initialize = '/adcom-json/users/' + this.$route.params.id + '/edit'
				this.method = 'patch'
				this.showField = false
				this.title = 'Edit User'
				this.showButton = false
				this.fetchData()
			}
		},
		methods: {
			Save: function() {
				this.isSaving = true
				this.form.edit_password = this.showField
				axios[this.method](this.store, this.form).then(res => {
					this.isSaving = false
					this.$router.push('/users')
				}).catch(err => {
					this.isSaving = false
					this.errors = err.response.data.errors
				})
			},
			fetchData: function(){
				axios.get(this.initialize).then(res => {
					this.form = res.data
				})
			},
			deleteUser: function(){
				axios.delete(this.store).then(res => {
					this.$router.push('/users')
				})
			},
			clearForm: function() {
				this.form = {}
			}
		}
	}
</script>