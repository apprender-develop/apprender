@extends('layouts.app2')

@section('header-layout')
    <title>Registro - Apprender</title>
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
    <article class="Login" id="login">
        <h1 class="Login-Logo slideDown"><span>Apprender</span></h1>

        <form name="form-login" id="form-login" class="Login-Form u-redondeado--1 u-desaparecer" method="POST" action="{{ route('register') }}">
            <p class="Login-Titulo u-textLeft">
                Registro
            </p>

            @csrf

            <input type="text" id="txtNombre" class="text u-box-sizing required  u-redondeado--05"
                placeholder="Nombre completo" onfocus="if(this.value == 'Nombre completo') { this.value = ''; }"
                name="nombreCompleto" value="{{ old('nombreCompleto') ? old('nombreCompleto') : 'Nombre completo' }}" required autocomplete="nombreCompleto" autofocus>
            @error('nombreCompleto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <input type="text" id="txtNoFicha" class="text u-box-sizing required  u-redondeado--05"
                placeholder="No de ficha" onfocus="if(this.value == 'No de ficha') { this.value = ''; }"
                value="No de ficha" name="pseudoficha" value="{{ old('pseudoficha') ? old('pseudoficha') : 'No de ficha' }}" required autocomplete="pseudoficha">
            @error('pseudoficha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="email" id="txtEmail" class="text u-box-sizing required  u-redondeado--05"
                placeholder="E-mail" onfocus="if(this.value == 'E-mail') { this.value = ''; }" name="email" value="{{ old('email') ? old('email') : 'E-mail' }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <div class="u-textRight">
                <input type="button" name="btnEntrar" id="btnEntrar"
                    class="Login-Boton u-boton u-efecto u-textCenter u-redondeado--05 u-inline-block" value="ENTRAR">
            </div>

            <p class="u-textRight"><a class="Login-TxtTengoCuenta u-inline-block"
                    href="{{route('login') }}"><strong>Tengo cuenta</strong></a></p>

            {{-- <p class="u-textRight"><a class="Login-TxtTengoCuenta u-inline-block"
                    href="{{route('login') }}"><strong>Recuperar contraseña</strong></a></p> --}}

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
    <script type="text/javascript" src="{{asset('/js/jamarrom/registro.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jamarrom/funciones.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#txtNombre").change(function ()
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
