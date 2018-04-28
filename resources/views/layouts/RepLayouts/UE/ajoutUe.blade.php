@extends('layouts.mainLayout')

@section('title', 'Ajout d\'une UE')

@section('content')
    <div class="col-md-12">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Ajouter une UE </span>

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

                                <tr>
                                    <th>Numero de Semestre</th>
                                    <td><input  class="modifiable" min="1" max="2" type='number' name="semestre" /></td>
                                </tr>
                                <tr>
                                    <th>Code UE</th>
                                    <td><input  class="modifiable" type='text' name="codeue"  /></td>
                                </tr>
                                @if(!empty($coeff->first()))
                                <tr>

                                    <th>Heures de TD</th>
                                    <td><input  class="modifiable heures" type='number' min="0" step="0.01" name="nbheuresTD" data-coeff="{{$coeff[1]->coef}}" /> <span>{{$coeff[1]->coef}}</span> Equivalent en heures TD à <b class="coef_res">0</b>H</td>
                                </tr>
                                <tr>
                                    <th>Heures de Cours Intégré</th>

                                    <td><input  class="modifiable heures" type='number' min="0" step="0.01" name="nbheuresCour" data-coeff="{{$coeff[3]->coef}}" /> <span>{{$coeff[3]->coef}}</span> Equivalent en heures TD à <b class="coef_res">0</b>H</td>
                                </tr>
                                <tr>
                                    <th>Heures de Tp</th>

                                    <td><input  class="modifiable heures" type='number' min="0" step="0.01" name="nbheuresTP" data-coeff="{{$coeff[2]->coef}}" /> <span>{{$coeff[2]->coef}}</span> Equivalent en heures TD à <b class="coef_res">0</b>H</td>
                                </tr>
                                <tr>
                                    <th>Heures de Cours Magistraux</th>

                                    <td><input  class="modifiable heures" type='number' min="0" step="0.01" name="nbheuresCM" data-coeff="{{$coeff[0]->coef}}" /> <span>{{$coeff[0]->coef}}</span> Equivalent en heures TD à <b class="coef_res">0</b>H</td>
                                </tr>
                                <tr>
                                    <th>Heures de Stage</th>

                                    <td><input  class="modifiable heures" type='number' min="0" step="0.01" name="nbheuresEStage" data-coeff="{{$coeff[7]->coef}}" /> <span>{{$coeff[7]->coef}}</span> Equivalent en heures TD à <b class="coef_res">0</b>H</td>
                                </tr>
                                <tr>
                                    <th>Heures de Formation</th>
                                    <td><input  class="modifiable heures" type='number' min="0" step="0.01" name="nbheuresAFormation" data-coeff="{{$coeff[4]->coef}}" /> <span>{{$coeff[4]->coef}}</span> Equivalent en heures TD à <b class="coef_res">0</b>H</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Nombre de groupes</th>

                                    <td><input  class="modifiable" type='number' name="groupe" /></td>
                                </tr>

                                <tr>
                                    <th>Libellé long</th>

                                    <td><input  class="modifiable" type='text' name="libellelong" /></td>
                                </tr>

                                <tr>
                                    <th>Libellé court</th>

                                    <td><input  class="modifiable" type='text' name="libellecourt"  /></td>
                                </tr>
                                <tr>
                                    <th>Composante</th>

                                    <td><input  class="modifiable" type='text' name="composante"  /></td>
                                </tr>
                                <tr>
                                    <th>Département</th>

                                    <td><input  class="modifiable" type='text' name="departement" /></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 pull-right" >
        <a type="submit" class="btn btn-primary pull-right add">Ajouter</a>
        <a type="submit" class="btn btn-danger pull-left drop">Annuler</a>

    </div>

    <form action="/ajouterUe" method="post" class="col-md-12 hidden" id="sendform">

            <td><input  class="send" min="1" max="2" type='number' name="semestre"/></td>

            <td><input  class="send" type='text' name="codeue"/></td>

            <td><input  class="send" type='number' min="0" name="nbheuresTD"/></td>

            <td><input  class="send" type='number' min="0" name="nbheuresCour"/></td>

            <td><input  class="send" type='number' min="0" name="nbheuresTP"/></td>

            <td><input  class="send" type='number' min="0" name="nbheuresCM"/></td>

            <td><input  class="send" type='number' min="0" name="nbheuresStage"/></td>

            <td><input  class="send" type='number' min="0" name="nbheuresFormation"/></td>

            <td><input  class="send" type='number' name="groupe" /></td>

            <td><input  class="send" type='text' name="libellelong" /></td>

            <td><input  class="send" type='text' name="libellecourt"/></td>

            <td><input  class="send" type='text' name="composante"/></td>

            <td><input  class="send" type='text' name="departement"/></td>

        <button type="submit" class="btn btn-primary pull-right ajouter">Ajouter</button>
    </form>



@endsection

@section('script')
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/ajoutUe.js') }}"></script>
@endsection

@section('css')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet"/>
@endsection
