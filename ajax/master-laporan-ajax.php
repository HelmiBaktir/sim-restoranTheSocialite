<?php
include '../metode/koneksi.php';

#region data from master
$xin = $_POST['val'];
$inp = $_POST['inp'];
$row = $_POST['row'];
if (isset($_POST['sort_by'])) {
    $sort_by = $_POST['sort_by'];
}

//rupiah
function rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

#region laporan-penjualan
if ($xin == "laporan-penjualan") {
    function showdata($sql)
    {
?>
        <div class="table-container">
            <table class="styled-table" id="laporan-penjualan">
                <!-- THEAD -->
                <thead>

                    <tr>
                    <tr>
                        <th class="id">#</th>
                        <th class="">Nama Menu</th>
                        <th class="">Tanggal</th>
                        <th class="">Harga Satuan</th>
                        <th class="">Total Harga</th>
                        <th class="">Kuantitas</th>
                    </tr>
                    </tr>
                </thead>
                <?php
                include '../metode/koneksi.php';
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
              <tr>
                <td class='id'>" . $row["id"] . "</td>
				        <td class='mid'>" . $row["nama"] . "</td>
                        <td class='mid'>" . $row["tanggal"]  . "</td>
				        <td class='right'>" . rupiah($row["harga_satuan"])  . "</td>
                        <td class='right'>" . rupiah($row["total_harga"]) . "</td>
				        <td class='right'>" . $row["kuantitas"] . "</td>"

                        ."</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
<?php
    }

    if ($inp == "") {

        $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id;";

        if ($sort_by == 'default') {
            if ($row != "All") {
                $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id LIMIT $row ";
            }
        }
        // A-Z
        elseif ($sort_by == 'A-Z') {
            $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id order by nama ASC";
            if ($row != "All") {
                $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id order by nama ASC LIMIT $row ";
            }
        }
        // Z-A
        elseif ($sort_by == 'Z-A') {
            $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id order by nama DESC";
            if ($row != "All") {
                $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id order by nama DESC LIMIT $row ";
            }
        }
        //1-100
        elseif ($sort_by == '1-100') {
            $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id order by id ASC";
            if ($row != "All") {
                $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id order by id ASC LIMIT $row ";
            }
        } elseif ($sort_by == '100-1') {
            $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id order by id DESC";
            if ($row != "All") {
                $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id order by id DESC LIMIT $row ";
            }
        } elseif ($sort_by == "tanggal") {
            $tanggal_mulai = $_POST["mulai"];
            $tanggal_selesai = $_POST["selesai"];

            $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id WHERE tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai'";
            if ($row != "All") {
                $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id WHERE tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai' order by id DESC LIMIT $row ";
            }
        }
        showdata($sql);
    } else {
        $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id WHERE mm.nama LIKE '%$inp%' or p.id LIKE '%$inp%'";
        if ($row != "All") {
            $sql = "SELECT p.id as id,p.kuantitas as kuantitas,p.harga_satuan as harga_satuan,p.tanggal,p.total_harga as total_harga,mm.nama as nama FROM penjualan as p inner join master_menu as mm on mm.id = p.master_menu_id WHERE mm.nama LIKE '%$inp%' or pp.id LIKE '%$inp%' LIMIT $row";
        }
        showdata($sql);
    }
}
#endregion

