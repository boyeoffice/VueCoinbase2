<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boyecms</title>

     <link rel="stylesheet" href="{{mix('dist/css/main.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
     window.User = {!! Auth::user() !!}
    </script>
  </head>
  <body class="skin-purple sidebar-mini">
    <div id="cp" class="">
    </div>
    <script src="{{mix('dist/js/vendor.js')}}"></script>
    <script src="{{asset('dist/js/boyecms.js')}}"></script>
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script> 
  </body>
</html>
