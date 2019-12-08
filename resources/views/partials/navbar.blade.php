<!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-static-topp" style="margin-bottom: 0px; border: 0px;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li @if(Request::is("commentcamarche")) class="active" @endif><a href="/commentcamarche">Comment ça marche</a></li>
                <li @if(Request::is("apropos")) class="active" @endif><a href="/apropos">A propos</a></li>
                <li @if(Request::is("contact")) class="active" @endif><a href="/contact">Contact</a></li>
                @if( Auth::check() )

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Inbox</a></li>
                            <li><a href="#">Drafts</a></li>
                            <li><a href="#">Sent Items</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('logout') }}">Se deconnecter</a></li>
                        </ul>
                    </li>
                @else
                    <li @if(Request::is("login")) class="active" @endif><a href="/login" >Se connecter</a></li>
                    <li @if(Request::is("register")) class="active" @endif><a href="/register">S'inscrire</a></li>
                @endif
                <button class="btn btn-sm btn-danger navbar-btn">Déposer une annonce</button>
            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>

