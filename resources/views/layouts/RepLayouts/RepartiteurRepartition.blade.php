@extends('layouts.mainLayout')

@section('title', 'Session actuelle')

@section('content')
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Session</span> - Session actuelle</h3>
                </div>
            </div>
        </div>

        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12 ">
                        <table id="example" class="compact" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Code UE</th>
                                <th>Choisit N° Fois</th>
                                <th>Enseignant</th>
                                <th>Delta</th>
                                <th>Type</th>
                                <th>Nb HTD</th>
                                <th>Déjà Enseigner</th>
                                <th class="last">
                                    <div>Décision</div>
                                </th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Code UE</th>
                                <th>Choisit N° Fois</th>
                                <th>Enseignant</th>
                                <th>Delta</th>
                                <th>Type</th>
                                <th>Nb HTD</th>
                                <th>Déjà Enseigner</th>
                                <th class="last">
                                    <div>Décision</div>
                                </th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach ($data as $element)
                                <tr @if (strtolower($element->decision) == "accepted" || strtolower($element->decision) == "rejected") class="{{strtolower($element->decision)}}" @endif >
                                    <td><a class="ueinfo">{{$element->codeue}}</a></td>
                                    <td>{{$element->cnt}}</td>
                                    <td><a href="/fichePersoRep/{{$element->ensid}}" target="_blank">{{$element->nom}}</a></td>
                                    <td>{{$element->delta}}</td>
                                    <td>{{$element->type2}}</td>
                                    <td>00,00</td>
                                    <td>Non</td>

                                    <td class="last">
                                        <div class="info">
                                            <button title="Commentaire"></button>
                                            <button title='Valider le choix'></button>
                                            <button title="Supprimer le choix"></button>
                                            <input type="hidden" class='ensid' value="{{$element->id}}">
                                        </div>
                                        <div class="info_other">
                                            <input type="hidden" class='ueid' value="{{$element->ueid}}">
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                        <div class="row">

                            <div class="col-md-1 col-md-offset-1">
                                <a type="button" class="btn btn-default cut">
                                    Fermer la session
                                </a>
                            </div>
                            <div class="col-md-1 col-md-offset-1">
                                <a type="button" class="btn btn-default valider" id="cdo">
                                    Valider
                                </a>

                            </div>
                            <div class="col-md-1 col-md-offset-1">
                                <a type="button" class="btn btn-default reset">
                                    Réinitialiser
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection


@section('script')
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/Script.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

@endsection

@section('css')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
@endsection