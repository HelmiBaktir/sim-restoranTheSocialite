<?php
include '../metode/koneksi.php';

$sql = "select mb.nama as nama,mb.stock,mb.stock_minimum,ms.nama as satuan from master_barang as mb inner join master_satuan as ms on mb.master_satuan_id = ms.id where mb.stock<mb.stock_minimum && mb.status='aktif'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    while ($row = $result->fetch_assoc()) {
?>

        <div class="card">
            <p class="card-text">Stock Barang Menipis</p>
            <h3><?php echo($row['nama']) ?></h3>
            <p>Minimal Stok</p>
            <p class="right"><?php echo($row['stock_minimum']." ".$row['satuan']) ?></p>
            <h5>Stock Saat ini </h5>
            <h5 class="right"><?php echo($row['stock']." ".$row['satuan'])?></h5>
        </div>

<?php

    }
}
?>