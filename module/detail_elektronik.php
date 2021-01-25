<?php
$id_produk=$_GET['id_produk'];
$pakaian=$produk->selectDataPerId($id_produk);
?>
<section>
    <div class="row">
        <center>
            <?php foreach($pakaian as $p):?>
                <div class="card" style="width: 18rem;">
                <img src="img/<?php echo $p['gambar_produk']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $p['nama_produk']?></h5>
                    <p class="card-text">Jenis : <?php echo $p['jenis_produk']?></p>
                    <!-- <p class="card-text">Bahan : <?php echo $p['bahan_produk']?></p> -->
                    <p class="card-text">Ukuran : <?php echo $p['ukuran_produk']?></p>
                    <p class="card-text">Harga Rp. <?php echo $p['harga_produk']?></p>
                    <p class="card-text">Deskripsi : <?php echo $p['deskripsi_produk']?></p>
                    <p class="card-text">Stok : <?php echo $p['stok_produk']?></p>
                    <a href="?module=elektronik"><button class="btn btn-info"><--Back</button></a>
                </div>
                </div>
            <?php endforeach?>
        </center>
    </div>
</section>