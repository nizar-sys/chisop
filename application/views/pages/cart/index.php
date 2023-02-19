<main role="main" class="container">
	<?php $this->load->view('layouts/_alert') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3">
				<div class="card-header">
					Keranjang Belanja
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>Produk</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Ukuran</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Subtotal</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($content as $row): ?>
								<tr>
									<td>
										<p><img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url('/images/product/default.png') ?>"
												alt="" height="50"> <strong>
												<?= $row->title ?>
											</strong></p>
									</td>
									<td class="text-center">Rp
										<?= number_format($row->price, 0, ',', '.') ?>,-
									</td>
									<td>
										<?= $row->size ? 'Besar' : 'Kecil' ?>
									</td>
									<td>
										<form action="<?= base_url("cart/update/$row->id") ?>" method="POST">
											<input type="hidden" name="id" value="<?= $row->id ?>">
											<div class="input-group">
												<input type="number" name="qty" class="form-control text-center"
													value="<?= $row->qty ?>">
												<div class="input-group-append">
													<button class="btn btn-info" type="submit"><i
															class="fas fa-check"></i></button>
												</div>
											</div>
										</form>
									</td>
									<td class="text-center">Rp
										<?= number_format($row->subtotal, 0, ',', '.') ?>,-
									</td>
									<td>
										<form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
											<input type="hidden" name="id" value="<?= $row->id ?>">
											<button class="btn btn-danger" type="submit"
												onclick="return confirm('Apakah yakin ingin menghapus?')"><i
													class="fas fa-trash-alt"></i></button>
										</form>
									</td>
								</tr>
							<?php endforeach ?>
							<tr>
								<td colspan="3"><strong>Total:</strong></td>
								<td class="text-center"><strong>Rp
										<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>,-
									</strong></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('/checkout') ?>" class="btn btn-success float-right">Pembayaran <i
							class="fas fa-angle-right"></i></a>
					<a href="<?= base_url('/') ?>" class="btn btn-warning text-white"><i class="fas fa-angle-left"></i>
						Kembali Belanja</a>
				</div>
			</div>
		</div>
	</div>

	<?php if (!empty($related_product)): ?>

		<div class="row">
			<div class="col-md-12">
				<div class="card mb-3">
					<div class="card-header">
						Related Product
					</div>
					<div class="card-body">
						<div class="row">
							<?php foreach ($related_product as $row): ?>
								<div class="col-md-6">
									<div class="card mb-3">
										<img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png") ?>"
											alt="" height="" class="card-img-top">
										<div class="card-body">
											<h5 class="card-title">
												<?= $row->product_title ?>
											</h5>
											<p class="card-text"><strong>Rp
													<?= number_format($row->price, 0, ',', '.') ?>,-
												</strong></p>
											<p class="card-text">
												<?= $row->description ?>
											</p>
											<a href="<?= base_url("/shop/category/$row->category_slug") ?>"
												class="badge badge-primary"><i class="fas fa-tags"></i>
												<?= $row->category_title ?>
											</a>
											<div class="badge badge-secondary"><i class="fas fa-tags"></i>
											<?= $row->size ? 'Besar' : 'Kecil' ?>
											</div>
										</div>
										<div class="card-footer">
											<form action="<?= base_url("/cart/add") ?>" method="POST">
												<input type="hidden" name="id_product" value="<?= $row->id ?>">
												<div class="input-group">
													<input type="number" name="qty" value="1" class="form-control">
													<div class="input-group-append">
														<button class="btn btn-primary">Add to Cart</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if (!empty($recom_product)): ?>

		<div class="row">
			<div class="col-md-12">
				<div class="card mb-3">
					<div class="card-header">
						Recommend Product
					</div>
					<div class="card-body">
						<div class="row">
							<?php foreach ($recom_product as $row): ?>
								<div class="col-md-6">
									<div class="card mb-3">
										<img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png") ?>"
											alt="" height="" class="card-img-top">
										<div class="card-body">
											<h5 class="card-title">
												<?= $row->product_title ?>
											</h5>
											<p class="card-text"><strong>Rp
													<?= number_format($row->price, 0, ',', '.') ?>,-
												</strong></p>
											<p class="card-text">
												<?= $row->description ?>
											</p>
											<a href="<?= base_url("/shop/category/$row->category_slug") ?>"
												class="badge badge-primary"><i class="fas fa-tags"></i>
												<?= $row->category_title ?>
											</a>
											<div class="badge badge-secondary"><i class="fas fa-tags"></i>
											<?= $row->size ? 'Besar' : 'Kecil' ?>
											</div>
										</div>
										<div class="card-footer">
											<form action="<?= base_url("/cart/add") ?>" method="POST">
												<input type="hidden" name="id_product" value="<?= $row->id ?>">
												<div class="input-group">
													<input type="number" name="qty" value="1" class="form-control">
													<div class="input-group-append">
														<button class="btn btn-primary">Add to Cart</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</main>