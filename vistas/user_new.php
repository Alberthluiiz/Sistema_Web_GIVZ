<div class="container is-fluid mb-1">
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Nuevo usuario</h2>
	<div class=" column">
		<a href="index.php?vista=user_new">
			<span class=" icon">
				<i class="fa fa-solid fa-circle-plus" style="color: orange;"></i>
			</span>
			Agregar nuevo usuario</a>
	</div>
	<div class=" column">
		<a href="index.php?vista=user_list">
			<span class=" icon">
				<i class="fa fa-solid fa-forward" style="color: orange;"></i>
			</span>
			Ver usuario registrado</a>
	</div>
</div>

<div class=" container pb-6 pt-1">
	<div class="form-rest mb-6 mt-1"></div>
	<form action="./php/usuario_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Nombres</label>
					<input class="input" type="text" name="tusuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Apellidos</label>
					<input class="input" type="text" name="tusuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Usuario</label>
					<input class="input" type="text" name="tusuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Email</label>
					<input class="input" type="email" name="tusuario_email" maxlength="70">
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Clave</label>
					<input class="input" type="password" name="tusuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Repetir clave</label>
					<input class="input" type="password" name="tusuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
				</div>
			</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>