$(document).ready(function(){

	$.validator.setDefaults({
		errorClass: 'help-block',
		highlight: function(element){
			$(element)
				.closest('.form-group')
				.addClass('has-error');
		},
		unhighlight: function(element){
			$(element)
				.closest('.form-group')
				.removeClass('has-error');
		},
//este código siguiente es para los casos en que el texto de la validación aparece primero en los checkbox
		errorPlacement: function(error, element){
			if (element.prop('type') === 'checkbox') {
				error.insertAfter(element.parent());
			}else if (element.prop('type') === 'radio') {
				error.insertBefore(element.parent());
			}else{
				error.insertAfter(element);
			}
		}
	});

	$("#registrarseForm").validate({
		rules: {
			usr_nombre: {
				required : true,
				alfa: true,
				maxlength: 125
			},
			usr_apellido: {
				alfa: true,
				minlength: 1,
				maxlength: 125
			},
			usr_email: {
				required: true,
				email: true,
				maxlength: 255
			},
			usr_confirm_email: {
				required: true,
				equalTo: "#email",
			},
			usr_direccion: {
				minlength: 1,
				direccion: true,
				maxlength: 255
			},
			usr_telefono: {
				minlength: 1,
				maxlength: 125,
				telefono: true
			},
			usr_celular: {
				minlength: 1,
				maxlength: 125,
				telefono: true
			},
			usr_otro: {
				otroContacto: true,
				minlength: 1,
				maxlength: 255
			},
			usr_access_level: {
				required: true
			},
			usr_is_active:{
				required: true
			},
			usr_new_pwd_1:{
				required: true,
				minlength: 5,
				maxlength: 125
			},
			usr_new_pwd_2:{
				required: true,
				minlength: 5,
				maxlength: 125,
				equalTo: "#usr_new_pwd_1"
			}
		},
		submitHandler: function(form){
			form.submit();
		}
	});


	jQuery.validator.addMethod("alfa", function(value, element) {
  	return this.optional(element) || /^[a-zA-Záéíóúàèìòùäëïöüñ\s]+$/i.test(value);
	}, 'Ingresa un nombre válido.');

	jQuery.validator.addMethod("email", function(value, element) {
  	return this.optional(element) || /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/.test( value );
	}, 'Ingresa una dirección de correo válida.');

	jQuery.validator.addMethod("direccion", function(value, element) {
  	return this.optional(element) || /^[a-zA-Z0-9áéíóúàèìòùäëïöüñ\s\.\,_-°'()\/]+$/.test( value );
	}, 'Ingresa una dirección válida.');

	jQuery.validator.addMethod("telefono", function(value, element) {
  	return this.optional(element) || /^[\d\s\,_\-()\/]+$/i.test(value);
	}, 'Ingresa un número válido.');

	// //Habilito el botón Registrarme cuando pasa la validación del formulario
	// $("#registrarme").prop('disabled', 'disabled');
	// $("#registrarseForm").on('keyup blur', function(){
	// 	if ($("#registrarseForm").valid()) {
	// 		$("#registrarme").prop('disabled', false);
	// 	}else{
	// 		$("#registrarme").prop('disabled', 'disabled');
	// 	}
	// });

	jQuery.validator.addMethod("otroContacto", function(value, element) {
  	return this.optional(element) || /^[^\|\¬\!\¡\¿\?\"\'\%\$\*\^\<\>\~\=\&\+\{\}]+$/.test( value );
	}, 'Red social u otro contacto.');
	//ingresar todos los caracteres menos caracteres especiales digamos

});