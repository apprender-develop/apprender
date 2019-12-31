      var jQuery = $.noConflict();
			var banActivo = false;
			var slider1;
			var slider2;
			var banModal = true;
			var marcadores  = new Array();
			var datosUsuario = new Array();

			var listConfiguraciones = new Array();
			var urlBaseConfiguraciones = "http://apps.century21mexico.com/images/configuracion/";
			var listDias = new Array();
			var listPonentes = new Array();
			var urlBasePonentes = "http://apps.century21mexico.com/images/ponentes/";
			//var urlBasePonentes = "http://localhost/adminAppCentury21/images/ponentes/";
			var listHospedajes = new Array();
			var urlBaseHospedajes = "http://apps.century21mexico.com/images/hospedajes/";			
			//var urlBaseHospedajes = "http://localhost/adminAppCentury21/images/hospedajes/";
			var listDocumentos = new Array();
			var urlBaseDocumentos = "http://apps.century21mexico.com/pdfs/documentos/";			
			//var urlBaseDocumentos = "http://localhost/adminAppCentury21/pdfs/documentos/";
			var listMapaEvento = new Array();
			var urlBaseMapaEvento = "http://apps.century21mexico.com/images/mapa_sitio/";			
			//var urlBaseMapaEvento = "http://localhost/adminAppCentury21/images/mapa_sitio/";
			var listPatrocinadores = new Array();
			var urlBasePatrocinadores = "http://apps.century21mexico.com/images/patrocinadores/";
			//var urlBasePatrocinadores = "http://localhost/adminAppCentury21/images/patrocinadores/";
			var urlBasePatrocinadoresFlyer = "http://apps.century21mexico.com/images/flyerPatrocinadores/";
			//var urlBasePatrocinadoresFlyer = "http://localhost/adminAppCentury21/images/flyerPatrocinadores/";
			var listSitiosInteres = new Array();
			var urlBaseSitiosInteres = "http://apps.century21mexico.com/images/sitios/";
			var listPreguntas = new Array();
			var listDatosContacto = new Array();
			var listFotos = new Array();
			var urlBaseFotos = "http://apps.century21mexico.com/galeria/fotos/";
			var urlBaseFotosTh = "http://apps.century21mexico.com/galeria/fotos/thumb/";
			var listVideos = new Array();
			var urlBaseVideos = "http://apps.century21mexico.com/galeria/videos/";
			var listFavoritos = new Array();
			var listRespuesta = new Array();
			var listRedesSociales = new Array();
			var urlBaseRedesSociales = "http://apps.century21mexico.com/images/redes_sociales/";
			var listNotificaciones = new Array();

			jQuery(window).load(function()
			{ 					
				setTimeout(function()
				{					
					jQuery(".Cargando").animate({left: "-150%"},1000);
					//jQuery(".Login").animate({left: "0%"},700);				
					
					/*if(localStorage.getItem("tipo")!=''&&localStorage.getItem("tipo")!=null&&localStorage.getItem("tipo")!='null')
					{
						document.location.href = "#Home";
						//jQuery(".Home").css({"left":"0%"});
						//jQuery(".Home").animate({left: "0%"},700);
												
						jQuery(".MiRegistro-ImgRG img").attr("src",localStorage.getItem("imagen"));
						jQuery("#dtNombreRegistro").html(localStorage.getItem("nombre"));
						jQuery("#dtTipoRegistro").html(localStorage.getItem("tipo"));
						jQuery("#dtEmailRegistro").html(localStorage.getItem("email"));
						jQuery("#dtTelRegistro").html(localStorage.getItem("telefono"));
						
						
						if(localStorage.getItem("tipo")=="Acompañante")
						{
							jQuery(".Programa-T1").slideUp('slow');
							jQuery(".Programa-T2").slideDown('slow');
						}
						else
						{
							jQuery(".Programa-T2").slideUp('slow');
							jQuery(".Programa-T1").slideDown('slow');
						}
					}						
					else*/
						jQuery(".Login").animate({left: "0%"},700);

				},2000);


				if(localStorage.getItem("UsuarioC")!=''&&localStorage.getItem("ContraseniaC")!=null){
					jQuery("#txtUsuario").val(localStorage.getItem("UsuarioC"));
					jQuery("#txtContrasenia").val(localStorage.getItem("ContraseniaC"));

					jQuery('#cbRecordarme').prop('checked', true);
				}

				document.addEventListener('deviceready', function () 
				{
				  // Enable to debug issues.
				  // window.plugins.OneSignal.setLogLevel({logLevel: 4, visualLevel: 4});

				  	var notificationOpenedCallback = function(jsonData) {
						console.log('notificationOpenedCallback: ' + JSON.stringify(jsonData));
					};

					window.plugins.OneSignal
					.startInit("a7d152af-b30c-4542-8b98-351ace2f4b55")
					//.startInit("7bc19e16-0016-4a51-a3f5-0a8892e99806")//Acompañantes
					.handleNotificationOpened(notificationOpenedCallback)
					.endInit();

					// Call syncHashedEmail anywhere in your app if you have the user's email.
					// This improves the effectiveness of OneSignal's "best-time" notification scheduling feature.
					// window.plugins.OneSignal.syncHashedEmail(userEmail);
				}, false);

			});
			
		  jQuery(document).ready(function()
			{  
				//activar_Hotel("Hotel-Mapa1","16.7682773","-99.7739846");
				//activar_Hotel("Hotel-Mapa2","16.7918019","-99.8228569");
				//activar_Hotel("Hotel-Mapa3","16.7712437","-99.7717049");

				cargarConfiguraciones();
				cargarPrograma();
				cargarPonentes();
				cargarHospedajes();
				cargarDocumentos();
				cargarMapaEvento();
				cargarPatrocinadores();
				cargarSitiosInteres();
				//cargarFotos();
				//cargarVideos();
				cargarDatosContacto();
				cargarDatosRedesSociales();
								
				
				//Cerrar imagen de partes del mapa
				jQuery(".MapaDelEvento-BtnCerrar").click(function()
				{
					jQuery(".MapaDelEvento-ImgSeccion").css({"z-index":"0"});
					jQuery('.MapaDelEvento-ImgSeccion').fadeOut("slow");
					jQuery(".MapaDelEvento-ImgSeccion img").attr("src","");
					jQuery(".MapaDelEvento-ImgSeccion video").attr("src","");	
				});
				
				jQuery(".Ayuda-Modal").click(function()
				{
					if(banModal){
						jQuery(".Ayuda").fadeIn();
						banModal = false;
					}
					else{
						jQuery(".Ayuda").fadeOut();
						banModal = true;
					}	
				});
				
				jQuery(".Ayuda").click(function()
				{
					jQuery(".Ayuda").fadeOut();
					banModal = true;
				});
				
				/*jQuery(".MainMenu-Item").click(function()
				{
					jQuery(".Ayuda").fadeOut();
					banModal = true;
				});*/
				
				jQuery(".Tabs-Item").each(function(w)
				{
					jQuery(this).click(function()
					{
						jQuery(".Tabs-Item").removeClass('activo');
						jQuery(this).addClass('activo');
		
						jQuery(".Tabs-Contanier").animate({'opacity':'0'}, 200);
						jQuery(".Tabs-Contanier").css({display:'none'});
		
						jQuery(".Tabs-Contanier").eq(w).css({display:'block'});
						jQuery(".Tabs-Contanier").eq(w).animate({'opacity':'1'}, 400);					
					});
				});


				jQuery('#flImgFoto').change(function()
				{ 
					jQuery(".Galeria-Cargando").eq(0).css({"display": "inline-block"});
						
					jQuery("#flImgFoto").upload('http://apps.century21mexico.com/ajax/subir_Galeria.php',
					 {			
						id_usuario : datosUsuario['id_usuario']						
					 },
					 function(respuesta) 
					 {					 
						cargarFotos();  	
						jQuery(".Galeria-Cargando").eq(0).css({"display": "none"});
					 });
				});

				jQuery('#flImgVideo').change(function()
				{ 
					jQuery(".Galeria-Cargando").eq(1).css({"display": "inline-block"});
						
					jQuery("#flImgVideo").upload('http://apps.century21mexico.com/ajax/subir_Video.php',
					 {			
						id_usuario : datosUsuario['id_usuario']						
					 },
					 function(respuesta) 
					 {					 
						cargarVideos();  	
						jQuery(".Galeria-Cargando").eq(1).css({"display": "none"});
					 });
				});
				
				/*				

				document.addEventListener('deviceready', function () 
				{
				  // Enable to debug issues.
				  // window.plugins.OneSignal.setLogLevel({logLevel: 4, visualLevel: 4});

				  	var notificationOpenedCallback = function(jsonData) {
						console.log('notificationOpenedCallback: ' + JSON.stringify(jsonData));
					};

					window.plugins.OneSignal
					.startInit("10f9c43f-581c-4a61-aa98-6651008d15ba")
					//.startInit("7bc19e16-0016-4a51-a3f5-0a8892e99806")//Acompañantes
					.handleNotificationOpened(notificationOpenedCallback)
					.endInit();

					// Call syncHashedEmail anywhere in your app if you have the user's email.
					// This improves the effectiveness of OneSignal's "best-time" notification scheduling feature.
					// window.plugins.OneSignal.syncHashedEmail(userEmail);
				}, false);
				

				
				
				
				*/

				//Boton de login
				jQuery("#btnEntrar").click(function()
				{								 
					if(validar_campo("#txtUsuario",4,"Usuario"))
						if(validar_campo("#txtContrasenia",1,"Contraseña"))
						{
							//jQuery(".Login-Msj").css({"display": "block"});
							//jQuery(".Login-Msj").html("<img src='images/loading.gif' width='50px' />");
							
							/*jQuery("#dtNombreRegistro").html("");
							jQuery("#dtTipoRegistro").html("");
							jQuery("#dtEmailRegistro").html("");
							jQuery("#dtTelRegistro").html("");*/
							
							
							jQuery.ajax(
							{														
								url: "http://apps.century21mexico.com/ajax/login.php",
								type	: "POST",
								dataType	: "json",
								async    : 	false,		
								data: {"txtUsuario" : jQuery('#txtUsuario').val() , 'txtContrasenia' : jQuery('#txtContrasenia').val() },																
								success: function( data, textStatus, jqXHR ) 
								{
									if(data.nombre==""){
										//jQuery(".Login-Msj").html("<strong class='u-mayuscula u-inline-block'>Los datos de acceso son incorrectos.</strong><br /> Aseg&uacute;rate de utilizar los datos correctos.");
										//jQuery(".Login-Msj").html("<strong class='u-mayuscula u-inline-block'>El usuario y/o contraseña son incorrectas.</strong>");
										swal("Login", "El usuario y/o contraseña son incorrectas.");
									}
									else
									{
										datosUsuario = data;
										
										if(jQuery('#cbRecordarme').attr('checked')){
											localStorage.setItem("UsuarioC", jQuery('#txtUsuario').val());
											localStorage.setItem("ContraseniaC", jQuery('#txtContrasenia').val());
										}
										else{
											localStorage.setItem("UsuarioC", "Usuario");
											localStorage.setItem("ContraseniaC", "");
										}


										jQuery(".Login-Msj").html("");
										jQuery(".Login-Msj").slideUp("slow");
										jQuery('#txtUsuario').val("Usuario");
										jQuery('#txtContrasenia').val("");


										

										/*jQuery(".MiRegistro-ImgRG img").attr("src",data.imagen);
										jQuery("#dtNombreRegistro").html(data.nombre);
										jQuery("#dtTipoRegistro").html(data.tipo);
										jQuery("#dtEmailRegistro").html(data.email);
										jQuery("#dtTelRegistro").html(data.telefono);*/
										
										
										/*localStorage.setItem("imagen", data.imagen);
										localStorage.setItem("nombre", data.nombre);
										localStorage.setItem("tipo", data.tipo);
										localStorage.setItem("email", data.email);
										localStorage.setItem("telefono", data.telefono);*/
										
										document.location.href = "#Home";

										cargarFavoritos();
										cargarPreguntas();
									}
								}
							})
							.done(function( data, textStatus, jqXHR ) 
							{
							})
							.always(function( data, jqXHR, textStatus, errorThrown ) 
							{
							})
							.error(function( data, jqXHR, textStatus, errorThrown ) 
							{
								jQuery(".Login-Msj").html("<strong class='u-mayuscula u-inline-block'>Verifica tu conexión.</strong><br /> No es posible conectar a la red.");
							});
					}
					else{
						jQuery(".Login-Msj").html("<strong>Es necesario agregar la contraseña<strong>");
						jQuery(".Login-Msj").css({"display": "block"});
					}
				});			 
				
				

				jQuery(".Encuesta-BtnEnviar").click(function()
				{								 
					
					jQuery(".Encuesta-Msj").css({"display": "block"});
					jQuery(".Encuesta-Msj").html("<img src='images/loading.gif' width='50px' />");
							
							
					jQuery.ajax(
					{														
						url: "http://apps.century21mexico.com/ajax/respuestas.php",
						type	: "POST",
						dataType	: "html",
						async    : 	false,		
						data: {"listaRespuesta" : JSON.stringify(listRespuesta),id_usuario : datosUsuario['id_usuario'] },																
						success: function(Respuesta) 
						{
							jQuery(".Encuesta-BtnEnviar").css({"display":"none"});
							
							jQuery(".Encuesta-Msj").html("<strong class='u-mayuscula u-inline-block'>Muchas gracias.</strong><br /> Tus respuestas se han enviado.");
							jQuery(".Encuesta-Msj").css({"display": "block"});
						}
					});	
				});
  		});
			
			function cargarConfiguraciones(){
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/configuraciones.php",
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listConfiguraciones = Respuesta;	
						
						if(listConfiguraciones[0][6]!=""){
							jQuery(".Cargando").css({"background-image":"url('"+urlBaseConfiguraciones+listConfiguraciones[0][6]+"')"});
							jQuery(".Login").css({"background-image":"url('"+urlBaseConfiguraciones+listConfiguraciones[0][6]+"')"});
							jQuery(".Home").css({"background-image":"url('"+urlBaseConfiguraciones+listConfiguraciones[0][6]+"')"});
						}

						jQuery(".Cargado-Logo img").attr("src",urlBaseConfiguraciones+listConfiguraciones[0][1]);
						jQuery(".Cargado-LogoEvento img").attr("src",urlBaseConfiguraciones+listConfiguraciones[0][2]);
						jQuery(".Login-Logo img").attr("src",urlBaseConfiguraciones+listConfiguraciones[0][1]);
						jQuery(".Login-LogoSecundario img").attr("src",urlBaseConfiguraciones+listConfiguraciones[0][2]);
						jQuery(".Header").css({"background-image":"url('"+urlBaseConfiguraciones+listConfiguraciones[0][3]+"')"});
						jQuery(".Header-Logo").css({"background-image":"url('"+urlBaseConfiguraciones+listConfiguraciones[0][1]+"')"});

						jQuery(".SubmenuInterior .icon-icoSiguiente").css({"background-color":listConfiguraciones[0][4]});
						jQuery(".SubmenuInterior .icon-icoMisFavoritos").css({"background-color":listConfiguraciones[0][4]});


						jQuery(".Tabs").css({"background-color":listConfiguraciones[0][5]});
						//jQuery(".Tabs-Item:hover, .Tabs-Item.activo").css({"background-color":listConfiguraciones[0][4]});

						jQuery("<style type='text/css'> .swal-button { background-color:"+listConfiguraciones[0][4]+";} .swal-button:hover { background-color:"+listConfiguraciones[0][4]+" !important;} .MainMenu-IcoItem{ color:"+listConfiguraciones[0][5]+";} .TitleInterior-Ico{ color:"+listConfiguraciones[0][4]+";} .MenuHover .icon-icoInicio{ color:"+listConfiguraciones[0][4]+";} .Ayuda span{ color:"+listConfiguraciones[0][4]+";} .Ayuda .icon-icoAyuda{ color:"+listConfiguraciones[0][5]+";}  .Tabs-Item:hover, .Tabs-Item.activo{ background-color:"+listConfiguraciones[0][4]+";} .Patrocinadores-Item{ background-color:"+listConfiguraciones[0][4]+";}  .Hoteles-TitleList{ background-color:"+listConfiguraciones[0][4]+";} .Encuesta-Item{ background-color:"+listConfiguraciones[0][5]+";} .Encuesta-Item:hover{ background-color:"+listConfiguraciones[0][4]+";} .Encuesta-Container label.lbCheckbox:before{ background-color:"+listConfiguraciones[0][5]+"; } .Encuesta-Container textarea{ background-color:"+listConfiguraciones[0][5]+";} .Encuesta-BtnItem, .Encuesta-BtnEnviar{ background-color:"+listConfiguraciones[0][5]+";} .Encuesta-BtnItem:hover, .Encuesta-BtnEnviar:hover{ background-color:"+listConfiguraciones[0][4]+";}  </style>").appendTo("head");
						jQuery("<style type='text/css'> .Programa-NextItem,.Notificaciones-CerrartItem{ background-color:"+listConfiguraciones[0][4]+";}  </style>").appendTo("head");
					}		
				});	
			}

			function cargarPrograma() 
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/programa.php",
					//url: "http://localhost/adminAppCentury21/ajax/programa.php",										
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listDias = Respuesta;	

						var itemDias = "";

						if(listDias.length==0)
							jQuery(".Programa-Txt").css({"display":"block"});
						else
							jQuery(".Programa-Txt").css({"display":"none"});
						
						for(var j=0; j < listDias.length; j++)
					  	{
							itemDias += "<li class='Programa-T1'>";
							itemDias += "<a onclick='verPrograma("+j+");' transition='slide' href='#VerPrograma' class='Programa-Item u-inline-block'>";
							itemDias += "<time class='u-inline-block u-efecto' datetime='"+listDias[j][2]+"'>";
							itemDias += listDias[j][1];
							itemDias += "</time>";
							itemDias += "<span class='Programa-NextItem u-inline-block icon-icoSiguiente'></span>";
							itemDias += "</a>";
							itemDias += "</li>";
						}

						jQuery("#Programa-ListDias").html(itemDias);

						jQuery(".Programa-NextItem").css({"background-color":listConfiguraciones[0][4]});
					}		
				});		
			}

			function verPrograma(posDia) {
				
				jQuery("#VerPrograma .SubmenuInterior span").html(listDias[posDia][1]);

				var itemPrograma = "";
						
				var listPrograma = new Array();
				listPrograma = listDias[posDia][6];

				jQuery("#ListPrograma").html("");
  
				for(var a=0; a < listPrograma.length; a++){
					itemPrograma += "<tr>";
					itemPrograma += "<td class='Programa-ColumnaHora'>"+listPrograma[a][1]+" - "+listPrograma[a][2]+"</td>";
					itemPrograma += "<td>";
					itemPrograma += listPrograma[a][3];
					itemPrograma += "</td>";
					itemPrograma += "</tr>";
				}
				
				jQuery("#ListPrograma").html(itemPrograma);
				  

				if(posDia == (listDias.length-1)){
					jQuery("#VerPrograma .Programa-BtnSiguiente").removeClass('u-inline-block');
					jQuery("#VerPrograma .Programa-BtnSiguiente").css({"display":"none"});
				}
				else{
					jQuery("#VerPrograma .Programa-BtnSiguiente").addClass('u-inline-block');
					jQuery("#VerPrograma .Programa-BtnSiguiente").attr("onclick","verSiguientePrograma("+(posDia+1)+")");
				}

				if(existeFavorito(listDias[posDia][0],1)==-1){
					jQuery("#VerPrograma .icon-icoMisFavoritos").attr("onclick","favoritos("+listDias[posDia][0]+",1,"+posDia+")");
					jQuery("#VerPrograma .icon-icoMisFavoritos").removeClass("activo");
				}
				else{
					jQuery("#VerPrograma .icon-icoMisFavoritos").attr("onclick","eliminarFavoritos("+listDias[posDia][0]+",1,"+posDia+")");
					jQuery("#VerPrograma .icon-icoMisFavoritos").addClass("activo");
				}	

				jQuery(".Programa-BtnSiguiente").css({"background-color":listConfiguraciones[0][4]});
			}


			//
			function verSiguientePrograma(posDia) {
				
				jQuery("#VerPrograma .SubmenuInterior span").html(listDias[posDia][1]);

				var itemPrograma = "";
						
				var listPrograma = new Array();
				listPrograma = listDias[posDia][6];

				jQuery("#ListPrograma").html("");
  
				for(var a=0; a < listPrograma.length; a++){
					itemPrograma += "<tr>";
					itemPrograma += "<td class='Programa-ColumnaHora'>"+listPrograma[a][1]+" - "+listPrograma[a][2]+"</td>";
					itemPrograma += "<td>";
					itemPrograma += listPrograma[a][3];
					itemPrograma += "</td>";
					itemPrograma += "</tr>";
				}
				
				jQuery("#ListPrograma").html(itemPrograma);
				  

				if(posDia == (listDias.length-1)){
					jQuery("#VerPrograma .Programa-BtnSiguiente").removeClass('u-inline-block');
					jQuery("#VerPrograma .Programa-BtnSiguiente").css({"display":"none"});
				}
				else{
					jQuery("#VerPrograma .Programa-BtnSiguiente").addClass('u-inline-block');
					jQuery("#VerPrograma .Programa-BtnSiguiente").attr("onclick","verSiguientePrograma("+(posDia+1)+")");
				}


				if(existeFavorito(listDias[posDia][0],1)==-1){
					jQuery("#VerPrograma .icon-icoMisFavoritos").attr("onclick","favoritos("+listDias[posDia][0]+",1,"+posDia+")");
					jQuery("#VerPrograma .icon-icoMisFavoritos").removeClass("activo");
				}
				else{
					jQuery("#VerPrograma .icon-icoMisFavoritos").attr("onclick","eliminarFavoritos("+listDias[posDia][0]+",1,"+posDia+")");
					jQuery("#VerPrograma .icon-icoMisFavoritos").addClass("activo");
				}	
			}

			function cargarPonentes() 
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/ponentes.php",
					//url: "http://localhost/adminAppCentury21/ajax/ponentes.php",					
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listPonentes = Respuesta;	

						var itemPonentes = "";

						if(listPonentes.length==0)
							jQuery(".Ponentes-Txt").css({"display":"block"});
						else
							jQuery(".Ponentes-Txt").css({"display":"none"});

						
						for(var j=0; j < listPonentes.length; j++)
					  	{
							if(j%2==0)
								itemPonentes +="<li class='u-inline-block'>";
							else
								itemPonentes +="<li class='u-inline-block u-sinMargen'>";
							itemPonentes +="<a transition='slide' onclick='verPonente("+j+")' href='#VerPonente' class='Ponentes-Item u-inline-block u-efecto'>";                         
                            itemPonentes +="<figure class='Ponentes-ImgItem u-inline-block'>";
							itemPonentes +="<img src='"+urlBasePonentes+listPonentes[j][2]+"' alt='Ponente' />";
                            itemPonentes +="</figure>";
							itemPonentes +="<h3 class='Ponentes-TitleListInicio u-mayuscula u-efecto'>"+listPonentes[j][1]+"</h3>";
							itemPonentes +="<p>"+listPonentes[j][4]+"</p>";
							itemPonentes +="</a>";
							itemPonentes +="</li>";
						}

						jQuery("#Ponentes-List").html(itemPonentes);

						jQuery(".Ponentes-TitleListInicio").css({"background-color":listConfiguraciones[0][4]});
					}		
				});		
			}

			function verPonente(posPon){

				borrarPonente();

				jQuery("#VerPonente .SubmenuInterior span").html(listPonentes[posPon][1]);

				/*setTimeout(function()
				{
					jQuery("#VerPonente .Ponentes-ImgInterior img").attr("src",urlBasePonentes+listPonentes[posPon][3]);
				},1000);				

				setTimeout(function()
				{
					jQuery("#VerPonente .Ponentes-ImgInterior img").css({"width":"100%"});
				},1050);*/


				setTimeout(function()
				{
					jQuery("#VerPonente .Ponentes-ImgInterior").html("<img src='"+urlBasePonentes+listPonentes[posPon][3]+"' alt='Ponente' width='100%' />");
					
					jQuery("#VerPonente .Ponentes-ImgInterior img").css({"width":"100%"});
				},1000);

				
				if(listPonentes[posPon][6]=="" & listPonentes[posPon][7]=="")
					jQuery("#VerPonente .Ponentes-ContactaInterior").css({"display":"none"});
				else
					jQuery("#VerPonente .Ponentes-ContactaInterior").css({"display":"block"});

				if(listPonentes[posPon][6]==""){
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(0).removeClass('u-inline-block');
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(0).css({"display":"none"});
				}
				else{
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(0).addClass('u-inline-block');
					jQuery("#VerPonente .icon-icoFacebook").attr("onclick","window.open('"+listPonentes[posPon][6]+"','_blank');");
				}

				if(listPonentes[posPon][7]==""){
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(1).removeClass('u-inline-block');
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(1).css({"display":"none"});
				}
				else{
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(1).addClass('u-inline-block');
					jQuery("#VerPonente .icon-icoTwitter").attr("onclick","window.open('"+listPonentes[posPon][7]+"','_blank');");
				}
								
				if(listPonentes[posPon][8]==""){
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(2).removeClass('u-inline-block');
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(2).css({"display":"none"});
				}
				else{
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(2).addClass('u-inline-block');
					jQuery("#VerPonente .icon-icoInstagram").attr("onclick","window.open('"+listPonentes[posPon][8]+"','_blank');");
				}
				
				if(listPonentes[posPon][9]==""){
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(3).removeClass('u-inline-block');
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(3).css({"display":"none"});
				}
				else{
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(3).addClass('u-inline-block');
					jQuery("#VerPonente .icon-icoLinkedin").attr("onclick","window.open('"+listPonentes[posPon][9]+"','_blank');");
				}
				
				if(listPonentes[posPon][10]==""){
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(4).removeClass('u-inline-block');
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(4).css({"display":"none"});
				}
				else{
					jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(4).addClass('u-inline-block');
					jQuery("#VerPonente .icon-icoYoutube").attr("onclick","window.open('"+listPonentes[posPon][10]+"','_blank');");
				}
				
				jQuery("#VerPonente .Ponentes-TitleInterior").html(listPonentes[posPon][4]);
				jQuery("#VerPonente .Ponentes-Info").html(listPonentes[posPon][5]);

				
				if(existeFavorito(listPonentes[posPon][0],2)==-1){
					jQuery("#VerPonente .icon-icoMisFavoritos").attr("onclick","favoritos("+listPonentes[posPon][0]+",2,"+posPon+")");

					jQuery("#VerPonente .icon-icoMisFavoritos").removeClass("activo");
				}
				else{
					jQuery("#VerPonente .icon-icoMisFavoritos").attr("onclick","eliminarFavoritos("+listPonentes[posPon][0]+",2,"+posPon+")");
					jQuery("#VerPonente .icon-icoMisFavoritos").addClass("activo");
				}
			}


			function borrarPonente(){
				jQuery("#VerPonente .SubmenuInterior span").html("&nbsp;");
				jQuery("#VerPonente .Ponentes-ImgInterior").html("<img src='images/bx_loader.gif' alt='Cargando..' width='40px' />");
				jQuery("#VerPonente .Ponentes-ImgInterior img").css({"width":"40px"});

				
				jQuery("#VerPonente .Ponentes-ContactaInterior").css({"display":"none"});
			
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(0).removeClass('u-inline-block');
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(0).css({"display":"none"});
				
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(1).removeClass('u-inline-block');
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(1).css({"display":"none"});
								
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(2).removeClass('u-inline-block');
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(2).css({"display":"none"});
				
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(3).removeClass('u-inline-block');
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(3).css({"display":"none"});
				
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(4).removeClass('u-inline-block');
				jQuery("#VerPonente .Ponentes-ListRedesInterior li").eq(4).css({"display":"none"});
							
				jQuery("#VerPonente .Ponentes-TitleInterior").html("");
				jQuery("#VerPonente .Ponentes-Info").html("");	
			}


			function cargarHospedajes() 
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/hospedajes.php",
					//url: "http://localhost/adminAppCentury21/ajax/hospedajes.php",										
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listHospedajes = Respuesta;	

						var itemHospedajes = "";
						var itemHospedajesA = "";
						var af=0;

						if(listHospedajes.length==0)
							jQuery(".Hoteles-Txt").css({"display":"block"});
						else
							jQuery(".Hoteles-Txt").css({"display":"none"});

						
						for(var j=0; j < listHospedajes.length; j++)
					  	{
							if(listHospedajes[j][14]==1){
								itemHospedajes +="<li class='ajuste u-inline-block u-sinMargen'>";
								itemHospedajes +="<a onClick='verHospedaje("+j+");' transition='slide' href='#VerHospedaje' class='Hoteles-Item u-inline-block u-efecto'>";
								itemHospedajes +="<figure class='Ponentes-ImgItem u-inline-block'>";
								itemHospedajes +="<img src='"+urlBaseHospedajes+listHospedajes[j][3]+"' alt='Hotel' />";
								itemHospedajes +="</figure>";
								
								itemHospedajes +="<h3 class='Hoteles-TitleList u-mayuscula u-efecto'>";
								itemHospedajes +=listHospedajes[j][1];
								itemHospedajes +="<p><strong>Hotel Sede</strong></p>";
								itemHospedajes +="</h3>";
								
								itemHospedajes +="</a>";
								itemHospedajes +="</li>";
							}
							else{
								if(af%2==0)
									itemHospedajesA +="<li class='u-inline-block'>";
								else
									itemHospedajesA +="<li class='u-inline-block u-sinMargen'>";

								//itemHospedajesA +="<li class='u-inline-block'>";
								itemHospedajesA +="<a onClick='verHospedaje("+j+");' transition='slide' href='#VerHospedaje' class='Hoteles-Item u-inline-block u-efecto'>";
								itemHospedajesA +="<figure class='Ponentes-ImgItem u-inline-block'>";
								itemHospedajesA +="<img src='"+urlBaseHospedajes+listHospedajes[j][3]+"' alt='Hotel' />";
								itemHospedajesA +="</figure>";								
								itemHospedajesA +="<h3 class='Hoteles-TitleList u-mayuscula u-efecto'>";
								itemHospedajesA +=listHospedajes[j][1];
								itemHospedajesA +="</h3>";								
								itemHospedajesA +="</a>";
								itemHospedajesA +="</li>";

								af++;
							}
							
						}


						jQuery("#Hoteles-List").html(itemHospedajes);
						jQuery("#Hoteles-ListAlternativas").html(itemHospedajesA);

						if(itemHospedajesA=="")
							jQuery("#HotelesAlternativos").css({"display":"none"});
						else
							jQuery("#HotelesAlternativos").css({"display":"inline-block"});

						jQuery(".Hoteles-TitleList").css({"background-color":listConfiguraciones[0][4]});
					}		
				});		
			}


			function verHospedaje(posHosp){

				borrarHospedaje();

				jQuery("#VerHospedaje .SubmenuInterior span").html(listHospedajes[posHosp][1]);

				setTimeout(function()
				{
					jQuery("#VerHospedaje .Ponentes-ImgInterior").html("<img src='"+urlBaseHospedajes+listHospedajes[posHosp][3]+"' alt='Hotel' width='100%' />");
					jQuery("#VerHospedaje .Ponentes-ImgInterior img").css({"width":"100%"});

					jQuery("#VerHospedaje .Hospedaje-LogoInfo").html("<img src='"+urlBaseHospedajes+listHospedajes[posHosp][2]+"' alt='Hotel' width='100%' />");
					jQuery("#VerHospedaje .Hospedaje-LogoInfo img").css({"width":"100%"});					
				},1000);

				jQuery("#VerHospedaje .Hospedaje-TxtInfo").html(listHospedajes[posHosp][4]);

				if(listHospedajes[posHosp][13]!=""){
					jQuery(".Hospedaje-Paquete").css({"display":"block"});
					jQuery("#VerHospedaje .Hospedaje-InfoPaquete").html(listHospedajes[posHosp][13]);
				}
				else {
					jQuery(".Hospedaje-Paquete").css({"display":"none"});
					jQuery("#VerHospedaje .Hospedaje-InfoPaquete").html("");
				}
				
				jQuery("#VerHospedaje .Hotel-Codigo span").html(listHospedajes[posHosp][16]);
				
				jQuery("#VerHospedaje .Hotel-Direccion span").html(listHospedajes[posHosp][5]);

				activar_Hotel("Hotel-Mapa",listHospedajes[posHosp][6],listHospedajes[posHosp][7]);
				
				if(listHospedajes[posHosp][8]==""){
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(0).removeClass('u-inline-block');
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(0).css({"display":"none"});
				}
				else{
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(0).addClass('u-inline-block');
					jQuery("#VerHospedaje .icon-IcoSitioWeb").attr("onclick","window.open('"+listHospedajes[posHosp][8]+"','_blank');");
				}
				
				if(listHospedajes[posHosp][9]==""){
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(1).removeClass('u-inline-block');
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(1).css({"display":"none"});
				}
				else{
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(1).addClass('u-inline-block');
					jQuery("#VerHospedaje .icon-icoFacebook").attr("onclick","window.open('"+listHospedajes[posHosp][9]+"','_blank');");
				}
				
				if(listHospedajes[posHosp][10]==""){
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(2).removeClass('u-inline-block');
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(2).css({"display":"none"});
				}
				else{
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(2).addClass('u-inline-block');
					jQuery("#VerHospedaje .icon-icoTwitter").attr("onclick","window.open('"+listHospedajes[posHosp][10]+"','_blank');");
				}
				
				if(listHospedajes[posHosp][11]==""){
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(3).removeClass('u-inline-block');
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(3).css({"display":"none"});
				}
				else{
					jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(3).addClass('u-inline-block');
					jQuery("#VerHospedaje .icon-icoInstagram").attr("onclick","window.open('"+listHospedajes[posHosp][11]+"','_blank');");
				}

				if(listHospedajes[posHosp][12]==""){
					jQuery("#VerHospedaje .Hotel-Telefono").css({"display":"none"});
				}
				else{
					jQuery("#VerHospedaje .Hotel-Telefono").css({"display":"block"});
					jQuery("#VerHospedaje .Hotel-Telefono span").html(listHospedajes[posHosp][12]);				
				}


				if(existeFavorito(listHospedajes[posHosp][0],3)==-1){
					jQuery("#VerHospedaje .icon-icoMisFavoritos").attr("onclick","favoritos("+listHospedajes[posHosp][0]+",3,"+posHosp+")");

					jQuery("#VerHospedaje .icon-icoMisFavoritos").removeClass("activo");
				}
				else{
					jQuery("#VerHospedaje .icon-icoMisFavoritos").attr("onclick","eliminarFavoritos("+listHospedajes[posHosp][0]+",3,"+posHosp+")");
					jQuery("#VerHospedaje .icon-icoMisFavoritos").addClass("activo");
				}

				jQuery("#VerHospedaje .Hotel-BtnAbrirMapa").attr("onclick","window.open('"+listHospedajes[posHosp][17]+"','_blank');");
			}


			function borrarHospedaje(){
				jQuery("#VerHospedaje .SubmenuInterior span").html("&nbsp;");
				
				jQuery("#VerHospedaje .Ponentes-ImgInterior").html("<img src='images/bx_loader.gif' alt='Cargando..' width='40px' />");
				jQuery("#VerHospedaje .Ponentes-ImgInterior img").css({"width":"40px"});

				jQuery("#VerHospedaje .Hospedaje-LogoInfo").html("<img src='images/bx_loader.gif' alt='Cargando..' width='40px' />");
				jQuery("#VerHospedaje .Hospedaje-LogoInfo img").css({"width":"40px"});

				jQuery("#VerHospedaje .Hospedaje-TxtInfo").html("");
	
				jQuery(".Hospedaje-Paquete").css({"display":"none"});
				jQuery("#VerHospedaje .Hospedaje-InfoPaquete").html("");
				
				jQuery("#VerHospedaje .Hotel-Codigo span").html("");
				jQuery("#VerHospedaje .Hotel-Direccion span").html("");

				jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(0).removeClass('u-inline-block');
				jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(0).css({"display":"none"});				
				
				jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(1).removeClass('u-inline-block');
				jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(1).css({"display":"none"});
				
				jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(2).removeClass('u-inline-block');
				jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(2).css({"display":"none"});
					
				jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(3).removeClass('u-inline-block');
				jQuery("#VerHospedaje .Ponentes-ListRedesInterior li").eq(3).css({"display":"none"});
				
				jQuery("#VerHospedaje .Hotel-Telefono").css({"display":"none"});
			}

			function cargarDocumentos() 
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/documentos.php",
					//url: "http://localhost/adminAppCentury21/ajax/documentos.php",										
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listDocumentos = Respuesta;	

						var itemDocumentos = "";

						if(listDocumentos.length==0)
							jQuery(".Documentos-Txt").css({"display":"block"});
						else
							jQuery(".Documentos-Txt").css({"display":"none"});

						
						for(var j=0; j < listDocumentos.length; j++)
					  	{
							itemDocumentos +="<li class='u-inline-block u-textLeft'>";
							itemDocumentos +="<a onclick=\"window.open('"+urlBaseDocumentos+listDocumentos[j][1]+"','_system','location=yes');\" class='Documentos-ItemList u-inline-block'>";
							itemDocumentos +="<p>"+listDocumentos[j][0]+"</p>";
							itemDocumentos +="<p>PDF ("+listDocumentos[j][2]+".)</p>";
							itemDocumentos +="<span class='icon-icoDescargar u-position-absolute'></span>";
							itemDocumentos +="</a>";
							itemDocumentos +="</li>";
						}

						jQuery("#Documentos-List").html(itemDocumentos);

						jQuery(".Documentos-ItemList .icon-icoDescargar").css({"background-color":listConfiguraciones[0][4]});
					}			
				});		
			}


			function cargarMapaEvento() 
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/mapaEvento.php",
					//url: "http://localhost/adminAppCentury21/ajax/mapaEvento.php",										
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listMapaEvento = Respuesta;	

						setTimeout(function()
						{

							if(listMapaEvento[0][0]!=""){
								jQuery("#MapaGeneral a").css({"display":"block"});
								jQuery(".MapaDelEvento-Img p").eq(0).css({"display":"none"});
								
								jQuery("#MapaGeneral a").attr("href",""+urlBaseMapaEvento+listMapaEvento[0][0]);
								jQuery("#MapaGeneral img").attr("src",""+urlBaseMapaEvento+listMapaEvento[0][0]);

							}
							else{
								jQuery("#MapaGeneral a").css({"display":"none"});
								jQuery(".MapaDelEvento-Img p").eq(0).css({"display":"block"});	
							}
															


							if(listMapaEvento[0][1]!=""){
								jQuery("#MapaSalon a").css({"display":"block"});
								jQuery(".MapaDelEvento-Img p").eq(1).css({"display":"none"});
								
								jQuery("#MapaSalon a").attr("href",""+urlBaseMapaEvento+listMapaEvento[0][1]);
								jQuery("#MapaSalon img").attr("src",""+urlBaseMapaEvento+listMapaEvento[0][1]);


							}
							else{
								jQuery("#MapaSalon a").css({"display":"none"});
								jQuery(".MapaDelEvento-Img p").eq(1).css({"display":"block"});
							}



							jQuery('[data-fancybox="images"]').fancybox({
								// Options will go here
							});

							jQuery('[data-fancybox="images2"]').fancybox({
								// Options will go here
							});
						},2000);				
					}		
				});		
			}


			function cargarPatrocinadores() 
			{
				setTimeout(function()
				{
					var aP = 0;

					jQuery.ajax(
					{
						url: "http://apps.century21mexico.com/ajax/patrocinadores.php",
						//url: "http://localhost/adminAppCentury21/ajax/patrocinadores.php",											
						data	:{},
						type	: "POST",
						dataType : "json",
						async    : 	false,
						success	: function(Respuesta)
						{
							listPatrocinadores = Respuesta;	

							var itemPatrocinador = "";
							var af=0;

							if(listPatrocinadores.length==0)
								jQuery(".Patrocinadores-Txt").css({"display":"block"});
							else
								jQuery(".Patrocinadores-Txt").css({"display":"none"});

							
							for(var j=0; j < listPatrocinadores.length; j++)
							{			
								if(listPatrocinadores[j][5]==2)
									itemPatrocinador += "<li class='Patrocinadores-Item Oficiales u-inline-block u-efecto u-sinMargen'>";
								else{
										if(af%2==0)
											itemPatrocinador += "<li class='Patrocinadores-Item u-inline-block u-efecto'>";
										else
											itemPatrocinador += "<li class='Patrocinadores-Item u-inline-block u-efecto u-sinMargen'>";
		
											af++;
								}

								itemPatrocinador += "<figure class='Ponentes-ImgItem u-inline-block'>";
								itemPatrocinador += "<img src='"+urlBasePatrocinadores+listPatrocinadores[j][2]+"' alt='patrocinador' />";
								itemPatrocinador += "</figure>";
								itemPatrocinador += "<h3 class='Hoteles-TitleList u-mayuscula u-efecto'>"+listPatrocinadores[j][1]+"</h3>";
								itemPatrocinador += "<div>";
								itemPatrocinador += "<a onclick=\"window.open('"+listPatrocinadores[j][3]+"','_blank');\" class='icon-icoIrAEnlace u-inline-block'></a>";
								
								if(listPatrocinadores[j][5]==2){						
									itemPatrocinador += "<a data-fancybox='patrocinador"+aP+"' onclick='verFlyer("+j+");' class='Patrocinadores-IcoFlyer u-inline-block' href='"+urlBasePatrocinadoresFlyer+listPatrocinadores[j][4]+"'><img style='display:none;' src='"+urlBasePatrocinadoresFlyer+listPatrocinadores[j][4]+"' alt='patrocinador' /></a>";
									aP++;
								}

								itemPatrocinador += "</div>";
								itemPatrocinador += "</li>";
						
							}

							jQuery(".Patrocinadores-List").html(itemPatrocinador);
						}		
					});		

				},2000);
			}

			function verFlyer(pos){
				/*jQuery("#VerFlayer img").attr("src",""+urlBasePatrocinadoresFlyer+listPatrocinadores[pos][4]);						
				jQuery("#VerFlayer").css({"z-index":"2"});
				jQuery('#VerFlayer').fadeIn("slow");
				jQuery('#VerFlayer').css({"display":"flex"});*/
			}

			function verGaleriaModal(pos){
				/*jQuery("#VerFotoGaleria img").attr("src",""+urlBaseFotos+listFotos[pos][1]);						
				jQuery("#VerFotoGaleria").css({"z-index":"2"});
				jQuery('#VerFotoGaleria').fadeIn("slow");
				jQuery('#VerFotoGaleria').css({"display":"flex"});*/
			}

			function verMapaDelEvento(pos){
				/*jQuery("#VerMapaDelEvento img").attr("src",""+urlBaseMapaEvento+listMapaEvento[0][pos]);						
				jQuery("#VerMapaDelEvento").css({"z-index":"2"});
				jQuery('#VerMapaDelEvento').fadeIn("slow");
				jQuery('#VerMapaDelEvento').css({"display":"flex"});*/
			}
			
			function verVideoGaleria(pos){
				jQuery("#VerVideoGaleria video").attr("src",""+urlBaseVideos+listVideos[pos][1]);						
				jQuery("#VerVideoGaleria").css({"z-index":"2"});
				jQuery('#VerVideoGaleria').fadeIn("slow");
				jQuery('#VerVideoGaleria').css({"display":"flex"});


				/*jQuery('#VerVideoGaleria video').on('play', function () { //cuando un audio empieza a reproducirse
					setTimeout(function()
					{
						jQuery('.MapaDelEvento-BtnCerrar').click();
					},1500);
				});*/
			}		


			function cargarSitiosInteres() 
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/sitiosInteres.php",
					//url: "http://localhost/adminAppCentury21/ajax/patrocinadores.php",											
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listSitiosInteres = Respuesta;	

						var itemSitioInteres = "";

						if(listSitiosInteres.length==0)
							jQuery(".SitiosInteres-Txt").css({"display":"block"});
						else
							jQuery(".SitiosInteres-Txt").css({"display":"none"});
						
						for(var j=0; j < listSitiosInteres.length; j++)
					  	{			
							itemSitioInteres += "<li class='u-inline-block u-textLeft'>";
							itemSitioInteres += "<a class='SitiosInteres-ItemList u-inline-block'>";
							itemSitioInteres += "<figure class='u-inline-block'>";
							itemSitioInteres += "<img src='"+urlBaseSitiosInteres+listSitiosInteres[j][5]+"'>";
							itemSitioInteres += "</figure>";
							itemSitioInteres += "<div class='u-inline-block'>";
							itemSitioInteres += "<p><strong>"+listSitiosInteres[j][0]+"</strong></p>";
							itemSitioInteres += listSitiosInteres[j][4];
							itemSitioInteres += "<div onClick=\"window.open('"+listSitiosInteres[j][6]+"','_blank')\" class='Hotel-BtnAbrirMapa Hotel-BtnAbrirMapa--SitioInteres u-block u-redondeado--2'>Abrir mapa</div>";
							itemSitioInteres += "</div>";
							itemSitioInteres += "</a>";
							itemSitioInteres += "</li>";


							marcadores[j] = new Array();

							
							marcadores[j][0] = listSitiosInteres[j][0];	
							marcadores[j][1] = listSitiosInteres[j][1];
							marcadores[j][2] = listSitiosInteres[j][2];
							marcadores[j][3] = listSitiosInteres[j][3];
							marcadores[j][4] = listSitiosInteres[j][4];
							marcadores[j][5] = urlBaseSitiosInteres+listSitiosInteres[j][5]+"";
						}

						activar_mapa();

						jQuery(".SitiosInteres-List").html(itemSitioInteres);
					}		
				});		
			}

			function cargarPreguntas() 
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/preguntas.php",
					//url: "http://localhost/adminAppCentury21/ajax/patrocinadores.php",											
					data	:{id_usuario : datosUsuario['id_usuario']},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						//alert(Respuesta);

						listPreguntas = Respuesta;	

						var itemPregunta = "";
						

						if(listPreguntas[0][0]>0){
							jQuery(".Encuesta-BtnEnviar").css({"display":"none"});
							jQuery(".Encuesta-NA").css({"display":"block"});
							jQuery('#cbNARespuesta').prop('checked', false);

							jQuery(".Encuesta-Title").html("Encuesta del día "+listPreguntas[0][5]);
							jQuery(".Encuesta-Txt").html(listPreguntas[0][1]);

							if(listPreguntas[0][2]==1){
								jQuery(".Encuesta-List").html("");
								jQuery("#txtEncuesta").css({"display":"block"});
								jQuery("#txtEncuesta").val("Tu respuesta");
								jQuery(".Encuesta-BtnItem").css({"display":"block"});
								jQuery(".Encuesta-BtnItem").attr("onclick","preguntaSiguente("+listPreguntas[0][0]+",-1,0,"+listPreguntas[0][2]+")");									
								jQuery(".Encuesta-Indicaciones").css({"display":"none"});
							}
							else if(listPreguntas[0][2]==4){
								jQuery("#txtEncuesta").css({"display":"none"});
								jQuery(".Encuesta-BtnItem").css({"display":"none"});
								jQuery(".Encuesta-Indicaciones").css({"display":"block"});

								for(var j=1; j <= listPreguntas[0][3]; j++)
					  			{
									itemPregunta += "<li>";
									itemPregunta += "<a onclick='preguntaSiguente("+listPreguntas[0][0]+","+j+",0,"+listPreguntas[0][2]+")' class='Encuesta-Item u-inline-block'>";
									itemPregunta += j;
									itemPregunta += "</a>";
									itemPregunta += "</li>";
								}

								jQuery(".Encuesta-List").html(itemPregunta);
							}

							jQuery("#cbNARespuesta").attr("onclick","preguntaSiguente("+listPreguntas[0][0]+",'N/A',0,"+listPreguntas[0][2]+")");
						}
						else
						{
							jQuery(".Encuesta-Title").html("");

							if(listPreguntas[0][0]==0)
								jQuery(".Encuesta-Txt").html("<strong>¡Muchas gracias!.</strong><br />Tus respuestas ya se han enviado.");
							else
								jQuery(".Encuesta-Txt").html("<strong>¡Muchas gracias!.</strong><br />No hay encuesta en este momento.");

							jQuery(".Encuesta-List").html("");
							jQuery("#txtEncuesta").css({"display":"none"});
							jQuery(".Encuesta-BtnItem").css({"display":"none"});
							jQuery(".Encuesta-NA").css({"display":"none"});
							jQuery(".Encuesta-BtnEnviar").css({"display":"none"});
							jQuery(".Encuesta-Indicaciones").css({"display":"none"});
						}
					}		
				});		
			}

			function preguntaSiguente(preg,resp,posiPreg,tipoPre){

				swal("Encuenta", "¡Gracias! Tu respuesta ha sido guardada.");
				
				var posActualRes = listRespuesta.length;
				listRespuesta[posActualRes] = new Array();
				listRespuesta[posActualRes][0] = preg;

				if(resp==-1)
					listRespuesta[posActualRes][1] = jQuery("#txtEncuesta").val();
				else
					listRespuesta[posActualRes][1] = resp;

				var itemPregunta = "";

				posiPreg = posiPreg+1;

				if(listPreguntas.length>posiPreg){
					jQuery(".Encuesta-BtnEnviar").css({"display":"none"});
					jQuery(".Encuesta-NA").css({"display":"block"});
					jQuery('#cbNARespuesta').prop('checked', false);

					jQuery(".Encuesta-Title").html("Encuesta del día "+listPreguntas[posiPreg][5]);
					jQuery(".Encuesta-Txt").html(listPreguntas[posiPreg][1]);

					if(listPreguntas[posiPreg][2]==1){
						jQuery(".Encuesta-List").html("");
						jQuery("#txtEncuesta").css({"display":"block"});
						jQuery("#txtEncuesta").val("Tu respuesta");
						jQuery(".Encuesta-BtnItem").css({"display":"block"});	
						jQuery(".Encuesta-BtnItem").attr("onclick","preguntaSiguente("+listPreguntas[posiPreg][0]+",-1,"+posiPreg+","+listPreguntas[posiPreg][2]+")");
						jQuery(".Encuesta-Indicaciones").css({"display":"none"});
					}
					else if(listPreguntas[posiPreg][2]==4){
						jQuery("#txtEncuesta").css({"display":"none"});
						jQuery(".Encuesta-BtnItem").css({"display":"none"});
						jQuery(".Encuesta-Indicaciones").css({"display":"block"});

						for(var j=1; j <= listPreguntas[posiPreg][3]; j++)
						{
							itemPregunta += "<li>";
							itemPregunta += "<a onclick='preguntaSiguente("+listPreguntas[posiPreg][0]+","+j+","+posiPreg+","+listPreguntas[posiPreg][2]+")' class='Encuesta-Item u-inline-block'>";
							itemPregunta += j;
							itemPregunta += "</a>";
							itemPregunta += "</li>";
						}

						jQuery(".Encuesta-List").html(itemPregunta);
					}

					jQuery("#cbNARespuesta").attr("onclick","preguntaSiguente("+listPreguntas[posiPreg][0]+",'N/A',"+posiPreg+","+listPreguntas[posiPreg][2]+")");
				}
				else{
					jQuery(".Encuesta-Txt").html("Por favor da click en el botón de ENVIAR para que podamos recibir la encuesta.");
					jQuery(".Encuesta-List").html("");
					jQuery("#txtEncuesta").css({"display":"none"});
					jQuery(".Encuesta-BtnItem").css({"display":"none"});
					jQuery(".Encuesta-NA").css({"display":"none"});
					jQuery(".Encuesta-BtnEnviar").css({"display":"block"});
					jQuery(".Encuesta-Indicaciones").css({"display":"none"});
				}
			}

			function cargarFotos() 
			{
				setTimeout(function()
				{
					jQuery.ajax(
					{
						url: "http://apps.century21mexico.com/ajax/fotos.php",
						data	:{},
						type	: "POST",
						dataType : "json",
						async    : 	false,
						success	: function(Respuesta)
						{
							listFotos = Respuesta;	

							var itemFoto = "";

							for(var j=0; j < listFotos.length; j++)
							{			
								if(j%2==0)
									itemFoto += "<a data-fancybox='gallery' onclick='verGaleriaModal("+j+")' class='u-inline-block' style='background-image:url(\""+urlBaseFotos+listFotos[j][1]+"\")' href='"+urlBaseFotos+listFotos[j][1]+"'><img src='"+urlBaseFotosTh+listFotos[j][1]+"' alt='Foto' /></a>";
								else
									itemFoto += "<a data-fancybox='gallery' onclick='verGaleriaModal("+j+")' class='u-inline-block u-sinMargen' style='background-image:url(\""+urlBaseFotos+listFotos[j][1]+"\")' href='"+urlBaseFotos+listFotos[j][1]+"'><img src='"+urlBaseFotosTh+listFotos[j][1]+"' alt='Foto' /></a>";
							}
							
							if(listFotos.length>0)
								jQuery(".Galeria-Fotos").html(itemFoto);
							else
								jQuery(".Galeria-Fotos").html("<p><strong>Aun no se han subido fotos a esta galería</strong></p>");
						}		
					});
				},800);
			}

			function cargarVideos() 
			{
				setTimeout(function()
				{
					jQuery.ajax(
					{
						url: "http://apps.century21mexico.com/ajax/videos.php",
						data	:{},
						type	: "POST",
						dataType : "json",
						async    : 	false,
						success	: function(Respuesta)
						{
							listVideos = Respuesta;	

							var itemVideo = "";
							
							for(var j=0; j < listVideos.length; j++)
							{			
								itemVideo += "<a onclick='verVideoGaleria("+j+")'><video id='videoGaleria"+j+"' class='videoGaleria' preload autoplay webkit-playsinline playsinline muted><source src='"+urlBaseVideos+listVideos[j][1]+"' type='video/mp4'>Tu navegador no implementa el elemento <code>video</code>.</video></a>";
							}
							
							if(listVideos.length>0)
								jQuery(".Galeria-Videos").html(itemVideo);
							else
								jQuery(".Galeria-Videos").html("<p><strong>Aun no se han subido videos a esta galería</strong></p>");

							setTimeout(function()
							{
								jQuery('.videoGaleria').on('play', function () { //cuando un audio empieza a reproducirse
									var current=this;
									jQuery('.videoGaleria').each(function(j) { 
										if (this == current) { //todos los demás
											setTimeout(function()
											{
												document.getElementById("videoGaleria"+j).pause();
												//document.getElementById("videoGaleria"+j).controls = false; 
												//Query('.videoGaleria').eq(j).pause();  //los pausamos
											},500);
										}
									});
								});

							},1200);
						}		
					});
				},800);
			}
			
			function removerGaleria()
			{
				setTimeout(function()
				{
					jQuery(".Galeria-Fotos").html("");
					jQuery(".Galeria-Videos").html("");
				},800);
			}

			function cargarDatosContacto()
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/contacto.php",
					//url: "http://localhost/adminAppCentury21/ajax/contacto.php",											
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listDatosContacto = Respuesta;	

						for(var j=0; j < listDatosContacto.length; j++)
					  	{
							var telefonoA = listDatosContacto[j][0];
							telefonoA = telefonoA.replace(' ','');
							telefonoA = telefonoA.replace(' ','');
							telefonoA = telefonoA.replace(' ','');
							telefonoA = telefonoA.replace('(','');
							telefonoA = telefonoA.replace(')','');

							jQuery(".Ayuda-List .Ayuda-Telefono").html(listDatosContacto[j][0]);
							jQuery(".Ayuda-List .Ayuda-Telefono").attr("onclick","document.location.href = 'tel:+"+telefonoA+"'");

							jQuery(".Ayuda-List .Ayuda-Email").html(listDatosContacto[j][1]);
							jQuery(".Ayuda-List .Ayuda-Email").attr("onclick","document.location.href = 'mailto:"+listDatosContacto[j][1]+"'");
						}
					}		
				});		
			}


			function cargarDatosRedesSociales()
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/redesSociales.php",
					//url: "http://localhost/adminAppCentury21/ajax/contacto.php",											
					data	:{},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listRedesSociales = Respuesta;	

						for(var j=0; j < listRedesSociales.length; j++)
					  {
							//jQuery(".Header-IcoCompartir").attr("onclick","window.plugins.socialsharing.share('"+listRedesSociales[j][1]+". Url del evento: "+listRedesSociales[j][2]+"','"+listRedesSociales[j][1]+"', '"+urlBaseRedesSociales+listRedesSociales[j][3]+"', null);");
							jQuery(".Header-IcoCompartir").attr("onclick","window.plugins.socialsharing.share('"+listRedesSociales[j][4]+". Para más información: "+listRedesSociales[j][2]+"', '"+listRedesSociales[j][1]+"','"+urlBaseRedesSociales+listRedesSociales[j][3]+"', '"+urlBaseRedesSociales+listRedesSociales[j][3]+"');");
						}
					}		
				});		
			}

			function cargarNotificaciones()
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/notificaciones.php",
					data	:{id_usuario : datosUsuario['id_usuario']},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listNotificaciones = Respuesta;	

						var itemNotificaciones = "";
						
						for(var j=0; j < listNotificaciones.length; j++)
					  	{	
			               	itemNotificaciones +="<li>";
							itemNotificaciones +="<div class='Notificaciones-Item u-inline-block'>";
                        	itemNotificaciones +="<p class='u-inline-block u-efecto'>";
                            itemNotificaciones +="<strong>"+listNotificaciones[j][1]+"</strong><br />";
                        	itemNotificaciones += listNotificaciones[j][4]+" "+listNotificaciones[j][2];
                            itemNotificaciones +="<br />"+listNotificaciones[j][3]+"<strong></strong>";
                        	itemNotificaciones +="</p>";
                           	itemNotificaciones +="<span onclick='eliminarNotificacion("+j+","+listNotificaciones[j][0]+")' class='Notificaciones-CerrartItem u-inline-block icon-icoSiguiente'></span>";
    	                 	itemNotificaciones +="</div>";
	    	               	itemNotificaciones +="</li>";
						}

						jQuery("#Notificaciones-List").html(itemNotificaciones);
					}
				});		
			}

			function eliminarNotificacion(posiItem,id_notificacion){

				jQuery.ajax(
				{														
					url: "http://apps.century21mexico.com/ajax/eliminarNotificacion.php",
					type	: "POST",
					dataType	: "json",
					async    : 	false,		
					data: {"id_usuario" : datosUsuario['id_usuario'] , 'id_notificacion' : id_notificacion },																
					success: function(Respuesta)
					{	
						
						jQuery("#Notificaciones-List li").eq(posiItem).slideUp('slow');
						swal("Notificaciones", "En este momento se ha elimanado de tus notificaciones");							
					}
				});		
			}
			
			
			function cargarFavoritos() 
			{
				jQuery.ajax(
				{
					url: "http://apps.century21mexico.com/ajax/favoritos.php",
					data	:{id_usuario : datosUsuario['id_usuario']},
					type	: "POST",
					dataType : "json",
					async    : 	false,
					success	: function(Respuesta)
					{
						listFavoritos = Respuesta;	

						var itemFavorito = "";

						if(listFavoritos.length==0)
							jQuery(".MisFavoritos-Txt").css({"display":"block"});
						else
							jQuery(".MisFavoritos-Txt").css({"display":"none"});
							
						
						for(var j=0; j < listFavoritos.length; j++)
					  	{			
							itemFavorito += "<li>";

							if(listFavoritos[j][1]==1){	
								itemFavorito += "<a onclick='verPrograma("+buscarPosicionDia(listFavoritos[j][0])+");' transition='slide' href='#VerPrograma' class='MisFavoritos-Item u-inline-block'>";  
								
								
							}
							else if(listFavoritos[j][1]==2){									
								itemFavorito += "<a onclick='verPonente("+buscarPosicionPonente(listFavoritos[j][0])+");' transition='slide' href='#VerPonente' class='MisFavoritos-Item u-inline-block'>";  
							}
							else if(listFavoritos[j][1]==3){
								itemFavorito += "<a onclick='verHospedaje("+buscarPosicionHotel(listFavoritos[j][0])+");' transition='slide' href='#VerHospedaje' class='MisFavoritos-Item u-inline-block'>";    								
							}	

							itemFavorito += "<div class='u-inline-block u-efecto'>";
							itemFavorito += "<p class='MisFavoritos-Tipo'>";
							itemFavorito += listFavoritos[j][3];
							itemFavorito += "</p>";					
							itemFavorito += "<p>";
							itemFavorito += listFavoritos[j][2];
							itemFavorito += "</p>";
							itemFavorito += "</div>";
							itemFavorito += "<span class='Programa-NextItem u-inline-block icon-icoSiguiente'></span>";
							itemFavorito += "</a>";
							itemFavorito += "</li>";
						}

						jQuery(".MisFavoritos-List").html(itemFavorito);
					}		
				});		
			}


			function favoritos(id_elemento,tipo,posi){

				if(tipo==1){
					jQuery("#VerPrograma .icon-icoMisFavoritos").addClass("activo");
				}
				else if(tipo==2){
					jQuery("#VerPonente .icon-icoMisFavoritos").addClass("activo");
				}
				else if(tipo==3){
					jQuery("#VerHospedaje .icon-icoMisFavoritos").addClass("activo");
				}

				jQuery.ajax(
				{														
					url: "http://apps.century21mexico.com/ajax/agregarFavoritos.php",
					type	: "POST",
					dataType	: "json",
					async    : 	false,		
					data: {"id_usuario" : datosUsuario['id_usuario'] , 'id_elemento' : id_elemento, 'id_tipo' : tipo },																
					success: function(Respuesta)
					{	
						if(tipo==1)
							jQuery("#VerPrograma .icon-icoMisFavoritos").attr("onclick","eliminarFavoritos("+id_elemento+","+tipo+","+posi+")");
						else if(tipo==2)
							jQuery("#VerPonente .icon-icoMisFavoritos").attr("onclick","eliminarFavoritos("+id_elemento+","+tipo+","+posi+")");
						else if(tipo==3)
							jQuery("#VerHospedaje .icon-icoMisFavoritos").attr("onclick","eliminarFavoritos("+id_elemento+","+tipo+","+posi+")");

						swal("Favoritos", "En este momento se ha agregado a tus favoritos");							
					}
				});		
			}


			function eliminarFavoritos(id_elemento,tipo,posi){

				if(tipo==1){
					jQuery("#VerPrograma .icon-icoMisFavoritos").removeClass("activo");
				}
				else if(tipo==2){
					jQuery("#VerPonente .icon-icoMisFavoritos").removeClass("activo");
				}
				else if(tipo==3){
					jQuery("#VerHospedaje .icon-icoMisFavoritos").removeClass("activo");
				}
				
				jQuery.ajax(
				{														
					url: "http://apps.century21mexico.com/ajax/eliminarFavorito.php",
					type	: "POST",
					dataType	: "html",
					async    : 	false,		
					data: {"id_usuario" : datosUsuario['id_usuario'] , 'id_elemento' : id_elemento, 'id_tipo' : tipo },																
					success: function(Respuesta)
					{	
						if(tipo==1)
							jQuery("#VerPrograma .icon-icoMisFavoritos").attr("onclick","favoritos("+id_elemento+","+tipo+","+posi+")");
						else if(tipo==2)
							jQuery("#VerPonente .icon-icoMisFavoritos").attr("onclick","favoritos("+id_elemento+","+tipo+","+posi+")");
						else if(tipo==3)
							jQuery("#VerHospedaje .icon-icoMisFavoritos").attr("onclick","favoritos("+id_elemento+","+tipo+","+posi+")");

						swal("Favoritos", "En este momento se ha eliminado a tus favoritos");	
					}
				});	
			}

			//Cerrar sesion
			function cerrarSesion(){
				swal({
					title: "Confirmar",
					text: "¿Desea cerrar sesión?",
					buttons: ["No", "Si"],
				}).then(function(value) {
					if (value) {
						document.location.href = "#Login";

						setTimeout(function(){
							location.reload();
						},1000);
					}
				});
			}

			//Buscar posicion de dias
			function buscarPosicionDia(id_d){
				//alert(listAsociados.length);
				for(var j=0; j < listDias.length; j++)
					if(listDias[j][0]==id_d)
						return j;
			}

			//Buscar posicion de ponentes
			function buscarPosicionPonente(id_p){
				//alert(listAsociados.length);
				for(var j=0; j < listPonentes.length; j++)
					if(listPonentes[j][0]==id_p)
						return j;
			}

			//Buscar posicion de hoteles
			function buscarPosicionHotel(id_h){
				//alert(listAsociados.length);
				for(var j=0; j < listHospedajes.length; j++)
					if(listHospedajes[j][0]==id_h)
						return j;
			}


			//Buscar si existe en favoritos
			function existeFavorito(id_e,tipo){
				//alert(listAsociados.length);
				for(var j=0; j < listFavoritos.length; j++)
					if(listFavoritos[j][0]==id_e && listFavoritos[j][1]==tipo)
						return j;

				return -1;
			}


			//Funciones para activar slider
			function activarSlider1()
			{
				setTimeout(function()
				{			
					slider1 = jQuery('#bxslider1').bxSlider({pager:false, auto: true, pause:2000});
				},1000);
			}
			
			function activarSlider2()
			{
				setTimeout(function()
				{			
					slider2 = jQuery('#bxslider2').bxSlider({pager:false, auto: true, pause:2000});
				},1000);
			}
						
			//Funciones para desactivar slider
			function desactivarSlider1()
			{
				setTimeout(function()
				{
					slider1.destroySlider();
				},1000);
			}
			
			function desactivarSlider2()
			{
				setTimeout(function()
				{
					slider2.destroySlider();
				},1000);
			}
			
			function activarMapaEvento()
			{
				jQuery(".Tabs-Item").eq(0).click();
			}
			
			function activarGaleria()
			{
				jQuery(".Tabs-Item").eq(2).click();
			}

			function activarSitioInteres()
			{
				jQuery(".Tabs-Item").eq(4).click();
			}




			function activar_mapa()
			{
				var lat, lon;			

				if(marcadores.length>0)
				{
					lat = marcadores[0][2];
					lon =  marcadores[0][3];

					var latlngP = new google.maps.LatLng(lat,lon);
					var options = { zoom: 10, center: latlngP, disableDefaultUI: true,scrollwheel: true, mapTypeId: google.maps.MapTypeId.ROADMAP};
					var map = new google.maps.Map(document.getElementById('MapaSitiosInteres'), options);
					
					var infowindow = new google.maps.InfoWindow({maxWidth: 148});
					var marker, i;
					for (i = 0; i < marcadores.length; i++) 
					{  
							marker = new google.maps.Marker(
							{
								position: new google.maps.LatLng(marcadores[i][2], marcadores[i][3]),
								map: map,
								icon: 'images/marker.png'
							});
		
							google.maps.event.addListener(marker, 'click', (function(marker, i) 
							{
								/*var listaOpciones ="<ul class='MapaPropiedad-ListInfoPropiedad'><li class='u-inline-block'><span class='icon-icoBanio'></span>"+marcadores[i][6]+"</li>"+
								"<li class='u-inline-block'><span class='icon-icoCama'></span>"+marcadores[i][7]+"</li>"+
								"<li class='u-inline-block'><span class='icon-icoMedidas'></span>"+marcadores[i][8]+"</li>"+
								"</ul>";*/


								return function() 
								{
								  infowindow.setContent("<div class='SitiosInteres-Info' style='background-image: url(\""+marcadores[i][5]+"\")'><h3>"+marcadores[i][0]+"</h3> <p>"+marcadores[i][1]+"</p></div>");
								  infowindow.open(map, marker);
								}
							})(marker, i));
		
							google.maps.event.addListener(infowindow, 'domready', function() 
							{
								// Reference to the DIV that wraps the bottom of infowindow
								var iwOuter = jQuery('.gm-style-iw');
								
								
								var iwBackground = iwOuter.prev();
							
								// Removes background shadow DIV
								iwBackground.children(':nth-child(2)').css({'display' : 'none'});
								
								// Removes background shadow DIV
								iwBackground.children(':nth-child(2)').css({'display' : 'none'});
								
								// Removes white background DIV
								iwBackground.children(':nth-child(4)').css({'display' : 'none'});
								
								// Moves the infowindow 115px to the right.
								//iwOuter.parent().parent().css({left: '115px'});
								
								// Moves the shadow of the arrow 76px to the left margin.
								iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
								
								// Moves the arrow 76px to the left margin.
								iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
								
								// Changes the desired tail shadow color.
								iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(65, 117, 5, 0.6) 0px 1px 6px', 'z-index' : '1'});
								
								// Reference to the div that groups the close button elements.
								var iwCloseBtn = iwOuter.next();
								
								// Apply the desired effect to the close button
								//iwCloseBtn.css({opacity: '1', right: '-12px', top: '3px', border: '2px solid #000', 'border-radius': '13px', 'box-shadow': '0 0 5px #0