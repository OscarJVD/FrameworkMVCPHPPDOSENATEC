<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de usuarios</h1>
		<div>
			<h2>Usuarios</h2>
			<!-- mostrar vista -->
			<a href="?controller=user&method=add" class="btn btn-success">Agregar</a>
		</div>
		<section class="col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Email</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Rol</th>
			      <th scope="col">Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($users as $user) : ?>
				    <tr>
				      <td><?php echo $user->id_usuario_PK ?></td>
				      <td><?php echo $user->nombre_usuario ?></td>
				      <td><?php echo $user->correo ?></td>
				      <td><?php echo $user->id_estado_FK ?></td>
				      <td><?php echo $user->id_rol_FK ?></td>
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