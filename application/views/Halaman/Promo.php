<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Data Promo</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="table_produk" class="table table-bordered table-striped">
						<thead>
							<tr>
								<td colspan="7">
									<a href="<?php echo site_url('Admin/FormAddPromo') ?>" class="btn btn-sm btn-primary">
										<i class="fas fa-user"></i> Tambah
									</a>
								</td>
							</tr>
							<tr>
								<th>No</th>
								<th>No. Produk</th>
								<th>Gambar</th>
								<th>Nama Produk</th>
								<th>Harga Awal</th>
								<th>Harga Promo</th>
								<th>URL</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($DataPromo as $row) : ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $row->no_produk; ?></td>
									<td>
										<?= "<img src='" . base_url("upload/" . $row->gambar) . "' style='width: 30%; height: auto;' alt='user-avatar' class='img-fluid' "; ?>
									</td>
									<td><?= $row->nama_produk; ?></td>
									<td>Rp. <?= $row->harga_awal; ?></td>
									<td>Rp. <?= $row->harga_promo; ?></td>
									<td><?= $row->url; ?></td>
									<td>
										<a href="<?php echo site_url('Admin/DataPromo/' . $row->no_produk . '/view') ?>" class="btn btn-sm bg-teal">
											<i class="fas fa-edit"></i> Edit
										</a>
										<a href="<?php echo site_url('Admin/DeletePromo/' . $row->no_produk) ?>" class="btn btn-sm btn-danger">
											<i class="fas fa-trash-alt"></i> Delete
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
		</div>
	</div>
</section>
