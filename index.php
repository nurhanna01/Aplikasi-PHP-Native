<?php
session_start();
require_once('Produk.php');
require_once('Keranjang.php');
require_once('User.php');
$produk=new Produk();
$keranjang=new Keranjang();
$user=new User();
if(!isset($_GET['module']) || $_GET['module']==''){
	$_GET['module']='main';
}
?>

<!DOCTYPE html>
<html>
<?php require_once('head.php'); ?>
<body>
	<?php if(isset($_SESSION['username'])){
		if($_SESSION['role']=='admin'){
			require_once('header_admin.php');
		}else{
			require_once('header_pelanggan.php');
		}
	} else{
		require_once('header_pelanggan.php');
	} ?>

	<main>

		<div class="container">

			<?php require_once('module/'.$_GET['module'].'.php');?>
			
		</div>

	</main>

	<footer>
		<p>&copy 2020 Nur Hanna</p>
	</footer>
	
</body>
</html>