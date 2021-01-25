<?php
class User{
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

    public function tampilUser($username){
        $sql="SELECT * FROM user WHERE username = '$username'";
        $query=mysqli_query($this->koneksi(),$sql);
        $user=[];
			while($data_user=mysqli_fetch_assoc($query)){
				$user[]=$data_user;
			
			}
        return $user;
    }

    public function simpanUser($data){
        $role=htmlspecialchars($data['role']);
        $username=htmlspecialchars($data['username']);
        $password_input=htmlspecialchars($data['pwd']);
        $password=md5($password_input);
        $nama=htmlspecialchars($data['nama']);
        $alamat=htmlspecialchars($data['alamat']);
        $sql="INSERT INTO user (role,username,password,nama,alamat) VALUES ('$role','$username','$password','$nama','$alamat')";
        $query=mysqli_query($this->koneksi(),$sql);
        return $query;
    }

    public function validasiLogin($data){
        $user=$_POST['username'];
        $pwd_input=$_POST['pwd'];
        $pwd=md5($pwd_input);

        $sql="SELECT * FROM user WHERE username='$user' AND password='$pwd'";
        $query=mysqli_query($this->koneksi(),$sql);
        if($hasil=mysqli_fetch_array($query)){
            $_SESSION['username']=$hasil['username'];
            $_SESSION['role']=$hasil['role'];
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


}

?>