<?php
$produk=new Produk();
class Keranjang{
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

    public function detailKeranjang($user){
        $sql="SELECT * FROM keranjang INNER JOIN produk ON keranjang.id_produk=produk.id_produk WHERE user='$user'";
        $query=mysqli_query($this->koneksi,$sql);
        $data=[];
        while($result=mysqli_fetch_assoc($query)){
            $data[]=$result;
        }
        return $data;        
    }

    public function cekKeranjang($id,$user){
            $sql="SELECT * FROM keranjang where id_produk='$id' AND user='$user'";
            $query=mysqli_query($this->koneksi(),$sql);
            $result=mysqli_num_rows($query);
            if($result>0){
                $this->updateKeranjang($id,$user);
            }else{
                $this->insertKeranjang($id,$user);
            }
    }

    public function insertKeranjang($id,$user){
        $sql="INSERT INTO keranjang (user,id_produk,jumlah_produk) VALUES('$user','$id',1)";
        $query=mysqli_query($this->koneksi(),$sql);
		return $query;
    }

    public function updateKeranjang($id,$user){
        $sql="UPDATE keranjang SET jumlah_produk=`jumlah_produk`+1,WHERE id_produk=$id AND user='$user'";
        $query=mysqli_query($this->koneksi(),$sql);
		return $query;
    }

    public function deleteKeranjang($id,$user){
        $sql="DELETE FROM keranjang WHERE id_produk='$id' AND user='$user'";
        $query=mysqli_query($this->koneksi(),$sql);
		return $query;
    }

}

?>