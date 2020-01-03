
	var ban = true;
	var banModal = true;
	var banItemProgresoUnidad = true;

	$(document).ready(function()
	{

		setTimeout(function(){
			$(".MainNav-Logo").removeClass("girar");
		},5800);

		setInterval(function(){
			$(".MainNav-Logo").addClass("girar");

			setTimeout(function(){
				$(".MainNav-Logo").removeClass("girar");
			},5800);
		},12000);



		var slider1 = $('.Inicio-ListMisCursos').eq(0).bxSlider(
		{
			mode: 'horizontal',
			auto: true,
			touchEnabled: false,
			//pause: 2000,
			speed: 800,
			minSlides: 8,
			maxSlides: 8,
			pager: false
		});

		var slider2 = $('.Inicio-ListMisCursos').eq(1).bxSlider(
		{
			mode: 'horizontal',
			auto: true,
			speed: 800,
			autoDirection: 'prev',
			touchEnabled: false,
			minSlides: 8,
			maxSlides: 8,
			pager: false
		});


		$(".Inicio-ListMisCursos").eq(0).mouseover(function() {
			slider1.stopAuto();
		});

		$(".Inicio-ListMisCursos").eq(0).mouseout(function() {
			slider1.startAuto();
		});

		$(".Inicio-ListMisCursos").eq(1).mouseover(function() {
			slider2.stopAuto();
		});

		$(".Inicio-ListMisCursos").eq(1).mouseout(function() {
			slider2.startAuto();
		});



		$(".MainNav-BtnOcultar").click(function()
		{
			if(ban){
				$(".MainNav").animate({'left':'-314px'}, 500);
				$(".Inicio").animate({'padding-left':'60px'}, 500);
				$(".Unidad-Header").animate({'padding-left':'60px'}, 500);
				$(".Unidad-Content").animate({'padding-left':'40px'}, 500);
				$(".Inicio-ListMisCursos").removeClass("u-textLeft").addClass("u-textCenter");

				$(this).addClass("cerrado");
				ban = false;
			}
			else
			{
				$(".MainNav").animate({'left':'0px'}, 500);
				$(".Inicio").animate({'padding-left':'460px'}, 500);
				$(".Unidad-Header").animate({'padding-left':'375px'}, 500);
				$(".Unidad-Content").animate({'padding-left':'315px'}, 500);
				$(".Inicio-ListMisCursos").removeClass("u-textCenter").addClass("u-textLeft");

				$(this).removeClass("cerrado");
				ban = true;
			}
		});

		//Cerrar modal
		$(".Modal-Cerrar").click(function()
		{
			$(".Modal").fadeOut();
		});

		//Modal mi perfil
		$(".MainNav-ItemList").eq(0).click(function()
		{
            $(".Modal--MiPerfil").fadeIn();
		});

		//Modal evaluciones
		$(".MainNav-ItemList").eq(1).click(function()
		{
			$(".Modal--Evaluaciones").fadeIn();
		});

		$(".ModalEvaluaciones-Cerrar").click(function()
		{
			$(".Modal--Evaluaciones").fadeOut();
		});

		//Modal progreso
		$(".MainNav-ItemList").eq(2).click(function()
		{
			$(".Modal--Progreso").fadeIn();
		});

		$(".ModalProgreso-Cerrar").click(function()
		{
			$(".Modal--Progreso").fadeOut();
		});


		//List Modal progreso
		$(".ModalProgreso-ItemCursoList").click(function(){
			$(".ModalProgreso-ItemCursoList").removeClass("activo");
			$(this).addClass("activo");
		});

		$(".ModalProgreso-ItemCursoList ul li").click(function(){
			$(".ModalProgreso-ItemCursoList ul li").removeClass("activo");

			$(this).addClass("activo");
		});


		//Modal Glosario
		$(".Unidad-ListHeader li a").eq(0).click(function()
		{
			$(".Modal--Glosario").fadeIn();
		});

		$(".ModalGlosario-Cerrar").click(function()
		{
			$(".Modal--Glosario").fadeOut();
		});


		//Modal descargar
		$(".Unidad-ListHeader li a").eq(1).click(function()
		{
			$(".Modal--Descargas").fadeIn();
		});

		$(".ModalDescargar-Cerrar").click(function()
		{
			$(".Modal--Descargas").fadeOut();
		});


		//Modal ayuda
		$(".MainNav-ItemMenu2").eq(1).click(function()
		{
			$(".ModalAyuda").fadeIn();
		});

		$(".ModalAyuda-Cerrar").click(function()
		{
			$(".ModalAyuda").fadeOut();
		});


		///Tab unidades
		$(".Curso-ListUnidades li").each(function(m)
		{
			if(m==1 || m==3){
				$(this).click(function()
				{
					$(".Curso-ListUnidades li").removeClass('activo');
					$(this).addClass('activo');

					$(".Unidad-ListMenuUnidad").animate({'opacity':'0'}, 100);
					$(".Unidad-ListMenuUnidad").css({display:'none'});

					$(".Unidad-ListMenuUnidad").eq(m).css({display:'block'});
					$(".Unidad-ListMenuUnidad").eq(m).animate({'opacity':'1'}, 200);
				});
			}
		});

		$(".BtnRecuperar").click(function()
		{
			$(".RecuperarContrasenia").toggle("slow");
		});

		$("#EvaluaContenido .MiPerfil-IcoEstrella").each(function(m)
		{
			$(this).click(function()
			{
				var calificacion = ((m+1)*2);

				$(".MiPerfil-CalificacionEValuacion").eq(0).html("<strong>"+calificacion+"</strong>");
                $('#evalua_contenido').val(calificacion)
				$("#EvaluaContenido .MiPerfil-IcoEstrella").addClass("InActiva");

				for(var a=0; a<(m+1); a++){
					$("#EvaluaContenido .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
				}

			});
		});


		$("#EvaluaFacil .MiPerfil-IcoEstrella").each(function(m)
		{
			$(this).click(function()
			{
				var calificacion = ((m+1)*2);

				$(".MiPerfil-CalificacionEValuacion").eq(1).html("<strong>"+calificacion+"</strong>");
                $('#evalua_facil').val(calificacion)
				$("#EvaluaFacil .MiPerfil-IcoEstrella").addClass("InActiva");

				for(var a=0; a<(m+1); a++){
					$("#EvaluaFacil .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
				}

			});
		});


		$("#EvaluaGraficos .MiPerfil-IcoEstrella").each(function(m)
		{
			$(this).click(function()
			{
				var calificacion = ((m+1)*2);

                $(".MiPerfil-CalificacionEValuacion").eq(2).html("<strong>"+calificacion+"</strong>");
                $('#evalua_graficos').val(calificacion)

				$("#EvaluaGraficos .MiPerfil-IcoEstrella").addClass("InActiva");

				for(var a=0; a<(m+1); a++){
					$("#EvaluaGraficos .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
				}

			});
		});


		$("#EvaluaInteractivo .MiPerfil-IcoEstrella").each(function(m)
		{
			$(this).click(function()
			{
				var calificacion = ((m+1)*2);

				$(".MiPerfil-CalificacionEValuacion").eq(3).html("<strong>"+calificacion+"</strong>");
                $('#evalua_interactivo').val(calificacion)
				$("#EvaluaInteractivo .MiPerfil-IcoEstrella").addClass("InActiva");

				for(var a=0; a<(m+1); a++){
					$("#EvaluaInteractivo .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
				}

			});
		});


		$("#EvaluaIntuitivo .MiPerfil-IcoEstrella").each(function(m)
		{
			$(this).click(function()
			{
				var calificacion = ((m+1)*2);

				$(".MiPerfil-CalificacionEValuacion").eq(4).html("<strong>"+calificacion+"</strong>");
                $('#evalua_intuitivo').val(calificacion)
				$("#EvaluaIntuitivo .MiPerfil-IcoEstrella").addClass("InActiva");

				for(var a=0; a<(m+1); a++){
					$("#EvaluaIntuitivo .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
				}

			});
		});


	});

