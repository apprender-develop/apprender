
	var ban = true;


	$(document).ready(function() 
	{
			

	}); 
	
	
	var posAct = 0;
	var respuestas = new Array(0,0,3,0,1);	
	
    function cambio(pos){
		var valid = true;
		
			if(pos == 0)
				cambiar(pos);
			else if(pos == 5){
				var totalR = 0;
				
				for (var a=1; a < 6; a++){
					var preg = parseInt($('input:radio[name=pregunta'+a+']:checked').val());
					var resp = parseInt(respuestas[a-1]);
					
					//alert(preg);
					if(preg == resp){
						totalR = totalR + 1;
					}
				}
				
				var inact = 5 - totalR;
				
				for (var a=0; a < inact; a++){
					$(".Pregunta-IcoEstrella").eq((4-a)).addClass("InActiva");
				}
				
				$(".Pregunta-Calificacion").html((totalR)*2);

				if(totalR>3){
					$(".Respuesta1").slideUp("slow");
					$(".Respuesta2").slideDown("slow");
				}
				else
				{
					$(".Respuesta2").slideUp("slow");
					$(".Respuesta1").slideDown("slow");
				}

				cambiar(pos);
			}
			else if(pos > 0)
			{
				if ($('input[name="pregunta'+pos+'"]').is(':checked'))
					cambiar(pos);	
				else
				{
					$('.lbRadio').effect('pulsate', { times:2 }, 1000);		
                    $('.lbRadio').focus();
					valid = false;		
				}
			}
				
				if(valid)
				{
					if(pos == 5){
						$(".Pregunta-Btn--Ant").css({"display":"none"});
						$(".Pregunta-Btn--Sig").css({"display":"none"});
					}
					else if(pos > 0){
						$(".Pregunta-Btn--Ant").css({"display":"inline-block"});
						$(".Pregunta-Btn--Ant").attr("onclick","cambio("+(pos-1)+")");
						$(".Pregunta-Btn--Sig").attr("onclick","cambio("+(pos+1)+")");
					}
					else{
						$(".Pregunta-Btn--Ant").css({"display":"none"});
						$(".Pregunta-Btn--Sig").attr("onclick","cambio("+(pos+1)+")");
					}
				}
        }
			
	function cambiar(pos){
		$(".ContentPregunta").animate({'opacity':'0'}, 0);
		$(".ContentPregunta").css({display:'none'});
        $(".ContentPregunta").removeClass("slideLeft");
        $(".ContentPregunta").removeClass("slideRight");

                /*if(pos>posAct)
                    $(".ContentPregunta").eq(pos).addClass("slideLeft");
                else
                    $(".ContentPregunta").eq(pos).addClass("slideRight");*/

		$(".ContentPregunta").eq(pos).css({display:'block'});
		$(".ContentPregunta").eq(pos).animate({'opacity':'1'}, 0);

        posAct = pos;
       }		
