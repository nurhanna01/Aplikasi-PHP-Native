<section id="pakaian">
		<h3>Pakaian</h3>
		<div class="row">
		<?php foreach($produk->selectDataPakaian() as $p):?>
				<div class="col">
					<div class="card" style="width: 18rem;">
						<center>
						<img src="img/<?php echo $p['gambar_produk']?>" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title"><?php echo $p['nama_produk']?></h5>
							<p class="card-text">Ukuran : <?php echo $p['ukuran_produk']?></p>
							<p class="card-text">Rp. <?php echo $p['harga_produk']?></p>
							<p class="card-text">Stok : <?php echo $p['stok_produk']?></p>
							<a style="color:red" href="?module=detail_produk&id_produk=<?php echo $p['id_produk']?>">Lihat Detail...</a>
							<br><br>
							<?php
							if(isset($_SESSION['username'])){
								if($_SESSION['role']=='admin'){?>
									<a href="?module=edit_produk&id_produk=<?php echo $p['id_produk'];?>" class="btn btn-info">Edit</a>
									<a href="?module=hapus_produk&id_produk=<?php echo $p['id_produk'];?>" class="btn btn-danger">Hapus</a>
								<?php }else{ ?>
									<form action="?module=keranjang" method="POST">
									<input type="hidden" name="id_produk" value="<?php echo $p['id_produk'];?>">
									<input type="hidden" name="harga_produk" value="<?php echo $p['harga_produk'];?>">
									<input class="btn btn-primary" type="submit" value="Masukan ke Keranjang" name="tambah_keranjang">
									</form>
								<?php } ?>
							<?php }else{ ?>
								<form action="?module=keranjang" method="POST">
								<input type="hidden" name="id_produk" value="<?php echo $p['id_produk'];?>">
								<input type="hidden" name="harga_produk" value="<?php echo $p['harga_produk'];?>">
								<input class="btn btn-primary" type="submit" value="Masukan ke Keranjang" name="tambah_keranjang">
								</form>
							<?php } ?>
						</div>
						</center>
					</div>
				</div>
			<?php endforeach?>
		</div>
		<h3>Elektronik</h3>
		<div class="row">
			<?php foreach($produk->selectDataElektronik() as $p):?>
					<div class="col">
						<div class="card" style="width: 18rem;">
							<center>
							<img src="img/<?php echo $p['gambar_produk']?>" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title"><?php echo $p['nama_produk']?></h5>
								<p class="card-text">Ukuran : <?php echo $p['ukuran_produk']?></p>
								<p class="card-text">Rp. <?php echo $p['harga_produk']?></p>
								<p class="card-text">Stok : <?php echo $p['stok_produk']?></p>
								<a style="color:red" href="?module=detail_produk&id_produk=<?php echo $p['id_produk']?>">Lihat Detail...</a>
								<br><br>
								<?php
								if(isset($_SESSION['username'])){
									if($_SESSION['role']=='admin'){?>
										<a href="?module=edit_produk&id_produk=<?php echo $p['id_produk'];?>" class="btn btn-info">Edit</a>
										<a href="?module=hapus_produk&id_produk=<?php echo $p['id_produk'];?>" class="btn btn-danger">Hapus</a>
									<?php }else{ ?>
										<form action="?module=keranjang" method="POST">
										<input type="hidden" name="id_produk" value="<?php echo $p['id_produk'];?>">
										<input type="hidden" name="harga_produk" value="<?php echo $p['harga_produk'];?>">
										<input class="btn btn-primary" type="submit" value="Masukan ke Keranjang" name="tambah_keranjang">
										</form>
									<?php } ?>
								<?php }else{ ?>
									<form action="?module=keranjang" method="POST">
									<input type="hidden" name="id_produk" value="<?php echo $p['id_produk'];?>">
									<input type="hidden" name="harga_produk" value="<?php echo $p['harga_produk'];?>">
									<input class="btn btn-primary" type="submit" value="Masukan ke Keranjang" name="tambah_keranjang">
									</form>
								<?php } ?>
							</div>
							</center>
						</div>
					</div>
				<?php endforeach?>

		</div>
		</div>
	</section>
