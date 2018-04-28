$(function () {
    var Data = {};
    var pub_id;
    var contenuu = $('.editable');
    var titree = $('.titre');
    var Btn_modifier = $('#modifier');
    var Btn_supprimer = $('#supprimer');
    var _temp;

    $('body').on('click', '#modifier', function () {
        var $contenu = $('.editable');
        var $button = $(this);
        var $titre = $('.titre');
        var $button_sup = $('#supprimer');
        var $textarea = $('<textarea id="newContent" class="form-control" style="width: 100%; height: 100%"/>').val($contenu.text());
        var $input = $('<input id="newTitle" class="form-control" style="width: 100%; height: 100%"/>').val($titre.text());
        var $_button = $('<input type="submit" id="Enregistrer" class="btn btn-success pull-left" type="button" value="Enregistrer"></input>');
        var $_button2 = $('<input type="submit" id="Annuler" class="btn btn-danger pull-right" type="button" value="Annuler"></input>');

        $contenu.replaceWith($textarea);
        $button.replaceWith($_button);
        $titre.replaceWith($input);
        $button_sup.replaceWith($_button2);

    });

    $('body').on('click', '#Enregistrer', function () {
        var $contenu = $('#newContent');
        var $title = $('#newTitle');
        var $pub_id = $('#current_pub_id');
        Data[0] = parseInt($pub_id.text());
        Data[1] = $title.val();
        Data[2] = $contenu.val();
        $.confirm({
            title: 'Validation',
            content: 'Vous êtes sur de vouloir modifier cette publication ?',
            buttons: {
                confirm: {
                    text: 'Oui',
                    action: function () {
                        console.log(Data);
                        Update(Data);
                        setTimeout(function () {
                            location.reload();
                        }, 1100);
                    }
                },
                cancel: {
                    text: 'Non'

                }

            }
        });

    });

    $('body').on('click', '#Annuler', function () {
        var $contenu = $('#newContent');
        var $title = $('#newTitle');
        var $btn1 = $('#Enregistrer');
        var $btn2 = $('#Annuler');
        $.confirm({
            title: 'Validation',
            content: 'Si vous annulez, tout les modifications seront perdus, continuer ?',
            buttons: {
                confirm: {
                    text: 'Oui',
                    action: function () {
                        console.log(contenuu);
                        $contenu.replaceWith(contenuu.val(contenuu.text()));
                        $title.replaceWith(titree.val(titree.text()));
                        $btn1.replaceWith(Btn_modifier);
                        $btn2.replaceWith(Btn_supprimer);
                    }
                },
                cancel: {
                    text: 'Non'

                }

            }
        });

    });

    $('body').on('click', '#supprimer', function () {
        var current_pub_id = parseInt($('#current_pub_id').text());
        $.confirm({
            title: 'Validation',
            content: 'Vous êtes sur de vouloir supprimer cette publication ?',
            buttons: {
                confirm: {
                    text: 'Oui',
                    action: function () {
                        console.log(current_pub_id);
                        Delete(current_pub_id);
                        setTimeout(function () {
                            $(_temp).remove();
                        }, 1100);
                    }
                },
                cancel: {
                    text: 'Non'

                }

            }
        });

    });

    $("div.scroll").find("div.message_box").css({
        "cursor": "pointer"
    }).click(function () {
        _temp = this;
        $pub_id = $(this).find('.pub_id').text();
        Get($pub_id);
        $("div.scroll").addClass("hidden-xs");
        $("div.show_publication").removeClass("hidden-xs");
    });

    $("td.visible-xs img").click(function(){
        $("div.show_publication").addClass("hidden-xs");
        $("div.scroll").removeClass("hidden-xs");
    });

});

function Get(pub_id) {
    $.post("/publications",
        {
            'pub_id': pub_id
        },
        function (retour) {
            var $contenu = $('.col-md-7');
            $contenu.removeClass('hidden');
            var myObj = $.parseJSON(retour);
            var $title = $('.titre');
            var $contenu = $('.editable');
            var $nom = $('.nom');
            var $date = $('.date');
            var $currentID = $('#current_pub_id');
            $currentID.text(myObj[0].id);
            $title.text(myObj[0].titre);
            $contenu.html(myObj[0].contenu);
            $date.text(myObj[0].date);
            $nom.text(myObj[0].repartiteur.enseignant.nom);
        });
}
function Update(Data) {
    $.post('/updatingPublication', {'Data': Data}, function (retour) {
        var myObj = $.parseJSON(retour);
        console.log(myObj[0]);
    });
}
function Delete(current_pub_id) {
    $.post("/deletingPublication",
        {
            'current_pub_id': current_pub_id
        });
};