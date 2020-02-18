@extends('layouts.app2')

@section('style')
<link href="{{asset('/css/jamarrom/reset.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/css/jamarrom/fonts.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/css/jamarrom/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/css/jamarrom/utilidades.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/css/jamarrom/jquery.bxslider.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/css/jamarrom/style.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/css/jamarrom/animations.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/css/jamarrom/responsive.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
    html,body{
        height: 100%;
    }
</style>
@endsection

@section('javascript')
<script type="text/javascript" src="{{asset('/js/jamarrom/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jamarrom/login.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/funciones.js')}}"></script>
@endsection

@section('bodyClass')
Autentificacion-Ajuste u-imagenFondoCover
@endsection

@section('content')

<div class="Modal Modal--Ayuda">
    <div class="ModalProgreso-Center u-inline-block">
        <span onClick="$('.Modal, .ModalRegistro-Txt1, .ModalRegistro-Txt5, .ModalRegistro-Txt6').fadeOut();" class="Modal-Cerrar u-inline-block">CERRAR <span>x</span></span>
   </div>
</div>

<article class="Login" id="login">

    <p class="Login-AvisoF slideDown">¡¡Gracias por su participación!!<br />
        hemos concluido la etapa de prueba.</p>

    <h1 class="Login-Logo slideDown"><span>Apprender</span></h1>

    <form name="form-login" id="form-login" class="Login-Form u-redondeado--1 u-desaparecer" method="POST"
        action="{{ route('password.email') }}">
        @csrf

        <a onClick="$('.Modal--Ayuda, .ModalRegistro-Txt1, .ModalRegistro-Txt5, .ModalRegistro-Txt6').fadeIn();" class="Login-Ayuda u-inline-block u-positionAbsolute"><span>Guía</span>
            <p class="ModalRegistro-Txt1 u-positionAbsolute u-textJustify">
                Con este icono encontrarás nuestra guía rápida, la cual te servirá de apoyo para utilizar y navegar cómodamente.
            </p>
        </a>

        <p class="Login-Titulo u-textLeft">
            Recuperar cuenta
        </p>

        <input type="email" name="email" id="txtEmail" class="text u-box-sizing required  u-redondeado--05"
            placeholder="Correo institucional" onfocus="if(this.value == 'Correo institucional') { this.value = ''; }"
            value="Correo institucional" required>
        @error('email')
            {{-- <span class="invalid-feedback" role="alert"> --}}
            <strong>{{ $message }}</strong>
            {{-- </span> --}}
        @enderror

        <p class="ModalRegistro-Txt5 u-positionAbsolute u-textJustify">
            Si olvidas tu contraseña, proporciónanos tu correo institucional y la contraseña se enviará automáticamente
        </p>

        <div class="u-textRight">
            <input type="submit" name="btnEntrar" id="btnEntrar"
                class="Login-Boton u-boton u-efecto u-textCenter u-redondeado--05 u-inline-block" value="ENVIAR">
        </div>

        <p class="u-textRight"><a href="{{route('login')}}" class="Login-TxtTengoCuenta u-inline-block"
                href="autentificacion.php"><strong>
                    << Regresar</strong> </a> </p>

        <p class="ModalRegistro-Txt6 u-positionAbsolute u-textJustify">
			Con esta opción puedes regresar al menú de logueo.
        </p>

        <figure class="Notificaciones-Cargado u-textCenter">
                        <img src="images/loading.gif" alt="Cargando..." />
                        </figure>
    </form>

    <?php
         if(isset($_POST['btnEntrar']))
        {
            if(!empty($msj))
              {
      ?>
    <p class="Login-Msj u-textCenter">
        <strong><?php echo $msj;?></strong>
    </p>

    <script type="text/javascript">
        setTimeout(function()
          {
              $(".Login-Msj").slideUp("slow");
          },3000);
    </script>
    <?php
          }
        }
      ?>

    <figure class="Login-ImgSSPA slideUp"></figure>
</article>
@endsection
