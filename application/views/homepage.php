<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>








<div class="container mb-5">
	<div class="row ">

		<?php foreach ($lkses as $item) : ?>

		<div class="card mb-3 product-card" style="max-width: 700px;">
			<div class="row g-0">
				<div class="col-lg-4 product-img-container">
					<img src="https://i.ibb.co.com/PRVk4d3/image.png" class="img-fluid rounded-start" alt="...">
				</div>
				<div class="col">
					<div class="card-body">
						<h5 class="card-title"><?= $item['name']; ?></h5>
						<p class="card-text">Kelas : <?= $item['class']; ?></p>
						<p class="card-text">Harga : <?= $item['price']; ?></p>
						<p class="card-text">Stok : <?= $item['stock']; ?></p>
						<p class="card-text">Deskripsi : <?= $item['description']; ?></p>
					</div>
				</div>
			</div>
		</div>

		<?php endforeach; ?>


	</div>
</div>