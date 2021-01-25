<section>
<h2>Form Tambah Data Pakaia n</h2>

<form method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="kategori">Pilih Kategori:</label>
    <select id="kategori" name="kategori" required>
        <option disabled selected value> -- Pilih Kategori -- </option>
        <option value="pakaian">Pakaian</option>
        <option value="elektronik">Barang Elektronik</option>
    </select>
  </div> 
  <div>
    <label for="nama">Nama produk</label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama dari Produk" required>
  </div>
  <div>
    <label for="jenis">Jenis produk</label>
    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="ex. baju anak/celana olahraga/peralatan dapur" required>
  </div>
  <div>
    <label for="bahan">Bahan produk</label>
    <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Masukan Bahan Produk" required>
  </div>
  <div class="form-group">
    <label for="ukuran">Ukuran Produk</label>
    <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Masukan Ukuran Pakain">
  </div>
  <div class="form-group">
    <label for="harga">Harga Produk</label>
    <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukan Harga Pakain">
  </div>
  <div class="form-group">
    <label for="deskripsi">Deskripsi Produk</label>
    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="6" placeholder="masukan Deskripsi"></textarea>
  </div> 
  <div class="form-group">
    <label for="stock">Stok Produk</label>
    <input type="number" class="form-control" name="stok" id="stok"  placeholder="Masukan stok produk" required>
  </div>
  <div class="form-group">
    <label for="gambar">Foto Pakaian</label>
    <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Masukan Foto/Gambar Pakaian">
  </div>

  <button type="submit" class="btn btn-primary" name="simpan_produk">Submit</button>
</form>

</section>
<?php
  if(isset($_POST['simpan_produk'])){
    if($produk->insertData($_POST) > 0){
      header("Location: ?module=main");
    }
    else{
      header("Location: ?module=tambah_produk");
    }
  }
?>