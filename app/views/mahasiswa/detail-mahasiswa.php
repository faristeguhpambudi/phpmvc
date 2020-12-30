<div class="container mt-5">
	<div class="row">
		<div class="col-lg-6">
			<h3>Detail Mahasiswa</h3>
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title"><?= $data["mahasiswa"]["nama"];?></h5>
				    <h6 class="card-subtitle mb-2 text-muted"><?= $data["mahasiswa"]["npm"];?></h6>
				    <h6 class="card-subtitle mb-2 text-muted"><?= $data["mahasiswa"]["email"];?></h6>
				    <h6 class="card-subtitle mb-2 text-muted"><?= $data["mahasiswa"]["jurusan"];?></h6>
				    <a href="<?= BASEURL;?>/mahasiswa" class="card-link">BACK</a>
				  </div>
				</div>
		</div>
	</div>
</div>