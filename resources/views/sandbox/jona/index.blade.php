@extends('layouts.app')

{{-- Aqui pones los estilos --}}
@section('style')
    <style>


body {
 	-webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-family: 'impactregular' !important;
    width: 100%;
    height: 100%;
    overflow: scroll;
}

 .tablero{
  /*  background: url(images/fondo.png) no-repeat center center fixed;*/
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 100%;
    width: 100%;
        padding: 5%;
    padding-top: 1px; }





.flip {

margin: 0;
padding: 3px 5px;
display: inline-block;  
perspective: 800;
-moz-perspective: 800;
-webkit-perspective: 800;
}

.flip .card.flipped {
-o-transform: rotateY(-180deg);
-webkit-transform: rotateY(-180deg);
-moz-transform: rotateY(-180deg);
transform: rotateY(-180deg);
}

.flip .card {
/*width: 100%;
height: 100%;*/
position: relative;
transform-style: preserve-3d;
-moz-transform-style: preserve-3d;
-webkit-transform-style: preserve-3d;
-webkit-transition: all 0.2s ease-in-out;
-moz-transition: all 0.2s ease-in-out;
-ms-transition: all 0.2s ease-in-out;
-o-transition: all 0.2s ease-in-out;
transition: all 0.2s ease-in-out;
}

.flip .card .face {
width: 100%;
height: 100%;
position: absolute;
-moz-backface-visibility: hidden;
backface-visibility: hidden;
-webkit-backface-visibility: hidden;
z-index: 2;
font: 2.5em Arial;
text-align: center;
line-height: 120px;
}

.flip .card .front {
position: absolute;
z-index: 1;
background: url('//apprender.test/storage/memorama/backimagen.png');
background-size: cover;
color: white;
cursor: pointer;
    border-radius: 20px;
}

.flip .card .back {
-moz-transform: rotateY(-180deg);
-o-transform: rotateY(-180deg);
transform: rotateY(-180deg);
-webkit-transform: rotateY(-180deg);
background: white;
color: black;
cursor: pointer;
}

    </style>
@endsection

@section('content')
<!DOCTYPE html>
<html>
<head>
  <title>Apprender</title>



<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="viewport" content="user-scalable=no, width=device-width" />

<!-- Latest compiled and minified CSS -->


<style type="text/css">

  

</style>
</head>
<body >
  <div class="tablero " style="display: block;position: relative;text-align: center;">
    <div style="position: absolute; right: 0.4%; top:2%;">
    </div>
    <h1 id="timerC" name="timerC">Tiempo transcurrido: 0.00</h1>
    <div class="tablero_content col-lg-7 col-sm-12" id="tablero_content" style="display: inline-block;">
    </div>
  </div>
      

<script type="text/javascript">


</script>
</body>
</html>
@endsection

@section('javascript')
    <script>
    	(function() {

    var timer;
    var interval;
    
  $(document).ready(function() {
    var countImage = 6;
    var contador = 0;
    var time = 60000;
    var data_compare = [];
    var count = 0;
    var isMarch = false; 
var acumularTime = 0; 
    $('body').data('id_body','0');

      $( "body" ).on("click",".click_add",function(){
        if( $(this).hasClass('active') ){
           return false;
        }else{
          
            var id_body = $('body').data('id_body');
            var id_now = $(this).data('id');
            $(this).addClass('active');
            $(this).find('.card').addClass('flipped');   
            if(id_body == 0){
              $('body').data('id_body',id_now);

            } else {
            
              if(id_body == id_now ){
                $('body').find("[data-id='" + id_now + "']").removeClass('click_add');
                $('body').find("[data-id='" + id_now + "']").removeClass('active');
                $('body').data('id_body','0');
                count++;

                if(count == countImage){
                    stop();
                }
              }else{
                $('body').data('id_body','0');   
                setTimeout(function(){
                    $('body').find(".active").find('.card').removeClass('flipped');
                    $('body').find("div").removeClass('active');
                    $('.click_add').prop('disabled',false);
                }, 400);
              }
            }
        }  
      });

    
    var createItems = function(image,num) {
      var str = image;
      var res = str.split("jpg");

      $newObj = '<div class="flip click_add col-xl-3 col-md-3 col-sm-3 col-4" data-id="'+res[0]+'">'+ 
                '<div class="card" style="border-radius: 20px;">'+ 
                '<div class="face front" ></div>'+ 
                '<image src="'+image+'" style="background-size:cover; width:100%; height:auto;transform: scaleX(-1);    border-radius: 20px"/>'+
                //'<div class="face back" style="background:url(images/'+image+'); background-size:cover;"></div>'+ 
                '</div>'+ 
                '</div>';  

      $('#tablero_content').append($newObj); 
    };
    
    var generateCards = function() {
      var newArray = [];
      var finalArray = [];
      var memorama = [];
      var image = '';
      var items = ['http://servertobe.com/sitios/pemex/v2/memorama/imagenes/7.jpg','http://servertobe.com/sitios/pemex/v2/memorama/imagenes/8.jpg','http://servertobe.com/sitios/pemex/v2/memorama/imagenes/6.jpg','http://servertobe.com/sitios/pemex/v2/memorama/imagenes/4.jpg',
      'http://servertobe.com/sitios/pemex/v2/memorama/imagenes/2.jpg','http://servertobe.com/sitios/pemex/v2/memorama/imagenes/3.jpg','http://servertobe.com/sitios/pemex/v2/memorama/imagenes/5.jpg'];

      var arrayItems = Shuffle(items);
     for(a = 0; a < countImage ; a++){
        newArray.push(arrayItems[a]);
      }

      for(b = 0; b < 2; b++){
          for(c = 0; c < newArray.length; c++){
              finalArray.push(newArray[c]);
          }
      }

      memorama = Shuffle(finalArray);
      for (d = 0; d < memorama.length; d++){
        image = memorama[d];
        createItems(image);
      } 

    };
    generateCards();
    start();


    function start() {
         if (isMarch == false) { 
            timeInicial = new Date();
            control = setInterval(cronometro,10);
            isMarch = true;
            }
         }
function cronometro() { 
         timeActual = new Date();
         acumularTime = timeActual - timeInicial;
         acumularTime2 = new Date();
         acumularTime2.setTime(acumularTime); 
         cc = Math.round(acumularTime2.getMilliseconds()/10);
         ss = acumularTime2.getSeconds();
         mm = acumularTime2.getMinutes();
         hh = acumularTime2.getHours()-18;
         if (cc < 10) {cc = "0"+cc;}
         if (ss < 10) {ss = "0"+ss;} 
         if (mm < 10) {mm = "0"+mm;}
         if (hh < 10) {hh = "0"+hh;}
         document.getElementById("timerC").innerHTML ="Tiempo transcurrido: " +hh+" : "+mm+" : "+ss;
    
         }

         function stop() { 
         if (isMarch == true) {
            clearInterval(control);
            isMarch = false;
            }     
         } 


function resume () {
         if (isMarch == false) {
            timeActu2 = new Date();
            timeActu2 = timeActu2.getTime();
            acumularResume = timeActu2-acumularTime;
            
            timeInicial.setTime(acumularResume);
            control = setInterval(cronometro,10);
            isMarch = true;
            }     
         }

function reset () {
         if (isMarch == true) {
            clearInterval(control);
            isMarch = false;
            }
         acumularTime = 0;
         document.getElementById("timerC").innerHTML ="Tiempo transcurrido: 00 : 00 : 00 ";
         } 
  
  });
  
  function Shuffle(o) {
      for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
      return o;
  };
})(jQuery);
    </script>
@endsection
