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
#region Master Menu
if ($xin == "master_menu") {

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
            <th class="nama-menu">Nama Menu</th>
            <th class="tipe-menu">Tipe Menu</th>
            <th class="stock">Stok</th>
            <th class="harga-jual">Harga Jual (Rp)</th>
            <th class="deskripsi-menu">Deskripsi Menu</th>
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
				        <td class='nama-menu'>" . $row["nama"] . "</td>
				        <td class='tipe-menu'>" . $row["tipe_menu_id"] . "</td>
				        <td class='stock'>" . $row["stock"] . "</td>
				        <td class='harga-jual'>" . rupiah($row['harga_jual']) . "</td>
                <td class='deskripsi-menu'>" . $row["deskripsi_menu"] . "</td>"
        ?>

            <td style="padding:0 2px 0 0;" class="action">
              <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
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

    $sql = "SELECT * FROM master_menu";

    if ($sort_by == 'default') {
      if ($row != "All") {
        $sql = "SELECT * FROM master_menu LIMIT $row ";
      }
    }
    // A-Z
    elseif ($sort_by == 'A-Z') {
      $sql = "SELECT * FROM master_menu order by nama ASC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_menu order by nama ASC LIMIT $row ";
      }
    }
    // Z-A
    elseif ($sort_by == 'Z-A') {
      $sql = "SELECT * FROM master_menu order by nama DESC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_menu order by nama DESC LIMIT $row ";
      }
    }
    //1-100
    elseif ($sort_by == '1-100') {
      $sql = "SELECT * FROM master_menu order by id ASC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_menu order by id ASC LIMIT $row ";
      }
    } elseif ($sort_by == '100-1') {
      $sql = "SELECT * FROM master_menu order by id DESC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_menu order by id DESC LIMIT $row ";
      }
    } elseif ($sort_by == 'aktif') {
      $sql = "SELECT * FROM master_menu order by harga_jual ASC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_menu order by harga_jual ASC LIMIT $row ";
      }
    } else {
      $sql = "SELECT * FROM master_menu order by harga_jual DESC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_menu order by harga_jual DESC LIMIT $row ";
      }
    }
    showdata($sql);
  } else {
    $sql = " SELECT * FROM master_menu WHERE nama LIKE '%$inp%' or id LIKE '%$inp%'";
    if ($row != "All") {
      $sql = " SELECT * FROM master_menu WHERE nama LIKE '%$inp%' or id LIKE '%$inp%' LIMIT $row";
    }
    showdata($sql);
  }
}
#endregion

