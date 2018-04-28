$(document).ready(function () {


    var cnt = 0;
    $(".search-choice").each(function () {
        var str = $(this).find('span').text();
        var pattern = /[0-9]+/g;
        var matches = str.match(pattern);
        cnt += parseInt(matches[matches.length-1]);
    });
    $('#theprogressbar').css({"width":(cnt*0.1)+"%"}).text(cnt+" HTD");




    $(document).on('click', '.search-choice', function(){
        var te  = $.trim($(this).find('span').text());
        var send = te.substring(0,te.indexOf(" ")-1);

        var datasend = {};
        datasend["id"] = send;
       $.ajax({
            url: '/getid',
            type: "POST",
            data: datasend,
            success: function (data) {
                window.open("/ficheUEEns/"+data, '_blank');
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    $(document).on('click',$(".chosen-drop"), function(){
        cnt = 0;
       $(".search-choice").each(function () {
           var str = $(this).find('span').text();
           var pattern = /[0-9]+/g;
           var matches = str.match(pattern);
           cnt += parseInt(matches[matches.length-1]);
       });
        $('#theprogressbar').css({"width":(cnt*0.1)+"%"}).text(cnt+" HTD");


    });

    $('a').click(function () {
       var element = $(this).parent().context;
       if($(element).attr("class") == "search-choice-close")
       {
           cnt = 0;
           $(".search-choice").each(function () {
               var str = $(this).find('span').text();
               var pattern = /[0-9]+/g;
               var matches = str.match(pattern);
               cnt += parseInt(matches[matches.length-1]);
           });
           $('#theprogressbar').css({"width":(cnt*0.1)+"%"}).text(cnt+" HTD");
       }

    });

});