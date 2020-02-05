<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Adcomfort Nigeria</title>
	<link rel="stylesheet" href="{{asset('themes/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/auth.css')}}">
	 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}"></script>
	
</head>
<body class="OLAKUNLE BOYE">
	<div class="container mx-auto" id="root">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
				<div class="auth mr-b">
					<div class="title center-xs">
						<h2 class="">adcomfort</h2>
					    <small class="">nigeria</small>
					</div>
					<div class="panel panel-body">
						<form @submit.prevent="signIn">
							<div :class="{'form-group': true, 'has-error': errors.email}">
								<label for="email">Email</label>
								<input type="email" class="form-control" v-model="form.email" placeholder="Email">
								<span class="has-feedback text-red" v-if="errors.email">Please choose a email</span>
							</div>
							<div :class="{'form-group': true, 'has-error': errors.password}">
								<label for="password">Password</label>
								<input type="password" v-model="form.password" class="form-control" placeholder="************">
								<span class="has-feedback text-red" v-if=" errors.password">Please choose a password</span>
							</div>
							<button class="btn btn-primary btn-block">Sign In</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		new Vue({
			el: '#root',
			data: {
				form: {},
				errors: {}
			},
			methods: {
				signIn: function() {
					axios.post('login', this.form).then(res => {
						window.location = '/cp'
					}).catch(err => {
						this.errors = err.response.data.errors
					})
				}
			}
		})
	</script>
</body>
</html>