#region laporan pergerakan bahan baku
elseif ($xin == "pergerakan-bahan-baku") {
    function showdata($sql)
    {
?>
        <div class="table-container">
            <table class="styled-table" id="pergerakan-bahan">
                <!-- THEAD -->
                <thead>

                    <tr>
                    <tr>
                        <th class="id">#</th>
                        <th class="">Tanggal</th>
                        <th class="">Nama Produk</th>
                        <th class="">Status</th>
                        <th class="" style="width: 250px;">Keterangan</th>
                        <th class="">Tipe</th>
                        <th class="">Masuk</th>
                        <th class="">Keluar</th>
                        <th class="">Stok Sisa</th>
                        <!-- <th class="action">aksi</th> -->
                    </tr>
                    </tr>
                </thead>
                <?php
                include '../metode/koneksi.php';
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if($row["type"] == "Tambah"){
                            echo "
                            <tr>
                              <td class='id'>" . $row["id"] . "</td>
                                      <td class=''>" . $row["tanggal"] . "</td>
                                      <td class=''>" . $row["nama_produk"] . "</td>
                                      <td class=''>" . $row["status"] . "</td>
                                      <td class=''>" . $row["keterangan"] . "</td>
                                      <td class=''>" . $row["type"] . "</td>
                                      <td class=''>" . $row["jumlah"] . "</td>
                                      <td class=''>" . 0 . "</td>
                                      <td class=''>" . $row["sisa"] . "</td>"
                              ?>
              
                                      <!-- <td style="padding:0 2px 0 0;" class="action">
                                          <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
                                          <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;" data-toggle="modal" data-target="#add_data_Modal_ubah"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
                                      </td> -->
              
                              <?php
              
                                      "</tr>";
                        }
                        else
                        {
                            echo "
                            <tr>
                            <td class='id'>" . $row["id"] . "</td>
                            <td class=''>" . $row["tanggal"] . "</td>
                            <td class=''>" . $row["nama_produk"] . "</td>
                            <td class=''>" . $row["status"] . "</td>
                            <td class=''>" . $row["keterangan"] . "</td>
                            <td class=''>" . $row["type"] . "</td>
                            <td class=''>" . 0 . "</td>
                            <td class=''>" . $row["jumlah"] . "</td>
                            <td class=''>" . $row["sisa"] . "</td>"
                              ?>
              
                                      <!-- <td style="padding:0 2px 0 0;" class="action">
                                          <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
                                          <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;" data-toggle="modal" data-target="#add_data_Modal_ubah"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
                                      </td> -->
              
                              <?php
              
                                      "</tr>";
                        }
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
<?php
    }

    if ($inp == "") {

        $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id";

        if ($sort_by == 'default') {
            if ($row != "All") {
                $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id LIMIT $row ";
            }
        }
        // A-Z
        elseif ($sort_by == 'A-Z') {
            $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id order by nama_produk ASC";
            if ($row != "All") {
                $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id order by nama_produk ASC LIMIT $row ";
            }
        }
        // Z-A
        elseif ($sort_by == 'Z-A') {
            $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id order by nama_produk DESC";
            if ($row != "All") {
                $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by nama DESC LIMIT $row ";
            }
        }
        //1-100
        elseif ($sort_by == '1-100') {
            $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id order by id ASC";
            if ($row != "All") {
                $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id order by id ASC LIMIT $row ";
            }
        } elseif ($sort_by == '100-1') {
            $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id order by id DESC";
            if ($row != "All") {
                $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id order by id DESC LIMIT $row ";
            }
        } elseif ($sort_by == "tanggal") {
            $tanggal_mulai = $_POST["mulai"];
            $tanggal_selesai = $_POST["selesai"];

            $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id WHERE tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai'";
            if ($row != "All") {
                $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id WHERE tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai' order by id DESC LIMIT $row ";
            }
        }
        showdata($sql);
    } else {
        $sql = "SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id WHERE mb.nama LIKE '%$inp%' or jp.id LIKE '%$inp%'";
        if ($row != "All") {
            $sql = " SELECT jp.id as id ,mb.nama as nama_produk,mb.status as status,jp.tanggal as tanggal,jp.type as type,jp.jumlah as jumlah,mb.stock as sisa,jp.keterangan as keterangan from jurnal_penyesuaian as jp inner join master_barang as mb on jp.master_barang_id = mb.id WHERE mb.nama LIKE '%$inp%' or jp.id LIKE '%$inp%' LIMIT $row";
        }
        showdata($sql);
    }
}
#endregion

