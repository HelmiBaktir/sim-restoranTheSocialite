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

  <link rel="stylesheet" href="../css/master-menu.css">
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="../js/jquery-3.5.1.min.js"></script>
  <!-- ICON -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
  <!-- ALERT ADD DATA -->
  <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Tambah Menu</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="insert_form">
            <label>Nama Menu</label>
            <input type="text" name="name" id="nama-menu" class="form-control" />
            <br />

            <label>Tipe Menu</label>
            <select name="tipe-menu" id="tipe-menu" class="form-control">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <br />

            <label>Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" />
            <br />

            <label>Harga Jual</label>
            <input type="number" name="harga" id="harga" class="form-control" />
            <br />

            <label>Status</label>
            <select name="status-menu" id="status-menu" class="form-control">
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            <br />

            <label>Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">-</textarea>
            <br />
          </form>
        </div>
        <div class="modal-footer">
          <input type="submit" name="insert" id="insert" value="Tambah Menu" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F5F6FA;">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ALERT UBAH DATA -->
  <div id="add_data_Modal_ubah" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Ubah Menu</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="insert_form">
            <label>Nama Menu</label>
            <input type="text" name="name" id="nama-menu-ubah" class="form-control" />
            <br />

            <label>Tipe Menu</label>
            <select name="tipe-menu" id="tipe-menu-ubah" class="form-control">
            </select>
            <br />

            <label>Stok</label>
            <input disabled type="number" name="stok" id="stok-ubah" class="form-control"/>
            <br />

            <label>Harga Jual</label>
            <input type="number" name="harga" id="harga-ubah" class="form-control" />
            <br />

            <label>Status</label>
            <select name="status-menu" id="status-menu-ubah" class="form-control">
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            <br />

            <label>Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi-ubah" class="form-control">-</textarea>
            <br />
          </form>
        </div>
        <div class="modal-footer">
          <input type="submit" name="ubah" id="ubah" value="Ubah Menu" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
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

  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <h2>Master Menu</h2>


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
        <option value="aktif">Harga ></option>
        <option value="tidak-aktif">Harga </option>
      </select>

      <!-- BTN TAMBAH DATA -->
      <input type="submit" onclick="tambahdata()" value="+ Tambah Data" class="tambah-data" id="tambah-data" data-toggle="modal" data-target="#add_data_Modal">
      <!-- <button type="button" data-toggle="modal" data-target="#add_data_Modal" >Add</button> -->
    </div>

    <!-- TABLE -->
    <div id="data-from-ajax">

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
            val: 'master_menu',
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
            val: 'master_menu',
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
            val: 'master_menu',
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
            val: 'master_menu',
            inp: input,
            row: $("#row-table").val(),
            sort_by: $("#sort-by").val()
          }).done(function(data) {
            $("#data-from-ajax").html(data);
          })
        })

        //tipe menu

      })
    </script>

    <!-- ACTION SCRYPT -->
    <script>
      function ubah($id) {
        $('#add_data_Modal_ubah').modal('toggle');
        var input = $("#Txtcari").val();
        // TAMBAH TIPE MENU
        $.post("../ajax/master_data_ajax.php", {
          val: 'tambah-menu',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#tipe-menu-ubah").html(data);
        })

        // TAMBAH DATA DI ALERT
        $.post("../ajax/master_data_ajax.php", {
          val: 'ubah-menu',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val(),
          id_menu: $id
        }).done(function(data) {
          var jdata = $.parseJSON(data);
          $('#nama-menu-ubah').val(jdata.nama);
          $('#tipe-menu-ubah').val(jdata.tipe_menu);
          $('#stok-ubah').val(jdata.stok);
          $('#harga-ubah').val(jdata.harga_jual);
          $('#status-menu-ubah').val(jdata.status);
          $('#deskripsi-ubah').val(jdata.deskripsi);

        })
        

        // UBAH DATA

        $('#ubah').click(function() {
          $.post("../ajax/tambah_ubah_data_ajax.php", {
            id:$id,
            title: 'ubah-menu',
            nama_menu: $("#nama-menu-ubah").val(),
            tipe_menu: $("#tipe-menu-ubah").val(),
            stok: $("#stok-ubah").val(),
            harga: $("#harga-ubah").val(),
            status: $("#status-menu-ubah").val(),
            despripsi: $("#deskripsi-ubah").val()
          }).done(function(data) {
            
            $.post("../ajax/master_data_ajax.php", {
              val: 'master_menu',
              inp: "",
              row: "All",
              sort_by: $("#sort-by").val()
            }).done(function(data) {
              $("#data-from-ajax").html(data);
            })
            alert(data);
          })
        })

      }

      function hapus($id) {
        if (confirm("apa kamu yakin akan menghapus menu dengan ID : " + $id)) {
          $.post("../ajax/hapus_data_ajax.php", {
            val: 'master_menu',
            id: $id
          }).done(function(data) {
            if (data == "berhasil") {
              $.post("../ajax/master_data_ajax.php", {
                val: 'master_menu',
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

    <!-- Tambah Data -->
    <script>
      function tambahdata() {
        var input = $("#Txtcari").val();

        $.post("../ajax/master_data_ajax.php", {
          val: 'tambah-menu',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#tipe-menu").html(data);
        })
      }

      $("#insert").click(function() {

        $.post("../ajax/tambah_ubah_data_ajax.php", {
          title: 'tambah-menu',
          nama_menu: $("#nama-menu").val(),
          tipe_menu: $("#tipe-menu").val(),
          stok: $("#stok").val(),
          harga: $("#harga").val(),
          status: $("#status-menu").val(),
          despripsi: $("#deskripsi").val()
        }).done(function(data) {
          alert(data);
          $.post("../ajax/master_data_ajax.php", {
            val: 'master_menu',
            inp: "",
            row: "All",
            sort_by: $("#sort-by").val()
          }).done(function(data) {
            $("#data-from-ajax").html(data);
          })

        })
      });
    </script>

</body>

</html>