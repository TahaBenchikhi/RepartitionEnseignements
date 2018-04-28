$(function(){
    var t = {};
    var data;
$('.valider').click(function () {
    $("input[type='text']").each(function () {
        t[$(this).attr("name")] = $(this).val();
    });
    t["commentaire"] = $("#text-editor").val();
    $.confirm({
        title: 'Attention',
        content: 'Vous Ete Sur De Modifier Cette UE ?',
        buttons: {
            confirm: {
                text: 'Confirmer',
                action: function () {
                    $.ajax({
                        url : '/UpdateFicheUe',
                        type: "POST",
                        data: t,
                        success: function (data) {
                            swal("UE Modifier avec Succes!", ",", "success");

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


$(".modifier").click(function () {
    data = $("#example").html();
    $('.valider,.annuler').removeClass("hidden");
    $('#text-editor').attr("disabled",false);
    $(this).addClass("hidden");
    $(".delete").addClass("hidden");
    $(".modifiable").each(function () {
    var text=$(this).text().replace("'","");
    var name = $(this).attr('data-name').replace("'","");;
        $(this).replaceWith("<input pattern='^[a-zA-Z0-9]+$' width='100%' height='100%' type='text' value='"+text+"'name='"+name+"'/>");
    });


});
$(".annuler").click(function () {


    $.confirm({
        title: 'Attention',
        content: 'Vous Ete Sur De Annuler les modification?',
        buttons: {
            confirm: {
                text: 'Confirmer',
                action: function () {
                    $("#example").html(data);
                    $('.valider,.annuler').addClass("hidden");
                    $('.modifier,.delete').removeClass("hidden");
                    $('#text-editor').attr("disabled",true);
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

$('select[name="example_length"]').val(25).change();

$(".delete").click(function () {
    var s={};
    s['id'] = $("th[data-name='id']").text();
    $.confirm({
        title: 'Attention',
        content: 'Vous êtes sûr de supprimer cet UE ?',
        buttons: {
            confirm: {
                text: 'Confirmer',
                action: function () {
                    $.ajax({
                        url : '/DeleteUe',
                        type: "POST",
                        data: s,
                        success: function (data) {
                            swal("UE Supprimer avec Succes!", ",", "success");

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