			function validarPDF(documento)
			{
				if(documento.indexOf("pdf") == -1)
				{
				  alert("El documento debe de estar en formato PDF");
				  return false;
				}
					
				return true;
			}
			
			function validar_campo(campo,cant_num, place)
 			{ 
  				var ban = true;
  
     			if(/^\s+$/.test($(campo).val()) || $(campo).val().length < cant_num ||  $(campo).val() == place)
	  			{
					$(campo).effect('pulsate', { times:2 }, 1000);		
					$(campo).focus();
					ban = false;		
	  			}
  			return ban;
 			}
					
			function validar_campoEspecial(campo,ejecutarValidacion,cant_num, place)
			{ 
				var ban = true;
	  
				if(/^\s+$/.test($(campo).val()) || $(campo).val().length < cant_num ||  $(campo).val() == place)
				{
					$(ejecutarValidacion).effect('pulsate', { times:2 }, 1000);		
					$(ejecutarValidacion).focus();
					ban = false;		
				}
			return ban;
			}

			function validar_campoSelect(campo,ejecutarValidacion,posicion,cant_num, place)
			{ 
				var ban = true;
	  
				if(/^\s+$/.test($(campo).val()) || $(campo).val().length < cant_num ||  $(campo).val() == place)
				{
					$(ejecutarValidacion).eq(posicion).effect('pulsate', { times:2 }, 1000);		
					$(ejecutarValidacion).eq(posicion).focus();
					ban = false;		
				}
			return ban;
			}
			
			function validar_campoHtml(campo,ejecutarValidacion,cant_num, place)
			{ 
				var ban = true;
	  
				if(/^\s+$/.test($(campo).html()) || $(campo).html().length < cant_num ||  $(campo).html() == place)
				{
					$(ejecutarValidacion).effect('pulsate', { times:2 }, 1000);		
					$(ejecutarValidacion).focus();
					ban = false;		
				}
			return ban;
			}