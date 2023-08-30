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
  <link rel="stylesheet" href="../css/proses-produksi.css">
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="../js/jquery-3.5.1.min.js"></script>

  <!-- ICON -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
</head>

<body>
  <!-- ------ -->
  <!-- ALERT ADD DATA -->
  <!-- ------ -->
  <div id="add_data_Modal" class="modal fade" style="margin-top: 5%;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Tambah Barang</h4>
        </div>
        <div class="modal-body" style="margin-top: 10px;">
          <!-- TANGGAL -->
          <form class="form-inline">
            <div class="form-group">
              <label for="tanggal-produksi" style="width: 140px;text-align: right;">Tanggal : </label>
              <input type="date" class="form-control" id="tanggal-produksi" style="width: 350px; margin-left:10px;">
            </div>
            <!-- TIPE BARANG -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="nama-produk" style="width: 140px;text-align: right; margin-right:10px">Nama Produk : </label>
              <select class="theSelect" name="tipe-barang" id="nama-produk" style="width: 350px;">
              </select>
            </div>

            <!-- JUMLAH -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="jumlah-produk" style="width: 140px;text-align: right;">Jumlah : </label>
              <input type="number" name="tipe-barang" id="jumlah-produk" class="form-control" style="width: 200px; margin-left:10px;"> Porsi
            </div>
          </form>
        </div>

        <!-- FOOTER -->
        <div class="modal-footer">
          <input type="submit" name="insert" id="insert" value="Tambah Barang" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F5F6FA;">Batal</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ---- -->
  <!-- ALERT UBAH DATA -->
  <!-- ---- -->
  <div id="add_data_Modal_ubah" class="modal fade" style="margin-top: 5%;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Tambah Barang</h4>
        </div>
        <div class="modal-body" style="margin-top: 10px;">
          <!-- TANGGAL -->
          <form class="form-inline">
            <div class="form-group">
              <label for="tanggal-produksi" style="width: 140px;text-align: right;">Tanggal : </label>
              <input type="date" class="form-control" id="tanggal-produksi-ubah" style="width: 350px; margin-left:10px;">
            </div>
            <!-- TIPE BARANG -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="nama-produk" style="width: 140px;text-align: right; margin-right:10px">Nama Produk : </label>
              <select class="theSelect" name="tipe-barang" id="nama-produk-ubah" style="width: 350px;">
              </select>
            </div>

            <!-- JUMLAH -->
            <div class="form-group" style="margin-top: 10px;">
              <label for="jumlah-produk" style="width: 140px;text-align: right;">Jumlah : </label>
              <input type="number" name="tipe-barang" id="jumlah-produk-ubah" class="form-control" style="width: 200px; margin-left:10px;"> Porsi
            </div>
          </form>
        </div>

        <!-- FOOTER -->
        <div class="modal-footer">
          <input type="submit" name="ubah" id="ubah" value="Ubah" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F5F6FA;">Batal</button>
        </div>
      </div>
    </div>
  </div>



  <!-- SIDEBAR -->
  <div id="mySidenav" class="sidenav">
    <img src="../img/Logo.png">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!-- Halaman Utama -->
    <a href="../halaman-utama.php">
      <i class="iconify" data-icon="fluent:home-24-regular" style="color: #807e92;" data-width="20" data-height="20"></i>
      Halaman Utama</a>
    <!-- Halaman Master Menu -->
    <a href="proses-produksi.php"> <span class="iconify" data-icon="fluent:production-20-filled" data-width="20" data-height="20"></span>
      Proses Produksi</a>
    <!-- Master Barang -->
    <a href="stok-opname.php"><span class="iconify" data-icon="healthicons:rdt-result-out-stock" data-width="20" data-height="20"></span>
      Stock Opname</a>
    <!-- Master Master Resep Menu -->
    <a href="transaksi-pembelian.php"><span class="iconify" data-icon="icons8:buy" data-width="20" data-height="20"></span>
      Transaksi Pembelian</a>
    <!-- Master Supplier -->
    <a href="retur.php"><span class="iconify" data-icon="fluent:archive-arrow-back-28-filled" data-width="20" data-height="20"></span>
      Retur</a>
    <!-- Master Satuan -->
    <a href="pelunasan-nota.php"><span class="iconify" data-icon="fluent:receipt-money-24-filled" data-width="20" data-height="20"></span>
      Pelunasan Nota Penjualan</a>
  </div>




  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <h2>Proses Produksi</h2>

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
        <option value="tanggal">Tanggal</option>
      </select>

      <!-- PENCARIAN BERDASARKAN TANGGAL -->

      <div style="width: 600px; visibility: hidden;" id="cari-tanggal">
        <label for="tangal-mulai">Mulai : </label>
        <input type="Date" id="tanggal-mulai" class="sort-by" style="width: 130px;">

        <label for="tangal-selesai">Selesai : </label>
        <input type="Date" id="tanggal-selesai" class="sort-by" style="width: 130px;">
        <input type="submit" id="tanggal-cari" value="Cari" class="cari-tanggal">

      </div>

      <!-- BTN TAMBAH DATA -->
      <input type="submit" onclick="tambahData()" value="+ Tambah Data" class="tambah-data" id="tambah-data" data-toggle="modal" data-target="#add_data_Modal">

    </div>



    <!-- TABLE -->
    <div id="data-from-ajax">

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

          $.post("../ajax/master_transaksi_ajax.php", {
            val: 'proses-prosuksi',
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

          $.post("../ajax/master_transaksi_ajax.php", {
            val: 'proses-prosuksi',
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

          $.post("../ajax/master_transaksi_ajax.php", {
            val: 'proses-prosuksi',
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

          if ($("#sort-by").val() != "tanggal") {
            document.getElementById("cari-tanggal").style.visibility = "hidden";
            $.post("../ajax/master_transaksi_ajax.php", {
              val: 'proses-prosuksi',
              inp: input,
              row: $("#row-table").val(),
              sort_by: $("#sort-by").val()
            }).done(function(data) {
              $("#data-from-ajax").html(data);
            })
          }
          //
          // JIKA SORT BY TANGGAL MAKA AKAN MENAMPILKAN INPUT TANGGAL
          //
          else {
            document.getElementById("cari-tanggal").style.visibility = "visible";

            $("#tanggal-cari").click(function() {
              var tanggal_mulai = $("#tanggal-mulai").val();
              var tanggal_selesai = $("#tanggal-selesai").val();
              var input = $("#Txtcari").val();

              $.post("../ajax/master_transaksi_ajax.php", {
                val: 'proses-prosuksi',
                inp: input,
                row: $("#row-table").val(),
                sort_by: $("#sort-by").val(),
                mulai: tanggal_mulai,
                selesai: tanggal_selesai
              }).done(function(data) {
                $("#data-from-ajax").html(data);
              })
            })
          }

        })

        // -----------------------//
        //---ADD DATA ON ALERT---//
        //----------------------//

        var input = $("#Txtcari").val();
        // TIPE BARANG
        $.post("../ajax/master_data_ajax.php", {
          val: 'tambah-barang-tipebarang',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#tipe-barang").html(data);
          $("#tipe-barang-ubah").html(data);
        })
        // KATEGORI BARANG
        $.post("../ajax/master_data_ajax.php", {
          val: 'tambah-barang-kategori',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#kategori-barang").html(data);
          $("#kategori-barang-ubah").html(data);
        })
        //SATUAN
        $.post("../ajax/master_data_ajax.php", {
          val: 'tambah-barang-satuan',
          inp: input,
          row: $("#row-table").val(),
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#satuan-barang").html(data);
          $("#satuan-barang-ubah").html(data);
        })

        $(".theSelect").select2();

      })
    </script>

    <!-- ------------- -->
    <!-- ACTION SCRYPT -->
    <!-- ------------- -->
    <script>
      function ubah($id) {
        $.post("../ajax/master_transaksi_ajax.php", {
          val: 'cari-barang',
          inp: "",
          row: "All",
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#nama-produk-ubah").html(data);
        });

        $.post("../ajax/master_transaksi_ajax.php", {
          val: 'ubah-data',
          inp: "",
          row: "All",
          sort_by: $("#sort-by").val(),
          id: $id
        }).done(function(data) {
          var jdata = $.parseJSON(data)
          $("#tanggal-produksi-ubah").val(jdata.tanggal)
          $("#nama-produk-ubah").val(jdata.nama_produk)
          $("#jumlah-produk-ubah").val(jdata.kuantitas)
        });

        $("#ubah").click(function() {
          $.post("../ajax/tambah_ubah_data_ajax.php", {
            title: "ubah-proses-produksi",
            tanggal: $("#tanggal-produksi-ubah").val(),
            master_menu_id: $("#nama-produk-ubah").val(),
            kuantitas: $("#jumlah-produk-ubah").val(),
            id: $id
          }).done(function(data) {
            if (data == "data berhasil diubah") {
              if ($("#Txtcari").val() == '' && document.getElementById('row-table').value == "All") {
                $.post("../ajax/master_transaksi_ajax.php", {
                  val: 'proses-prosuksi',
                  inp: "",
                  row: "All",
                  sort_by: $("#sort-by").val()
                }).done(function(data) {
                  $("#data-from-ajax").html(data);
                })

              }
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
            val: 'master_barang',
            id: $id
          }).done(function(data) {
            if (data == "berhasil") {
              $.post("../ajax/master_data_ajax.php", {
                val: 'master_barang',
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

    <!-- TAMBAH DATA -->
    <script>
      function tambahData() {
        // CARI BARANG
        $.post("../ajax/master_transaksi_ajax.php", {
          val: 'cari-barang',
          inp: "",
          row: "All",
          sort_by: $("#sort-by").val()
        }).done(function(data) {
          $("#nama-produk").html(data);
        });
        //-----------------------//
        //--INSERT TO DATABASE--//
        //---------------------//

        $("#insert").click(function() {
          $.post("../ajax/tambah_ubah_data_ajax.php", {
            title: 'tambah-proses-prosuksi',
            tanggal: $("#tanggal-produksi").val(),
            master_menu_id: $("#nama-produk").val(),
            kuantitas: $("#jumlah-produk").val()
          }).done(function(data) {
            if ($("#Txtcari").val() == '' && document.getElementById('row-table').value == "All") {

              $.post("../ajax/master_transaksi_ajax.php", {
                val: 'proses-prosuksi',
                inp: "",
                row: "All",
                sort_by: $("#sort-by").val()
              }).done(function(data) {
                $("#data-from-ajax").html(data);
                alert("data berhasil ditambahakan");
              })

            }
          })
        });


      }
    </script>



</body>

</html>