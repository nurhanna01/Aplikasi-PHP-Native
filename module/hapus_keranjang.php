<?php

    $id=$_GET['id_produk'];
    $hapus_produk=$keranjang->deleteKeranjang($id,$_SESSION['username']);
	if($hapus_produk){
			echo"<script>alert('Data Berhasil Dihapus'); document.location='?module=keranjang';</script>";
	}
	else{
		echo"<script>alert('Data Gagal Dihapus'); document.location='?module=keranjang';</script>";
	}

?>
