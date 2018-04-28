<div class="border-top"></div>
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button>
        <a class="navbar-brand" href="{{url('/')}}"><img src="/img/Logo.jpg" height="60px"></a></center>

    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li @if ($top_menu_selected == '1') class="dropdown active" @else class="dropdown" @endif>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true"
                   aria-expanded="false">Profile <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('/profil')}}">Informations personnelles</a></li>
                    <li><a href="{{url('/historiquePersonnel')}}">Historique des enseignements</a></li>
                </ul>
            </li>
            <li @if ($top_menu_selected == '2') class="dropdown active" @else class="dropdown" @endif>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true"
                   aria-expanded="false">Session<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('/DemarrerSessions')}}">Démarrer une session</a></li>
                    <li @if ($top_menu_selected == '2') class="dropdown active" @else class="dropdown" @endif>
                        <a href="{{url('/Repartition')}}">Session actuelle</a></li>


                </ul>
            </li>
            <li @if ($top_menu_selected == '3') class="dropdown active" @else class="dropdown" @endif>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true"
                   aria-expanded="false">Rechercher <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/listeUERep') }}">Rechercher par UE</a></li>
                    <li><a href="{{ url('/listePersoRep') }}">Rechercher par Enseignant</a></li>
                    <li><a href="{{ url('/AjoutUe') }}">Ajouter une UE</a></li>
                    <li><a href="{{ url('/AjoutEns') }}">Ajouter un Enseignant</a></li>
                </ul>
            </li>
            <li @if ($top_menu_selected == '5') class="dropdown active" @else class="dropdown" @endif>
                <a href="{{url('/MessagePage')}}">Messages <span class="badge">@if (Session::get('messages')){{Session::get('messages')}}@endif</span></a>

            </li>
            <li @if ($top_menu_selected == '6') class="dropdown active" @else class="dropdown" @endif>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true"
                   aria-expanded="false">Changer de Mode<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/change') }}">Enseignant</a></li>
                    <li><a href="#">Administrateur</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ url('/logout') }}" id='logout'
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Se Déconnecter
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </ul>

    </div>
</nav>

