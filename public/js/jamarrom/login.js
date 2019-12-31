			$(document).ready(function() 
			{			
				setTimeout(function(){
					$(".Login-Form").addClass("slideDown");
				},700);

				$("#btnEntrar").click(function()
				{
					//if(validar_campo("#txtUsuario",2,"Usuario"))
						//if(validar_campo("#txtContrasenia",2,"Contraseña"))
						//{					
							$(".Notificaciones-Cargado img").css({"display": "inline"});
							
							$("#form-login").submit();
						//}				
				});			
            }); 
			