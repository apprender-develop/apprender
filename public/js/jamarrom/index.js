var ban = true;
var banModal = true;
var banItemProgresoUnidad = true;

$(document).ready(function () {

	setTimeout(function () {
		$(".MainNav-Logo").removeClass("girar");
	}, 5800);

	setInterval(function () {
		$(".MainNav-Logo").addClass("girar");

		setTimeout(function () {
			$(".MainNav-Logo").removeClass("girar");
		}, 5800);
	}, 12000);



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


	$(".Inicio-ListMisCursos").eq(0).mouseover(function () {
		slider1.stopAuto();
	});

	$(".Inicio-ListMisCursos").eq(0).mouseout(function () {
		slider1.startAuto();
	});

	$(".Inicio-ListMisCursos").eq(1).mouseover(function () {
		slider2.stopAuto();
	});

	$(".Inicio-ListMisCursos").eq(1).mouseout(function () {
		slider2.startAuto();
	});

    $(".MainNav-BtnAyuda").click(function(){
        $('.Modal--Ayuda').fadeIn();
        $('[class*=ModalRegistro').fadeIn();
    });


	$(".MainNav-BtnOcultar").click(function () {
		if (ban) {
			$(".MainNav").animate({ 'left': '-314px' }, 500);
			$(".Inicio").animate({ 'padding-left': '60px' }, 500);
			$(".Unidad-Header").animate({ 'padding-left': '60px' }, 500);
			$(".Unidad-Content").animate({ 'padding-left': '40px' }, 500);
			$(".Inicio-ListMisCursos").removeClass("u-textLeft").addClass("u-textCenter");

			$(this).addClass("cerrado");
			ban = false;
		}
		else {
			$(".MainNav").animate({ 'left': '0px' }, 500);
			$(".Inicio").animate({ 'padding-left': '460px' }, 500);
			$(".Unidad-Header").animate({ 'padding-left': '375px' }, 500);
			$(".Unidad-Content").animate({ 'padding-left': '315px' }, 500);
			$(".Inicio-ListMisCursos").removeClass("u-textCenter").addClass("u-textLeft");

			$(this).removeClass("cerrado");
			ban = true;
		}
	});

	//Cerrar modal
	$(".Modal-Cerrar").click(function () {
		$(".Modal").fadeOut();
	});

	//Modal mi perfil
	$(".MainNav-ItemList").eq(0).click(function () {
		$(".Modal--MiPerfil").fadeIn();
	});

	//Modal evaluciones
	$(".MainNav-ItemList").eq(1).click(function () {
		$(".Modal--Evaluaciones").fadeIn();
	});

	$(".ModalEvaluaciones-Cerrar").click(function () {
		$(".Modal--Evaluaciones").fadeOut();
	});

	//Modal progreso
	$(".MainNav-ItemList").eq(2).click(function () {
		$(".Modal--Progreso").fadeIn();
	});

	$(".ModalProgreso-Cerrar").click(function () {
		$(".Modal--Progreso").fadeOut();
	});


	//List Modal progreso
	$(".ModalProgreso-ItemCursoList").click(function () {
		$(".ModalProgreso-ItemCursoList").removeClass("activo");
		$(this).addClass("activo");
	});

	$(".ModalProgreso-ItemCursoList ul li").click(function () {
		$(".ModalProgreso-ItemCursoList ul li").removeClass("activo");

		$(this).addClass("activo");
	});


	//Modal Glosario
	$(".Unidad-ListHeader li a").eq(0).click(function () {
		$(".Modal--Glosario").fadeIn();
	});

	$(".ModalGlosario-Cerrar").click(function () {
		$(".Modal--Glosario").fadeOut();
	});


	//Modal descargar
	$(".Unidad-ListHeader li a").eq(1).click(function () {
		$(".Modal--Descargas").fadeIn();
	});

	$(".ModalDescargar-Cerrar").click(function () {
		$(".Modal--Descargas").fadeOut();
	});


	//Modal ayuda
	$(".MainNav-ItemMenu2").eq(1).click(function () {
		$(".ModalAyuda").fadeIn();
	});

	$(".ModalAyuda-Cerrar").click(function () {
		$(".ModalAyuda").fadeOut();
	});


	///Tab unidades
	$(".Curso-ListUnidades li").each(function (m) {
		if (m == 1 || m == 3) {
			$(this).click(function () {
				$(".Curso-ListUnidades li").removeClass('activo');
				$(this).addClass('activo');

				$(".Unidad-ListMenuUnidad").animate({ 'opacity': '0' }, 100);
				$(".Unidad-ListMenuUnidad").css({ display: 'none' });

				$(".Unidad-ListMenuUnidad").eq(m).css({ display: 'block' });
				$(".Unidad-ListMenuUnidad").eq(m).animate({ 'opacity': '1' }, 200);
			});
		}
	});

	$(".BtnRecuperar").click(function () {
		$(".RecuperarContrasenia").toggle("slow");
	});

	$("#EvaluaContenido .MiPerfil-IcoEstrella").each(function (m) {
		$(this).click(function () {
			var calificacion = ((m + 1) * 2);

			$(".MiPerfil-CalificacionEValuacion").eq(0).html("<strong>" + calificacion + "</strong>");
            $('#evalua_contenido').val(calificacion)
			$("#EvaluaContenido .MiPerfil-IcoEstrella").addClass("InActiva");

			for (var a = 0; a < (m + 1); a++) {
				$("#EvaluaContenido .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
			}

		});
	});


	$("#EvaluaFacil .MiPerfil-IcoEstrella").each(function (m) {
		$(this).click(function () {
			var calificacion = ((m + 1) * 2);

			$(".MiPerfil-CalificacionEValuacion").eq(1).html("<strong>" + calificacion + "</strong>");
            $('#evalua_facil').val(calificacion)
			$("#EvaluaFacil .MiPerfil-IcoEstrella").addClass("InActiva");

			for (var a = 0; a < (m + 1); a++) {
				$("#EvaluaFacil .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
			}

		});
	});


	$("#EvaluaGraficos .MiPerfil-IcoEstrella").each(function (m) {
		$(this).click(function () {
			var calificacion = ((m + 1) * 2);

			$(".MiPerfil-CalificacionEValuacion").eq(2).html("<strong>" + calificacion + "</strong>");
            $('#evalua_graficos').val(calificacion)
			$("#EvaluaGraficos .MiPerfil-IcoEstrella").addClass("InActiva");

			for (var a = 0; a < (m + 1); a++) {
				$("#EvaluaGraficos .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
			}

		});
	});


	$("#EvaluaInteractivo .MiPerfil-IcoEstrella").each(function (m) {
		$(this).click(function () {
			var calificacion = ((m + 1) * 2);

			$(".MiPerfil-CalificacionEValuacion").eq(3).html("<strong>" + calificacion + "</strong>");
            $('#evalua_interactivo').val(calificacion)
			$("#EvaluaInteractivo .MiPerfil-IcoEstrella").addClass("InActiva");

			for (var a = 0; a < (m + 1); a++) {
				$("#EvaluaInteractivo .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
			}

		});
	});


	$("#EvaluaIntuitivo .MiPerfil-IcoEstrella").each(function (m) {
		$(this).click(function () {
			var calificacion = ((m + 1) * 2);

			$(".MiPerfil-CalificacionEValuacion").eq(4).html("<strong>" + calificacion + "</strong>");
            $('#evalua_intuitivo').val(calificacion)
			$("#EvaluaIntuitivo .MiPerfil-IcoEstrella").addClass("InActiva");

			for (var a = 0; a < (m + 1); a++) {
				$("#EvaluaIntuitivo .MiPerfil-IcoEstrella").eq(a).removeClass("InActiva");
			}

		});
	});


	setTimeout(function () {
		if (getUrl() == "curso1.php?unidad=4")
			$(".Curso-ListUnidades li").eq(3).click();
    }, 200);


    setTimeout(function()
	{
		$('.videoGaleria').on('play', function () { //cuando un audio empieza a reproducirse
			var current=this;
			$('.videoGaleria').each(function(j) {
				if (this != current) { //todos los demás
					setTimeout(function()
					{
						document.getElementById("videoGaleria"+j).pause();
						document.getElementById("videoGaleria"+j).currentTime = 0;
					},500);
				}
			});
		});
	},400);
});

var listExtintores = [
	['extintor1.png', 'AGUA', '4_5_01_Agua.mp3', '<p>El extintor de agua, es aquel cuyo agente extinguidor está constituido por agua o por una solución acuosa y un gas auxiliar, distinguiéndose los siguientes tipos: </p><p>Forma de Extinción: Por enfriamiento. </p><p>Peligros de empleo: No utilizar en equipos o aparatos eléctricos.</p><p>Clases de fuego: Eficaz en fuegos de clase "A".</p>'],
	['extintor2.png', 'DIÓXIDO DE CARBONO (CO2)', '4_5_02_DioxidocarbonoCO2.mp3', '<p>El extintor de CO2, es aquél cuyo agente extinguidor está constituido por este gas, en estado líquido, proyectado en forma sólida llamada "nieve carbónica". La proyección se obtiene por la presión permanente que crea en el aparato el agente extintor.</p><p>Forma de Extinción: Desplaza el oxígeno.<br />Peligros de empleo: No exponer el aparato al calor. <br />Clases de fuego: Eficaz en fuegos de clase "A" y "C". <br /><strong>Utilizable en presencia de corriente eléctrica</strong>.</p>'],
	['extintor3.png', 'ESPUMA', '4_5_03_Espuma.mp3', '<p>El extintor de espuma es aquél que proyecta mediante presión de un gas auxiliar una emulsión, o una solución que contenga un producto emulsor, formándose la espuma al batirse la mezcla agua-emulsor con el aire.</p><p>Forma de Extinción: Por sofocación y enfriamiento.</p><p>Peligros de empleo: No utilizar en equipos o aparatos eléctricos.</p><p>Clases de fuego: Eficaz en fuegos de clase "A" y "B".</p>'],
	['extintor4.png', 'POLVO QUÍMICO SECO', '4_5_04_Polvo_quimico_seco.mp3', '<p>El extintor de polvo es aquél cuyo agente extinguidor se encuentra en forma de polvo y es proyectado mediante la presión proporcionada por la liberación de un gas auxiliar o por una presurización previa.</p><p>Forma de Extinción: Interrumpe la reacción en cadena.</p><p>Peligros de empleo: El polvo químico es corrosivo para instalaciones eléctricas y electrónicas.</p><p>Clases de fuego: Polvo Normal seco; poco eficaz en fuegos de clase "A" y muy eficaz en fuegos de clase "B".</p><p>Polvo Polivalente: eficaz en fuegos de clase "A", muy eficaz en fuegos de clase "B".</p>'],
	['extintor5.png', 'HIDROCARBUROS HALOGENADOS (HALONES)', '4_5_05_Hidrocarburo_Halogenados.mp3', '<p>Un extintor de halón es aquél cuyo agente está formado por uno o varios de éstos gases, actualmente se encuentran fuera del mercado ya que tienen impactos negativos sobre la capa de ozono.</p><p>Los fabricantes de gases halogenados, han investigado nuevos productos alternativos y sustitutos que han sido utilizados con resultados satisfactorios como son:</p><p>• Agente Alternativo: Sistema INERGEN (gases inertes CO2 y Nitrógeno)</p><p>• Agente Sustituto: Sistema FM200 (Hidrofluorocarbonos HFC’s)</p>'],
	['6.jpg', '', '', '<p class="u-textCenter">Gracias por utilizar <strong>Apprender</strong>.</p><p class="u-textCenter" style="color: #3fa8f0;"><strong>¡Evalúanos!</strong></p><p class="u-textCenter">Ingresa a tu perfil y ayúdanos a mejorar.</p>']
];

function modalExtintor(pos) {

	var posicion = 0;

	if (pos == "/images/memorama/2")
		posicion = 1;
	else if (pos == "/images/memorama/3")
		posicion = 2;
	else if (pos == "/images/memorama/4")
		posicion = 3;
	else if (pos == "/images/memorama/5")
		posicion = 4;
	else if (pos == "/images/memorama/6")
		posicion = 5;

	if (posicion == 5)
		$(".ModalExtintor-Content audio").slideUp("fast");
	else
		$(".ModalExtintor-Content audio").slideDown("fast");

	$(".ModalExtintor-Img img").attr("src", "/images/memorama/" + (listExtintores[posicion][0]));
	$(".ModalExtintor-TitleContent").html(listExtintores[posicion][1]);
	$(".ModalExtintor-Content div").html(listExtintores[posicion][3]);
	$(".ModalExtintor-Content source").attr("src", "/audio/4_5/" + (listExtintores[posicion][2]));
    let audioext = document.getElementById('audio-extintor')
    audioext.setAttribute("src", "/audio/4_5/" + (listExtintores[posicion][2]));
    audioext.load()
	$(".Modal--Extintor").fadeIn();
}


function getUrl() {
	//Se obtiene el valor de la URL desde el navegador
	var actual = window.location + '';
	//Se realiza la división de la URL
	var split = actual.split("/");
	//Se obtiene el ultimo valor de la URL
	var id = split[split.length - 1];

	return id;
}

