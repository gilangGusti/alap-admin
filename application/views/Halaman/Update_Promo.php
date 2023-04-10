<div class="col-md-6">
	<!-- general form elements -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Edit Data Promo</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form action="<?= site_url('Admin/UpdatePromo'); ?>" method="POST" enctype="multipart/form-data">
			<div class="card-body">
				<div class="form-group">
					<label>No. Produk</label>
					<input type="text" class="form-control" name="no_produk" placeholder="Nomor Produk" value="<?= $detail['no_produk']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Nama Produk</label>
					<input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="<?= $detail['nama_produk']; ?>">
				</div>
				<div class="form-group">
					<label>Harga</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input type="text" class="form-control" name="harga_awal" placeholder="Harga" value="<?= $detail['harga_awal']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label>Harga Promo</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input type="text" class="form-control" name="harga_promo" placeholder="Harga" value="<?= $detail['harga_promo']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Gambar</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="gambar" id="exampleInputFile" value="<?= $detail['gambar']; ?>">
							<input type="hidden" name="old_image" value="<?= $detail['gambar']; ?>">
							<label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Link Produk</label>
					<input type="text" class="form-control" name="url" placeholder="Contoh : https://www.shopee.co.id/" value="<?= $detail['url']; ?>">
				</div>
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" name="btn_update" class="btn btn-primary">Simpan</button>
				<a href="<?= site_url('Admin/DataPromo'); ?>" class="btn btn-warning">Kembali</a>
			</div>
		</form>
	</div>
	<!-- /.card -->

</div>
