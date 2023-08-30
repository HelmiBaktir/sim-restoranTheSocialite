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
  <link rel="stylesheet" href="../css/master-satuan.css">
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
          <h4 class="modal-title" style="text-align: center;">Tambah Satuan</h4>
        </div>
        <div class="modal-body" style="margin-top: 10px;">
          <!-- NAMA BARANG -->
          <form class="form-inline">
            <div class="form-group">
              <label for="nama-satuan" style="width: 140px;text-align: right;">Nama Satuan : </label>
              <input type="text" class="form-control" id="nama-satuan" placeholder="Masukkan nama barang di sini" style="width: 350px; margin-left:10px;">
            </div>
            <!-- STATUS -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="status-satuan" style="width: 140px;text-align: right;">Status : </label>
              <select name="status-satuan" id="status-satuan" class="form-control" style="width: 350px; margin-left:10px;">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
            <!-- KETERANGAN -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="keterangan-satuan" style="width: 140px;text-align: right;">keterangan : </label>
              <textarea name="keterangan-satuan" id="keterangan-satuan" class="form-control" style="width: 350px; margin-left:10px;"></textarea>
            </div>

          </form>
        </div>

        <!-- FOOTER -->
        <div class="modal-footer">
          <input type="submit" name="insert" id="insert" value="Tambah Satuan" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F5F6FA;">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ------ -->
  <!-- ALERT ADD UBAH -->
  <!-- ------ -->

  <div id="add_data_Modal_ubah" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Ubah Satuan</h4>
        </div>
        <div class="modal-body" style="margin-top: 10px;">
          <!-- NAMA BARANG -->
          <form class="form-inline">
            <div class="form-group">
              <label for="nama-satuan" style="width: 140px;text-align: right;">Nama Satuan : </label>
              <input type="text" class="form-control" id="nama-satuan-ubah" placeholder="Masukkan nama barang di sini" style="width: 350px; margin-left:10px;">
            </div>
            <!-- STATUS -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="status-satuan" style="width: 140px;text-align: right;">Status : </label>
              <select name="status-satuan" id="status-satuan-ubah" class="form-control" style="width: 350px; margin-left:10px;">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
            <!-- KETERANGAN -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="keterangan-satuan" style="width: 140px;text-align: right;">keterangan : </label>
              <textarea name="keterangan-satuan" id="keterangan-satuan-ubah" class="form-control" style="width: 350px; margin-left:10px;"></textarea>
            </div>

          </form>
        </div>

        <!-- FOOTER -->
        <div class="modal-footer">
          <input type="submit" name="ubah" id="ubah" value="Ubah Satuan" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F5F6FA;">Batal</button>
        </div>
      </div>
    </div>
  </div>

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

  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <h2>Master Satuan</h2>


    <!-- HEADER TABLE -->
    <div class="header-table">

      <!-- TEXT BOX ROW -->
      <label for="row">tampilkan</label>
      <select name="row" id="row-table" class="row-table">
        <option value="All">Semua</option>
        <option value="50">50</option>
        <option value="25">25</option>
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

    <div id="data-from-ajax">

    </div>

  </div>


  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "270px";
      document.getElementById("main").style.marginLeft = "250px";
    }

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
          val: 'master-satuan',
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
          val: 'master-satuan',
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
          val: 'master-satuan',
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
          val: 'master-satuan',
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
    function dropdown($id) {
      document.getElementById("myDropdown" + $id).classList.toggle("show");

      setTimeout(end, 1000);

      function end() {
        document.getElementById("myDropdown" + $id).classList.toggle("close");
      }
    }

    function ubah($id) {
      $('#add_data_Modal_ubah').modal('toggle');

      // TAMBAH DATA KE FORM
      $.post("../ajax/master_data_ajax.php", {
        val: 'ubah-satuan',
        inp: "",
        row: "All",
        sort_by: $("#sort-by").val(),
        id: $id
      }).done(function(data) {
        var jdata = $.parseJSON(data)
        $("#nama-satuan-ubah").val(jdata.nama_satuan);
        $("#status-satuan-ubah").val(jdata.status);
        $("#keterangan-satuan-ubah").val(jdata.keterangan);
      })

      //Tmbol Ubah
      $("#ubah").click(function(){
      $.post("../ajax/tambah_ubah_data_ajax.php", {
        title: "ubah-satuan",
        nama_satuan: $("#nama-satuan-ubah").val(),
        status_satuan: $("#status-satuan-ubah").val(),
        keterangan_satuan: $("#keterangan-satuan-ubah").val(),
        id:$id
      }).done(function(data) {

        if (data == "sukses") {
          //SHOW TABLE
          $.post("../ajax/master_data_ajax.php", {
            val: 'master-satuan',
            inp: "",
            row: "All",
            sort_by: $("#sort-by").val()
          }).done(function(data) {
            $("#data-from-ajax").html(data);
          })
        }
        else{
          alert(data);
        }

      })
    })
    }

    function hapus($id) {

      if (confirm("apa kamu yakin akan menghapus menu dengan ID : " + $id)) {
        $.post("../ajax/hapus_data_ajax.php", {
          val: 'master_satuan',
          id: $id
        }).done(function(data) {
          if (data == "berhasil") {
          //SHOW TABLE
          $.post("../ajax/master_data_ajax.php", {
            val: 'master-satuan',
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
  <script>
    $("#insert").click(function() {
      $.post("../ajax/tambah_ubah_data_ajax.php", {
        title: "tambah-satuan",
        nama_satuan: $("#nama-satuan").val(),
        status_satuan: $("#status-satuan").val(),
        keterangan_satuan: $("#keterangan-satuan").val()
      }).done(function(data) {

        if (data == "sukses") {
          //SHOW TABLE
          $.post("../ajax/master_data_ajax.php", {
            val: 'master-satuan',
            inp: "",
            row: "All",
            sort_by: $("#sort-by").val()
          }).done(function(data) {
            $("#data-from-ajax").html(data);
          })
        }
        else{
          alert(data);
        }

      })
    })


  </script>

</body>

</html>