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

<article class="Login" id="login">
    <h1 class="Login-Logo slideDown"><span>Apprender</span></h1>

    <form name="form-login" id="form-login" class="Login-Form u-redondeado--1 u-desaparecer" method="POST"
        action="{{ route('password.email') }}">
        @csrf
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
        <div class="u-textRight">
            <input type="submit" name="btnEntrar" id="btnEntrar"
                class="Login-Boton u-boton u-efecto u-textCenter u-redondeado--05 u-inline-block" value="ENVIAR">
        </div>

        <p class="u-textRight"><a href="{{route('login')}}" class="Login-TxtTengoCuenta u-inline-block"
                href="autentificacion.php"><strong>
                    << Regresar</strong> </a> </p> <figure class="Notificaciones-Cargado u-textCenter">
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
