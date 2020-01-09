@extends('layouts.app')

@section('style')
    <link href="{{asset('/css/jamarrom/reset.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/fonts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/utilidades.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/jquery.bxslider.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/animations.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/responsive.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('bodyClass')
    BgInicio u-imagenFondoCover
@endsection

@section('content2')
    @include('modal._progreso')
    @include('modal._evaluaciones')


    <div class="Modal Modal--Ayuda">
        <div class="ModalProgreso-Center u-inline-block">
            <span onClick="$('.Modal--Ayuda').fadeOut(); $('[class*=ModalRegistro').fadeOut();" class="Modal-Cerrar u-inline-block">CERRAR <span>x</span></span>
       </div>
   </div>

    <section class="Inicio u-imagenFondoCover">

        <p class="ModalRegistro-Txt13 u-positionAbsolute u-textJustify">
            Con esta opción puedes regresar al menú interactivo de Apprender
        </p>

        <p class="ModalRegistro-Txt14 u-positionAbsolute u-textJustify">
            Cuando un curso se habilita puedes acceder a el, dando clic
        </p>

        <p class="ModalRegistro-Txt15 u-positionAbsolute u-textJustify">
            Bienvenido a tu perfil, aquí podrás visualizar tus evaluaciones progreso y evaluarnos.
        </p>

        <p class="ModalRegistro-Txt16 u-positionAbsolute u-textJustify">
            <strong>¿Necesitas ayuda?</strong> Con esta opción encontrarás lo que buscas para tus dudas sobre <strong>Apprender</strong>
        </p>

        <p class="ModalRegistro-Txt17 u-positionAbsolute u-textJustify">
            Con este icono encontrarás nuestra guía rápida, la cual te servirá de apoyo para utilizar y navegar cómodamente.
        </p>

        <p class="ModalRegistro-Txt18 u-positionAbsolute u-textJustify">
            Aquí podrás cerrar sesión y salir de la plataforma
        </p>

        <p class="ModalRegistro-Txt19 u-positionAbsolute u-textCenter">
            Con estas flechas slider de navegación podrás avanzar o retroceder entre cursos
        </p>

        <ul class="Inicio-ListMisCursos u-textCenter">
            <li class="u-inline-block">
                <a href="{{route('curso', ['curso_id' => 1])}}" class="Inicio-ItemMisCursos u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso1.jpg)"></figure>
                   <p class="u-box-sizing u-efecto u-redondeado--05">
                       Básico de Seguridad y Protección Ambiental
                   </p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                   <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso2.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Brigadas de Rescate en Edificios Administrativos</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso3.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Seguridad en Centros Administrativos</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                   <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso4.jpg)"></figure>
                   <p class="u-box-sizing u-efecto u-redondeado--05">Sobrevivencia en el Mar</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                   <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso5.jpg)"></figure>
                   <p class="u-box-sizing u-efecto u-redondeado--05"> Sistema de Permisos Para Trabajos Con Riesgo</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso6.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Verificador de Gas</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso7.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Brigadas Contra Incendio</p>
                </a>
            </li>
       </ul>

       <ul class="Inicio-ListMisCursos u-textCenter">
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso8.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Manejo de Cilindro de Gas</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso9.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Brigadas en Primeros Auxilios</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso10.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Formación de Timoneles de Botes de Salvamento</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso11.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Brigadas de Busqueda y Rescate en Areas Industriales</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso12.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">H2S</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso13.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Prevención de Riesgos Laborales</p>
                </a>
            </li>
            <li class="u-inline-block">
                <a href="" class="Inicio-ItemMisCursos NoDisponible u-inline-block">
                    <figure class="Inicio-ImgItemMisCursos u-redondeado--05 u-imagenFondoCover u-inline-block" style="background-image: url(../images/cursos/destacadacurso14.jpg)"></figure>
                    <p class="u-box-sizing u-efecto u-redondeado--05">Manejo de Materiales Peligrosos</p>
                </a>
            </li>
       </ul>

   </section>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{asset('/js/jamarrom/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jamarrom/login.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jamarrom/jquery.bxslider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jamarrom/index.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jamarrom/funciones.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function()
    {
            $("#txtUsuario").change(function ()
        {
            if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0)
            {
                $('input:-webkit-autofill').each(function()
                {
                    var text = $(this).val();
                    var name = $(this).attr('name');
                    $(this).after(this.outerHTML).remove();
                    $('input[name=' + name + ']').val(text);
                });
            }
        });
        });
        $(document).ready(function() {
            $('#formRecuperarContrasenia').on('submit', function(e){
                e.preventDefault()
                let form = $(this);
                let url = form.attr('action');

                let password = $('#password').val()
                let password_confirmation = $('#password_confirmation').val()

                if (validatePassword(password, password_confirmation)) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            alert('Contraseñas actualizadas correctamente.'); // show response from the php script.
                        }
                    });
                } else {
                    alert('Las contraseñas no coinciden, favor de verificarlas.')
                }

            })

            $('#formCalificanos').on('submit', function(e){
                e.preventDefault()
                let form = $(this);
                let url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        alert('Gracias por calificarnos.'); // show response from the php script.
                    }
                });

            })

            let validatePassword = (password, password_confirmation) => {
                let pass = false;
                if (password === password_confirmation) {
                    pass = true
                }
                return pass
            }
        })
    </script>
@endsection
