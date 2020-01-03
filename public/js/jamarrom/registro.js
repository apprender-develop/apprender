			$(document).ready(function() 
			{			
				setTimeout(function(){
					$(".Login-Form").addClass("slideDown");
				},700);

				$("#btnEntrar").click(function()
				{
					if(validar_campo("#txtNombre",5,"Nombre completo"))
						if(validar_campo("#txtNoFicha",6,"No de ficha"))
						{					
							$(".Notificaciones-Cargado img").css({"display": "inline"});
							
							$("#form-login").submit();
						}				
				});			
            }); 
			