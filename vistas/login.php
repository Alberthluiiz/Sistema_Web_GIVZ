<div class="main-container" style="background-image: radial-gradient(circle, #5987cd, #5987cd, #5987cd, #5987cd, #5987cd);">

	<form class="box login" action="" method="POST" autocomplete="off">

		<h5 class="title is-5 has-text-centered is-uppercase mb-6 mt-6 has-text-weight-bold">Sistema de inventario</h5>

		<div class="field mb-5">
			<label class="label">Usuario</label>
			<div class="control">
				<input class="input" type="text" name="tusuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
			</div>
		</div>

		<div class="field mb-6">
			<label class="label">Clave</label>
			<div class="control">
				<input class="input" type="password" name="tusuario_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
			</div>
		</div>

		<p class="has-text-centered mb-6 mt-3">
			<button type="submit" class="button is-info is-rounded">Iniciar sesion</button>
		</p>

		<?php
		if (isset($_POST['tusuario_usuario']) && isset($_POST['tusuario_clave'])) {
			require_once "./php/main.php";
			require_once "./php/iniciar_sesion.php";
		}
		?>
	</form>
</div>

<!-- ------------------------------ -->