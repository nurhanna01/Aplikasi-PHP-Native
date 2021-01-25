<section>
<h2>Daftar Pengguna</h2>

<form method="POST" enctype="multipart/form-data">
  <div>
    <input type="hidden" name="role" value="pelanggan">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="Username Anda" required>
  </div>
  <div>
    <label for="password">Password</label>
    <input type="text" class="form-control" name="pwd" id="password" placeholder="Pasword Anda" required>
  </div>
  <div>
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Anda" required>
  </div>
  <div>
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Anda" required>
  </div>

  <button type="submit" class="btn btn-primary" name="simpan_user">Submit</button>
</form>

</section>

<?php
if(isset($_POST['simpan_user'])){
    if($user->simpanUser($_POST) > 0){
      echo"<script>alert('Akun Anda telah terdaftar');document.location='?module=login';</script>";
    }
    else{
      die("<script>alert('Gagal Mendaftar');</script>");
    }
}
?>