<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UFRépartition - @yield('title')</title>

    <!-- Fonts -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Lato|Open+Sans|PT+Sans|Ubuntu') }}" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/Bootstrap.css') }}">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}"
          rel="stylesheet">

    @yield('css')

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
@if(Auth::user())
    @if(Session::get('type') == 'repartiteur')
        <?php $top_menu_selected = '0' ?>
        @include('layouts.RepLayouts._TopMenuRep')
    @elseif(Session::get('type') == "enseignant")
        <?php $top_menu_selected = '0' ?>
        @include('layouts.EnsLayouts._leftBar')
        @include('layouts.EnsLayouts._TopMenuEns')
    @endif
@endif

<div class="container-fluid">
    <div class="row">
        <div class="mainContent">
            @if(Session::get('type') == 'repartiteur')
                <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-1">
                    @yield('content')
                </div>
            @elseif(Session::get('type') == "enseignant")
                <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-2">
                    @yield('content')
                </div>
            @else
                @yield('content')
            @endif

        </div>
    </div>
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/JQuery.js') }}"></script>
<script src="{{ asset('js/Message.js') }}"></script>
@yield('script')


</html>
