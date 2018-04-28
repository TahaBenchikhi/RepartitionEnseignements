@extends('layouts.mainLayout')

@section('title', 'Liste des enseignants')

@section('content')
    <div class="title simple">
        <div class="row">
            <div class="col-md-12">
                <h3><span class="semi-bold">Liste </span>des enseignants
                </h3>
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
                            <th>Nom</th>
                            <th>Delta</th>
                            <th>Type</th>
                            <th>Plus de détail</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Delta</th>
                            <th>Type</th>
                            <th>Plus de détail</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($data as $element)
                            <tr>
                                <td>{{$element->nom}}</td>
                                <td>{{$element->delta}}</td>
                                <td>{{$element->type}}</td>
                                <td class="last"> <div>
                                        <a href="{{ url('/fichePersoRep/'.$element->id) }}">Voir plus</a> </div> </th>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection()


@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#listeens').DataTable();
        } );
    </script>
@endsection()

@section('css')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
@endsection
