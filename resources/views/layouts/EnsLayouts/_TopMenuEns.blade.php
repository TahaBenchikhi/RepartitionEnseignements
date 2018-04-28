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
        <a class="navbar-brand" href="{{url('/')}}"><img src="/img/Logo.jpg"></a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li @if ($top_menu_selected == '1') class="dropdown active" @else class="dropdown" @endif>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true"
                   aria-expanded="false">Profile <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/profil') }}">Informations personnelles</a></li>
                    <li><a href="{{ url('/historiquePersonnel') }}">Historique des enseignements</a></li>
                </ul>
            </li>
            @php

                $Cheking = \App\Session::where('annee_universitaire','like',date('Y'))->get();


            @endphp
            @if(!empty($Cheking->first()))
                @if(strtotime($Cheking[0]->datefin) > strtotime('now'))
                    <li @if ($top_menu_selected == '2') class="active" @endif ><a href="{{url('/Voeux')}}">Choisir mes
                            voeux</a></li>
                @endif
            @endif


            <li @if ($top_menu_selected == '3') class="dropdown active" @else class="dropdown" @endif>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true"
                   aria-expanded="false">Rechercher <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/listeUEEns') }}">Rechercher par UE</a></li>
                    <li><a href="{{ url('/listePersoEns') }}">Rechercher par Enseignant</a></li>
                </ul>
            </li>


            <li @if ($top_menu_selected == '4') class="active" @endif ><a href="{{url('/MessagePage')}}">
                    Messages <span class="badge">@if (Session::get('messages')){{Session::get('messages')}}@endif</span>
                </a></li>


            @if(Session::get('goback')==1)
                <li @if ($top_menu_selected == '6') class="dropdown active" @else class="dropdown" @endif>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true"
                       aria-expanded="false">Changer de Mode<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Enseignants</a></li>
                        <li><a href="{{ url('/change') }}">Administrateur</a></li>
                    </ul>
                </li>
            @endif
            <li>
                <a href="{{ url('/logout') }}"
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
