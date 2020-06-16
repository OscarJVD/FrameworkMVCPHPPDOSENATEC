<main class="container">
	<div class="row">
		<h1>Editar Película</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de la Película</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
				<form action="?controller=movie&method=update" method="post">
					<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese Nombre de Película" value="<?php echo $data[0]->name ?>">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea rows="3" name="description" placeholder="Ingrese descripción" value='<?php echo $data[0]->description ?>' class="form-control">
						</textarea>
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<select name="users_id" class="form-control">
						   <option value="">Seleccione...</option>
							<?php 
								foreach ($users as $user) {
									if ($user->id == $data[0]->users_id) {
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
					<div class="form-group">
						<label>Estado</label>
						<select name="status_id" class="form-control">
							<option value="">Seleccione...</option>
							<?php 
								foreach ($statuses as $status) {
									if ($status->id == $data[0]->status_id) {
										?>
											<option selected value="<?php echo $status->id ?>"><?php echo $status->status ?></option>
										<?php
									}else{
										?>
											<option value="<?php echo $status->id ?>"><?php echo $status->status ?></option>
										<?php
									}
								}
							 ?>
						</select>
					</div>
					<!-- el estado se guarda solito -->
					<div class="form-group">
						<button class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div> 
	</section>
</main>