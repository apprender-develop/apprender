<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unidad-Apprender</title>
    <link rel="shortcut icon" href="../favicon.png" />
    <link href="{{asset('/css/jamarrom/reset.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/fonts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/utilidades.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/animations.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/jamarrom/responsive.css')}}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .Modal {
            position: fixed;
        }

        .ModalGlosario-ContentList--MiPerfil {
            width: 512px;
            height: 538px;
            overflow-y: scroll;
        }
    </style>

    <!-- HTML 5 for older browsers -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
				<script src="../js/html5.js"></script>
            <![endif]-->
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <script src="{{asset('/js/jamarrom/jquery-ui.js')}}"></script>
    <script src="{{asset('/js/jamarrom/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('/js/jamarrom/index.js')}}"></script>
    <script>
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
</head>

<body>
    @include('layouts.navbar2')
    @include('cursos.1._glosario')
    @include('cursos.1._descarga')
    @include('modal._progreso')
    @include('modal._evaluaciones')
    @include('modal._perfil')
    @include('modal._ayuda')
    @include('modal._extintor')

    <header class="Unidad-Header u-imagenFondoCover u-textRight">
        <h2 class="Unidad-Title">BÁSICO DE SEGURIDAD Y PROTECCIÓN AMBIENTAL</h2>
        <ul class="Unidad-ListHeader u-textRight u-inline-block">
            <li class="icoGlosario u-inline-block">
                <a class="u-inline-block">GLOSARIO</a>
            </li>
            <li class="icoDescarga u-inline-block">
                <a class="u-inline-block">DESCARGAS</a>
            </li>
        </ul>

        <div class="u-textRight u-inline-block">
            <a class="Unidad-BtnEvaluciones u-boton u-inline-block u-redondeado--05 u-textCenter">Evaluaciones</a>

            <p class="Unidad-TxtProgreso u-inline-block">Progreso: </p>

            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                    style="width:30%">
                    30%
                </div>
            </div>
        </div>
    </header>


    <section class="Unidad-Content u-imagenFondoCover u-textLeft">
        <a href="{{route('curso', ['curso_id' => 1]).'?unidad=4'}}" class="BtnVolver u-inline-block u-positionAbsolute">Volver</a>

        <p class="Unidad-Subtemas u-inline-block"><strong>Subtemas:</strong></p>
		<ul class="Unidad-ListUnidades u-inline-block">
			<li class="u-inline-block"><a href="https://apprender.online/curso/1/unidad/4/tema/1" class="u-inline-block"><strong>4.1</strong></a></li>
			<li class="u-inline-block"><a href="https://apprender.online/curso/1/unidad/4/tema/2" class="u-inline-block"><strong>4.2</strong></a></li>
			<li class="u-inline-block"><a class="u-inline-block Inactivo"><strong>4.3</strong></a></li>
			<li class="u-inline-block"><a href="https://apprender.online/curso/1/unidad/4/tema/4" class="u-inline-block"><strong>4.4</strong></a></li>
			<li class="u-inline-block"><a href="https://apprender.online/curso/1/unidad/4/tema/5" class="u-inline-block"><strong>4.5</strong></a></li>
			<li class="u-inline-block"><a class="u-inline-block Inactivo"><strong>4.6</strong></a></li>
			<li class="u-inline-block"><a class="u-inline-block Inactivo"><strong>4.7</strong></a></li>
			<li class="u-inline-block"><a class="u-inline-block Inactivo"><strong>4.8</strong></a></li>
        </ul>


        {{-- <a href="curso1.php" class="BtnVolver u-inline-block u-positionAbsolute">Volver</a> --}}
        @include("cursos.1.unidad4.$tema")
    </section>

    @include('layouts._footer')

</body>

</html>
