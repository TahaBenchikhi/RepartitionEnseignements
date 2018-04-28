$(function () {
    $('#Start').on('submit', function (e) {

        e.preventDefault();
        var datasend = {};
        datasend['debut'] =  $('#debut_value').val();
        datasend['fin'] =  $('#fin_value').val();
        datasend['contenu'] = $('#context').val();
        datasend['titre'] = $('#titre').val();

        $.confirm({
            title: 'Attention',
            content: 'Vous Ete Sur De Debuter une Session ?',
            buttons: {
                confirm: {
                    text: 'Confirmer',
                    action: function () {
                        $('#envoie').removeClass("hidden");
                        $("#session_submit").addClass("hidden");
                        $.ajax({
                            url: '/Start',
                            type: "POST",
                            data: datasend,
                            success: function (data) {
                                swal("Session Demarrer avec Succes!", ",", "success");

                                $(".confirm").click(function () {
                                    location.reload();
                                });
                            },
                            error: function (jXHR, textStatus, errorThrown) {
                               /* alert(errorThrown);*/
                                var x=window.open();
                                x.document.open();
                                x.document.write(jXHR.responseText);
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


$('#debut').datepicker();
$('#debut').on('changeDate', function() {
    $('#debut_value').val(
        $('#debut').datepicker('getFormattedDate')
    );

});
$('#fin').datepicker();
$('#fin').on('changeDate', function() {
    $('#fin_value').val(
        $('#fin').datepicker('getFormattedDate')
    );

});
$('.picker1').on('click','td.day',function () {
alert(1);
});
