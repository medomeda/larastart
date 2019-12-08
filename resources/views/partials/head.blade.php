<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
<!-- CSRF Token-->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title','Boom') - {{ config('app.name') }} </title>

<!-- load bootstrap from a cdn -->
<!-- Latest compiled and minified CSS
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
-->
<link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
