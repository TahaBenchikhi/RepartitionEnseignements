$(document).ready(function() {
	$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });	
	setInterval(function(){
		$.post('/checkmessage',{},function(retour){
    		if(retour != 0){$(".badge").css({'opacity':'1'});$(".badge").text(retour);}
		});
	}, 5000);
});