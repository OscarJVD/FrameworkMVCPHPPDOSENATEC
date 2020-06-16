
<main class="container">
	<div class="row">

		<h1 class="p-3">Categorías de la Película <?php echo $data[0]->name;?>
		</h1>
	</div>
	<section class="row mt-5">
		<div class="row row-cols-1 row-cols-md-3">
			<?php foreach ($categories as $category) : 
				if ($category->id == $data[0]->category_id) {?>
			<div class="col mb-4">
				<div class="card h-100">
					<img src="<?php echo $category->img_category ?> " class="card-img-top img_category" alt="img">
					<div class="card-body">
						<h5 class="card-title">
						<!-- 	<?php //echo $category->id.' - ' ?> -->
								<?php echo $category->name ?>
								
							<?php } endforeach ?>
						</h5>
						<?php foreach ($statuses as $status) : 
							if ($status->id == $data[0]->status_id) { ?>
						<p class="card-text">
							<?php echo $status->status ?>
						</p>	
						<?php } endforeach ?>
					</div>
				</div>
			</div>

		</div>
	</section>
</main>