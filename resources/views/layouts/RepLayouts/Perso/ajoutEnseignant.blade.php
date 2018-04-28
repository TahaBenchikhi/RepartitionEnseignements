@extends('layouts.mainLayout')

@section('title', 'Ajout d\'un Enseignant')

@section('content')
    <div class="col-md-12">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">Ajouter un Enseignant </span>

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
                                <th>Nom</th>
                                <td><input  class="modifiable"  type='text' name="nom"/></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input  class="modifiable"  type='email' name="email"/></td>
                            </tr>
                            <tr>
                                <th>HTDstat</th>
                                <td><input  class="modifiable" type='number' min="0" name="HTDstat"/></td>
                            </tr>

                            <tr>
                                <th>HTDdues</th>
                                <td><input  class="modifiable" type='number' min="0" name="HTDdues"/></td>
                            </tr>
                            <tr>
                                <th>HTDattrib</th>

                                <td><input  class="modifiable" type='number' min="0" name="HTDattrib"/></td>
                            </tr>
                            <tr>
                                <th>Delta</th>

                                <td><input  class="modifiable" type='number' min="0" name="delta"/></td>
                            </tr>
                            <tr>
                                <th>PRP</th>

                                <td><input  class="modifiable" type='number' min="0" name="PRP"/></td>
                            </tr>
                            <tr>
                                <th>Departement</th>

                                <td><input  class="modifiable" type='text'  name="departement"/></td>
                            </tr>
                            <tr>
                                <th>Composante</th>
                                <td><input  class="modifiable" type='text'  name="composante"/></td>
                            </tr>

                            <tr>
                                <th>Corps</th>

                                <td><input  class="modifiable" type='text' name="corps"/></td>
                            </tr>
                            <tr>
                                <th>Role de l'Enseignant</th>

                                <td><input  class="modifiable" type='text' name="type"/></td>
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

        <input  class="send"  type='text' name="nom"/>
        <input  class="send"  type='email' name="email"/>
        <input  class="send" type='number' min="0" name="HTDstat"/>
        <input  class="send" type='number' min="0" name="HTDdues"/>
        <input  class="send" type='number' min="0" name="HTDattrib"/>
        <input  class="send" type='number' min="0" name="delta"/>
        <input  class="send" type='number' min="0" name="PRP"/>
        <input  class="send" type='text'  name="departement"/>
        <input  class="send" type='text'  name="composante"/>
        <input  class="send" type='text' name="corps"/>
        <input  class="send" type='text' name="type"/>

        <button type="submit" class="btn btn-primary pull-right ajouter">Ajouter</button>
    </form>



@endsection

@section('script')
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/ajoutEns.js') }}"></script>
@endsection

@section('css')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet"/>
@endsection
