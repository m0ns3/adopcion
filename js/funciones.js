$(document).ready(function(){
	
    var url = window.location.href;
    $('.nav a[href="'+url+'"]').parent().addClass('active');


	$("#ver_mas").modal();
	
	$("#btnModal").click(function(event){
		event.preventDefault();
		document.location.href = "<?php echo base_url('mascotas'); ?>";
	});

});