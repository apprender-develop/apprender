@extends('layout.app')

@section('header-layout')
    <title>Curso-Apprender</title>
    <link rel="shortcut icon" href="../favicon.png" />
@endsection

@section('style')
    <link href="{{asset('/css/jamarrom/reset.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/fonts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/utilidades.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/animations.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/responsive.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/jquery.bxslider.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/delta.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('javascript')
    <script type="text/javascript" src="{{asset('/js/jamarrom/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jamarrom/jquery.bxslider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jamarrom/index.js')}}"></script>
@endsection

@section('bodyClass')
    BgInicio u-imagenFondoCover
@endsection

<div>
    <header class="Unidad-Header u-imagenFondoCover">
        <h2 class="Unidad-Title u-textRight">BÁSICO DE SEGURIDAD Y PROTECCIÓN AMBIENTAL</h2>

        <ul class="Curso-ListUnidades u-inline-block">
            <li class="u-inline-block u-efecto inActivo">Unidad 1</li>
            <li class="activo u-inline-block u-efecto">Unidad 2</li>
            <li class="u-inline-block u-efecto inActivo">Unidad 3</li>
            <li class="u-inline-block u-efecto">Unidad 4</li>
            <li class="u-inline-block u-efecto inActivo">Unidad 5</li>
        </ul>
    </header>

    <section class="Unidad-Content u-imagenFondoCover u-textLeft">
        <div class="Curso-ContentObjetivos u-inline-block">
            <h3 class="Curso-TitlrContentObjetivos">Objetivos</h3>
            <p class="u-textJustify">Al finalizar el curso los participantes obtendrán los principios y fundamentos
                básicos en materia de Seguridad, Salud y Protección Ambiental. <br /><br /> Desarrollará prácticas
                seguras de trabajo en instalaciones petroleras, direccionadas a la prevención de accidentes y a la
                integración de una cultura sobresaliente de Seguridad Industrial y Protección al Medio Ambiente.</p>
        </div>

        <div class="Curso-ContentUnidades u-inline-block">


            <div>
                <ul class="Unidad-ListMenuUnidad" style="display: none;"></ul>

                <ul class="Unidad-ListMenuUnidad">
                    <li><a href="unidad2.php?tema=Objetivo" class="activo u-inline-block"><strong>2.1</strong> Objetivo
                            de Aprendizaje</a></li>
                    <li><a href="unidad2.php?tema=Introduccion" class="u-inline-block"><strong>2.2</strong>
                            Introducción</a></li>
                    <li><a href="" class="u-inline-block NoDisponible"><strong>2.3</strong> Sistema PEMEX-SSPA</a></li>
                    <li><a href="unidad2.php?tema=equipo-de-proteccion-personal"
                            class="u-inline-block"><strong>2.4</strong> Equipo de proteccion personal</a></li>
                    <li><a href="" class="u-inline-block NoDisponible"><strong>2.5</strong> Legislación en materia de
                            Seguridad Industrial y Protección Ambiental</a></li>
                    <li><a href="" class="u-inline-block NoDisponible"><strong>2.6</strong> Prevención de accidentes</a>
                    </li>
                    <li><a href="" class="u-inline-block NoDisponible"><strong>2.7</strong> Conclusión</a></li>
                </ul>

                <ul class="Unidad-ListMenuUnidad" style="display: none;"></ul>

                <ul class="Unidad-ListMenuUnidad" style="display: none;">
                    <li><a href="unidad4.php?tema=Objetivo" class="activo u-inline-block"><strong>4.1</strong> Objetivo
                            de Aprendizaje</a></li>
                    <li><a href="unidad4.php?tema=Introduccion" class="u-inline-block"><strong>4.2</strong>
                            Introducción</a></li>
                    <li><a href="" class="u-inlne-block" style="color:gray !important;"><strong>4.3</strong> Prácticas
                            contraincendios y rescate de lesionados</a></li>
                    <li><a href="unidad4.php?tema=uso-y-manejo-de-mangueras-contraincendio"
                            class="u-inline-block"><strong>4.4</strong> Uso y manejo de mangueras contraincendio</a>
                    </li>
                    <li><a href="unidad4.php?tema=uso-y-manejo-extintores-portatiles"
                            class="u-inline-block"><strong>4.5</strong> Uso y manejo de extintores portatiles</a></li>
                    <li><a href="" class="u-inline-block" style="color:gray !important;"><strong>4.6</strong> Uso y
                            manejo de equipos de aire autónomos</a></li>
                    <li><a href="" class="u-inline-block" style="color:gray !important;"><strong>4.7</strong>
                            Conclusión</a></li>
                    <li><a href="" class="u-inline-block" style="color:gray !important;"><strong>4.8</strong>
                            Autoevaluación</a></li>
                </ul>

                <ul class="Unidad-ListMenuUnidad" style="display: none;"></ul>
            </div>
        </div>
    </section>
</div>
