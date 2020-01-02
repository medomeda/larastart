<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title','Bourse et Investissement')  -  {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('formations.index') }}">Formations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ratios.index') }}">Ratios</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('societes.index') }}">Sociétés</a>
                            </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('etudes.index') }}">Etudes</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.index') }}">Blog</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @admin
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">    
                                        Administration
                                    </a>
                                    @endadmin

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            
            <div class="container">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}  
                    </div>
                @endif
            </div>

            @yield('content')

        </main>
        <footer>
            <div class="container">
               <div class="row">
                   <div class="col-lg-6">
                        <h3>BrvmInvest</h3>
                        <p>Apprendre l'investissement boursier par la pratiques !</p>
                        <div class="social-icons">
                            <span><a href="https://parlonscode.com/facebook" target="_blank"><i class="fab fa-facebook fa-2x"></i></a></span>
                            <span><a href="https://parlonscode.com/twitter" target="_blank"><i class="fab fa-twitter fa-2x"></i></a></span>
                            <span><a href="https://parlonscode.com/youtube" target="_blank"><i class="fab fa-youtube fa-2x"></i></a></span>
                        </div>
                   </div>
                   <div class="col-lg-3">
                        <h3>Liens utiles</h3>
                        <ul>
                            <li><a class="go-to-courses" href="https://parlonscode.com?show_courses=1">Formations</a></li>
                            <li><a href="https://parlonscode.com/podcasts">Podcasts</a></li>
                            <li><a href="https://parlonscode.com/books">Livres &amp; Ebooks</a></li>
                            <li><a href="https://parlonscode.com/contact">Support Technique</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Autres</h3>
                        <ul>
                            <li>A propos</li>
                            <li>Contact</li>
                            <li>Politique de confidentialité</li>
                            <li>Condition d'utilisation</li>
                        </ul>
                    </div>
               </div>
               <hr>
               <div id="newsletter-form">
                    <h4>Recevez toute l'actualité du site dans votre boîte mail !</h4>
                    <form action="/action_page.php">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" placeholder="Enter email" id="email">
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary"> <span class="fa fa-envelope"></span> S'abonner à la newsletter</button>
                                </div>
                            </div>
                        </div>
                    </form> 
               </div>
               <p class="copyright">
                    Conçu avec <i class="fa fa-heart" style="color: pink;"></i> et beaucoup de <i class="fa fa-coffee" style="color: #ccc;"></i> sur Jupiter &middot; &copy; Copyright 2017 &dash; 2019. Tous Droits Réservés.
                </p>
            </div>
        </footer>
    </div>
     <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>-->

    <script src="{{ asset('js/app.js') }}" defer></script>

     @yield('scripts')
</body>
</html>