#region Master Barang
elseif ($xin == "master_barang") {

  // FUNCTION

  function showdata($sql)
  {
  ?>
    <div class="table-container">
      <table class="styled-table">
        <!-- THEAD -->
        <thead>

          <tr>
            <th class="id" style="width:60px;">#</th>
            <th class="nama-barang">Nama Barang</th>
            <th class="tipe-barang">Tipe Barang</th>
            <th class="kategori">Kategori</th>
            <th class="Stock">Stok</th>
            <th class="Stock-minimum">Stok Minimal</th>
            <th class="status">Status</th>
            <th class="action" colspan="2" style="width:100px;"> aksi</th>
          </tr>

        </thead>
        <?php
        include '../metode/koneksi.php';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td class='id' style='width:60px;'>" . $row["id"] . "</td>
				        <td class='nama-barang'>" . $row["nama"] . "</td>
				        <td class='tipe-barang'>" . $row["tipe_barang"] . "</td>
				        <td class='kategori'>" . $row["kategori_barang"] . "</td>
				        <td class='Stock'>" . $row["stock"] . ' ' . $row["satuan"] . "</td>
                <td class='Stock-minimum'>" . $row["stock_minimum"] . ' ' . $row["satuan"] . "</td>
                <td class='status'>" . $row["status"] . "</td>"
        ?>
            <td style="padding:0 2px 0 0; width: 52px;" ;><button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button></td>
            <td style="padding:0 0 0 2px;width: 52px;"><button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button></td>

        <?php
            "</td>

		        </tr>";
          }
        }
        ?>
        </tbody>
      </table>
    </div>
  <?php
  }
  // END FUNGTION

  if ($inp == "") {
    $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
      from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
      kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.id asc";

    if ($sort_by == 'default') {
      if ($row != "All") {
        $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
          from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
          kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.id asc LIMIT $row";
      }
    }
    // A-Z
    elseif ($sort_by == 'A-Z') {
      $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
      from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
      kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.nama asc";
      if ($row != "All") {
        $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
      from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
      kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.nama asc LIMIT $row";
      }
    }
    // Z-A
    elseif ($sort_by == 'Z-A') {
      $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
      from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
      kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.nama desc";
      if ($row != "All") {
        $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
      from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
      kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.nama desc limit $row";
      }
    }
    //1-100
    elseif ($sort_by == '1-100') {
      $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
      from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
      kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.id asc";
      if ($row != "All") {
        $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
          from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
          kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.id asc limit $row";
      }
    } elseif ($sort_by == '100-1') {
      $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
        from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
        kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.id desc ";
      if ($row != "All") {
        $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
          from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
          kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id order by mb.id desc limit $row";
      }
    } elseif ($sort_by == 'aktif') {
      $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
        from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
        kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id  where mb.status='aktif'";
      if ($row != "All") {
        $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
          from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
          kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id  where mb.status='aktif' limit $row";
      }
    } else {
      $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
        from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
        kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id  where mb.status='tidak aktif'";
      if ($row != "All") {
        $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
          from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
          kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id  where mb.status='tidak aktif' limit $row";
      }
    }


    showdata($sql);
  } else {
    $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
      from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
      kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id where mb.id LIKE '%$inp%' OR mb.nama LIKE '%$inp%'";
    if ($row != "All") {
      $sql = "SELECT mb.id,mb.nama as nama,tb.nama as tipe_barang,kb.nama as kategori_barang,mb.stock,mb.stock_minimum,mb.status,ms.nama as satuan
      from master_barang mb inner join tipe_barang as tb on mb.tipe_barang_id = tb.id inner join
      kategori_barang as kb on mb.kategori_barang_id = kb.id inner join master_satuan ms on mb.master_satuan_id = ms.id where mb.id LIKE '%$inp%' OR mb.nama LIKE '%$inp%' LIMIT $row";
    }
    showdata($sql);
  }
}
#endregion

#region Master Resep Menu
elseif ($xin == "master_resep") {
  function showdata($sql)
  {
  ?>
    <div class="table-container">
      <table class="styled-table">
        <!-- THEAD -->
        <thead>

          <tr>
            <th class="id">#</th>
            <th class="nama_produk">Nama Produk</th>
            <th class="nama_barang">Nama Barang</th>
            <th class="kuantitas">Kuantitas</th>
            <th class="action" style="width:50px;"> aksi</th>
          </tr>

        </thead>
        <tbody>
          <?php
          include '../metode/koneksi.php';
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {

          ?>
              <tr>
                <td rowspan="<?php echo ($row['jumlah']) ?>" class="id"><?php echo ($row["id"]) ?></td>
                <td rowspan="<?php echo ($row['jumlah']) ?>" class="nama_produk"><?php echo ($row["nama"]) ?></td>

                <?php
                $id = $row["id"];
                $sql2 = "SELECT mb.nama,rp.kuantitas_product as kuantitas from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id inner join master_barang as mb on mb.id = rp.master_barang_id where mm.id = $id;";
                $result2 = mysqli_query($conn, $sql2);
                $count = 1;
                while ($row2 = $result2->fetch_assoc()) {
                  if ($count == 1) {
                ?>
                    <td class="nama_barang"><?php echo ($row2["nama"]) ?></td>
                    <td class="kuantitas"><?php echo ($row2["kuantitas"]) ?></td>
                    <td style="padding:0 2px 0 0;" class="action" rowspan="<?php echo ($row['jumlah']) ?>">
                      <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;" data-toggle="modal" data-target="#add_data_Modal"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
                    </td>
                  <?php
                    $count += 1;
                  } else {
                  ?>
              <tr>
                <td class="nama_barang"><?php echo ($row2["nama"]) ?></td>
                <td class="kuantitas"><?php echo ($row2["kuantitas"]) ?></td>
              </tr>
          <?php
                  }
                }

          ?>
          </tr>
      <?php
            }
          }
      ?>
        </tbody>
      </table>
    </div>
  <?php
  }
  // END FUNGTION

  if ($inp == "") {
    $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id;";

    if ($sort_by == 'default') {
      if ($row != "All") {
        $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.id asc LIMIT $row";
      }
    }
    // A-Z
    elseif ($sort_by == 'A-Z') {
      $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.nama asc";
      if ($row != "All") {
        $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.nama asc LIMIT $row";
      }
    }
    // Z-A
    elseif ($sort_by == 'Z-A') {
      $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.nama desc";
      if ($row != "All") {
        $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.nama desc limit $row";
      }
    }
    //1-100
    elseif ($sort_by == '1-100') {
      $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.id asc";
      if ($row != "All") {
        $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.id asc limit $row";
      }
    } elseif ($sort_by == '100-1') {
      $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.id desc ";
      if ($row != "All") {
        $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id group by mm.id order by mm.id desc limit $row";
      }
    }


    showdata($sql);
  } else {
    $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id where mm.id LIKE '%$inp%' OR mm.nama LIKE '%$inp%' group by mm.id";
    if ($row != "All") {
      $sql = "SELECT mm.id as id,mm.nama,count(rp.id) as jumlah from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id where mm.id LIKE '%$inp%' OR mm.nama LIKE '%$inp%' group by mm.id LIMIT $row";
    }
    showdata($sql);
  }
}
#endregion

