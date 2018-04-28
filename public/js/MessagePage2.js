$(function(){
    var click = 0;
$("div.container_nouveau_message,div.container_envoi,div.container_corbeille").addClass('hidden');
MenuButtonActions();
var _theone;

    $("img.visible-xs").click(function(){
        $("div.showmessage").addClass("hidden-xs");
    	$("div.scroll").removeClass("hidden-xs");
    	$("div.menu_messages_xs ul").removeClass('hidden');
    });
        $("div.scroll").find("div.message_box").css({
        "cursor": "pointer"
    });
    $("div.scroll").on( "click", "div.message_box", function() {
        _theone=this;
        if($(this).hasClass('vue')) update_status(this);
    	$("div.showmessage").removeClass("hidden-xs");
    	$("div.scroll").addClass("hidden-xs");
    	$("div.menu_messages_xs ul").addClass('hidden');
    	var _text =  $(this).find('div.hidden').find('span.messagetext').text();
        var _sujet =  $(this).find('div.hidden').find('span.sujet').text();
        var _date =  $(this).find('div.hidden').find('span.date').text();
        var _expediteur =  $(this).find('div.hidden').find('span.expediteur').text();
          $(this).parent().parent().parent().parent().find('div.scroll_message').html(_text);
          $(this).parent().parent().parent().parent().find('td.expediteur-text').text(_expediteur);
          $(this).parent().parent().parent().parent().find('td.sujet-text').text(_sujet);
          $(this).parent().parent().parent().parent().find('td.date-text').text(_date);
        
    });
    $('div.container_nouveau_message').find("input[value='Annuler']").click(function(event){
        event.preventDefault()
        location.reload();
    	/*$('div.container_reception,div.container_nouveau_message,div.container_envoi,div.container_corbeille').removeClass('hidden').addClass('hidden');
		$("div.container_reception").removeClass('hidden');
		event.preventDefault();*/
    });
        $('button.deletemessage').click(function(event){
            if(_theone)
            {
             $.confirm({
            title: 'Suppresion',
            content: 'Vous Ete Sur De Supprmier le Message ?',
            buttons: {
                confirm: {
                    text: 'Confirmer',
                    action: function () {
                        remove_message(_theone);


                    }
                },
                cancel: {
                    text: 'Annuler',
                    action: function () {
                        $.alert('Action annuler !');
                    }
                }

            }
        
    });
            }
            
         });
        $('#DataForm').on('submit', function(e) {

        e.preventDefault();
            if(click==0) {
                $('input[type="submit"]').prop("disabled", true);
        click++;
        var datasend = $(this).serialize();
            $.ajax({
                url : '/EnvoiMessage',
                type: "POST",
                data: datasend,
                success: function (data) {
                    $.ajax({
                        url : '/MessageExtern',
                        type: "POST",
                        data: datasend,
                        success: function (data) {
                            swal("Message Envoyer!", ",", "success");

                            $(".confirm").click(function(){
                                location.reload();
                            });
                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });

                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
            }
    });


    $("ul.chosen-results").on( "click", "li",function () {
        if($(this).text() == "Envoyer a tous le monde") $("td.destinn").html("<p>Ce Message vas etre envoyer a tous le monde</p>");
    });
});







function MenuButtonActions()
{
$('div.menu_messages ul,div.menu_messages_xs ul').find("li").css({"cursor": "pointer"}).click(function(){
var array=['div.container_reception','div.container_nouveau_message','div.container_envoi','div.container_corbeille'];
var _index = $(this).index();
$('div.container_reception,div.container_nouveau_message,div.container_envoi,div.container_corbeille').removeClass('hidden').addClass('hidden');
$(array[_index]).removeClass('hidden');
});
}

function update_status(Id)
{
    var id = $(Id).find('span.id').text();
    $(Id).removeClass('vue');
    $.post('/vu',{'id':id,'action':'vu'},function(retour){
        var message = $(".badge").text();
        $(".badge").text(message-1);
        if($(".badge").text()==0) $(".badge").css({'opacity':'0'});

    });
}

function remove_message(elementx)
{
    var elementid = $(elementx).find('div.hidden').find('span.id').text();
            $.ajax({
            url : '/DeleteMessage',
            type: "POST",
            data: {'id':elementid,'action':'delete'},
            success: function (data) {
          $(elementx).parent().parent().parent().parent().find('div.scroll_message').html("");
          $(elementx).parent().parent().parent().parent().find('td.expediteur-text').text("");
          $(elementx).parent().parent().parent().parent().find('td.sujet-text').text("");
          $(elementx).parent().parent().parent().parent().find('td.date-text').text("");
          $(elementx).remove();
          elementx = null;
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        

   
}