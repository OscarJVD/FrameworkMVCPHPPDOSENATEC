<main class="container">
	<div class="row">
		<h1>Agregar Película</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de la Película</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
			<!-- elemento apdre -->
				<form method="post" id="formMovie">
					<!-- elemnto hijo -->
					<div class="form-group">
						<!-- mas hijos -->
						<label>Película</label>
						<input type="text" id="name" class="form-control" placeholder="Ingrese Nombre de la Película" autofocus="" autocomplete="" autosave="">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea rows="3" id="description" placeholder="Ingrese descripción" class="form-control"></textarea> <!--ERROR POR LOS ESPACIOS-->
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<select id="users_id" class="form-control">
						   <option value="">Seleccione...</option>
							<?php 
								foreach ($users as $user) {
									?>
										<option selected value="<?php echo $user->id ?>">
											<?php echo $user->name ?>	
										</option>
									<?php
								}
							 ?>
						</select>
					</div>
					<!-- ACCEDEMOS A LOS DATOS DE LA TABLA CATEGORIE_MOVIE -->
					<!-- sin si quiera tenerla relacionada -->
					<div class="form-group row">
						<div class="col-md-8">
						<label>Categorías</label>
							<select id="category" class="form-control">
							   <option value="">Seleccione...</option>
								<?php 
									foreach ($categories as $category) {?>
												<option selected value="<?php echo $category->id ?>">
													<?php echo $category->name ?>	
												</option>
											<?php
												}
								 			?>
							</select>
						</div>

						<div class="col-md-4 mt-4">
							<a href="#" id="addElement" class="btn btn-warning">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>

					<div class="form-group" id="list-categories">
							
					</div>
					<!-- el estado se guarda solito -->
					<div class="form-group">
						<button class="btn btn-primary" id="submit">Guardar
						</button>
					</div>
				</form>
			</div>
		</div> 
	</section>
</main>

<script src="assets/js/movie.js"></script>