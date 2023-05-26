<div class="container is-fluid mb-6">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle">Nuevo producto</h2>
	<div class=" column">
		<a href="index.php?vista=product_new">
			<span class=" icon">
				<i class="fa fa-solid fa-circle-plus" style="color: orange;""></i>
			</span>
			Agregar nuevo producto</a>
	</div>
</div>

<div class=" container pb-6 pt-1">
					<?php
					require_once "./php/main.php";
					?>

					<div class="form-rest mb-2 mt-1"></div>

					<form action="./php/producto_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
						<div class="columns">
							<div class="column">
								<div class="control">
									<label>Código de barra</label>
									<input class="input" type="text" name="tproducto_codigo" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required>
								</div>
							</div>
							<div class="column">
								<div class="control">
									<label>Nombre</label>
									<input class="input" type="text" name="tproducto_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required>
								</div>
							</div>
						</div>
						<div class="columns">
							<div class="column">
								<div class="control">
									<label>Precio</label>
									<input class="input" type="text" name="tproducto_precio" pattern="[0-9.]{1,25}" maxlength="25" required>
								</div>
							</div>
							<div class="column">
								<div class="control">
									<label>Stock</label>
									<input class="input" type="text" name="tproducto_stock" pattern="[0-9]{1,25}" maxlength="25" required>
								</div>
							</div>
							<div class="column">
								<label>Categoría</label><br>
								<div class="select is-rounded">
									<select name="tproducto_categoria">
										<option value="" selected="">Seleccione una opción</option>
										<?php
										$categorias = conexion();
										$categorias = $categorias->query("SELECT * FROM givz_tcategoria");
										if ($categorias->rowCount() > 0) {
											$categorias = $categorias->fetchAll();
											foreach ($categorias as $row) {
												echo '<option value="' . $row['tcategoria_id'] . '" >' . $row['tcategoria_nombre'] . '</option>';
											}
										}
										$categorias = null;
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="columns">
							<div class="column">
								<label>Foto o imagen del producto</label><br>
								<div class="file is-small has-name">
									<label class="file-label">
										<input class="file-input" type="file" name="tproducto_foto" accept=".jpg, .png, .jpeg">
										<span class="file-cta">
											<span class="file-label">Imagen</span>
										</span>
										<span class="file-name">JPG, JPEG, PNG. (MAX 3MB)</span>
									</label>
								</div>
							</div>
						</div>
						<p class="has-text-centered">
							<button type="submit" class="button is-info is-rounded">Guardar</button>
						</p>
					</form>
	</div>