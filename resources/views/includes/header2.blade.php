<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/49bc342b2c.js" crossorigin='anonymous' type='text/javascript' defer></script>

<script defer src="{{ asset('template/js/script.js') }}"></script>

@hasSection('title')
    @yield('title')
@endif

@hasSection('style')
    @yield('style')
@endif
