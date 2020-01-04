<link href="/css/memorama/memorama.css" rel="stylesheet" type="text/css">
<link href="/css/memorama/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/css/jamarrom/encuesta.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/js/memorama/memorama.js"></script>
<script type="text/javascript" src="/js/jamarrom/encuesta.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
		$(".Unidad-ListMenuUnidad li a").removeClass("activo");
		$(".Unidad-ListMenuUnidad li a").eq(1).addClass("activo");
	});
</script>

<div class="Unidad-ContentInfo u-inline-block">
    <h4 class="Unidad-TitleContentInfo">4.5 Uso y manejo de extintores portatiles</h4>

    <div class="tablero ItemUnidad4" style="display: block;position: relative;text-align: center;">
        <div style="position: absolute; right: 0.4%; top:2%;">
        </div>
        <h1 id="timerC" name="timerC" style="display: none;">Tiempo transcurrido: 0.00</h1>
        <h2 class="Memorama-Title">Juega y reafirma tu conocimiento.</h2>

        <div class="Memorama-Mensaje">
            <strong>¿Estás listo para poner tu conocimiento en práctica?</strong>
            <a class="Memorama-Btn u-boton u-inline-block">Continuar</a>
        </div>

        <div class="tablero_content col-lg-7 col-sm-12" id="tablero_content" style="display: inline-block;">
        </div>
    </div>

    <div class="ItemUnidad4" style="display: none;">

        <div class="ContentPregunta">
            <h5 class="Pregunta-Title">Pregunta 1:</h5>
            <p><strong>¿Cuál de las siguientes, es una táctica segura de acercarse al fuego?</strong></p>
            <ul class="Pregunta-List">
                <li><input id="pregunta1-0" type="radio" name="pregunta1" value="0"><label for="pregunta1-0"
                        class="lbRadio">Pisar firmemente, posicionarse de lado, sujetar firmemente la manguera bajo la
                        axila.</label></li>
                <li><input id="pregunta1-1" type="radio" name="pregunta1" value="1"><label for="pregunta1-1"
                        class="lbRadio">Avanzar de frente y solo.</label></li>
                <li><input id="pregunta1-2" type="radio" name="pregunta1" value="2"><label for="pregunta1-2"
                        class="lbRadio">Avanzar mirando hacia atrás para no exponer la cara el fuego.</label></li>
                <li><input id="pregunta1-3" type="radio" name="pregunta1" value="3"><label for="pregunta1-3"
                        class="lbRadio">Avanzar rápidamente y sujetando la manguera entre las piernas.</label></li>
            </ul>
        </div>


        <div class="ContentPregunta" style="display: none;">
            <h5 class="Pregunta-Title">Pregunta 2:</h5>
            <p><strong>¿Cuál es la posición correcta en una línea de ataque?</strong></p>
            <ul class="Pregunta-List">
                <li><input id="pregunta2-0" type="radio" name="pregunta2" value="0"><label for="pregunta2-0"
                        class="lbRadio">Pitonero - Ayudante - Liniero</label></li>
                <li><input id="pregunta2-1" type="radio" name="pregunta2" value="1"><label for="pregunta2-1"
                        class="lbRadio">Liniero - Pitonero - Ayudante</label></li>
                <li><input id="pregunta2-2" type="radio" name="pregunta2" value="2"><label for="pregunta2-2"
                        class="lbRadio">Liniero - Ayudante - Pitonero</label></li>
                <li><input id="pregunta2-3" type="radio" name="pregunta2" value="3"><label for="pregunta2-3"
                        class="lbRadio">Ninguna de las anteriores</label></li>
            </ul>
        </div>

        <div class="ContentPregunta" style="display: none;">
            <h5 class="Pregunta-Title">Pregunta 3:</h5>

            <p><strong>Un extintor de CO2 se utiliza para apagar incendios de</strong></p>

            <ul class="Pregunta-List">
                <li><input id="pregunta3-0" type="radio" name="pregunta3" value="0"><label for="pregunta3-0"
                        class="lbRadio">Chatarra metálica</label></li>
                <li><input id="pregunta3-1" type="radio" name="pregunta3" value="1"><label for="pregunta3-1"
                        class="lbRadio">Basura</label></li>
                <li><input id="pregunta3-2" type="radio" name="pregunta3" value="2"><label for="pregunta3-2"
                        class="lbRadio">Equipo eléctrico</label></li>
                <li><input id="pregunta3-3" type="radio" name="pregunta3" value="3"><label for="pregunta3-3"
                        class="lbRadio">Material químico</label></li>
            </ul>
        </div>


        <div class="ContentPregunta" style="display: none;">
            <h5 class="Pregunta-Title">Pregunta 4:</h5>
            <p><strong>Mencione los diámetros de una manguera contra incendio más utilizadas en PEP</strong></p>

            <ul class="Pregunta-List">
                <li><input id="pregunta4-0" type="radio" name="pregunta4" value="0"><label for="pregunta4-0"
                        class="lbRadio">21/2'' y 11/2''</label></li>
                <li><input id="pregunta4-1" type="radio" name="pregunta4" value="1"><label for="pregunta4-1"
                        class="lbRadio">34'' y 48''</label></li>
                <li><input id="pregunta4-2" type="radio" name="pregunta4" value="2"><label for="pregunta4-2"
                        class="lbRadio">10'' y 12''</label></li>
                <li><input id="pregunta4-3" type="radio" name="pregunta4" value="3"><label for="pregunta4-3"
                        class="lbRadio">11'' y 13''</label></li>
            </ul>
        </div>

        <div class="ContentPregunta" style="display: none;">
            <h5 class="Pregunta-Title">Pregunta 5:</h5>
            <p><strong>El material de las mangueras contra incendio más utilizadas en PEP</strong></p>

            <ul class="Pregunta-List">
                <li><input id="pregunta5-0" type="radio" name="pregunta5" value="0"><label for="pregunta5-0"
                        class="lbRadio">Plástico</label></li>
                <li><input id="pregunta5-1" type="radio" name="pregunta5" value="1"><label for="pregunta5-1"
                        class="lbRadio">Lona con forro interior de neopreno</label></li>
                <li><input id="pregunta5-2" type="radio" name="pregunta5" value="2"><label for="pregunta5-2"
                        class="lbRadio">Metálicas</label></li>
                <li><input id="pregunta5-3" type="radio" name="pregunta5" value="3"><label for="pregunta5-3"
                        class="lbRadio">Fibra de vidrio</label></li>
            </ul>
        </div>

        <div class="ContentPregunta" style="display: none;">

            <div class="Pregunta-Col u-inline-block">



            </div>

            <div class="Pregunta-Col u-inline-block">
                <h5 class="Pregunta-Title">Su calificación es:</h5>
                <div class="Pregunta-Resultados u-inline-block">
                    <p class="Pregunta-Calificacion u-block u-textCenter">8</p>

                    <span class="Pregunta-IcoEstrella u-inline-block u-imagenFondo100"></span>
                    <span class="Pregunta-IcoEstrella u-inline-block u-imagenFondo100"></span>
                    <span class="Pregunta-IcoEstrella u-inline-block u-imagenFondo100"></span>
                    <span class="Pregunta-IcoEstrella u-inline-block u-imagenFondo100"></span>
                    <span class="Pregunta-IcoEstrella u-inline-block u-imagenFondo100"></span>


                    <div class="Pregunta-TxtsResultados">
                        <p class="Respuesta1">Te invitamos a realizar nuevamente el ejercicio para mejorar su
                            calificación</p>

                        <p class="Respuesta1 u-textRight"><a class="u-inline-block" onClick="cambio(0)">Reintentar</a>
                        </p>

                        <p class="Respuesta2">Felicidades haz obtenido una excelente calificación, ¡¡Sigue así!!</p>
                    </div>

                </div>
            </div>


        </div>
        <form style="display: none" id="formEncuesta" action="{{route('encuesta')}}">
            @csrf
            <input type="hidden" name="aciertos" id="aciertos">
            <input type="hidden" name="total" id="total">
            <input type="hidden" name="calificacion" id="calificacion">
        </form>

        <div class="u-textRight">
            <a class="Pregunta-Btn Pregunta-Btn--Ant u-boton u-textCenter">Anterior</a>
            <a onclick="cambio(1)" class="Pregunta-Btn Pregunta-Btn--Sig u-boton u-textCenter">Siguiente</a>
        </div>
    </div>

</div>

</div>
