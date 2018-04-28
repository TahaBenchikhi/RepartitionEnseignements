@extends('layouts.mainLayout')

@section('title', 'historique')

@section('topBar')
    @include('layouts.EnsLayouts._TopMenuEns')
@stop

@section('content')

    <div class="title simple">
        <div class="row">
            <div class="col-md-12">
                <h3><span class="semi-bold">Historique</span> des enseignements</h3>
            </div>
        </div>
    </div>
    <div class="grid simple">
        <div class="grid-body no-border">
            <div class="row">
                <div class="col-md-12">
                    <table id="listeens" class="compact" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Annee Universitaire</th>
                            <th>Code UE</th>
                            <th>Libelle</th>
                            <th>Type</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data_histo as $valu)
                            <tr>

                                <td>{{$valu->session->annee_universitaire}}</td>
                                <td><a href="/ficheUEEns/{{$valu->ue[0]->id}}">{{ $valu->ue[0]->codeue}}</a></td>
                                <td>{{ $valu->ue[0]->libellelong}}</td>
                                <td>{{ $valu->type}}</td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#listeens').DataTable();
        } );
    </script>
@endsection

@section('css')
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>

@endsection

