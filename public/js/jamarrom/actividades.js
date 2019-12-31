
	$(document).ready(function()
	{
		$("#txtBuscador").keyup(function(){
			buscarActividades($(this).val());
		});
	});

	/*
	$(document).ready(function()
	{  
		//Guardar actividad
		$(".Registro-BtnGuardarActividad").click(function()
		{
			if(validar_campo("#txtActividad",2,"Escribe aqui la actividad"))
			{		
				$(".Registro-Enviando img").css({"display": "inline"});
				$("#formAgregarActividad")[0].submit();	
			}
		});
	});	

	
	//Eliminar actividad
	function eliminar_actividad(id_a)
	{
		if(confirm("¿Desea eliminar esta actividad?"))
		   window.location.href='index.php?controlador=actividades&accion=eliminar&id='+id_a;
	}
   
	function editar_actividad(id_a)
	{
		if(confirm("¿Desea editar esta actividad?")){
			$(".InformacionTabla-Title").html("Editar actividad:");
			$("#hdIdActividad").val(listaActividades[id_a]['id_actividad']);
			$("#txtActividad").val(listaActividades[id_a]['actividad']);
			$("#hdAccion").val(2);
		}
	}*/

	function buscarActividades(busqueda)
   	{
	   var itemsTabla = "";
	   var numPaginas = 0;	
	   var canti = 0;	   												
	   
	   for(var j=0; j < listaActividades.length && canti < paginas; j++)
	   {
			if(listaActividades[j]['clave'].toUpperCase().indexOf(busqueda.toUpperCase()) != -1){

				itemsTabla += "<tr class='u-efecto'>";
				itemsTabla += "<td align='center'><i class='fas fa-circle "+listaActividades[j]['statu']+"'></i></td>";
				itemsTabla += "<td align='center'>"+listaActividades[j]['folio']+"</td>";
				itemsTabla += "<td align='center'>"+listaActividades[j]['fecha_creacion_f']+" @ "+listaActividades[j]['fecha_creacion_h']+"</td>";
				itemsTabla += "<td align='center'>"+listaActividades[j]['cliente']+"</td>";
				itemsTabla += "<td align='left'>"+listaActividades[j]['descripcion']+"</td>";
				itemsTabla += "<td align='center' class='Usuario'>"+listaActividades[j]['usuario']+"</td>";
				itemsTabla += "<td align='center'><span class='"+listaActividades[j]['prioridad']+"'>"+listaActividades[j]['prioridad'].toUpperCase()+"</span></td>";
				
				if(listaActividades[j]['desfasada'])
					itemsTabla += "<td align='center'><span class='retraso'>"+listaActividades[j]['fecha_entrega']+"</span></td>";			
				else
					itemsTabla += "<td align='center'>"+listaActividades[j]['fecha_entrega']+"</td>";

				itemsTabla += "</tr>";						

				canti++;
			}
	   }

	   $(".tbListaActividades").html(itemsTabla);
	}
	  

   	//Paginar actividades
   	function paginarActividades()
   	{
	   var itemsTabla = "";
	   var numPaginas = 0;	
	   var canti = 0;	   												
	   
	   for(var j=0; j < listaActividades.length && canti < paginas; j++)
	   {
		    itemsTabla += "<tr class='u-efecto'>";
			itemsTabla += "<td align='center'><i class='fas fa-circle "+listaActividades[j]['statu'].replace('ó', 'o')+"'></i></td>";
			itemsTabla += "<td align='center'>"+listaActividades[j]['folio']+"</td>";
			itemsTabla += "<td align='center'>"+listaActividades[j]['fecha_creacion_f']+" @ "+listaActividades[j]['fecha_creacion_h']+"</td>";
			itemsTabla += "<td align='center'>"+listaActividades[j]['cliente']+"</td>";
			itemsTabla += "<td align='left'>"+listaActividades[j]['descripcion']+"</td>";
			itemsTabla += "<td align='center' class='Usuario'>"+listaActividades[j]['usuario']+"</td>";
			itemsTabla += "<td align='center'><span class='"+listaActividades[j]['prioridad']+"'>"+listaActividades[j]['prioridad'].toUpperCase()+"</span></td>";
			
			if(listaActividades[j]['desfasada'])
				itemsTabla += "<td align='center'><span class='retraso'>"+listaActividades[j]['fecha_entrega']+"</span></td>";			
			else
				itemsTabla += "<td align='center'>"+listaActividades[j]['fecha_entrega']+"</td>";

			itemsTabla += "</tr>";						

		   canti++;			   
	   }		
	   
	   /*	   
	   //Numero de paginas
	   var diferencia = numActividades / paginas;
		   
	   if (diferencia - Math.floor(diferencia) == 0)
		   numPaginas = diferencia;
	   else
		   numPaginas = Math.floor(diferencia) + 1; 						
					   
	   //Numero de paginas li a
	   $(".Paginacion-List").html("");				
	   
	   for(var j=0; j < numPaginas; j++)
	   {
		   if(j == 0)
			   $(".Paginacion-List").append("<li class='u-inline-block u-efecto activo'>"+(j+1)+"</li>");
		   else
			   $(".Paginacion-List").append("<li class='u-inline-block u-efecto'>"+(j+1)+"</li>");
	   }*/

	   $(".tbListaActividades").html(itemsTabla);
  	}
   
	/*
   	//Paginacion por item de paginacion
   	function paginacionActividadesActual()
   	{
	   $(".tbListaActividades").animate({'opacity':'0'},500);

	   var itemsTabla = "";
	   var paginaActual = parseInt($(".Paginacion-List li.activo").html().replace(/[^\d]/g, ''));
	   var inicioPaginacion = ((paginaActual - 1) * paginas);
	   var canti = 0;
											   
	   for(var j=(inicioPaginacion); j < listaActividades.length && j < (paginaActual * paginas); j++)	 
	   {
			itemsTabla += "<tr class='u-efecto'>";
		   	itemsTabla += "<td>"+listaActividades[j]['actividad']+"</td>";
		   	itemsTabla += "<td width='100px'><a onclick='editar_actividad("+j+")' class='u-inline-block u-redondeadoTotal'><span class='icon-icoEditar'></span></a><a onclick='eliminar_actividad("+listaActividades[j]['id_actividad']+")' class='u-inline-block u-redondeadoTotal'><span class='icon-icoBorrar'></span></a></td>";
		   	itemsTabla += "</tr>";

		   canti++;	
	   }
	   
	   $(".tbListaActividades").html(itemsTabla);
	   $(".tbListaActividades").animate({'opacity':'1'}, 500);
	}*/
	   