#region Master Supplier

if ($xin == "master_supplier") {

  function showdata($sql)
  {
  ?>
    <div class="table-container">
      <table class="styled-table">
        <!-- THEAD -->
        <thead>
          <tr>
            <th class="id">#</th>
            <th class="nama">Nama</th>
            <th class="alamat">Alamat</th>
            <th class="no-tlp">Nomor Telepon</th>
            <th class="status">Status</th>
            <th class="action " colspan="2"> aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../metode/koneksi.php';
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "
              <tr>
              <td class='id'>" . $row["id"] . "</td>
              <td class='nama'>" . $row["nama"] . "</td>
              <td class='alamat'>" . $row["alamat"] . "</td>
              <td class='no-tlp'>" . "(+62)" . $row["no_hp"] . "</td>
              <td class='status'>" . $row["status"] . "</td>"
          ?>

              <td style="padding:0 2px 0 0;" class="action">
                <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
                <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
              </td>

          <?php
              "</td></tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  <?php
  }

  if ($inp == "") {

    $sql = "SELECT * FROM master_supplier";

    if ($sort_by == 'default') {
      if ($row != "All") {
        $sql = "SELECT * FROM master_supplier LIMIT $row ";
      }
    }
    // A-Z
    elseif ($sort_by == 'A-Z') {
      $sql = "SELECT * FROM master_supplier order by nama ASC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_supplier order by nama ASC LIMIT $row ";
      }
    }
    // Z-A
    elseif ($sort_by == 'Z-A') {
      $sql = "SELECT * FROM master_supplier order by nama DESC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_supplier order by nama DESC LIMIT $row ";
      }
    }
    //1-100
    elseif ($sort_by == '1-100') {
      $sql = "SELECT * FROM master_supplier order by id ASC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_supplier order by id ASC LIMIT $row ";
      }
    } elseif ($sort_by == '100-1') {
      $sql = "SELECT * FROM master_supplier order by id DESC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_supplier order by id DESC LIMIT $row ";
      }
    } elseif ($sort_by == 'aktif') {
      $sql = "SELECT * FROM master_supplier WHERE status='aktif'";
      if ($row != "All") {
        $sql = "SELECT * FROM master_supplier WHERE status='aktif' LIMIT $row ";
      }
    } else {
      $sql = "SELECT * FROM master_supplier WHERE status='tidak aktif'";
      if ($row != "All") {
        $sql = "SELECT * FROM master_supplier WHERE status='tidak aktif' LIMIT $row ";
      }
    }
    showdata($sql);
  } else {
    $sql = " SELECT * FROM master_supplier WHERE nama LIKE '%$inp%' or id LIKE '%$inp%'";
    if ($row != "All") {
      $sql = " SELECT * FROM master_supplier WHERE nama LIKE '%$inp%' or id LIKE '%$inp%' LIMIT $row";
    }
    showdata($sql);
  }
}
#endregion

#region Master Satuan

