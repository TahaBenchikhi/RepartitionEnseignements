@extends('layouts.mainLayout')

@section('content')
    <div class="title simple">
        <div class="row">
            <div class="col-md-12">
                <h3><span class="semi-bold">Voeux</span> - Choisir mes voeux
                </h3>
            </div>
        </div>
    </div>
    <div class="grid simple">
        <div class="grid-body no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="progress">
                        <div id="theprogressbar" class="progress-bar progress-bar-striped active"
                             role="progressbar"
                             aria-valuemin="0" aria-valuemax="200">
                        </div>
                    </div>
                </div>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Cours magistrals :</div>
                                <div class="panel-body">
                                    <select data-placeholder="A:" class="chosen-select" multiple style="width:100%;"
                                            tabindex="4" name="CM[]">

                                        @if($data)
                                            @foreach($data as $item)

                                                @if($item->nbheuresCM)

                                                    <option @if($cm->contains('idue',$item->id)) selected="true"
                                                            @endif value="{{$item->id}}"
                                                            heures="{{$item->nbheuresCM}}">{{$item->codeue}}
                                                        | {{$item->libellelong}} | {{$item->nbheuresCM}}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Cours :</div>
                                <div class="panel-body">
                                    <select data-placeholder="A:" class="chosen-select" multiple style="width:100%;"
                                            tabindex="4" name="cours[]">

                                        @foreach($data as $item)
                                            @if($item->nbheuresCour)
                                                <option @if($cour->contains('idue',$item->id)) selected="true"
                                                        @endif value="{{$item->id}}"
                                                        heures="{{$item->nbheuresCour}}">{{$item->codeue}}
                                                    | {{$item->libellelong}} | {{$item->nbheuresCour}}
                                                </option>

                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Travaux dirigés :</div>
                                <div class="panel-body">
                                    <select data-placeholder="A:" class="chosen-select" multiple style="width:100%;"
                                            tabindex="4" name="TD[]">

                                        @foreach($data as $item)
                                            @if($item->nbheuresTD)

                                                <option @if($td->contains('idue',$item->id)) selected="true"
                                                        @endif value="{{$item->id}}"
                                                        heures="{{$item->nbheuresTD}}">{{$item->codeue}}
                                                    | {{$item->libellelong}} | {{$item->nbheuresTD}}
                                                </option>

                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Travaux dirigés sur machine :</div>
                                <div class="panel-body">

                                    <select data-placeholder="A:" class="chosen-select" multiple style="width:100%;"
                                            tabindex="4" name="TP[]">
                                        @foreach($data as $item)
                                            @if($item->nbheuresTP)

                                                <option @if($tp->contains('idue',$item->id)) selected="true"
                                                        @endif value="{{$item->id}}"
                                                        heures="{{$item->nbheuresTP}}">{{$item->codeue}}
                                                    | {{$item->libellelong}} | {{$item->nbheuresTP}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Stage :</div>
                                <div class="panel-body">

                                    <select data-placeholder="A:" class="chosen-select" multiple style="width:100%;"
                                            tabindex="4" name="stage[]">
                                        @foreach($data as $item)
                                            @if($item->nbheuresEStage)

                                                <option @if($stage->contains('idue',$item->id)) selected="true"
                                                        @endif value="{{$item->id}}"
                                                        heures="{{$item->nbheuresEStage}}">{{$item->codeue}}
                                                    | {{$item->libellelong}} | {{$item->nbheuresEStage}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Formation :</div>
                                <div class="panel-body">

                                    <select data-placeholder="A:" class="chosen-select" multiple style="width:100%;"
                                            tabindex="4" name="formation[]">
                                        @foreach($data as $item)
                                            @if($item->nbheuresAFormation)

                                                <option @if($formation->contains('idue',$item->id)) selected="true"
                                                        @endif value="{{$item->id}}"
                                                        heures="{{$item->nbheuresAFormation}}">{{$item->codeue}}
                                                    | {{$item->libellelong}} | {{$item->nbheuresAFormation}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 box_title">
                        Vous avez <span class="semi-bold">un commentaire? </span>
                    </div>
                    <div class="col-md-12">
                    <textarea id="text-editor" name="commentaire" placeholder="Enter text ..." class="form-control"
                              rows="3"
                              style="resize: none;"></textarea>
                    </div>
                    <div class="col-md-12 box_title">
                        <div class="row">
                            <div class="col-md-offset-10 col-md-1">
                                <input type="submit" value="Envoyer" class="btn btn-default" id="sub">
                                </input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/chosen.jquery.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Aucun résultats trouvé'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>
    <script src="{{ asset('js/voeux.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
@endsection




