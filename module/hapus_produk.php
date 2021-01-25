<?php

    $id=$_GET['id_produk'];
    $hapus_produk=$produk->hapusDataProduk($id);
	if($hapus_produk){
			echo"<script>alert('Data Berhasil Dihapus'); document.location='?module=main';</script>";
	}
	else{
		echo"<script>alert('Data Gagal Dihapus'); document.location='?module=main';</script>";
	}

	 ?>