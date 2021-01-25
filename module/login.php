<section>
<form action="" method="POST">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>

    <button type="submit" name="login">Login</button>
  </div>

  <div class="container" style="background-color:lightblue">
    <span class="psw">Belum daftar <a href="?module=daftar_user" style="color:blue">daftar disini</a></span>
  </div>
</form>
</section>

<?php
if(isset($_POST['login'])){
  if($user->validasiLogin($_POST)>0){
    header("Location: ?module=main");
  }
  else{
    echo "<script>alert('Username atau Password Salah');
	  document.location='?module=login';</script>";
  }
}
?>