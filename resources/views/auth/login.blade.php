<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adcomfort Nigeria</title>
    <link rel="stylesheet" href="{{ mix('adcom/css/app.css') }}">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="OLAKUNLE BOYE">
    <div id="root" class="login-page">
        <div class="container">
            <div class="wrapper">
                <div class="row justify-content-sm-center">
                    <div class="col-md-5">
                        <div class="card">
                         <div class="card-body">
                         <form @submit.prevent="signIn">
                            <div class="adcom-logo">
                                <a href="{{ url('/') }}"><img class="img img-responsive" src="{{ asset('adcom/img/logo.png') }}" alt="Adcomfort Nigeria"></a>
                            </div>
                            <div class="login-form">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" v-model="form.email">
                                    <span class="has-error">Please enter email</span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" v-model="form.password">
                                    <span class="has-error">Please enter password</span>
                                </div>
                                <div class="form-group">
                                    <button v-if="isLoading" class="btn btn-primary btn-block" disabled=""><i class="fa fa-spinner fa-spin"></i> PLEASE WAIT...</button>
                                    <button v-else class="btn btn-primary btn-block">SIGN IN</button>
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>
                        </form>
                    </div>
                  </div>
                  <footer class="login-footer">
                    <div class="pull-right">
                        &copy; 2018 Design by 
                        <a href="#" class="footer-link">CodeHub</a>
                    </div>
                    <div class="pull-left">
                        <a href="#" class="footer-link">Adcomfort</a>
                    </div>
                  </footer>
                </div>

            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        new Vue({
            el: '#root',
            data: {
                form: {},
                errors: {},
                isLoading: false
            },
            methods: {
                signIn: function() {
                    this.isLoading = true
                    axios.post('login', this.form).then(res => {
                        if( res.status === 200 ) {
                            this.isLoading = false
                            window.location = '{{ url('cp') }}'
                        }
                    }).catch(err => {
                        this.isLoading = false
                        this.errors = err.response.data.errors
                    })
                }
            }
        })
    </script>
</body>
</html>