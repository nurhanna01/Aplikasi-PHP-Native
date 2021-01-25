<?php
if(!isset($_SESSION['username'])){
    echo "<script>alert('Anda belum login, Login Terlebih dahulu');
    document.location='?module=login';</script>";
}
    if(isset($_POST['tambah_keranjang'])){
        // var_dump($_SESSION['username']);
        // die;
        if(!isset($_SESSION['username'])){
            echo "<script>alert('Anda belum login, Login Terlebih dahulu');
            document.location='?module=login';</script>";
        }else{
            $id=$_POST['id_produk'];
            $user=$_SESSION['username'];
            $input_keranjang=$keranjang->cekKeranjang($id,$user);
            if($input_keranjang){
                echo "<script>alert('Barang ditambahkan ke Keranjang Belanja');
                document.location='?module=pakaian';</script>";
            }
        }
    }
    $datas=$keranjang->detailKeranjang($_SESSION['username']);
    ?>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nama Produk</th>
        <th scope="col">Jumlah Produk</th>
        <th scope="col">Harga Produk</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <?php foreach($datas as $data):?>
        <tbody>
            <tr>
            <td><?php echo $data['nama_produk']?></td>
            <td><?php echo $data['jumlah_produk']?></td>
            <td><?php echo $data['harga_produk']?></td>
            <td><a href="?module=hapus_keranjang&id_produk=<?php echo $data['id_produk']?>" class="btn btn-danger">Hapus</a></td>
            </tr>
        </tbody>
    <?php endforeach ?>
    </table>



