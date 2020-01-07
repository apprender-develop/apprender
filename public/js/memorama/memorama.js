(function () {

    var timer;
    var interval;
    $(document).ready(function () {
        var countImage = 6;
        var contador = 0;
        var time = 60000;
        var data_compare = [];
        var count = 0;
        var entro = 0;
        var isMarch = false;
        var carta1;
        var carta2;
        var acumularTime = 0;
        $("body").on("click", ".click_add", function () {
            if ($(this).hasClass('active')) {
                return false;
            } else {
                entro++;
                if (entro == 1) {
                    carta1 = $(this).data('id');
                    $(this).attr('class', 'flip click_add active col-xl-3 col-md-3 col-sm-3 col-4');
                    $(this).find('.card').attr('class', "card flipped");
                    $(this).find('.front').attr('class', "face prueba");
                } else if (entro == 2) {
                    carta2 = $(this).data('id');
                    $(this).attr('class', 'flip click_add active col-xl-3 col-md-3 col-sm-3 col-4');
                    $(this).find('.card').attr('class', "card flipped");
                    $(this).find('.front').attr('class', "face prueba");
                }

                if (carta1 == carta2) {
                    count++;
                    entro = 0;
                    modalExtintor(carta1);
                    carta1 = '';
                    carta2 = '';
                    if (count == countImage) {
                        stop();
                        $(".Memorama-Mensaje").slideDown("fast");

                        $('html, body').animate(
                            {
                                scrollTop: $(".Memorama-Mensaje").offset().top - 109
                            }, 1000, 'swing');
                    }
                } else {
                    if (entro == 2) {
                        setTimeout(function () {
                            console.log('carta1: ' + carta1);
                            console.log('carta2: ' + carta2);
                            entro = 0;
                            $('body').find("[data-id='" + carta1 + "']").find('.card').attr('class', "card");
                            $('body').find("[data-id='" + carta1 + "']").find('.card').find('.face').attr('class', "face front");
                            $('body').find("[data-id='" + carta1 + "']").attr('class', 'flip click_add col-xl-3 col-md-3 col-sm-3 col-4');
                            $('body').find("[data-id='" + carta2 + "']").find('.card').attr('class', "card");
                            $('body').find("[data-id='" + carta2 + "']").find('.card').find('.face').attr('class', "face front");
                            $('body').find("[data-id='" + carta2 + "']").attr('class', 'flip click_add col-xl-3 col-md-3 col-sm-3 col-4');
                            $('.click_add').prop('disabled', false);
                            carta1 = '';
                            carta2 = '';
                        }, 400);
                    }

                }
            }
        });


        var createItems = function (image, num) {
            var str = image;
            var res = str.split(".j");

            $newObj = '<div class="flip click_add col-xl-3 col-md-3 col-sm-3 col-4" data-id="' + res[0] + '">' +
                '<div class="card" style="border-radius: 20px;border-color: #3fa8f0;border-width: 3px;">' +
                '<div class="face front" ></div>' +
                '<image src="' + image + '" style="background-size:cover; width:100%; height:auto;transform: scaleX(-1);    border-radius: 20px"/>' +
                //'<div class="face back" style="background:url(images/'+image+'); background-size:cover;"></div>'+
                '</div>' +
                '</div>';

            $('#tablero_content').append($newObj);
        };

        var generateCards = function () {
            var newArray = [];
            var finalArray = [];
            var memorama = [];
            var image = '';
            var items = ['/images/memorama/1.jpg', '/images/memorama/2.jpg', '/images/memorama/3.jpg', '/images/memorama/4.jpg', '/images/memorama/5.jpg', '/images/memorama/6.jpg'];

            var arrayItems = Shuffle(items);
            for (a = 0; a < countImage; a++) {
                newArray.push(arrayItems[a]);
            }

            for (b = 0; b < 2; b++) {
                for (c = 0; c < newArray.length; c++) {
                    finalArray.push(newArray[c]);
                }
            }

            memorama = Shuffle(finalArray);
            for (d = 0; d < memorama.length; d++) {
                image = memorama[d];
                createItems(image);
            }

        };
        generateCards();
        start();


        function start() {
            if (isMarch == false) {
                timeInicial = new Date();
                control = setInterval(cronometro, 10);
                isMarch = true;
            }
        }
        function cronometro() {
            timeActual = new Date();
            acumularTime = timeActual - timeInicial;
            acumularTime2 = new Date();
            acumularTime2.setTime(acumularTime);
            cc = Math.round(acumularTime2.getMilliseconds() / 10);
            ss = acumularTime2.getSeconds();
            mm = acumularTime2.getMinutes();
            hh = acumularTime2.getHours() - 18;
            if (cc < 10) { cc = "0" + cc; }
            if (ss < 10) { ss = "0" + ss; }
            if (mm < 10) { mm = "0" + mm; }
            if (hh < 10) { hh = "0" + hh; }
            document.getElementById("timerC").innerHTML = hh + " : " + mm + " : " + ss;

        }

        function stop() {
            if (isMarch == true) {
                clearInterval(control);
                isMarch = false;
            }
        }


        function resume() {
            if (isMarch == false) {
                timeActu2 = new Date();
                timeActu2 = timeActu2.getTime();
                acumularResume = timeActu2 - acumularTime;

                timeInicial.setTime(acumularResume);
                control = setInterval(cronometro, 10);
                isMarch = true;
            }
        }

        function reset() {
            if (isMarch == true) {
                clearInterval(control);
                isMarch = false;
            }
            acumularTime = 0;
            document.getElementById("timerC").innerHTML = "Tiempo transcurrido: 00 : 00 : 00 ";
        }



        $(".Memorama-Btn").click(function () {
            $(".ItemUnidad4").animate({ 'opacity': '0' }, 0);
            $(".ItemUnidad4").css({ display: 'none' });

            $(".ItemUnidad4").eq(1).css({ display: 'block' });
            $(".ItemUnidad4").eq(1).animate({ 'opacity': '1' }, 0);
        });
    });

    function Shuffle(o) {
        for (var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
        return o;
    };
})(jQuery);