elseif ($xin == "master-satuan") {

  // FUNCTION

  function showdata($sql)
  {
  ?>
    <div class="table-container">
      <table class="styled-table">
        <!-- THEAD -->
        <thead>

          <tr>
            <th class="id">#</th>
            <th class="nama">Nama</th>
            <th class="keterangan">Keterangan</th>
            <th class="status">Status</th>
            <th class="action">aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../metode/koneksi.php';
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "
              <tr>
                <td class='id'>" . $row["id"] . "</td>
                <td class='nama'>" . $row["nama"] . "</td>
                <td class='keterangan'>" . $row["keterangan"] . "</td>
                <td class='status'>" . $row["status"] . "</td>"
          ?>

              <td class="action">
                <button onclick=hapus(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px; height:40px;border-radius:10px; margin-right:2px;"><span class="iconify" data-icon="ep:delete" style="color: red;"></span></button>
                <button onclick=ubah(<?php echo ($row['id']) ?>) style="background: #EBF9F1; border:#2a1f41;width:50px;height:40px;border-radius:10px;"><span class='iconify' data-icon='akar-icons:edit' style='color: #2a1f41;'></span></button>
              </td>

          <?php
              "</td>
        
            </tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  <?php
  }

  if ($inp == "") {
    $sql = "SELECT * FROM master_satuan";

    if ($sort_by == 'default') {
      if ($row != "All") {
        $sql = "SELECT * FROM master_satuan LIMIT $row ";
      }
    }
    // A-Z
    elseif ($sort_by == 'A-Z') {
      $sql = "SELECT * FROM master_satuan  order by nama ASC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_satuan  order by nama ASC LIMIT $row ";
      }
    }
    // Z-A
    elseif ($sort_by == 'Z-A') {
      $sql = "SELECT * FROM master_satuan  order by nama DESC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_satuan  order by nama DESC LIMIT $row ";
      }
    }
    //1-100
    elseif ($sort_by == '1-100') {
      $sql = "SELECT * FROM master_satuan  order by id ASC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_satuan  order by id ASC LIMIT $row ";
      }
    } elseif ($sort_by == '100-1') {
      $sql = "SELECT * FROM master_satuan  order by id DESC";
      if ($row != "All") {
        $sql = "SELECT * FROM master_satuan  order by id DESC LIMIT $row ";
      }
    } elseif ($sort_by == 'aktif') {
      $sql = "SELECT * FROM master_satuan  where status ='aktif'";
      if ($row != "All") {
        $sql = "SELECT * FROM master_satuan  where status ='aktif' order by id DESC LIMIT $row ";
      }
    } else {
      $sql = "SELECT * FROM master_satuan  where status ='tidak aktif'";
      if ($row != "All") {
        $sql = "SELECT * FROM master_satuan  where status ='tidak aktif' order by id DESC LIMIT $row ";
      }
    }


    showdata($sql);
  } else {
    $sql = " SELECT * FROM master_satuan WHERE nama LIKE '%$inp%' or id LIKE '%$inp%'";
    if ($row != "All") {
      $sql = " SELECT * FROM master_satuan WHERE nama LIKE '%$inp%' or id LIKE '%$inp%' LIMIT $row";
    }
    showdata($sql);
  }
}
#endregion 

#region Tipe Pembayaran
if ($xin == "tipe_pembayaran") {
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
            <th class="">Nama</th>
            <th class="">Rekening</th>
            <th class="">Keterangan</th>
            <th class="">Status</th>
            <th class="">Jenis</th>
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
				        <td class=''>" . $row["nama"] . "</td>
				        <td class=''>" . $row["rekening"] . "</td>
				        <td class=''>" . $row["keterangan"] . "</td>
                <td class=''>" . $row["status"] . "</td>
                <td class=''>" . $row["jenis"] . "</td>"
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

    $sql = "SELECT tp.*,jp.nama as jenis from tipe_pembayaran as tp inner join jenis_pembayaran as jp on jp.id =tp.jenis_pembayaran_id;";

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

//FUNGTION

#region Tipe Menu

elseif ($xin == "tambah-menu") {
  $sql = "SELECT * FROM tipe_menu";
  $resault = mysqli_query($conn, $sql);
  if (mysqli_num_rows($resault) > 0) {
    while ($row = $resault->fetch_assoc()) {
    ?>
      <option value="<?php echo ($row['id']) ?>"><?php echo ($row['nama']) ?></option>
    <?php
    }
  }
} elseif ($xin == "ubah-menu") {
  $id = $_POST['id_menu'];
  $sql = "SELECT * FROM master_menu where id=$id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {

      echo json_encode(array(
        "nama" => $row['nama'],
        "tipe_menu" => $row['tipe_menu_id'],
        "stok" => $row['stock'],
        "harga_jual" => $row['harga_jual'],
        "status" => $row['status'],
        "deskripsi" => $row['deskripsi_menu']
      ));
    }
  }
}
#endregion

#region master barang

