@extends('layouts.mainLayout')

@section('title', 'Fiche de l\'UE')

@section('content')
    <div class="col-md-6">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Fiche de l'UE </span>
                        - @foreach($data as $element) {{$element->codeue}} @endforeach
                    </h3>
                </div>
            </div>
        </div>
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="compact" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Element</th>
                                <th>Information</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Element</th>
                                <th>Information</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($data as $datas)
                                <tr class="hidden">
                                    <th  class="modifiable" data-name="id">{{$datas->id}}</th>
                                    <th></th>
                                </tr>

                                <tr>
                                    <th>Semestre cal.</th>
                                    <th  class="modifiable" data-name="idsemestre" >{{$datas->semestre}}</th>
                                </tr>
                                <tr>
                                    <th>Code UE</th>
                                    <th class="modifiable"  data-name="codeue" >{{$datas->codeue}}</th>
                                </tr>

                                <tr>
                                    <th>Heures de TD</th>
                                    <th class="modifiable" data-name="nbheuresTD" >{{$datas->nbheuresTD}}</th>
                                </tr>
                                <tr>
                                    <th>Heures de Cours Intégré</th>
                                    <th class="modifiable" data-name="nbheuresCour" >{{$datas->nbheuresCour}}</th>
                                </tr>
                                <tr>
                                    <th>Heures de Tp</th>
                                    <th class="modifiable" data-name="nbheuresTP" >{{$datas->nbheuresTP}}</th>
                                </tr>
                                <tr>
                                    <th>Heures de Cours Magistraux</th>
                                    <th class="modifiable" data-name="nbheuresCM" >{{$datas->nbheuresCM}}</th>
                                </tr>
                                <tr>
                                    <th>Nombre des groupes</th>
                                    <th class="modifiable" data-name="groupe" >{{$datas->groupe}}</th>
                                </tr>
                                <tr>
                                    <th>Libellé long</th>
                                    <th class="modifiable" data-name="libellelong" >{{$datas->libellelong}}</th>
                                </tr>
                                <tr>
                                    <th>Libellé court</th>
                                    <th class="modifiable" data-name="libellecourt" >{{$datas->libellecourt}}</th>
                                </tr>
                                <tr>
                                    <th>Composante</th>
                                    <th class="modifiable" data-name="composante" >{{$datas->composante}}</th>
                                </tr>
                                <tr>
                                    <th>Département</th>
                                    <th class="modifiable" data-name="departement" >{{$datas->departement}}</th>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Commentaire </span></h3>
                </div>
            </div>
        </div>
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">

                        @foreach($data as $datas)
                            <textarea disabled="true" id="text-editor"
                                      class="form-control" rows="6" cols="2" width="100%">@if($datas->commentaireue){{$datas->commentaireue->commentaire}}@endif</textarea>
                        @endforeach
                        <br/>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Historiques </span>des enseignements</h3>
                </div>
            </div>
        </div>
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="compact" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Enseignant</th>
                                <th>Type de service</th>
                                <th>Année universitaire</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Enseignant</th>
                                <th>Type de service</th>
                                <th>Année universitaire</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($historique as $historiques)

                                <tr>
                                    <td>{{$historiques->enseignant->nom}}</td>
                                    <td>{{$historiques->type}}</td>
                                    <td>{{$historiques->session->annee_universitaire}}</td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Enseignants </span>qui ont choisit cette UE </h3>
                </div>
            </div>
        </div>
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example2" class="compact" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Enseignant</th>
                                <th>Type de service</th>
                                <th>Informations</th>

                            </tr>
                            </thead>

                            <tbody>

                            @foreach($repartition as $repartitions)

                                <tr>
                                    <td>{{$repartitions->enseignant->nom}}</td>
                                    <td>{{$repartitions->type}}</td>
                                    <td><a  target="_blank" href="/fichePersoEns/{{$repartitions->enseignant->id}}">Consulter sa Fiche</a></td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Enseignant</th>
                                <th>Type de service</th>
                                <th>Informations</th>

                            </tr>
                            </tfoot>
                        </table>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example1,#example2').DataTable();
            $('select[name="example_length"]').val(25).change();
        });
    </script>
@endsection

@section('css')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet"/>
@endsection
