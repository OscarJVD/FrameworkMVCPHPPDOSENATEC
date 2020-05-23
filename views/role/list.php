<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Roles</h1>
		<div>
			<h2>Roles</h2>
			<a href="#" class="btn btn-success">Agregar</a>
		</div>
		<section class="col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Rol</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($roles as $role) : ?>
				    <tr>
				      <td><?php echo $role->id_rol_PK ?></td>
				      <td><?php echo $role->nombre_rol ?></td>
				      <td><?php echo $role->id_estado_FK ?></td>
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