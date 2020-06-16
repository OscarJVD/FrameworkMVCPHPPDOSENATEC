<main class="container">
	<div class="row">
		<h1>Editar Alquiler</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Alquiler</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
				<form action="?controller=rental&method=update" method="post">
					<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
					<div class="form-group">
						<label>Fecha Inicial</label>
						<input type="date" name="start_date" class="form-control" placeholder="Ingrese Fecha Inicial" value="<?php echo $data[0]->start_date ?>" autofocus>
					</div>
					<div class="form-group">
						<label>Fecha Final</label>
						<input type="date" name="end_date" class="form-control" placeholder="Ingrese Fecha Final" value="<?php echo $data[0]->end_date ?>">
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
					<div class="form-group">
						<label>Total</label>
						<input type="number" name="total" class="form-control" placeholder="Ingrese Total a pagar" value="<?php echo $data[0]->total ?>">
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
						<button class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div> 
	</section>
</main>