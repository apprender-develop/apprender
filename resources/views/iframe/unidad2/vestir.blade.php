<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Documento sin título</title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <link href="/css/jamarrom/unidad2/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .mono {
            display: block;
            float: left;
            position: relative;
            top: 0;
        }

        .fichasves {
            /* float:right;*/
            cursor: move;
            margin-top: 5%;
        }

        .fichasves img {
            margin-bottom: 5%;
            margin-right: 5%;
        }

        #respuesta {
            width: 250px;
            height: 106px;
            position: fixed;
            bottom: 150px;
            margin-left: -45px;
            color: transparent;
            display: block;
        }

        .fichasves {
            /*  float: none !important;*/

        }

        .contenido {
            left: 5%;
        }

        .fichasves img {

            margin-bottom: 0% !important;
            margin-right: 0% !important;
        }
    </style>

    <script type="text/javascript">
        var lista= [];
 var divM;
    var cont = 1;
    var img = 2;
    var font = 1;
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {

    ev.preventDefault();
   /* var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));*/
    var data = ev.dataTransfer.getData("text");

    if(cont == data){
        $('#mono'+font).css('display','none');
        $('#mono'+img).css('display','block');
        /*divM = document.getElementById('respuesta');
        divM.innerHTML = "Correcto";*/
        $('#respuesta').css('background','url(/images/vestir/correcto.png) no-repeat');
        $('#respuesta').css('display','block');
        $('#'+data).css('visibility','hidden');
        lista.push(cont);
        cont++;
        img++;
        font++;
        setTimeout(function() {
                $("#respuesta").fadeOut(1500);
            },1000);
        if(cont == 6){
            divM = document.getElementById('respuesta2');
            document.getElementById("Congratulations").style.display='block';
       // .innerHTML = "Haz completado el juego correctamente";
        $('#respuesta2').css('color','#003c6a');
         $('#respuesta2').css('margin-top','-25%');
            }
        }
    else {
        $('#respuesta').css('background','url(/images/vestir/incorrecto.png) no-repeat');
        $('#respuesta').css('display','block');
        /*divM = document.getElementById('respuesta');
        divM.innerHTML = "Incorrecto";*/
        setTimeout(function() {
                $("#respuesta").fadeOut(1500);
            },1000);
        }
        /**/


}

    </script>
</head>

<body style="background:transparent;">
    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12 col-12 contenido">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6  col-6">
            <div class="mono" id="mono1">
                <img src="/images/vestir/mono.png" width="85%" ondrop="drop(event)" ondragover="allowDrop(event)" />
            </div>
            <div class="mono" id="mono2" style="display:none;">
                <img src="/images/vestir/mono2.png" width="85%" ondrop="drop(event)" ondragover="allowDrop(event)" />
            </div>
            <div class="mono" id="mono3" style="display:none;">
                <img src="/images/vestir/mono3.png" width="85%" ondrop="drop(event)" ondragover="allowDrop(event)" />
            </div>
            <div class="mono" id="mono4" style="display:none;">
                <img src="/images/vestir/mono4.png" width="85%" ondrop="drop(event)" ondragover="allowDrop(event)" />
            </div>
            <div class="mono" id="mono5" style="display:none;">
                <img src="/images/vestir/mono5.png" width="85%" ondrop="drop(event)" ondragover="allowDrop(event)" />
            </div>
            <div class="mono" id="mono6" style="display:none;">
                <img src="/images/vestir/mono6.png" width="85%" ondrop="drop(event)" ondragover="allowDrop(event)" />
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5  col-12">
            <div id="respuesta">
                <div id="respuesta2"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12 col-6 fichasves" align="center">
        <h4 style="font-size: 2vw;color: #3fa8f0; display:none;" id="Congratulations">Felicidades! haz completado el
            juego correctamente</h4>
        <img src="/images/vestir/ficha-guantes.png" id="5" width="20%" draggable="true" ondragstart="drag(event)" />
        <img src="/images/vestir/ficha-botas.png" id="1" width="20%" onClick="mono2();" draggable="true"
            ondragstart="drag(event)" />
        <img src="/images/vestir/ficha-monja.png" id="2" width="20%" onClick="mono3();" draggable="true"
            ondragstart="drag(event)" /><br />
        <img src="/images/vestir/ficha-chaqueton.png" id="3" width="20%" draggable="true" ondragstart="drag(event)" />
        <img src="/images/vestir/ficha-casco.png" id="4" width="20%" onClick="mono5();" draggable="true"
            ondragstart="drag(event)" />
    </div>
</body>

</html>
