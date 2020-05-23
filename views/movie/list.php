<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de películas</h1>
		<div>
			<h2>Películas</h2>
			<a href="#" class="btn btn-success">Agregar</a>
		</div>
		<section class="col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Película</th>
			      <th scope="col">Descripción</th>
			      <th scope="col">id_usuario_FK</th>
			      <th scope="col">id_estado_FK</th>
			      <th scope="col">Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($movies as $movie) : ?>
				    <tr>
				      <td><?php echo $movie->id_pelicula_PK ?></td>
				      <td><?php echo $movie->nombre_pelicula ?></td>
				      <td><?php echo $movie->descripcion ?></td>
				      <td><?php echo $movie->id_usuario_FK ?></td>
				      <td><?php echo $movie->id_estado_FK ?></td>
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