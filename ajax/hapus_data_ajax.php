<?php
include '../metode/koneksi.php';

#region getdata
$xin =$_POST['val'];
$id =$_POST['id'];
#endregion

#region Master Menu
if($xin == "master_menu"){
    $sql ="DELETE FROM master_menu WHERE id='$id'";
    if($conn->query($sql)== TRUE){
        echo("berhasil");
    }
    else
    {
        echo("GAGAL CUY");
    }
}
#endregion

#region Master Barang
elseif($xin == "master_barang"){
    $sql ="DELETE FROM master_barang WHERE id='$id'";
    if($conn->query($sql)== true){
        echo("berhasil");
    }
    else
    {
        echo("GAGAL CUY");
    }
}
#endregion

#region Master Resep menu
elseif($xin == "hapus_resep"){
    $sql_hapus_resep = "DELETE FROM `restorandb`.`resep_produksi` WHERE `id`=$id;";
    if($conn->query($sql_hapus_resep) == true){
        echo("sukses");
    }
    else{
        echo("gagal");
    }
}
#endregion

#region Master Supplier
if($xin == "master_supplier"){
    $sql ="DELETE FROM master_supplier WHERE id='$id'";
    if($conn->query($sql)== TRUE){
        echo("berhasil");
    }
    else
    {
        echo("GAGAL CUY");
    }
}
#endregion

#region Master satuan
if($xin == "master_satuan"){
    $sql ="DELETE FROM master_satuan WHERE id='$id'";
    if($conn->query($sql)== TRUE){
        echo("berhasil");
    }
    else
    {
        echo("GAGAL CUY");
    }
}
#endregion

#region Master Tipe PEmbayaran
#endregion
