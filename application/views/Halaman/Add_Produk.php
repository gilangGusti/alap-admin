<div class="col-md-6">
	<!-- general form elements -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah Data Produk</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form action="<?= site_url('Admin/AddProduk'); ?>" method="POST" enctype="multipart/form-data">
			<div class="card-body">
				<div class="form-group">
					<label>No. Produk</label>
					<input type="text" class="form-control" name="no_produk" placeholder="Nomor Produk">
				</div>
				<div class="form-group">
					<label>Nama Produk</label>
					<input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
				</div>
				<div class="form-group">
					<label>Harga</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input type="text" class="form-control" name="harga" placeholder="Harga">
					</div>
				</div>
				<div class="form-group">
					<label>Gambar</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="customFile" name="gambar">
						<label class="custom-file-label" for="customFile">Pilih Gambar</label>
					</div>
				</div>
				<div class="form-group">
					<label>Link Produk</label>
					<input type="text" class="form-control" name="url" placeholder="Contoh : https://www.shopee.co.id/">
				</div>
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" name="submit" class="btn btn-primary">Tambah</button>
				<a href="<?= site_url('Admin/DataProduk'); ?>" class="btn btn-warning">Kembali</a>
			</div>
		</form>
	</div>
	<!-- /.card -->

</div>
