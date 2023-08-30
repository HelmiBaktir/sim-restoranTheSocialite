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
    <link rel="stylesheet" href="../css/master-resep.css">
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
    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog" style="width: 80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Tambah Resep</h4>
                </div>
                <div class="modal-body" style="margin-top: 10px;">
                    <form class="form-inline">

                        <!-- TIPE BARANG -->
                        <div class="form-group" style="margin-top: 10px; margin-bottom: 30px;">
                            <label for="nama-produk" style="width: 140px;text-align: right; margin-right:10px">Nama Produk : </label>
                            <select class="theSelect" name="tipe-barang" id="nama-produk" style="width: 350px;">
                            </select>
                        </div>
                    </form>

                    <div style="border-top: 2px solid #E5E5E5;">
                        <form class="form-inline">
                            <!-- nama BARANG -->
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="nama-barang" style="width: 140px;text-align: right; margin-right:10px">Nama Barang : </label>
                                <select class="theSelect" name="nama-barang" id="nama-barang" style="width: 350px;">
                                </select>
                            </div>
                            <!-- Kuantitas -->
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="kuantitas" style="width: 140px; text-align: right;">Kuantitas : </label>
                                <input type="number" name="kuantitas" id="kuantitas" class="form-control" style="width: 200px; margin-left:10px; text-align: right;">
                            </div>

                            <!-- Satuan -->
                            <div class="form-group" style="margin-top: 10px;">
                                <input disabled type="text" name="satuan" id="satuan" class="form-control" style="width: 50px; margin-left:10px; text-align: right; text-align:center;">
                            </div>
                            <!-- div Obclick -->
                            <div onclick="addlist()" class="form-group" style="margin:10px 0px 0px 30px;">
                                <span class="iconify" data-icon="material-symbols:add-box-rounded" style="color: #2a1f41;" data-width="40" data-height="40"></span>
                            </div>

                        </form>

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div id="table-resep" style="margin-top: 30px;" class=".col-md-offset-3">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</td>
                                                <th>Kuantitas</td>
                                                <th>*</td>
                                            </tr>

                                        </thead>
                                        <tbody id="tbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <input type="submit" name="insert" id="insert" value="Tambah Resep" class="btn btn-success" style="background-color:#2A1F41 ;" data-dismiss="modal" />
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#E5E5E5;">Batal</button>
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
        <h2>Master Resep Menu</h2>

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
                $(".theSelect").select2();
                // JIKA DATA KOSONG
                if ($("#Txtcari").val() == '' && document.getElementById('row-table').value == "All") {
                    $.post("../ajax/master_data_ajax.php", {
                        val: 'master_resep',
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
                        val: 'master_resep',
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
                        val: 'master_resep',
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
                        val: 'master_resep',
                        inp: input,
                        row: $("#row-table").val(),
                        sort_by: $("#sort-by").val()
                    }).done(function(data) {
                        $("#data-from-ajax").html(data);
                    })
                })

                // -----------------------//
                //---ADD DATA ON ALERT---//
                //----------------------//
                $.post("../ajax/master_transaksi_ajax.php", {
                    val: 'cari-barang',
                    inp: "",
                    row: "All",
                    sort_by: $("#sort-by").val()
                }).done(function(data) {
                    $("#nama-produk").html(data);
                });

                $.post("../ajax/master_transaksi_ajax.php", {
                    val: 'cari-barang-pembelian',
                    inp: "",
                    row: "All",
                    sort_by: $("#sort-by").val()
                }).done(function(data) {
                    $("#nama-barang").html(data);
                });

            })
        </script>

        <!-- ------------- -->
        <!-- ACTION SCRYPT -->
        <!-- ------------- -->
        <script>
            function ubah($id) {

                $("#nama-produk").val($id);

                $.post("../ajax/master_data_ajax.php", {
                    val: 'cari-resep',
                    inp: "",
                    row: "All",
                    sort_by: $("#sort-by").val(),
                    id: $("#nama-produk").val()
                }).done(function(data) {
                    $(".row").show();
                    $("#tbody").html(data);
                });

                $.post("../ajax/master_data_ajax.php", {
                    val: 'cari-satuan',
                    inp: "",
                    row: "All",
                    sort_by: $("#sort-by").val(),
                    id: $("#nama-barang").val()
                }).done(function(data) {
                    $("#satuan").val(data);
                })


                $("#insert").click(function(){
                    $.post("../ajax/master_data_ajax.php", {
                        val: 'master_resep',
                        inp: "",
                        row: "All",
                        sort_by: $("#sort-by").val()
                    }).done(function(data) {
                        $("#data-from-ajax").html(data);
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
                //-----------------------//
                //--INSERT TO DATABASE--//
                //---------------------//


                $.post("../ajax/master_data_ajax.php", {
                    val: 'cari-resep',
                    inp: "",
                    row: "All",
                    sort_by: $("#sort-by").val(),
                    id: $("#nama-produk").val()
                }).done(function(data) {
                    $(".row").show();
                    $("#tbody").html(data);
                });

                $.post("../ajax/master_data_ajax.php", {
                    val: 'cari-satuan',
                    inp: "",
                    row: "All",
                    sort_by: $("#sort-by").val(),
                    id: $("#nama-barang").val()
                }).done(function(data) {
                    $("#satuan").val(data);
                })

                $("#insert").click(function(){
                    $.post("../ajax/master_data_ajax.php", {
                        val: 'master_resep',
                        inp: "",
                        row: "All",
                        sort_by: $("#sort-by").val()
                    }).done(function(data) {
                        $("#data-from-ajax").html(data);
                    })

                })

                //-----------------------//
                //------UPDATE DATA-----//
                //---------------------//


            }
        </script>

        <!-- ALERT SELECT  -->
        <script>
            $(".row").hide();

            $("#nama-barang").change(function() {
                if ($("#Txtcari").val() == '' && document.getElementById('row-table').value == "All") {
                    $.post("../ajax/master_data_ajax.php", {
                        val: 'cari-satuan',
                        inp: "",
                        row: "All",
                        sort_by: $("#sort-by").val(),
                        id: $("#nama-barang").val()
                    }).done(function(data) {
                        $("#satuan").val(data);
                    })

                }
            })

            $("#nama-produk").change(function() {

                $.post("../ajax/master_data_ajax.php", {
                    val: 'cari-resep',
                    inp: "",
                    row: "All",
                    sort_by: $("#sort-by").val(),
                    id: $("#nama-produk").val()
                }).done(function(data) {
                    $(".row").show();
                    $("#tbody").html(data);
                })


            })

            function addlist() {
                if ($("#kuantitas").val() != "") {
                    $.post("../ajax/tambah_ubah_data_ajax.php", {
                        title: "tambah-resep",
                        kuantitas: $("#kuantitas").val(),
                        menu_id: $("#nama-produk").val(),
                        barang_id: $("#nama-barang").val()
                    }).done(function(data) {
                        if (data == "sukses") {
                            $.post("../ajax/master_data_ajax.php", {
                                val: 'cari-resep',
                                inp: "",
                                row: "All",
                                sort_by: $("#sort-by").val(),
                                id: $("#nama-produk").val()
                            }).done(function(data) {
                                $(".row").show();
                                $("#tbody").html(data);
                            })
                        } else {
                            alert("gagal");
                        }
                    })
                } else {
                    alert("kuantitas tidak boleh kosong")
                }


            }

            function hapus_list($id) {
                $.post("../ajax/hapus_data_ajax.php", {
                    val: "hapus_resep",
                    id: $id
                }).done(function(data) {
                    if (data == "sukses") {
                        $.post("../ajax/master_data_ajax.php", {
                            val: 'cari-resep',
                            inp: "",
                            row: "All",
                            sort_by: $("#sort-by").val(),
                            id: $("#nama-produk").val()
                        }).done(function(data) {
                            $(".row").show();
                            $("#tbody").html(data);
                        })
                    } else {
                        alert("gagal");
                    }
                })
            }
        </script>



</body>

</html>