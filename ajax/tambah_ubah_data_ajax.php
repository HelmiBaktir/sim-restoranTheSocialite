<?php
include '../metode/koneksi.php';

$title = $_POST["title"];


//
//
//
#region MASTER DATA

#region master menu
if ($title == "tambah-menu") {
    $nama_menu = $_POST['nama_menu'];
    $tipe_menu = $_POST['tipe_menu'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['despripsi'];
    $status = $_POST['status'];
    if ($nama_menu == '') {
        echo ("nama tidak boleh kosong");
    } else {

        $sql = "INSERT INTO `restoranDB`.`master_menu` (`nama`, `stock`, `harga_jual`, `deskripsi_menu`, `status`, `tipe_menu_id`) VALUES ('$nama_menu', $stok, $harga, '$deskripsi', '$status', $tipe_menu)";
        if ($conn->query($sql) == true) {
            echo ("sukses");
        } else {
            echo ("gagal");
        }
    }
} elseif ($title == "ubah-menu") {
    $id = $_POST['id'];
    $nama_menu = $_POST['nama_menu'];
    $tipe_menu = $_POST['tipe_menu'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['despripsi'];
    $status = $_POST['status'];

    if ($nama_menu == "") {
        echo ("nama tidak boleh kosong");
    } else {
        $sql = "UPDATE `restoranDB`.`master_menu` SET `nama`='$nama_menu', `stock`=$stok, `harga_jual`=$harga, `deskripsi_menu`='$deskripsi', `status`='$status', `tipe_menu_id`=$tipe_menu WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("sukses");
        } else {
            echo ("gagal");
        }
    }
}
#endregion

#region master barang

elseif ($title == "tambah-barang") {
    session_start();
    $id = $_SESSION['id'];

    $nama_barang = $_POST['nama_barang'];
    $tipe_barang = $_POST['tipe_barang'];
    $kategori_barang = $_POST['kategori_barang'];
    $stok_barang = $_POST['stok_barang'];
    $stok_minimal = $_POST['stok_minimal'];
    $satuan_barang = $_POST['satuan_barang'];
    $status_barang = $_POST['status_barang'];

    $sql_tambah_barang = "INSERT INTO `master_barang` (`nama`, `stock`, `stock_minimum`, `status`, `tipe_barang_id`, `kategori_barang_id`, `master_satuan_id`, `user_id`) VALUES ('$nama_barang', $stok_barang, $stok_minimal, '$satuan_barang', $tipe_barang, $kategori_barang, $satuan_barang , $id)";
    if ($conn->query($sql_tambah_barang)) {
        echo ("sukses");
    } else {
        echo ("gagal");
    }
} elseif ($title == "ubah-barang") {
    $nama_barang = $_POST['nama_barang'];
    $tipe_barang = $_POST['tipe_barang'];
    $kategori_barang = $_POST['kategori_barang'];
    $stok_barang = $_POST['stok_barang'];
    $stok_minimal = $_POST['stok_minimal'];
    $satuan_barang = $_POST['satuan_barang'];
    $status_barang = $_POST['status_barang'];

    $id_barang = $_POST['id_barang'];

    $sql_ubah_barang = "UPDATE `restoranDB`.`master_barang` SET `nama`='$nama_barang', `stock`=$stok_barang, `stock_minimum`=$stok_minimal, `status`='$status_barang', `tipe_barang_id`=$tipe_barang, `kategori_barang_id`=$kategori_barang,`master_satuan_id`=$satuan_barang WHERE `id`=$id_barang";
    $result = mysqli_query($conn, $sql_ubah_barang);
    if ($result) {
        echo ("sukses");
    } else {
        echo ("gagal");
    }
}
#endregion

#region mater supplier
elseif ($title == "tambah-suppier") {
    $nama_supplier = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $status_supplier = $_POST['status_supplier'];

    $sql_tambah_supplier = "INSERT INTO `restoranDB`.`master_supplier` (`nama`, `alamat`, `no_hp`, `status`) VALUES ('$nama_supplier', '$alamat_supplier', '$no_telp', '$status_supplier')";
    if ($nama_supplier == "") {
        echo ("tidak boleh kosong");
    } else {
        if ($conn->query($sql_tambah_supplier) == true) {
            echo ("sukses");
        } else {
            echo ("gagal");
        }
    }
} elseif ($title == "ubah-supplier") {
    $nama_supplier = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $status_supplier = $_POST['status_supplier'];
    $id = $_POST['id'];

    $sql_ubah_supplier = "UPDATE `restoranDB`.`master_supplier` SET `nama`='$nama_supplier', `alamat`='$alamat_supplier', `no_hp`='$no_telp', `status`='$status_supplier' WHERE `id`=$id;";
    $result = mysqli_query($conn, $sql_ubah_supplier);
    if ($result) {
        echo("sukses");
    }
    else{
        echo("gagal");
    }
}
#endregion

#region master satuan
elseif($title == "tambah-satuan"){
    $nama_satuan = $_POST['nama_satuan'];
    $status_satuan = $_POST['status_satuan'];
    $keterangan_satuan=$_POST['keterangan_satuan'];

    $sql_tambah_satuan ="INSERT INTO `restoranDB`.`master_satuan` (`nama`, `keterangan`, `status`) VALUES ('$nama_satuan', '$keterangan_satuan', '$status_satuan');";
    if($nama_satuan ==""){
        echo("nama tidak boleh kosong");
    }
    else
    {
        if($conn->query($sql_tambah_satuan)==true){
            echo("sukses");
        }
        else
        {
            echo("gagal");
        }
    }
}
elseif($title =="ubah-satuan"){
    $id_satuan =$_POST["id"];
    $nama_satuan = $_POST['nama_satuan'];
    $status_satuan = $_POST['status_satuan'];
    $keterangan_satuan=$_POST['keterangan_satuan'];

    $sql_ubah_satuan ="UPDATE `restoranDB`.`master_satuan` SET `nama`='$nama_satuan', `keterangan`='$keterangan_satuan', `status`='$status_satuan' WHERE `id`=$id_satuan ;";
    if($nama_satuan ==""){
        echo("nama tidak boelh kosong");
    }
    else
    {
        $result = mysqli_query($conn,$sql_ubah_satuan);
        if($result){
            echo("sukses");
        }
        else{
            echo("gagal");
        }
    }
}
#endregion

#region resep menu
elseif($title =="tambah-resep"){
    $id_menu = $_POST['menu_id'];
    $id_barang = $_POST['barang_id'];
    $kuantitas = $_POST['kuantitas'];

    $sql_tambah_resep = "INSERT INTO `restorandb`.`resep_produksi` (`kuantitas_product`, `master_menu_id`, `master_barang_id`) VALUES ('$kuantitas', $id_menu, $id_barang);
    ";

    if($conn->query($sql_tambah_resep) == true){
        echo("sukses");
    }
    else{
        echo("gagal");
    }
}
#endregion

//
//
//

#region master transaksi
elseif($title =="tambah-proses-prosuksi"){
    $tanggal = $_POST['tanggal'];
    $master_menu_id = $_POST["master_menu_id"];
    $kuantitas = $_POST["kuantitas"]; 

    $sql_tambah_produksi ="INSERT INTO `restorandb`.`proses_produksi` (`tanggal`, `master_menu_id`, `kuantitas`) VALUES ('$tanggal', $master_menu_id, $kuantitas);";
    if($conn->query($sql_tambah_produksi) == true){
        $sql_update_menu = "UPDATE `restorandb`.`master_menu` SET `stock`=(SELECT stock from master_menu where id=$master_menu_id)+$kuantitas WHERE `id`=$master_menu_id;";
        $result = mysqli_query($conn,$sql_update_menu);
        if($result){
            echo("Produksi berhasil di tambahakan");

            //ADD Data Pada penjualan
            $tambah_Penjualan = "INSERT INTO `restoranDB`.`penjualan` (`kuantitas`, `harga_satuan`, `total_harga`, `master_menu_id`) VALUES ('$kuantitas',
            (SELECT harga_jual FROM master_menu where id=$master_menu_id), (SELECT harga_jual FROM master_menu where id=$master_menu_id)*$kuantitas, '$master_menu_id')";

            if($conn->query($tambah_Penjualan)==true){
                echo("Tambah penjualan berhasil");
            }

        }
    }
}
elseif($title =="ubah-proses-produksi"){
    $id_produksi=$_POST["id"];
    $tanggal = $_POST['tanggal'];
    $master_menu_id = $_POST["master_menu_id"];
    $kuantitas = $_POST["kuantitas"];

    $sql_ubah_produksi ="UPDATE `restorandb`.`proses_produksi` SET `tanggal`='$tanggal', `master_menu_id`=$master_menu_id, `kuantitas`= $kuantitas WHERE `id`=$id_produksi;";
    $result = mysqli_query($conn,$sql_ubah_produksi);
    if($result){
        echo("data berhasil diubah");
    }
    else
    {
        echo("data gagal diubah" . $result);
    }
}
#endregion

//
//
//

#region master laporan

#endregion