#region omzet
elseif($xin == "omzet"){

function showdata($sql)
{
?>
    <div class="table-container">
        <table class="styled-table">
            <!-- THEAD -->
            <thead>

                <tr>
                <tr>
                    <th class="id">#</th>
                    <th class="">Nama Menu</th>
                    <th class="">Terjual</th>
                    <th class="">Total Penjualan</th>
                    <th class="" style="width: 250px;">Sisa Porsi</th>
                    <!-- <th class="action">aksi</th> -->
                </tr>
                </tr>
            </thead>
            <?php
            include '../metode/koneksi.php';
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
          <tr>
            <td class='id'>" . $row["id"] . "</td>
                    <td class=''>" . $row["nama"] . "</td>
                    <td class=''>" . $row["terjual"] . "</td>
                    <td class=''>" . $row["total_penjualan"] . "</td>
                    <td class=''>" . $row["stock"] . "</td>"
            ?>
<!-- 
                    <td style="padding:0 2px 0 0;" class="action">
                        <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
                        <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;" data-toggle="modal" data-target="#add_data_Modal_ubah"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
                    </td> -->

            <?php

                    "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
}

if ($inp == "") {

    $sql = "SELECT p.id,mm.nama,sum(p.kuantitas)as terjual,sum(p.total_harga) as total_penjualan,mm.stock from penjualan p inner join master_menu mm on p.master_menu_id = mm.id group by master_menu_id;";

    if ($sort_by == 'default') {
        if ($row != "All") {
            $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id LIMIT $row ";
        }
    }
    // A-Z
    elseif ($sort_by == 'A-Z') {
        $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by nama ASC";
        if ($row != "All") {
            $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by nama ASC LIMIT $row ";
        }
    }
    // Z-A
    elseif ($sort_by == 'Z-A') {
        $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by nama DESC";
        if ($row != "All") {
            $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by nama DESC LIMIT $row ";
        }
    }
    //1-100
    elseif ($sort_by == '1-100') {
        $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by id ASC";
        if ($row != "All") {
            $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by id ASC LIMIT $row ";
        }
    } elseif ($sort_by == '100-1') {
        $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by id DESC";
        if ($row != "All") {
            $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by id DESC LIMIT $row ";
        }
    } elseif ($sort_by == "tanggal") {
        $tanggal_mulai = $_POST["mulai"];
        $tanggal_selesai = $_POST["selesai"];

        $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id WHERE tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai'";
        if ($row != "All") {
            $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id WHERE tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai' order by id DESC LIMIT $row ";
        }
    }
    showdata($sql);
} else {
    $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id WHERE nama LIKE '%$inp%' or pp.id LIKE '%$inp%'";
    if ($row != "All") {
        $sql = " SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id WHERE nama LIKE '%$inp%' or pp.id LIKE '%$inp%' LIMIT $row";
    }
    showdata($sql);
}
}
#endregion

#region laporan produksi
elseif($xin == "laporan-produksi"){

    function showdata($sql)
    {
    ?>
        <div class="table-container">
            <table class="styled-table" id="laporan-produksi">
                <!-- THEAD -->
                <thead>
    
                    <tr>
                    <tr>
                        <th class="id">#</th>
                        <th class="">Tanggal</th>
                        <th class="">Nama Menu</th>
                        <th class="">Harga Satuan</th>
                        <th class="" style="width: 250px;">Kuantitas</th>
                        <th class="">Total Harga</th>
                    </tr>
                    </tr>
                </thead>
                <?php
                include '../metode/koneksi.php';
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
              <tr>
                <td class='id'>" . $row["id"] . "</td>
                        <td class='mid'>" . $row["tanggal"] . "</td>
                        <td class='mid'>" . $row["nama"] . "</td>
                        <td class='right'>" . rupiah($row['harga_jual']) . "</td>
                        <td class='right'>" . $row["kuantitas"] . "</td>
                        <td class='right'>" . rupiah(($row["kuantitas"] * $row['harga_jual'])) . "</td>"
                ?>
    
                <?php
    
                        "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    
    if ($inp == "") {
        $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by id;";
    
        if ($sort_by == 'default') {
            $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by id;";
            if ($row != "All") {
                $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by id LIMIT $row;";
            }
        }
        // A-Z
        elseif ($sort_by == 'A-Z') {
            $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by nama ASC";
            if ($row != "All") {
                $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by nama ASC LIMIT $row;";
            }
        }
        // Z-A
        elseif ($sort_by == 'Z-A') {
            $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by nama DESC";
            if ($row != "All") {
                $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by nama DESC LIMIT $row;";
            }
        }
        //1-100
        elseif ($sort_by == '1-100') {
            $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by id ASC";
            if ($row != "All") {
                $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by id ASC LIMIT $row;";
            }
        } elseif ($sort_by == '100-1') {
            $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by id DESC";
            if ($row != "All") {
                $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id order by id DESC LIMIT $row;";
            }
        } elseif ($sort_by == "tanggal") {
            $tanggal_mulai = $_POST["mulai"];
            $tanggal_selesai = $_POST["selesai"];
    
            $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id WHERE tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai' order by tanggal";
            if ($row != "All") {
                $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id WHERE tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai' order by tanggal DESC LIMIT $row ";
            }
        }
        showdata($sql);
    } else {
        $sql = "SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id WHERE nama LIKE '%$inp%' or pp.id LIKE '%$inp%'";
        if ($row != "All") {
            $sql = " SELECT pp.id,pp.tanggal,mm.nama,mm.harga_jual,pp.kuantitas from proses_produksi as pp inner join master_menu as mm on pp.master_menu_id = mm.id WHERE nama LIKE '%$inp%' or pp.id LIKE '%$inp%' LIMIT $row";
        }
        showdata($sql);
    }
    }
#endregion
?>