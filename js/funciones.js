$(document).ready(function(){
	//activa la seccion del navbar donde nos encontramos
    var url = window.location.href;
    $('.nav a[href="'+url+'"]').parent().addClass('active');


});