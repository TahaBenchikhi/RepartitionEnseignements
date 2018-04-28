$(document).ready(function () {
    $('#modi').click(function () {
        $("#content").addClass("hidden");
        $("#password").removeClass("hidden");

    });




    $('#retour').click(function () {
        $("#content").removeClass("hidden");
        $("#password").addClass("hidden");
    });
    $('#form-change-password').on('submit', function (e) {

        e.preventDefault();
        var datasend = $("#form-change-password").serialize();
        console.log(datasend);
        $.confirm({
            title: 'Attention',
            content: 'Vous Ete Sur De Modifier votre mot de passe ?',
            buttons: {
                confirm: {
                    text: 'Confirmer',
                    action: function () {
                        $.ajax({
                            url: '/password',
                            type: "POST",
                            data: datasend,
                            success: function (data) {
                                swal("Mot de passe changer avec Succes!", ",", "success");

                                $(".confirm").click(function () {
                                    location.reload();
                                });
                            },
                            error: function (jXHR, textStatus, errorThrown) {
                                swal("Information Incorrect !", ",", "error");
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
