@extends('layouts.app')

@section('style')
    <link href="{{asset('/css/jamarrom/reset.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/fonts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/utilidades.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/animations.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/responsive.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/jquery.bxslider.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('bodyClass')
    BgInicio u-imagenFondoCover
@endsection

@section('content2')
    @include('modal._progreso')
    @include('modal._evaluaciones')
    <section class="Inicio u-imagenFondoCover">
        <ul class="Inicio-ListMisCursos u-textCenter">
            <li class="u-inline-block">
                <a href="curso1.php" class="Inicio-ItemMisCursos u-inline-block">
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

        <figure class="Inicio-Logos u-textRight">
           <img src="../images/pemexOGO.png" alt="Pemex">
           <img width="50px" src="../images/sspaLOGO.png" alt="SSPA">
       </figure>
   </section>
</div>
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
    </script>
@endsection
