@extends('layouts.app2')

@section('header-layout')
    <title>Login - Apprender</title>
	<link rel="shortcut icon" href="favicon.png" />
@endsection

@section('style')
    <link href="{{'/css/jamarrom/reset.css'}}" rel="stylesheet" type="text/css">
    <link href="{{'/css/jamarrom/fonts.css'}}" rel="stylesheet" type="text/css">
    <link href="{{'/css/jamarrom/utilidades.css'}}" rel="stylesheet" type="text/css">
    <link href="{{'/css/jamarrom/style.css'}}" rel="stylesheet" type="text/css">
    <link href="{{'/css/jamarrom/animations.css'}}" rel="stylesheet" type="text/css">
    <link href="{{'/css/jamarrom/responsive.css'}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="Autentificacion-Ajuste u-imagenFondoCover">

    <div class="Modal Modal--Ayuda">
        <div class="ModalProgreso-Center u-inline-block">
            <span onClick="$('.Modal, .ModalRegistro-Txt1, .ModalRegistro-Txt4').fadeOut();" class="Modal-Cerrar u-inline-block">CERRAR <span>x</span></span>
       </div>
   </div>

    <article class="Login" id="login">
        <h1 class="Login-Logo slideDown"><span>Apprender</span></h1>

        <form name="form-login" id="form-login" class="Login-Form u-redondeado--1 u-desaparecer" action="{{ route('login') }}" method="POST">
            @csrf

            <a onClick="$('.Modal--Ayuda, .ModalRegistro-Txt1, .ModalRegistro-Txt4').fadeIn();" class="Login-Ayuda u-inline-block u-positionAbsolute"><span>Guía</span>
                <p class="ModalRegistro-Txt1 u-positionAbsolute u-textJustify">
                    Con este icono encontrarás nuestra guía rápida, la cual te servirá de apoyo para utilizar y navegar cómodamente.
                </p>
            </a>

            <p class="Login-Titulo u-textLeft">
                Iniciar sesión
            </p>

            <input type="text" name="identity" id="txtUsuario"
                class="Login-Usuario text u-box-sizing required  u-redondeado--05"
                placeholder="E-MAIL O FICHA"
                onfocus="if(this.value == 'INGRESE E-MAIL DE USUARIO') { this.value = ''; }"
                value="<?php if(isset($_POST['btnEntrar'])) { if(!empty($msj)) { echo $usuario; } } ?>"
                required autocomplete="email" autofocus>
            @error('identity')
                    <strong>{{ $message }}</strong>
            @enderror
            <input type="password" name="password" id="txtContrasenia"
                class="Login-Contrasenia u-box-sizing text required  u-redondeado--05"
                placeholder="INGRESE LA CONTRASEÑA"
                onfocus="if(this.value == 'INGRESE LA CONTRASEÑA') { this.value = ''; }" required>

            <div class="u-textRight">
                <input type="submit" name="btnEntrar" id="btnEntrar"
                    class="Login-Boton u-boton u-efecto u-textCenter u-redondeado--05 u-inline-block" value="ENTRAR">
            </div>
            {{-- @if (Route::has('password.request'))
                <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif --}}

            <p class="ModalRegistro-Txt4 u-positionAbsolute u-textJustify">
                Si olvidas tu contraseña puedes recuperar tu acceso aquí
            </p>

            <p class="u-textRight"><a class="Login-TxtTengoCuenta u-inline-block"
                href="{{route('password.request') }}"><strong>Recuperar contraseña</strong></a></p>
            <!--<p class="u-textRight"><a href="{{route('register')}}" class="Login-TxtTengoCuenta u-inline-block"><strong>
                    << Regresar</strong> </a>
            </p>-->
            <figure class="Notificaciones-Cargado u-textCenter">
                <img src="images/loading.gif" alt="Cargando..." />
            </figure>
        </form>

        <figure class="Login-ImgSSPA slideUp"></figure>
    </article>

</div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{asset('/js/jamarrom/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jamarrom/login.js')}}"></script>
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
