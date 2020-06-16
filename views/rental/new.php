<main class="container">
	<div class="row">
		<h1>Agregar Alquiler</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Alquiler</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
				<form action="?controller=rental&method=save" method="post">
					<div class="form-group">
						<label>Fecha inicial</label>
						<input type="date" name="start_date" class="form-control" placeholder="Ingrese fecha inicial" autofocus autosave="" autocomplete="">
					</div>
					<div class="form-group">
						<label>Fecha final</label>
						<input type="date" name="end_date" class="form-control" placeholder="Ingrese fecha final">
					</div>
					<div class="form-group">
						<label>Total</label>
						<input type="number" name="total" class="form-control" placeholder="Ingrese el total">
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<select name="user_id" class="form-control">
						   <option value="">Seleccione...</option>
							<?php 
								foreach ($users as $user) {
									if ($user->id == $data[0]->user_id) {
										?>
											<option selected value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
										<?php
									}else{
										?>
											<option value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
										<?php
									}
								}
							 ?>
						</select>
					</div>
					<!-- el estado se guarda solito -->
					<div class="form-group">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div> 
	</section>
</main>