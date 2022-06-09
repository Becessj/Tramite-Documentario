// JavaScript Validacion de registro

$('document').ready(function()
{ 		 

		 // Validacion de nombres
		 var nameregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		 
		 $("#register-form").validate({
					
		  rules:
		  {
				name: {
					required: true,
					validname: true,
					minlength: 4
				},
				email : {
				required : true,
				validemail: true,
				remote: {
					url: "RevisarEmail.php",
					type: "post",
					data: {
						email: function() {
							return $( "#email" ).val();
						}
					}
				}
				},
				celular: {
					required: true,
					minlength: 5,
					maxlength: 20
				},
				
				password: {
					required: true,
					minlength: 6,
					maxlength: 15
				},
				cpassword: {
					required: true,
					equalTo: '#password'
				},
		   },
		   messages:
		   {
				name: {
					required: "Su nombre es requerido",
					validname: "El nombre debe contener solo alfabetos y espacio",
					minlength: "Tu nombre es muy corto"
					  },
				email : {
				required : "Email es requerido",
				validemail : "Por favor ingrese una dirección E-mail válida",
				remote : "Email ya existe"
			},
				celular:{
					required: "El celular es requerido",
					minlength: "El minimo de caracteres es 5"
					},
				password:{
					required: "Contraseña es requerida",
					minlength: "La contraseña debe tener como minimo 6 caracteres"
					},
				cpassword:{
					required: "Reescribe tu contraseña",
					equalTo: "La contraseña no coincidió!"
					}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
				submitHandler: submitForm
		   }); 
		   
		   
		   function submitForm(){
			   
			   $.ajax({
			   		url: 'RegistroAjax.php',
			   		type: 'POST',
			   		data: $('#register-form').serialize(),
			   		dataType: 'json'
			   })
			   .done(function(data){
			   		
			   		$('#btn-signup').html('<img src="ajax-loader.gif" /> &nbsp; Registrando...').prop('disabled', true);
			   		$('input[type=text],input[type=email],input[type=text],input[type=password]').prop('disabled', true);
			   		
			   		setTimeout(function(){
								   
						if ( data.status==='success' ) {
							
							$('#errorDiv').slideDown('fast', function(){
								$('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
								$("#register-form").trigger('reset');
								$('input[type=text],input[type=email],input[type=text],input[type=password]').prop('disabled', false);
								$('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registrarme').prop('disabled', false);
							}).delay(3000).slideUp('fast');
							
									   
					    } else {
									   
						    $('#errorDiv').slideDown('fast', function(){
						      	$('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
							  	$("#register-form").trigger('reset');
							  	$('input[type=text],input[type=email],input[type=text],input[type=password]').prop('disabled', false);
							  	$('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registrarme').prop('disabled', false);
							}).delay(3000).slideUp('fast');
						}
								  
					},3000);
			   		
			   })
			   .fail(function(){
			   		$("#register-form").trigger('reset');
			   		alert('Se ha producido un error desconocido. Inténtalo de nuevo más tarde....');
			   });
		   }
});