
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


		$('.Inicio-ListMisCursos').eq(0).bxSlider(
		{
			mode: 'horizontal',
			auto: true,
			minSlides: 8,
			pause: 2000,
			maxSlides: 8,
			pager: false
		});
		
		$('.Inicio-ListMisCursos').eq(1).bxSlider(
		{
			mode: 'horizontal',
			auto: true,
			pause: 2000,
			autoDirection: 'prev',
			minSlides: 8,
			maxSlides: 8,
			pager: false
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

		$(".MainNav-ItemList").eq(2).click(function()
		{
			$(".ModalProgreso").fadeIn();
			banModal = false;
		});
				
		$(".ModalProgreso-Cerrar").click(function()
		{
			$(".ModalProgreso").fadeOut();
			banModal = true;
		});

		$(".ModalProgreso-ItemCursoList").click(function(){
			$(".ModalProgreso-ItemCursoList").removeClass("activo");
			$(this).addClass("activo");
		});

		$(".ModalProgreso-ItemCursoList ul li").click(function(){
			$(".ModalProgreso-ItemCursoList ul li").removeClass("activo");

			$(this).addClass("activo");
		});



		$(".Unidad-ListHeader li a").eq(0).click(function()
		{
			$(".ModalGlosario").fadeIn();
			banModal = false;
		});
				
		$(".ModalGlosario-Cerrar").click(function()
		{
			$(".ModalGlosario").fadeOut();
			banModal = true;
		});


		$(".Unidad-ListHeader li a").eq(1).click(function()
		{
			$(".ModalDescargas").fadeIn();
			banModal = false;
		});
				
		$(".ModalDescargar-Cerrar").click(function()
		{
			$(".ModalDescargas").fadeOut();
			banModal = true;
		});


		$(".MainNav-ItemList").eq(1).click(function()
		{
			$(".ModalEvaluaciones").fadeIn();
			banModal = false;
		});
				
		$(".ModalEvaluaciones-Cerrar").click(function()
		{
			$(".ModalEvaluaciones").fadeOut();
			banModal = true;
		});


		$(".MainNav-ItemMenu2").eq(1).click(function()
		{
			$(".ModalAyuda").fadeIn();
		});
				
		$(".ModalAyuda-Cerrar").click(function()
		{
			$(".ModalAyuda").fadeOut();
		});



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
	}); 
			
