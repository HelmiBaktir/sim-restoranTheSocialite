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

#endregion
// CARI DATA DI TABEL

#region Proses Produksi
if ($xin == "proses-prosuksi") {

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
            <th class="tanggal-produksi">Tanggal</th>
            <th class="nama-produk">Nama Produk</th>
            <th class="" style="width: 250px;">Jumlah</th>
            <th class="action">aksi</th>
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
				        <td class='tanggal-produksi'>" . $row["tanggal"] . "</td>
				        <td class='nama-produk'>" . $row["nama"] . "</td>
				        <td class='jumlah'>" . $row["kuantitas"] . "</td>"
        ?>

            <td style="padding:0 2px 0 0;" class="action">
              <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
              <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;" data-toggle="modal" data-target="#add_data_Modal_ubah"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
            </td>

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

    $sql = "SELECT pp.id as id,pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id order by pp.id desc;";

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
#region Stok Opname
elseif ($xin == "stok-opname") {

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
            <th class="nama-barang-stok-opname">Nama Barang</th>
            <th class="tipe-barang-stok-opname">Tipe Barang</th>
            <th class="" style="width: 200px;">stok</th>
            <th class="status-stok-opname">Status</th>
            <th class="action-stok">aksi</th>
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
                          <td class='nama-barang-stok-opname'>" . $row["nama"] . "</td>
                          <td class='tipe-barang-stok-opname'>" . $row["tipe_barang"] . "</td>
                          <td class='stok-opname'>" . $row["stok"] . "</td>
                          <td class='status-stok-opname'>" . $row["status"] . "</td>"
        ?>

            <td style="padding:0 2px 0 0;" class="action-stok">
              <!-- <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button> -->
              <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
            </td>

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

    $sql = "SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id;";

    if ($sort_by == 'default') {
      if ($row != "All") {
        $sql = " SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%' LIMIT $row";
      }
    }
    // A-Z
    elseif ($sort_by == 'A-Z') {
      $sql = "SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id order by nama ASC";
      if ($row != "All") {
        $sql = " SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%' LIMIT $row";
      }
    }
    // Z-A
    elseif ($sort_by == 'Z-A') {
      $sql = "SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id order by nama DESC";
      if ($row != "All") {
        $sql = " SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%' LIMIT $row";
      }
    }
    //1-100
    elseif ($sort_by == '1-100') {
      $sql = "SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id order by id ASC";
      if ($row != "All") {
        $sql = " SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%' LIMIT $row";
      }
    } elseif ($sort_by == '100-1') {
      $sql = "SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id order by id DESC";
      if ($row != "All") {
        $sql = " SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%' LIMIT $row";
      }
    } elseif ($sort_by == 'aktif') {
      $sql = "SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE status ='aktif';";
      if ($row != "All") {
        $sql = " SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%' LIMIT $row";
      }
    } else {
      $sql = "SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE status ='tidak aktif'";
      if ($row != "All") {
        $sql = " SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%' LIMIT $row";
      }
    }
    showdata($sql);
  } else {
    $sql = "SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%'";
    if ($row != "All") {
      $sql = " SELECT mb.id as id,mb.nama as nama,tb.nama as tipe_barang,mb.stock as stok,mb.status as status FROM master_barang as mb inner join tipe_barang as tb on tb.id = mb.tipe_barang_id WHERE mb.nama LIKE '%$inp%' or mb.id LIKE '%$inp%' LIMIT $row";
    }
    showdata($sql);
  }
}
#endregion
#region transaksi pembelian
elseif ($xin == "transaksi-pembelian") {
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
            <th class="id_barang">id barang</th>
            <th class="nama-supplier">Nama supplier</th>
            <th class="waktu_pembelian">Waktu Pembelian</th>
            <th class="harga">Harga</th>
            <th class="jenis_pembayaran">Jenis Pembayaran</th>
            <th class="status_terkirim">Status Kirim</th>
            <th class="action">aksi</th>
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
				        <td class='id_barang'>" . $row["id_barang"] . "</td>
				        <td class='nama-supplier'>" . $row["nama_supplier"] . "</td>
				        <td class='waktu_pembelian'>" . $row["waktu_pembelian"] . "</td>
                <td class='harga'>" . $row["harga_total"] . "</td>
                <td class='jenis_pembayaran'>" . $row["jenis_pembayaran"] . "</td>
                <td class='status_terkirim'>" . $row["status_terkirim"] . "</td>"
        ?>

            <td style="padding:0 2px 0 0;" class="action">
              <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
              <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;" data-toggle="modal" data-target="#add_data_Modal_ubah"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
            </td>

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

    $sql = "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
    as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
    on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id;";

    if ($sort_by == 'default') {
      if ($row != "All") {
        $sql = "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
        as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
        on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id LIMIT $row;";
      }
    }
    // A-Z
    elseif ($sort_by == 'A-Z') {
      $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id ORDER BY nama_supplier ASC;";
      if ($row != "All") {
        $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id ORDER BY nama_supplier ASC LIMIT $row;";
      }
    }
    // Z-A
    elseif ($sort_by == 'Z-A') {
      $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id ORDER BY nama_supplier DESC;";
      if ($row != "All") {
        $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id ORDER BY nama_supplier DESC LIMIT $row;";
      }
    }
    //1-100
    elseif ($sort_by == '1-100') {
      $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id ORDER BY id ASC;";
      if ($row != "All") {
        $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id ORDER BY id ASC LIMIT $row;";
      }
    } elseif ($sort_by == '100-1') {
      $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id ORDER BY id DESC;";
      if ($row != "All") {
        $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id ORDER BY id DESC LIMIT $row;";
      }
    } elseif ($sort_by == "tanggal") {
      $tanggal_mulai = $_POST["mulai"];
      $tanggal_selesai = $_POST["selesai"];

      $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
      as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
      on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id where ps.waktu_pembelian BETWEEN '$tanggal_mulai' and '$tanggal_selesai' ORDER BY id DESC;";
      if ($row != "All") {
        $sql =  "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
        as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
        on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id where ps.waktu_pembelian BETWEEN '$tanggal_mulai' and '$tanggal_selesai' limit $row;";
      }
    }
    showdata($sql);
  } else {
    $sql = "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
    as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
    on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id WHERE ms.nama LIKE '%$inp%' or ps.id LIKE '%$inp%' or ps.master_barang_id LIKE '%$inp%'";
    if ($row != "All") {
      $sql = "SELECT ps.id as id,ps.master_barang_id as id_barang,ms.nama as nama_supplier,ps.waktu_pembelian,ps.harga_total,tp.nama 
    as jenis_pembayaran,ps.status_terkirim From pembelian_supplier as ps inner join master_supplier as ms 
    on ps.master_supplier_id =ms.id inner join tipe_pembayaran as tp on ps.tipe_pembayaran_id=tp.id WHERE ms.nama LIKE '%$inp%' or ps.id LIKE '%$inp%' or ps.master_barang_id LIKE '%$inp%' LIMIT $row";
    }
    showdata($sql);
  }
}
#endregion
#region retur penjualan
elseif ($xin == "retur") {
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
            <th class="">tanggal</th>
            <th class="">supplier id</th>
            <th class="">keterangan</th>
            <th class="action">note</th>
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
				        <td class=''>" . $row["tanggal"] . "</td>
				        <td class=''>" . $row["pembelian_supplier_id"] . "</td>
                <td class=''>" . $row["notes"] . "</td>"
        ?>

            <td style="padding:0 2px 0 0;" class="action">
              <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
              <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'data-toggle="modal" data-target="#add_data_Modal_ubah"></span></button>
            </td>

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

    $sql = "SELECT * FROM restorandb.retur_pembelian;";

    if ($sort_by == 'default') {
      if ($row != "All") {
        $sql = "SELECT * FROM restorandb.retur_pembelian LIMIT $row;";
      }
    }
    
    //1-100
    elseif ($sort_by == '1-100') {
      $sql =  "SELECT * FROM restorandb.retur_pembelian ORDER BY id ASC;";
      if ($row != "All") {
        $sql =  "SELECT * FROM restorandb.retur_pembelian ORDER BY id ASC LIMIT $row;";
      }
    } elseif ($sort_by == '100-1') {
      $sql =  "SELECT * FROM restorandb.retur_pembelian ORDER BY id DESC;";
      if ($row != "All") {
        $sql =  "SELECT * FROM restorandb.retur_pembelian ORDER BY id DESC LIMIT $row;";
      }
    } elseif ($sort_by == "tanggal") {
      $tanggal_mulai = $_POST["mulai"];
      $tanggal_selesai = $_POST["selesai"];

      $sql =  "SELECT * FROM restorandb.retur_pembelian where tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai';";
      if ($row != "All") {
        $sql =  "SELECT * FROM restorandb.retur_pembelian where tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai' limit $row;";
      }
    }
    showdata($sql);
  } else {
    $sql = "SELECT * FROM restorandb.retur_pembelian WHERE id LIKE '%$inp%' or pembelian_supplier_id LIKE '%$inp%'";
    if ($row != "All") {
      $sql = "SELECT * FROM restorandb.retur_pembelian WHERE id LIKE '%$inp%' or pembelian_supplier_id LIKE '%$inp%' LIMIT $row";
    }
    showdata($sql);
  }
}
#endregion

