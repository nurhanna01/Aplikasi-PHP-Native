<?php
    $id_produk=$_GET['id_produk'];
    $dataEdit=$produk->editData($id_produk);
    foreach($dataEdit as $data):
?>

<section>
<h2>Form Edit Data Produk</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="kategori">Pilih Kategori:</label>
    <select id="kategori" name="kategori" required>
    <option disabled selected value> -- Pilih Kategori -- </option>
        <?php if($data['kategori_produk']=='pakaian'){?>
            <option value="pakaian" selected>Pakaian</option>
            <option value="elektronik">Barang Elektronik</option>
        <?php }else{ ?>
            <option value="pakaian" >Pakaian</option>
            <option value="elektronik" selected>Barang Elektronik</option>
        <?php } ?>
    </select>
  </div> 
  <div class="form-group">
    <label for="nama">Nama produk</label>
    <input type="hidden" value="<?php echo $data['id_produk']?>" name="id_produk">
    <input type="hidden" value="<?php echo $data['gambar_produk']?>" name="gambar_lama">
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Namal" required value="<?php echo $data['nama_produk']?>">
  </div>
  <div class="form-group">
    <label for="ukuran">Jenis produk</label>
    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukan Jenis Pakain" value="<?php echo $data['jenis_produk']?>">
  </div>
  <div class="form-group">
    <label for="ukuran">Ukuran produk</label>
    <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Masukan Ukuran Pakain" value="<?php echo $data['ukuran_produk']?>">
  </div>
  <div class="form-group">
    <label for="harga">Harga produk</label>
    <input type="text" class="form-control" name="harga" id="harga"  placeholder="Masukan harga produk" value="<?php echo $data['harga_produk']?>">
  </div>
  <div class="form-group">
    <label for="deskripsi">Deskripsi produk</label>
    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="6" placeholder="masukan Deskripsi"><?php echo $data['deskripsi_produk']?></textarea>
  </div>  
  <div class="form-group">
    <label for="stok">Stok produk</label>
    <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukan stok produk" required value="<?php echo $data['stok_produk']?>">
  </div>
  <div class="form-group">
    <label for="gambar">Foto produk</label>
    <img src="img/<?php echo $data['gambar_produk']?>" alt="gambar lama">
    <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Masukan Foto/Gambar produk" value="<?php echo $data['gambar_produk']?>">
  </div>

  <button type="submit" class="btn btn-primary" name="update_produk">Submit</button>
</form>
<?php
    endforeach;
?>
</section>

<?php
	if(isset($_POST['update_produk'])){
        if($edit_produk=$produk->updateData($_POST) > 0){
            echo"<script>alert('Data Berhasil Diedit');document.location='?module=main';</script>";
        }
        else{
          die("<script>alert('Pengubahan Gagal');</script>");
        }
    }
?>