// tipe barang
elseif ($xin == "tambah-barang-tipebarang") {
  $sql = "SELECT * FROM tipe_barang";
  $resault = mysqli_query($conn, $sql);
  if (mysqli_num_rows($resault) > 0) {
    while ($row = $resault->fetch_assoc()) {
    ?>
      <option value="<?php echo ($row['id']) ?>"><?php echo ($row['nama']) ?></option>
    <?php
    }
  }
}

//kategori
elseif ($xin == "tambah-barang-kategori") {
  $sql = "SELECT * FROM kategori_barang";
  $resault = mysqli_query($conn, $sql);
  if (mysqli_num_rows($resault) > 0) {
    while ($row = $resault->fetch_assoc()) {
    ?>
      <option value="<?php echo ($row['id']) ?>"><?php echo ($row['nama']) ?></option>
    <?php
    }
  }
}

//satuang
elseif ($xin == "tambah-barang-satuan") {
  $sql = "SELECT * FROM master_satuan";
  $resault = mysqli_query($conn, $sql);
  if (mysqli_num_rows($resault) > 0) {
    while ($row = $resault->fetch_assoc()) {
    ?>
      <option value="<?php echo ($row['id']) ?>"><?php echo ($row['nama']) ?></option>
    <?php
    }
  }
}

//UBAH BARANG
elseif ($xin == "ubah-barang") {
  $id_barang = $_POST['id'];
  $sql_ubah_barang = "SELECT * FROM master_barang WHERE id=$id_barang";
  $result = mysqli_query($conn, $sql_ubah_barang);
  if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
      echo json_encode(array(
        "nama_barang" => $row['nama'],
        "tipe_barang" => $row['tipe_barang_id'],
        "kategori" => $row['kategori_barang_id'],
        "stok" => $row['stock'],
        "stok_minimum" => $row['stock_minimum'],
        "satuan" => $row['master_satuan_id'],
        "status" => $row['status']
      ));
    }
  }
}
#endregion

#region master supplier
elseif ($xin == "ubah-supplier") {
  $id_supplier = $_POST['id'];
  $sql_ubah_supplier = "SELECT * FROM master_supplier WHERE id=$id_supplier";
  $result = mysqli_query($conn, $sql_ubah_supplier);
  if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
      echo json_encode(array(
        "nama_supplier" => $row['nama'],
        "no_telp" => $row['no_hp'],
        "alamat" => $row['alamat'],
        "status" => $row['status']
      ));
    }
  }
}
#endregion

#region master satuan
elseif ($xin == "ubah-satuan") {
  $id_satuan = $_POST['id'];
  $sql_ubah_satuan = "SELECT * FROM master_satuan WHERE id=$id_satuan";
  $result = mysqli_query($conn, $sql_ubah_satuan);
  if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
      echo json_encode(array(
        "nama_satuan" => $row['nama'],
        "keterangan" => $row['keterangan'],
        "status" => $row['status']
      ));
    }
  }
}
#endregion

#region Cari satuan
elseif ($xin == "cari-satuan") {
  $id_barang_satuan = $_POST['id'];
  $sql_cari_satuan = "SELECT ms.nama from master_satuan as ms inner join master_barang mb on mb.master_satuan_id = ms.id where mb.id = $id_barang_satuan;";
  $result = mysqli_query($conn, $sql_cari_satuan);
  if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
      echo ($row["nama"]);
    }
  }
}
#endregion

#region Cari resep
elseif ($xin == 'cari-resep') {
  $id_resep_menu = $_POST['id'];
  $sql_cari_resep = "SELECT rp.id,mb.nama,rp.kuantitas_product as kuantitas from master_menu as mm inner join resep_produksi as rp on mm.id = rp.master_menu_id inner join master_barang as mb on mb.id = rp.master_barang_id where mm.id = $id_resep_menu;";
  $result_resep = mysqli_query($conn, $sql_cari_resep);
  if (mysqli_num_rows($result_resep) > 0) {
    while ($row = $result_resep->fetch_assoc()) {
    ?>
      <tr>
        <td ><?php echo ($row["nama"]) ?></td>
        <td ><?php echo ($row["kuantitas"]) ?></td>

        <td><button onclick=hapus_list(<?php echo ($row['id']) ?>) style="background: none; border:none;"><span class="iconify" data-icon="ant-design:delete-filled" style="color: #2a1f41;" data-width="20" data-height="20"></span></button></td>
      </tr>
<?php
    }
  }
}
#endregion
?>