$(document).ready(function () {

    var Data = {};


    $('select').val(6).change().remove();
    $('#example_length').find('label').remove();

    AllReadyGreen();
    AllReadyRed();

    $(".last div.info button").click(function () {
        var s = $(this).index();
        switch (s) {
            case 0:
                GetCommentaire(this);
                break;
            case 1:
                Gogreen(this, Data);
                break;
            case 2:
                Gored(this, Data);
                break;
        }
    });
    $('.last div.info').on('click', '.return', function (event) {
        var father = $(this).parent().parent().parent();
        if ($(father).css("background-color") == "rgba(76, 175, 80, 0.4)" || $(father).css("background-color") == "rgba(244, 67, 54, 0.4)") {
            if ($(father).hasClass("accepted") || $(father).hasClass("rejected")) {
                GoNormal(this, Data);

            }
            else {
                delete Data[$(this).parent().find("input.ensid").val()];
                
            }

        }

        $(this).parent().find("button").css({
            "display": "block"
        });
        $(this).parent().parent().parent().css({
            "background-color": "white",
            "color": "#636b6f"
        });
        $(this).remove();

    });
    $('.valider').click(function () {

        $.confirm({
            title: 'Validation',
            content: 'Vous êtes sûr de valider ?',
            buttons: {
                confirm: {
                    text: 'Confirmer',
                    action: function () {
                        Send(Data);
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
    });
    $('.reset').click(function () {
        $.confirm({
            title: 'Attention',
            content: 'Vous êtes sûr de réinitialiser ?',
            buttons: {
                confirm: {
                    text: 'Confirmer',
                    action: function () {
                        Reset(Data);
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
    });
    $(".profinfo").css({"cursor":"pointer","text-decoration":"none"}).click(function () {
        var s=$(this).parent().parent().find(".last div.info input.ensid").val();
        window.open('/fichePersoRep/'+s, '_blank');
    });
    $(".ueinfo").css({"cursor":"pointer","text-decoration":"none"}).click(function () {
        var m=$(this).parent().parent().find(".last div.info_other input.ueid").val();
        window.open('/ficheUERep/'+m, '_blank');
    });

    $(".cut").click(function () {
        $.confirm({
            title: 'Attention',
            content: 'Vous êtes sûr de fermer la session ?',
            buttons: {
                confirm: {
                    text: 'Confirmer',
                    action: function () {
                        $.ajax({
                            url : '/Fermer',
                            type: "POST",
                            data: "fermer",
                            success: function (data) {
                                swal("Session Fermer avec Succes!", ",", "success");

                                $(".confirm").click(function(){
                                    location.reload();
                                });
                            },
                            error: function (jXHR, textStatus, errorThrown) {
                                alert(errorThrown);
                            }
                        });

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
    });

});


function Gored(Indec, Data) {
    $(Indec).parent().parent().parent().css({
        "background-color": "rgba(244, 67, 54, 0.4)",
        "color": "white"
    });
    $(Indec).css({
        "display": "none"
    });
    $(Indec).parent().find("button:nth-child(2)").css({
        "display": "none"
    });
    $(Indec).parent().append('<button title="Retourner" class ="return" style="left:27px;"></button>');
    Data[$(Indec).parent().find("input.ensid").val()] = "Rejected";

    NoChange(Indec, Data);
}


function Gogreen(Indec, Data) {
    $(Indec).parent().parent().parent().css({
        "background-color": "rgba(76, 175, 80, 0.4)",
        "color": "white"
    });
    $(Indec).css({
        "display": "none"
    });
    $(Indec).parent().find("button:nth-child(3)").css({
        "display": "none"
    });
    $(Indec).parent().append('<button title="Retourner" class ="return" style="left:27px;"></button>');
    Data[$(Indec).parent().find("input.ensid").val()] = "Accepted";
    ;

    NoChange(Indec, Data);

}

function GoNormal(Indec, Data) {

    Data[$(Indec).parent().find("input.ensid").val()] = "Normal";
    ;


}


function AllReadyGreen() {
    if ($(".accepted").length) {
        $(".accepted").css({
            "background-color": "rgba(76, 175, 80, 0.4)",
            "color": "white"
        });
    }
    $(".accepted").find("button:nth-child(3),button:nth-child(2)").css({
        "display": "none"
    });
    $(".accepted .last div.info").append('<button class ="return" style="left:27px;"></button>');

}


function AllReadyRed() {
    if ($(".rejected").length) {
        $(".rejected").css({
            "background-color": "rgba(244, 67, 54, 0.4)",
            "color": "white"
        });
    }
    $(".rejected").find("button:nth-child(3),button:nth-child(2)").css({
        "display": "none"
    });
    $(".rejected .last div.info").append('<button class ="return" style="left:27px;"></button>');

}

function NoChange(Indec, Data) {
    var check = $(Indec).parent().parent().parent();
    var str = check.attr("class");
    str = str.substring(0, 8);
    if (str == Data[$(Indec).parent().find("input.ensid").val()].toLowerCase()) {
        delete Data[$(Indec).parent().find("input.ensid").val()];

    }
}

function Send(Data) {

    $.post('/posting', {'Data': Data}, function (retour) {
        if (retour) alert(retour);

    });
    setTimeout(function () {

        location.reload();

    }, 1100);
}

function Reset() {

    $.post('/reset', {}, function (retour) {

    });
    setTimeout(function () {

        location.reload();

    }, 1100);
}


function GetCommentaire(Indec) {
    var value = $(Indec).parent().find("input.ensid").val();
    var persone = $(Indec).parent().parent().parent().find('td:nth-child(3)').text();
    $.dialog({
        title: 'Commentaire :',
        content: function () {
            var self = this;
            return $.ajax({
                url: '/commentaire',
                data: {'Value': value},
                method: 'post'
            }).done(function (response) {
                self.setContent(persone + ' : ');
                self.setContentAppend('<br>' + response)

            }).fail(function () {
                self.setContent('Désolé Contenu Introuvable');
            });
        }

    });

}