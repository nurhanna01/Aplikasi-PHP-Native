<?php

	class Produk{
		private $koneksi;
		private $host;
		private $database;
		private $user;
		private $password;

		public function __construct(){
			$this->host='localhost';
			$this->database='shopingkuy';
			$this->user='root';
			$this->password='';

			$this->koneksi=mysqli_connect($this->host,$this->user,$this->password,$this->database);
		}

		public function koneksi(){
			return $this->koneksi;
		}

		public function selectDataPakaian(){
			$sql="SELECT * FROM produk WHERE kategori_produk='pakaian'";
			$query=mysqli_query($this->koneksi(),$sql);
			$produk=[];
			while($data_produk=mysqli_fetch_assoc($query)){
				$produk[]=$data_produk;
			
			}
			return $produk;
		}

		public function selectDataElektronik(){
			$sql="SELECT * FROM produk WHERE kategori_produk='elektronik'";
			$query=mysqli_query($this->koneksi(),$sql);
			$produk=[];
			while($data_produk=mysqli_fetch_assoc($query)){
				$produk[]=$data_produk;
			
			}
			return $produk;
		}

		public function selectDataPerId($id){
			$sql="SELECT * FROM produk WHERE id_produk=$id";
			$query=mysqli_query($this->koneksi(),$sql);
			$produk=[];
			while($data_produk=mysqli_fetch_assoc($query)){
				$produk[]=$data_produk;
			
			}
			return $produk;
		}

		public function insertData($data){

			$kategori=htmlspecialchars($data['kategori']);
			$nama=htmlspecialchars($data['nama']);
			$jenis=htmlspecialchars($data['jenis']);
			// $bahan=$data['bahan'];
			$ukuran=htmlspecialchars($data['ukuran']);
			$harga=htmlspecialchars($data['harga']);
			$deskripsi=htmlspecialchars($data['deskripsi']);
			$stok=htmlspecialchars($data['stok']);

			$gambar=$this->uploadGambar();
			if(!$gambar){
				return false;
			}

			$sql="INSERT into produk (kategori_produk,nama_produk,jenis_produk,ukuran_produk,harga_produk,deskripsi_produk,stok_produk,gambar_produk) VALUES ('$kategori','$nama','$jenis','$ukuran','$harga','$deskripsi','$stok','$gambar')";
			$query=mysqli_query($this->koneksi(),$sql) or die(mysqli_error($this->koneksi()));
			return $query;

		}

		public function uploadGambar(){
			$namaGambar=$_FILES['gambar']['name'];
			$ukuranGambar=$_FILES['gambar']['size'];
			$error=$_FILES['gambar']['error'];
			$tempName=$_FILES['gambar']['tmp_name'];

			if($error === 4){
				echo"<script> alert('Pilih Gambar') </script>";
				return false;
			}

			$tipeGambar=explode(".",$namaGambar);
			// file yang valid
			$ekstensi=array("jpg","jpeg","png","gif");
			if(!in_array($tipeGambar[1],$ekstensi)){

				echo "<script> alert('ini bukan gambar') </script>";
				
			}

			// cek ukuran
			if($ukuranGambar > 2000000){
				echo "<script> alert('gambar besar kali max.2 Mb') </script>";
			}

			// nama baru
			// angka string random
			$namaGambarBaru=uniqid();
			// sambung dengan extensi file
			$namaGambarBaru .= ".";
			$namaGambarBaru .= $tipeGambar[1];
			// pindah
			move_uploaded_file($tempName,'img/'.$namaGambarBaru);

			return $namaGambarBaru;

		}

		public function editData($id){
			$sql="SELECT * FROM produk WHERE id_produk = $id";
			$query=mysqli_query($this->koneksi(),$sql);
			$produk=[];
			while($data_produk=mysqli_fetch_assoc($query)){
				$produk[]=$data_produk;
			
			}
			return $produk;
		}

		public function updateData($data){
			$id=htmlspecialchars($data['id_produk']);
			$kategori=htmlspecialchars($data['kategori']);
			$nama=htmlspecialchars($data['nama']);
			$jenis=htmlspecialchars($data['jenis']);
			$ukuran=htmlspecialchars($data['ukuran']);
			$harga=htmlspecialchars($data['harga']);
			$deskripsi=htmlspecialchars($data['deskripsi']);
			$stok=htmlspecialchars($data['stok']);
			$gambar_lama=htmlspecialchars($data['gambar_lama']);

			if($_FILES['gambar']['error']===4){
				$gambar=$gambar_lama;
			} else{
				$gambar=$this->uploadGambar();	
			}
			$sql="UPDATE produk SET kategori_produk='$kategori',nama_produk='$nama',jenis_produk='$jenis',ukuran_produk='$ukuran',harga_produk='$harga',deskripsi_produk='$deskripsi',stok_produk='$stok',gambar_produk='$gambar' WHERE id_produk='$id'";
			$query=mysqli_query($this->koneksi(),$sql);
			return $query;

		}

		public function hapusDataProduk($id){
			$sql="DELETE FROM produk WHERE id_produk = $id";
			$query=mysqli_query($this->koneksi(),$sql);
			return $query;
		}


	}

?>