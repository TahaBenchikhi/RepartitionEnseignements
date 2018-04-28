@extends('layouts.mainLayout')

@section('title', 'Profil')

@section('content')
    @if($data)
        @foreach ($data as $value)
            <div class="col-md-6">
                <div class="title simple">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><span class="semi-bold">Information</span> personnel
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="grid simple hidden" id="password">
                    <div class="grid-body no-border">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="card__title">modifier votre mot de passe</h3>
                                <form id="form-change-password" role="form" method="POST" action="{{ url('/password') }}" novalidate class="form-horizontal">
                                    <div class="col-md-9">
                                        <label for="current-password" class="col-sm-4 control-label">Mot de passe actuel
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Mot de passe ">
                                                @if ($errors->has('ancpassw'))
                                                    <div class="alert-danger">
                                                        <strong>{{ $errors->first('ancpassw') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <label for="password" class="col-sm-4 control-label">Nouveau Mot de passe </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe ">
                                            </div>
                                            @if ($errors->has('passw'))
                                                <div class="alert-danger">
                                                    <strong>{{ $errors->first('passw') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <label for="password_confirmation" class="col-sm-4 control-label">Retaper le mot de passe</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retaper le mot de passe">
                                                @if ($errors->has('confpassw'))
                                                    <div class="alert-danger">
                                                        <strong>{{ $errors->first('confpassw') }}</strong>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-offset-5 col-sm-6">

                                            <p  name="retour" id="retour" class="btn btn-default ">Retour</p>

                                            <button type="submit" name="modifier" id="upda" class=" btn btn-default ">Modifier</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid simple" id="content">
                    <div class="grid-body no-border">
                        <div class="row">
                            <table width="100%">
                                <tr>
                                    <th>Nom:</th>
                                    <td>{{ $value->nom}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    @if($data2)
                                        @foreach ($data2 as $value2)
                                            <td>{{ $value2->email}}</td>

                                </tr>
                                <tr>
                                    <th>type de droit:</th>
                                    <td>{{ $value2->type}}</td>
                                    @endforeach
                                    @endif
                                </tr>
                                <tr>
                                    <th>Departement:</th>
                                    <td>{{ $value->departement}}</td>
                                </tr>


                                <tr>
                                    <td colspan="2"><input type="button" id="modi" class="cont2 btn btn-default"
                                                           value="modifier mot de passe">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="title simple">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><span class="semi-bold">Heures </span>de travail
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="grid simple">
                    <div class="grid-body no-border">
                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%">
                                    <tr>
                                        <th>Composante:</th>
                                        <td>{{ $value->composante}}</td>
                                    </tr>
                                    <tr>
                                        <th>HTDstat:</th>
                                        <td>{{ $value->HTDstat}}</td>
                                    </tr>
                                    <tr>
                                        <th>HTDdues:</th>
                                        <td>{{ $value->HTDdues}}</td>
                                    </tr>
                                    <tr>
                                        <th>HTDattrib:</th>
                                        <td>{{ $value->HTDattrib}}</td>
                                    </tr>
                                    <tr>
                                        <th>Delta:</th>
                                        <td>{{ $value->delta}}</td>
                                    </tr>
                                    <tr>
                                        <th>PRP:</th>
                                        <td>{{ $value->PRP}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="col-md-12">
        <div class="title simple">
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="semi-bold">UE </span>en cours de réparition</h3>
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
                                <th>Libelle Long</th>
                                <th>Code UE</th>
                                <th>Detail</th>

                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($repartition->first()))
                                @foreach($repartition as $rep)
                                    <tr>
                                        <th>{{$rep->ue->libellelong}}</th>
                                        <th>{{$rep->ue->codeue}}</th>
                                        <th><a href="/ficheUEEns/{{$rep->ue->id}}">Details</a></th>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Libelle Long</th>
                                <th>Code UE</th>
                                <th>Detail</th>

                            </tr>
                            </tfoot>
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
                    <h3><span class="semi-bold">UE </span>attribué</h3>
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
                                <th>Libelle Long</th>
                                <th>Code UE</th>
                                <th>Detail</th>

                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($attribuer->first()))
                                @foreach($attribuer as $attr)
                                    <tr>
                                        <th>{{$attr->ue->libellelong}}</th>
                                        <th>{{$attr->ue->codeue}}</th>
                                        <th><a href="/ficheUEEns/{{$attr->ue->id}}">Details</a></th>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Libelle Long</th>
                                <th>Code UE</th>
                                <th>Detail</th>

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
    <script src="{{ asset('js/profil.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example2,#example1').DataTable();

        });



    </script>
    <script src="{{ asset('js/alert.js') }}"></script>


@endsection

@section('css')
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet"/>

@endsection
