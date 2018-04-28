@extends('layouts.mainLayout')

@section('title', 'Liste des UEs')

@section('content')
    <div class="title simple">
        <div class="row">
            <div class="col-md-12">
                <h3><span class="semi-bold">Liste </span> - Unités d'enseignement
                </h3>
            </div>
        </div>
    </div>
    <div class="grid simple">
        <div class="grid-body no-border">
            <div class="row">
                <div class="col-md-12">
                    <table id="listeue" class="compact" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Code UE</th>
                            <th>Libellé</th>
                            <th>Semestre</th>
                            <th>Plus de détail</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Code UE</th>
                            <th>Libellé</th>
                            <th>Semestre</th>
                            <th>Plus de détail</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach ($data as $element)
                            <tr>
                                <td>{{$element->codeue}}</td>
                                <td>{{$element->libellecourt}}</td>
                                <td>{{$element->semestre}}</td>
                                <th class="last"><div><a href="{{ url('/ficheUERep/'.$element->id) }}">Voir plus</a></div></th>
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
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#listeue').DataTable();
        } );
    </script>
@endsection

@section('css')
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>
@endsection
