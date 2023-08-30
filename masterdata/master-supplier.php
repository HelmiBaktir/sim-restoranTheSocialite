<?php
session_start();
if (!isset($_SESSION["nama"])) {
  header("Location: ../metode/login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/master-supplier.css">
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="../js/jquery-3.5.1.min.js"></script>

  <!-- ICON -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- ------ -->
  <!-- ALERT ADD DATA -->
  <!-- ------ -->
  <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Tambah Supplier</h4>
        </div>
        <div class="modal-body" style="margin-top: 10px;">
          <!-- NAMA SUPPLIER -->
          <form class="form-inline">
            <div class="form-group">
              <label for="nama-Supplier" style="width: 140px;text-align: right;">Nama Supplier : </label>
              <input type="text" class="form-control" id="nama-Supplier" placeholder="Masukkan nama barang di sini" style="width: 350px; margin-left:10px;">
            </div>
            <!-- NO TELEPON -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="no-tlp" style="width: 140px;text-align: right;">No Telepon : </label>
              <div class="input-group" style="width: 350px; margin-left:10px;">
                <div class="input-group-addon">+62</div>
                <input type="text" class="form-control" id="no-tlp" placeholder="No Telepon">
              </div>
            </div>
            <!-- STATUS SUPPLIER-->
            <div class="form-group" style="margin-top: 10px;">
              <label for="status-supplier" style="width: 140px;text-align: right;">Status : </label>
              <select name="status-supplier" id="status-supplier" class="form-control" style="width: 350px; margin-left:10px;">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
            <!-- ALAMAT -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="alamat" style="width: 140px;text-align: right;">Alamat : </label>
              <textarea type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" style="width: 350px; margin-left:10px;"></textarea>
            </div>
          </form>
        </div>

        <!-- FOOTER -->
        <div class="modal-footer">
          <input type="submit" name="insert" id="insert" value="Tambah Supplier" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F5F6FA;">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ------ -->
  <!-- ALERT UBAH DATA -->
  <!-- ------ -->
  <div id="add_data_Modal_ubah" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Ubah Supplier</h4>
        </div>
        <div class="modal-body" style="margin-top: 10px;">
          <!-- NAMA SUPPLIER -->
          <form class="form-inline">
            <div class="form-group">
              <label for="nama-Supplier" style="width: 140px;text-align: right;">Nama Supplier : </label>
              <input type="text" class="form-control" id="nama-Supplier-ubah" placeholder="Masukkan nama barang di sini" style="width: 350px; margin-left:10px;">
            </div>
            <!-- NO TELEPON -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="no-tlp" style="width: 140px;text-align: right;">No Telepon : </label>
              <div class="input-group" style="width: 350px; margin-left:10px;">
                <div class="input-group-addon">+62</div>
                <input type="text" class="form-control" id="no-tlp-ubah" placeholder="No Telepon">
              </div>
            </div>
            <!-- STATUS SUPPLIER-->
            <div class="form-group" style="margin-top: 10px;">
              <label for="status-supplier" style="width: 140px;text-align: right;">Status : </label>
              <select name="status-supplier" id="status-supplier-ubah" class="form-control" style="width: 350px; margin-left:10px;">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
            <!-- ALAMAT -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="alamat-supplier" style="width: 140px;text-align: right;">Alamat : </label>
              <textarea type="text" class="form-control" id="alamat-supplier-ubah" placeholder="Masukkan Alamat" style="width: 350px; margin-left:10px;"></textarea>
            </div>
          </form>
        </div>

        <!-- FOOTER -->
        <div class="modal-footer">
          <input type="submit" name="ubah" id="ubah" value="Ubah Supplier" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F5F6FA;">Batal</button>
        </div>
      </div>
    </div>
  </div>


  <!-- SIDE BAR -->
  <div id="mySidenav" class="sidenav">
    <img src="../img/Logo.png">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!-- Halaman Utama -->
    <a href="../halaman-utama.php">
      <i class="iconify" data-icon="fluent:home-24-regular" style="color: #807e92;" data-width="20" data-height="20"></i>
      Halaman Utama</a>
    <!-- Halaman Master Menu -->
    <a href="../masterdata/master-menu.php"> <span class="iconify" data-icon="bx:food-menu" style="color: #807e92;" data-width="20" data-height="20"></span>
      Master Menu</a>
    <!-- Master Barang -->
    <a href="../masterdata/master-barang.php"><span class="iconify" data-icon="bx:food-menu" style="color: #807e92;" data-width="20" data-height="20"></span>
      Master Barang</a>
    <!-- Master Master Resep Menu -->
    <a href="../masterdata/master-reseo-menu.php"><span class="iconify" data-icon="ic:twotone-menu-book" style="color: #807e92;" data-width="20" data-height="20"></span>
      Master Resep Menu</a>
    <!-- Master Supplier -->
    <a href="../masterdata/master-supplier.php"><span class="iconify" data-icon="raphael:customer" style="color: #807e92;" data-width="20" data-height="20"></span>
      Master Supplier</a>
    <!-- Master Satuan -->
    <a href="../masterdata/master-satuan.php"><span class="iconify" data-icon="clarity:settings-solid-alerted" style="color: #807e92;" data-width="20" data-height="20"></span>
      Master Satuan</a>
    <!-- Master Tipe Pembayaran -->
    <a href="../masterdata/tipe-pembayaran.php"><span class="iconify" data-icon="fluent:payment-16-filled" style="color: #807e92;" data-width="20" data-height="20"></span>
      Master Tipe Pembayaran</a>
  </div>

  <!-- MENU UTAMA -->
  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <h2>Master Supplier</h2>


    <!-- HEADER TABLE -->
    <div class="header-table">

      <!-- TEXT BOX ROW -->
      <label for="row">tampilkan</label>
      <select name="row" id="row-table" class="row-table">
        <option value="All">Semua</option>
        <option value="100">100</option>
        <option value="50">50</option>
        <option value="15">15</option>
        <option value="5">5</option>
      </select>

      <!-- TXT CARI DATA -->
      <input class="nosubmit" type="search" id="Txtcari" placeholder="Cari...">

      <!-- URUTKAN BERDASARKAN -->
      <select name="row" id="sort-by" class="sort-by">
        <option value="default">Sesuai Sistem</option>
        <option value="A-Z">A-Z</option>
        <option value="Z-A">Z-A</option>
        <option value="1-100">1-100</option>
        <option value="100-1">100-1</option>
        <option value="aktif">Aktif</option>
        <option value="tidak-aktif">Tidak Aktif</option>
      </select>

      <!-- BTN TAMBAH DATA -->
      <input type="submit" onclick="tambahData()" value="+ Tambah Data" class="tambah-data" id="tambah-data" data-toggle="modal" data-target="#add_data_Modal">
    </div>

    <!-- TABLE -->
    <div id="data-from-ajax">

    </div>

  </div>

  <!-- OPEN SIDE BAR -->
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "270px";
      document.getElementById("main").style.marginLeft = "250px";
    }
    // CLOSE SIDEBAR
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
      document.body.style.backgroundColor = "white";
    }
  </script>

  <!-- JS AJAX SELECT TABLE-->
  <script>
    $(document).ready(function() {

      // JIKA DATA KOSONG
      if ($("#Txtcari").val() == '' && document.getElementById('row-table').value == "All") {
        $.post("../ajax/master_data_ajax.php", {
          val: 'master_supplier',
          inp: "",
          row: "All",
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#data-from-ajax").html(data);
        })

      }

      //jika tombol cari
      $("#Txtcari").keyup(function() {
        var input = $("#Txtcari").val();

        $.post("../ajax/master_data_ajax.php", {
          val: 'master_supplier',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#data-from-ajax").html(data);
        })
      })

      //combobox tampilkan row
      $("#row-table").change(function() {
        var input = $("#Txtcari").val();

        $.post("../ajax/master_data_ajax.php", {
          val: 'master_supplier',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#data-from-ajax").html(data);
        })
      })

      //combobox sort by
      $("#sort-by").change(function() {
        var input = $("#Txtcari").val();

        $.post("../ajax/master_data_ajax.php", {
          val: 'master_supplier',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#data-from-ajax").html(data);
        })
      })


    })
  </script>

  <!-- ACTION SCRYPT -->
  <script>
    // UBAH SUPPLIER
    function ubah($id) {
      $('#add_data_Modal_ubah').modal('toggle')

      // TAMBAH DATA DI ALERT
      $.post("../ajax/master_data_ajax.php", {
        val: 'ubah-supplier',
        inp: "",
        row: "All",
        sort_by: $("#sort-by").val(),
        id: $id
      }).done(function(data) {
        var jdata = $.parseJSON(data)
          $("#nama-Supplier-ubah").val(jdata.nama_supplier);
          $("#no-tlp-ubah").val(jdata.no_telp);
          $("#status-supplier-ubah").val(jdata.status);
          $("#alamat-supplier-ubah").val(jdata.alamat);
      });

      $("#ubah").click(function(){
      // UBAH DI ALERT
      $.post("../ajax/tambah_ubah_data_ajax.php", {
          title: 'ubah-supplier',
          nama: $("#nama-Supplier-ubah").val(),
          no_telp: $("#no-tlp-ubah").val(),
          alamat_supplier: $("#alamat-supplier-ubah").val(),
          status_supplier: $("#status-supplier-ubah").val(),
          id: $id,
        }).done(function(data) {
          $.post("../ajax/master_data_ajax.php", {
            val: 'master_supplier',
            inp: "",
            row: "All",
            sort_by: $("#sort-by").val()
          }).done(function(data) {
            $("#data-from-ajax").html(data);
          })
        })

      })
    }

    function hapus($id) {

      if (confirm("apa kamu yakin akan menghapus menu dengan ID : " + $id)) {
        $.post("../ajax/hapus_data_ajax.php", {
          val: 'master_supplier',
          id: $id
        }).done(function(data) {
          if (data == "berhasil") {
            $.post("../ajax/master_data_ajax.php", {
              val: 'master_supplier',
              inp: "",
              row: "All",
              sort_by: $("#sort-by").val()
            }).done(function(data) {
              $("#data-from-ajax").html(data);
            })
          }
        })
      }
    }
  </script>
  <!-- ----------- -->
  <!-- TAMBAH DATA -->
  <!-- ----------- -->

  <script>
    function tambahData() {
      $("#insert").click(function() {
        $.post("../ajax/tambah_ubah_data_ajax.php", {
          title: 'tambah-suppier',
          nama: $("#nama-Supplier").val(),
          no_telp: $("#no-tlp").val(),
          alamat_supplier: $("#alamat").val(),
          status_supplier: $("#status-supplier").val()
        }).done(function(data) {
          alert(data);
          $.post("../ajax/master_data_ajax.php", {
            val: 'master_supplier',
            inp: "",
            row: "All",
            sort_by: $("#sort-by").val()
          }).done(function(data) {
            $("#data-from-ajax").html(data);
          })
        })
      })
    }
  </script>

</body>

</html>