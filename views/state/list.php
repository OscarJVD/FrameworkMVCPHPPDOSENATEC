<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de estados</h1>
		<div>
			<h2>Estados</h2>
			<a href="#" class="btn btn-success">Agregar</a>
		</div>
		<section class="col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($states as $state) : ?>
				    <tr>
				      <td><?php echo $state->id_estado_PK ?></td>
				      <td><?php echo $state->nombre_estado ?></td>
				      <td>
				      	<a href="#" class="btn btn-warning">Editar</a>
				      	<a href="#" class="btn btn-danger">Eliminar</a>
				      </td>				      				      				      
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
		

		</section>	
	</section>
</main>