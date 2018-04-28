@extends('layouts.mainLayout')

@section('title', 'Login')

@section('css')
@endsection

<div class="col-xs-1 col-sm-2 col-md-2 visible-lg visible-md visible-sm leftBarLogin">

</div>

<div class="col-xs-12 visible-xs mobilebg topBar">

</div>

@section('content')
    <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-3">
        <center><img src="img/Logo.jpg" class="img_login"></center>
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Authentification</span></h3>
                </div>
            </div>
        </div>
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Identifiant Labri:</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Mot de passe:</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password"
                                           required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="" id="hidden">
                                <div class="row">
                                    <div class="col-md-6 pull-right">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default">
                                                Se connecter
                                            </button>
                                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                                mot de passe oublié
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection