<!--Page wrapper  -->

<div class="page-wrapper">

	<!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Editar datos del usuario</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Perfil</a></li>

                <li class="breadcrumb-item active">Editar perfil</li>

            </ol>

        </div>

    </div>
	
	<!-- unix-login -->

   <div class="unix-login">
		
		<!-- container-fluid -->

   		<div class="container-fluid">

			<!-- row -->

			<div class="row justify-content-center">

				<!-- lg4 -->

				<div class="col-lg-4">

					<!-- login content card -->

					<div class="login-content card">

						<!-- login form -->

						<div class="login-form">

							<h4>Datos del usuario</h4>

							<form>
								
								<div class="form-group">

                                    <label>Nombre de usuario</label>

                                    <input type="text" class="form-control" placeholder="Nombre de usuario" id="usuariou" value="<?php echo $_SESSION['usuarioAlex']; ?>">

                                </div>

                                <div class="form-group">

                                    <label>Contraseña</label>

                                    <input type="text" class="form-control" placeholder="Constraseña" id="passwordu" value="<?php echo $_SESSION['contrasenaAlex']; ?>">

                                </div>

                                <div class="form-group">

                                    <label>Repetir contraseña</label>

                                    <input type="text" class="form-control" placeholder="Repite contraseña" id="passwordru" value="<?php echo $_SESSION['contrasenaAlex']; ?>">

                                </div>

                                <input type="hidden" id="oldUsuario" value="<?php echo $_SESSION['usuarioAlex']; ?>">

                                <button type="button" class="btn btn-primary btn-flat m-b-30 m-t-30" id="guardarUsuario">Guardar cambios</button>

							</form>

						</div>

						<!-- end login fomr -->

					</div>

					<!--end login content card -->

				</div>

				<!-- lg4 -->

			</div>

			<!-- end row -->

   		</div>

   		<!--End container-fluid -->

   </div>

   <!--End unix-login  -->

        

</div>

<!--End Page wrapper 