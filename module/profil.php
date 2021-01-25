<section>
<?php if(!isset($_SESSION['username'])){
echo"<script>alert('Anda belum login,Login terlebih dahulu!');document.location='?module=login';</script>";
} else{?>
<?php $profiles=$user->tampilUser($_SESSION['username']);
foreach($profiles as $profile) : ?>
    <center>
    <img src="img/profile.png" alt="" width="200" height="200" id="profil"><br>
    <h4><b>Nama : </b><?php echo $profile['nama']?></h4>
    <h4><b>Username : </b><?php echo $profile['username']?></h4>
    <h4><b>Alamat : </b><?php echo $profile['alamat']?></h4><br>
    <b><a href="?module=logout" style="color:red">LogOut</a></b>
    </center>
<?php 
endforeach;
} ?>

</section>