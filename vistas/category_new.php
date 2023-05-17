<div class="container is-fluid mb-2">
	<h1 class="title">Categorías</h1>
	<h2 class="subtitle">Nueva categoría</h2>
	<div class=" column">
		<a href="index.php?vista=category_new">Agregar nueva categoria</a>
	</div>
</div>

<div class="container pb-6 pt-1">

	<div class="form-rest mb-5 mt-1"></div>

	<form action="./php/categoria_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Nombre</label>
					<input class="input" type="text" name="tcategoria_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required>
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Ubicación</label>
					<input class="input" type="text" name="tcategoria_ubicacion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}" maxlength="150">
				</div>
			</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>