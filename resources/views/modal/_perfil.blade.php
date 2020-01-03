<div class="Modal Modal--MiPerfil">
    <div class="ModalProgreso-Center ModalProgreso-Center--MiPerfil u-inline-block">
        <span class="Modal-Cerrar u-inline-block">CERRAR <span>x</span></span>

        <h2 class="ModalProgreso-Title u-mayuscula">Mi perfil</h2>

        <div class="ModalGlosario-ContentList ModalGlosario-ContentList--MiPerfil u-inline-block u-textJustify">

            <p class="MiPerfil-Col u-inline-block"><strong>Nombre y apellido: </strong> <br />{{Auth::user()->nombreCompleto}}</p>
            <p class="MiPerfil-Col u-inline-block u-sinMargen"><strong>No. de ficha</strong> <br />{{Auth::user()->pseudoficha}}</p>
            <p><strong>Correo institucional:</strong> <br />{{Auth::user()->email}}</p>

            <p><strong><a class="BtnRecuperar u-inline-block">Cambiar contraseña</a></strong></p>

            <form name="formReperarContrasenia" id="formRecuperarContrasenia" class="RecuperarContrasenia" method="post"
                action="{{route('user.changePassword')}}">
                @csrf
                <p><strong>Escriba la nueva contraseña:</strong></p>

                <input type="password" name="password" id="password" pattern=".{10,}"
                    class="Login-Contrasenia u-box-sizing text required u-redondeado--05"
                    placeholder="INGRESE LA CONTRASEÑA"
                    onfocus="if(this.value == 'INGRESE LA CONTRASEÑA') { this.value = ''; }" required
                    title="Mínimo 10 caracteres">

                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="Login-Contrasenia u-box-sizing text required u-redondeado--05"
                    placeholder="REPITE LA CONTRASEÑA"
                    onfocus="if(this.value == 'REPITE LA CONTRASEÑA') { this.value = ''; }" required>


                <input type="submit" name="btnCambiar" id="btnCambiar"
                    class="Login-Boton u-boton u-efecto u-textCenter u-redondeado--05 u-inline-block" value="Cambiar">
            </form>

            <p><strong><a class="BtnEvaluanos">Evalúanos</a></strong></p>

            <form class="MiPerfil-ContentEvaluaciones" id="formCalificanos" method="POST" action="{{route('calificar')}}">
                @csrf
                <p>En apprender su opinión es importante, agradecemos nos ayudes a mejorar.</p>

                <div>
                    <p class="MiPerfil-TextEvaluacion u-inline-block"><strong>Contenido</strong></p>
                    <div id="EvaluaContenido" class="MiPerfil-ItemEvaluacion u-inline-block">
                        <p class="MiPerfil-CalificacionEValuacion u-inline-block"><strong>0</strong></p>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <input type="hidden" name="evalua_contenido" id="evalua_contenido">
                    </div>
                </div>

                <div>
                    <p class="MiPerfil-TextEvaluacion u-inline-block"><strong>Fácil</strong></p>
                    <div id="EvaluaFacil" class="MiPerfil-ItemEvaluacion u-inline-block">
                        <p class="MiPerfil-CalificacionEValuacion u-inline-block"><strong>0</strong></p>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <input type="hidden" name="evalua_facil" id="evalua_facil">
                    </div>
                </div>

                <div>
                    <p class="MiPerfil-TextEvaluacion u-inline-block"><strong>Gráficos</strong></p>
                    <div id="EvaluaGraficos" class="MiPerfil-ItemEvaluacion u-inline-block">
                        <p class="MiPerfil-CalificacionEValuacion u-inline-block"><strong>0</strong></p>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <input type="hidden" name="evalua_graficos" id="evalua_graficos">
                    </div>
                </div>

                <div>
                    <p class="MiPerfil-TextEvaluacion u-inline-block"><strong>Interactivo</strong></p>
                    <div id="EvaluaInteractivo" class="MiPerfil-ItemEvaluacion u-inline-block">
                        <p class="MiPerfil-CalificacionEValuacion u-inline-block"><strong>0</strong></p>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <input type="hidden" name="evalua_interactivo" id="evalua_interactivo">
                    </div>
                </div>

                <div>
                    <p class="MiPerfil-TextEvaluacion u-inline-block"><strong>Intuitivo</strong></p>
                    <div id="EvaluaIntuitivo" class="MiPerfil-ItemEvaluacion u-inline-block">
                        <p class="MiPerfil-CalificacionEValuacion u-inline-block"><strong>0</strong></p>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <span class="MiPerfil-IcoEstrella u-inline-block u-imagenFondo100 InActiva"></span>
                        <input type="hidden" name="evalua_intuitivo" id="evalua_intuitivo">
                    </div>
                </div>
                <div class="u-textRight">
                    <button type="submit" class="MiPerfil-BtnCalificar u-inline-block u-boton u-textCenter">Calificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
