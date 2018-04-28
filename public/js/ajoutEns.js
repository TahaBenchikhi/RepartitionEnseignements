$(function(){
    var t={};
    $('select[name="example_length"]').val(100).change();
    $('#example_info,#example_paginate,#example_length,#example_filter').remove();

    $(".add").click(function () {
        $(".modifiable").each(function () {
            t[$(this).attr("name")] = $(this).val();
        });
        $.each(t,function (key,value) {
            if(!value)
            {


            }
            $("body").find('input[name="'+key+'"].send').val(value);
        });


        var datasend = $("#sendform").serialize();
        console.log(datasend);
        $.confirm({
            title: 'Attention',
            content: 'Vous Ete Sur D \'ajouter cette Enseignant ?',
            buttons: {
                confirm: {
                    text: 'Confirmer',
                    action: function () {
                        $.ajax({
                            url: '/ajouterEns',
                            type: "POST",
                            data: datasend,
                            success: function (data) {
                                swal("Ue Creer avec Succes!", ",", "success");

                                $(".confirm").click(function () {
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

    $('.drop').click(function () {
        $.confirm({
            title: 'Attention',
            content: 'Vous Ete Sur d\'annuler la création?',
            buttons: {
                confirm: {
                    text: 'Confirmer',
                    action: function () {
                        location.reload();
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