//FUNGTION

#region Proses Produksi

elseif($xin =="cari-barang"){
 $sql ="SELECT * FROM master_menu";
 $result= mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
   while($row = $result->fetch_assoc()){
     ?>
     <option value="<?php echo($row['id'])?>"> <?php echo($row['nama']) ?> </option>
     <?php
   }
 }
}
elseif($xin =="ubah-data"){
  $id_produksi =$_POST["id"];
  $sql_ubah= "SELECT pp.tanggal as tanggal,mm.nama as nama,pp.kuantitas as kuantitas from proses_produksi as pp inner join master_menu as mm on mm.id = pp.master_menu_id WHERE pp.id =$id_produksi;";
  $result=mysqli_query($conn,$sql_ubah);
  if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()){
      echo json_encode(array(
      "tanggal" => $row['tanggal'],
      "nama_produk" => $row['nama'],
      "kuantitas" => $row['kuantitas']
    ));
    }

  }
}
#endregion

#region transaksi pembelian
elseif($xin =="cari-barang-pembelian"){
  $sql ="SELECT * FROM master_barang";
  $result= mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()){
      ?>
      <option value="<?php echo($row['id'])?>"> <?php echo($row['nama']) ?> </option>
      <?php
    }
  }
 }

 elseif($xin =="cari-supplier"){
  $sql ="SELECT * FROM master_supplier";
  $result= mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()){
      ?>
      <option value="<?php echo($row['id'])?>"> <?php echo($row['nama']) ?> </option>
      <?php
    }
  }
 }

 elseif($xin =="cari-jenis-pembayaran"){
  $sql ="SELECT * FROM jenis_pembayaran";
  $result= mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()){
      ?>
      <option value="<?php echo($row['id'])?>"> <?php echo($row['nama']) ?> </option>
      <?php
    }
  }
 }
#endregion

?>