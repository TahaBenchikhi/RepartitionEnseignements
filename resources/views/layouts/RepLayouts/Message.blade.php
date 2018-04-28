@extends('layouts.mainLayout')

@section('content')

    <div class="container_reception">
        <div class="title simple">
            <div class="row">
                <div class="col-md-7">
                    <h3><span class="semi-bold">Messages</span> - La liste</h3>
                </div>
            </div>
        </div>

        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="menu_messages hidden-xs">
                    <ul>
                        
                        <li>Réception</li>
                        <li>Nouveau message</li>
                        <li>Envoyé</li>
                        <li>Corbeille</li>
                    </ul>
                </div>
                <div class="menu_messages_xs visible-xs">
                    <ul>
                        
                        <li>Réception</li>
                        <li>Nouveau message</li>
                        <li>Envoyé</li>
                        <li>Corbeille</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="scroll">
                            @if($reception )
                            @foreach ($reception as $element)
                            @php $class = "message_box " @endphp
                            
                                <div @if ($element->vu == 0)  class = "message_box vue" @else class = "message_box" @endif data-sort =@php  echo $time = date("H:i",strtotime($element->date)); @endphp>

                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img class="media-object" src="img/user-icon.png"
                                                 style="width: 30px" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$element->sujet}}</h4>
                                        {{ str_limit(strip_tags($element->contenu), $limit = 20, $end = '...') }}

                                    </div>
                                    <span class='timeholder'>@php 
                                            echo $time = date("H:i",strtotime($element->date));
                                    @endphp</span>
                                    <div class='hidden'>
                                        <span class='messagetext'>{{$element->contenu}}</span>
                                        <span class='id'>{{$element->id}}</span>
                                        <span class='expediteur'>{{$element->enseignant->nom}}</span>
                                        <span class='sujet'>{{$element->sujet}}</span>
                                        <span class='date'>{{$element->date}}</span>

                                    </div>
                                </div>
                                
                            @endforeach
                                @endif
                        

                        </div>
                    </div>

                    <div class="col-md-7 showmessage hidden-xs">
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <img class="visible-xs" src="img/back.png"
                                         style="width: 30px; margin-right: 10px"/>
                                </td>
                                <td class="message_title">
                                    <div class="box_title">
                                        <center>Message</center>
                                    </div>
                                </td>
                            </tr>

                            <table style="width: 100%" class='centtable'>
                                <tr>
                                    <td class='pull-left'>
                                        <b>Expéditeur: </b>
                                    </td>
                                    <td class='expediteur-text pull-left'></td>
                                </tr>
                                <tr>
                                    <td  class='pull-left'>
                                       <b>Sujet:</b> 
                                    </td>
                                    <td class='sujet-text pull-left'></td>
                                </tr>
                                <tr>
                                    <td  class='pull-left'>
                                       <b>Date:</b>
                                    </td>
                                    <td class='date-text pull-left'></td>
                                </tr>
                            </table>
                            <div class="message_content">
                                <div class="scroll_message">

                                </div>
                                <button type="button" class="btn btn-danger pull-right deletemessage">Supprimer</button>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container_nouveau_message hidden">
        <div class="title simple">
            <div class="row">
                <div class="col-md-7">
                    <h3><span class="semi-bold">Messages</span> - Nouveau Message</h3>
                </div>
            </div>
        </div>

        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="/EnvoiMessage" id="DataForm">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <table width="100%">
                                    <tr>
                                        <td width="10%">
                                            À :

                                        </td>
                                        <td class ='destinn' width="90%">


                                            <select data-placeholder="A:" class="chosen-select" multiple style="width:100%;" tabindex="4" name="destinataire[]">
                                            @if($emails) @foreach ($emails as $element)
                                                    <option value={{$element->id}}>{{$element->email}}</option>
                                                @endforeach @endif
                                                @if(Session::get('type') == 'repartiteur') <option value="all">Envoyer a tous le monde</option> @endif
                                            </select>


                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="form-group">
                                <table width="100%">
                                    <tr>
                                        <td width="10%">
                                            Sujet:
                                        </td>
                                        <td width="90%">
                                            <div class="controls">
                                                <input type="text" required name="sujet" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#grid-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>

                            <div class="form-group">
                                <table width="100%">
                                    <tr>
                                        <td width="10%" style="vertical-align: top">
                                            Contenu:
                                        </td>
                                        <td width="90%">
                                            <div class="controls">
                                                <textarea id="text-editor" required name="message" placeholder="Enter text ..."
          class="form-control" rows="10"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <div class="row">
                                <div class="col-md-1 col-md-offset-10">
                                    <input type="submit" value="Envoyer" class="btn btn-danger-dark valider">
                                    </input>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" value="Annuler" class="btn btn-danger-dark valider">
                                    </input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container_envoi hidden">
        <div class="title simple">
            <div class="row">
                <div class="col-md-7">
                    <h3><span class="semi-bold">Messages</span> - Boîte d'envoi</h3>
                </div>
            </div>
        </div>

        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="menu_messages hidden-xs">
                    <ul>
                        
                        <li>Réception</li>
                        <li>Nouveau message</li>
                        <li>Envoyé</li>
                        <li>Corbeille</li>
                    </ul>
                </div>
                <div class="menu_messages_xs visible-xs">
                    <ul>
                        <li>Réception</li>
                        <li>Nouveau message</li>
                        <li>Envoyé</li>
                        <li>Corbeille</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="scroll">
                            @if($sended)
                            @foreach ($sended as $element)
                                <div class="message_box">
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img class="media-object" src="img/user-icon.png"
                                                 style="width: 30px" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$element->sujet}}</h4>
                                        {{ str_limit(strip_tags($element->contenu), $limit = 20, $end = '...') }}

                                    </div>
                                     <span class='timeholder'>@php 
                                            echo $time = date("H:i",strtotime($element->date));
                                    @endphp</span>
                                    <div class='hidden'>
                                        <span class='messagetext'>{{$element->contenu}}</span>
                                        <span class='id'>{{$element->id}}</span>
                                        <span class='expediteur'>{{$element->enseignant->nom}}</span>
                                        <span class='sujet'>{{$element->sujet}}</span>
                                        <span class='date'>{{$element->date}}</span>

                                    </div>
                                </div>
                            @endforeach
                                @endif

                        </div>
                    </div>

                    <div class="col-md-7 showmessage hidden-xs">
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <img class="visible-xs" src="img/back.png"
                                         style="width: 30px; margin-right: 10px"/>
                                </td>
                                <td class="message_title">
                                    <div class="box_title">
                                        <center>Message Envoyer</center>
                                    </div>
                                </td>
                            </tr>

                             <table style="width: 100%">
                                <tr>
                                    <td class='pull-left'>
                                        <b>Déstinataire: </b>
                                    </td>
                                    <td class='expediteur-text pull-left'></td>
                                </tr>
                                <tr>
                                    <td  class='pull-left'>
                                       <b>Sujet:</b> 
                                    </td>
                                    <td class='sujet-text pull-left'></td>
                                </tr>
                                <tr>
                                    <td  class='pull-left'>
                                       <b>Date:</b>
                                    </td>
                                    <td class='date-text pull-left'></td>
                                </tr>
                            </table>
                            <div class="message_content">
                                <div class="scroll_message">
                                    
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container_corbeille hidden">
        <div class="title simple">
            <div class="row">
                <div class="col-md-7">
                    <h3><span class="semi-bold">Messages</span> - Corbeille</h3>
                </div>
            </div>
        </div>

        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="menu_messages hidden-xs">
                    <ul>
                        <li>Réception</li>
                        <li>Nouveau message</li>
                        <li>Envoyé</li>
                        <li>Corbeille</li>
                    </ul>
                </div>
                <div class="menu_messages_xs visible-xs">
                    <ul>
                        <li>Réception</li>
                        <li>Nouveau message</li>
                        <li>Envoyé</li>
                        <li>Corbeille</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="scroll">
                            @if($removed)
                            @foreach ($removed as $element)
                                <div class="message_box">
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img class="media-object" src="img/user-icon.png"
                                                 style="width: 30px" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$element->sujet}}</h4>
                                        {{ str_limit(strip_tags($element->contenu), $limit = 20, $end = '...') }}

                                    </div>
                                     <span class='timeholder'>@php 
                                            echo $time = date("H:i",strtotime($element->date));
                                    @endphp</span>
                                    <div class='hidden'>
                                        <span class='messagetext'>{{$element->contenu}}</span>
                                        <span class='id'>{{$element->id}}</span>
                                        <span class='expediteur'>{{$element->enseignant->nom}}</span>
                                        <span class='sujet'>{{$element->sujet}}</span>
                                        <span class='date'>{{$element->date}}</span>
                                    </div>

                                </div>
                            @endforeach
                                @endif

                        </div>
                    </div>

                    <div class="col-md-7 showmessage hidden-xs">
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <img class="visible-xs" src="img/back.png"
                                         style="width: 30px; margin-right: 10px"/>
                                </td>
                                <td class="message_title">
                                    <div class="box_title">
                                        <center>Message Supprimer</center>
                                    </div>
                                </td>
                            </tr>

                             <table style="width: 100%">
                                <tr>
                                    <td class='pull-left'>
                                        <b>Expéditeur: </b>
                                    </td>
                                    <td class='expediteur-text pull-left'></td>
                                </tr>
                                <tr>
                                    <td  class='pull-left'>
                                       <b>Sujet:</b> 
                                    </td>
                                    <td class='sujet-text pull-left'></td>
                                </tr>
                                <tr>
                                    <td  class='pull-left'>
                                       <b>Date:</b>
                                    </td>
                                    <td class='date-text pull-left'></td>
                                </tr>
                            </table>
                            <div class="message_content">
                                <div class="scroll_message">
                                    
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('script')
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/MessagePage2.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/chosen.jquery.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#text-editor').wysihtml5();
    </script>

    <script type="text/javascript">
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Aucun résultats trouvé'},
            '.chosen-select-width'     : {width:"95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>
@endsection    
    

@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/message.css') }}" rel="stylesheet"/>
    <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
@endsection

