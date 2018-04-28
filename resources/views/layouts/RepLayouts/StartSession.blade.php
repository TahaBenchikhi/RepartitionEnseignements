@extends('layouts.mainLayout')

@section('title', 'Démarrer une Session')

@section('content')
    <div class="title simple">
        <div class="row">
            <div class="col-md-12">
                <h3><span class="semi-bold">Session</span> - Démarrer une session</h3>
            </div>
        </div>
    </div>

    <div class="grid simple">
        <div class="grid-body no-border">
            <div class="row">
                <div class="col-md-12">

                    <form action="/Start" method="post" id="Start">
                    {{ csrf_field() }}

                        <div class="row" style="margin-top: 10px">
                            <div class="form-group">
                                <label for="usr">Titre:</label>
                                <input type="text" class="form-control" id="titre">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="form-group">
                                <label for="comment">Message:</label>
                                <textarea class="form-control" rows="5" id="context"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-3 col-xs-12 col-sm-offset-2 col-lg-offset-3 col-sm-4 col-md-3 col-lg-3 text-center picker1">
                                <h3><span class="semi-bold">Date</span> de début</h3>
                                <div id="debut" data-date="2017-03-01" data-date-format="yyyy-mm-dd"></div>
                                <input type="hidden" id="debut_value">
                            </div>

                            <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12 text-center picker2">
                                <h3><span class="semi-bold">Date</span> de fin</h3>
                                <div id="fin" data-date="2017-05-29" data-date-format="yyyy-mm-dd"></div>
                                <input type="hidden" id="fin_value">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="text-center">
                                <input type="submit" id="session_submit" class="btn btn-default reset"
                                       value="Démarrer la session"/>
                                <input type="text" id="envoie"  class="btn btn-success hidden"
                                       value=".......  Envoie en cours   ................................"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection


@section('script')
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/DemarrerSessions.js') }}"></script>

@endsection

@section('css')
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet"/>

@endsection