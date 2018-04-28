@extends('layouts.mainLayout')

@section('title', 'Fiche de l\'enseignant')

@section('content')
    @if(!empty($data->first()))
    <div class="col-md-6">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Fiche de l'Enseignant</span>
                        - @foreach($data as $element) {{$element->nom}} @endforeach
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
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Nom</th>
                                    <td  class="modifiable" data-name="nom" >{{$datas->nom}}</td>
                                </tr>
                                <tr>
                                    <th>HTD Stat</th>
                                    <td class="modifiable"  data-name="HTDstat" >{{$datas->HTDstat}}</td>
                                </tr>

                                <tr>
                                    <th>HTD Dues</th>
                                    <td class="modifiable" data-name="HTDdues" >{{$datas->HTDdues}}</td>
                                </tr>
                                <tr>
                                    <th>HTD Attribuer</th>
                                    <td class="modifiable" data-name="HTDattrib" >{{$datas->HTDattrib}}</td>
                                </tr>
                                <tr>
                                    <th>Delta</th>
                                    <td class="modifiable" data-name="delta" >{{$datas->delta}}</td>
                                </tr>
                                <tr>
                                    <th>PRP</th>
                                    <td class="modifiable" data-name="PRP" >{{$datas->PRP}}</td>
                                </tr>

                                <tr>
                                    <th>Department</th>
                                    <td class="modifiable" data-name="departement" >{{$datas->departement}}</td>
                                </tr>
                                <tr>
                                    <th>Composante</th>
                                    <td class="modifiable" data-name="composante" >{{$datas->composante}}</td>
                                </tr>
                                <tr>
                                    <th>Corps</th>
                                    <td class="modifiable" data-name="corps" >{{$datas->corps}}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td class="modifiable" data-name="type" >{{$datas->type}}</td>
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
                                      class="form-control" rows="6" cols="2" width="100%">@if($datas->commentaireens){{$datas->commentaireens->commentaire}}@endif</textarea>
                        @endforeach
                        <br/>
                        <a class="btn btn-success  valider hidden pull-left">Valider</a>
                        <a class="btn btn-danger  annuler hidden pull-right">Annuler</a>
                        <a class="btn btn-primary  modifier pull-right">Modification</a>
                        <a class="btn btn-danger  delete pull-left">Supprimer cet enseignant</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">L'>Historique</span>de l'enseignant
                    </h3>
                </div>
            </div>
        </div>
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">
                        <table id="voeux" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Code UE</th>
                                <th>Libelle Long</th>
                                <th>Type d'enseignement</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Code UE</th>
                                <th>Libelle Long</th>
                                <th>Type d'enseignement</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if($historique)
                            @foreach($historique as $rep)
                            <tr>
                                <td><a href="/ficheUERep/{{$rep->ue[0]->id}}" target="_blank">{{$rep->ue[0]->codeue}}</a></td>
                                <td>{{$rep->ue[0]->libellelong}}</td>
                                <td>{{$rep->type}}</td>
                            </tr>
                            @endforeach
                                @endif
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
                    <h3><span class="semi-bold">Répartition </span>1er Semestre
                    </h3>
                </div>
            </div>
        </div>
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="display">
                            <thead>
                            <tr>
                                <th>Code UE</th>
                                <th>Libelle Long</th>
                                <th>Type d'enseignement</th>
                                <th>Anneé universitaire</th
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Code UE</th>
                                <th>Libelle Long</th>
                                <th>Type d'enseignement</th>
                                <th>Anneé universitaire</th
                            </tr>
                            </tfoot>
                            <tbody>
                            @if($repartition)
                                @foreach($repartition as $rep)
                                    @if($rep->ue->semestre == 1)
                                    <tr>
                                        <td><a href="/ficheUERep/{{$rep->ue->id}}" target="_blank">{{$rep->ue->codeue}}</a></td>
                                        <td>{{$rep->ue->libellelong}}</td>
                                        <td>{{$rep->type}}</td>
                                        <td>{{$rep->session->annee_universitaire}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endif
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
                    <h3><span class="semi-bold">Répartition </span>2eme Semestre
                    </h3>
                </div>
            </div>
        </div>
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example2" class="display">
                            <thead>
                            <tr>
                                <th>Code UE</th>
                                <th>Libelle Long</th>
                                <th>Type d'enseignement</th>
                                <th>Anneé universitaire</th
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Code UE</th>
                                <th>Libelle Long</th>
                                <th>Type d'enseignement</th>
                                <th>Anneé universitaire</th
                            </tr>
                            </tfoot>
                            <tbody>
                            @if($repartition)
                                @foreach($repartition as $rep)
                                    @if($rep->ue->semestre == 2)
                                        <tr>
                                            <td><a href="/ficheUERep/{{$rep->ue->id}}" target="_blank">{{$rep->ue->codeue}}</a></td>
                                            <td>{{$rep->ue->libellelong}}</td>
                                            <td>{{$rep->type}}</td>
                                            <td>{{$rep->session->annee_universitaire}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endif
@endsection

@section('script')

    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#voeux').DataTable();
            $('#example1').DataTable();
            $('#example2').DataTable();
        } );
    </script>
    @if(empty($data->first()))
        <script type="text/javascript">
            $(document).ready(function () {
                window.location.href = "/";
            });
        </script>
    @endif
    <script src="{{ asset('js/persoUeRep.js') }}"></script>

@endsection

@section('css')


    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet"/>
@endsection