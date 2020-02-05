<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script>
         addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
            window.scrollTo(0, 1);
         }
      </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- =======================================================
        Theme Name: Adcomfort
        Theme URL: 
        Author: Olakunle Boye
        Author URL: 
    ======================================================= -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
   <link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Rokkitt|Yatra+One" rel="stylesheet"> 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="page-top" data-spy="scroll">
    <div id="app">
      <div class="header-outs" v-bind:style="{height: headerOuts + 'px'}">
          <header class="navbar">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
              <div class="navbar-header">
                  <a href="#" class="navbar-brand">Adcomfort</a>
              </div>
              <div class="navbar-toggle end-xs">
                  <a href="#" class="" v-on:click="navbarToggle()"><i class="fa fa-bars"></i></a>
              </div>
            </div>
            <div v-bind:class="{'collapse-nav col-xs-12 col-sm-8 col-md-8 col-lg-6 end-sm end-md end-lg': true, 'in': isActive}">
                <ul class="nav navbar-nav">
                    <li class="nav-link">
                        <a href="#">home</a>
                    </li>
                    <li class="nav-link">
                        <a href="#about">about</a>
                    </li>
                    <li class="nav-link">
                        <a href="#gallery">portfolio</a>
                    </li>
                    <li class="nav-link">
                        <a href="#services">services</a>
                    </li>
                    <li class="nav-link">
                        <a href="#contact">contact</a>
                    </li>
                </ul>
            </div>
            <div class="collapse-social col-xs-12 col-sm-4 col-md-3 col-lg-3 end-lg">
                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>
          </div>
        </div>
      </header>
      <div class="nav-adcomfort">
          <div class="container">
              <div class="nav-logo center-lg">
                    <img class="adcom-logo" src="{{ asset('img/ffddg.png')}}" alt="">
            </div>
              <div class="banner_social">
                  <ul class="its_social_list">
                    <li><a href="#" class="le_facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                    <li><a href="#" class="le_twitter"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#" class="le_whatsapp"><span class="fa fa-whatsapp"></span></a></li>
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div>
          <div class="slider">
              <div class="callbacks_container">
                  <ul id="slider4" class="rslides callbacks callbacks1">
                      <li id="callbacks1_s0">
                          <div class="slider-img">
                              <div class="container">
                                  <div class="slider-info">
                                      <h4>Property Development and 
                                        <br/>
                                      Management</h4>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <li id="callbacks1_s1">
                          <div class="container">
                              <div class="slider-info">
                                  <h4>Hydrographic Survey and <br/> Engineering</h4>
                              </div>
                          </div>
                      </li>
                      <li id="callbacks1_s1">
                          <div class="container">
                              <div class="slider-info">
                                  <h4>Architectural Drawing and <br/> Trainning</h4>
                              </div>
                          </div>
                      </li>
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
      </div>
      <div class="OLAKUNLE BOYE">
          @yield('content')
      </div>
      <footer>
        <div class="container">
          <div class="addrr-adcom">
            <div class="top-gap">
              <div class="header-side">
                <p>© 2018 Adcomfort Properties Limited All Rights Reserved | Design by <a href="#">Olakunle Boye</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/move-to-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/SmoothScroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/numscroller.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var defaults = {
          containerID: 'toTop',
          containerHoverID: 'toTopHover',
          scrollSpeed: 100,
          easingType: 'linear',
        };
        $().UItoTop({ easingType: 'easeOutQuart' });
      });
    </script>
  <a href="#home" id="toTop" class="stuoyal3w scroll stieliga" style="display: block;"> <span id="toTopHover" style="opacity: 0;"> </span></a>
  <script type="text/javascript">
      $(document).ready(function() {
        /*
          var defaults = {
          containerID: 'toTop', // fading element id
          containerHoverID: 'toTopHover', // fading element hover id
          scrollSpeed: 1200,
          easingType: 'linear' 
          };
        */
                    
        $().UItoTop({ easingType: 'easeOutQuart' });
                    
        });
    </script>
  <script type="text/javascript">
      jQuery(document).ready(function($) {
      $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });
      });
    </script>
    <script type="text/javascript">
      new Vue({
        el: '#app',
        data: {
          isActive: false
        },
        methods: {
          navbarToggle: function() {
            this.isActive = !this.isActive
          }
        },
        computed: {
          headerOuts: function() {
            return $(window).height()
          }
        }
      })
    </script>
    <script type="text/javascript" src="{{asset('/vendor/responsiveslides.min.js')}}"></script>
    <script type="text/javascript">
         // You can also use "$(window).load(function() {"
          $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager:false,
                nav:true,
                speed: 900,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
         
         });
      </script>
      
    @yield('scripts')
</body>
</html>
