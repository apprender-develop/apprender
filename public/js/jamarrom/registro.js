			$(document).ready(function() 
			{			
				setTimeout(function(){
					$(".Login-Form").addClass("slideDown");
				},700);

				$("#btnEntrar").click(function()
				{
					if(validar_campo("#txtNombre",11,"Nombre completo"))
						if(validar_campo("#txtNoFicha",10,"No de ficha"))
						{					
							$(".Notificaciones-Cargado img").css({"display": "inline"});
							
							$("#form-login").submit();
						}				
				});			
            }); 
			