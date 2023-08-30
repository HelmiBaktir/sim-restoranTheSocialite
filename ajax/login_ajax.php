<?php
    session_start();
    include '../metode/koneksi.php';

    $userName = $_POST['uname'];
    $password = $_POST['pword'];

    $sqlQ="select * from user where username = '$userName' AND pasword = '$password'";
    $res = mysqli_query($conn,$sqlQ);
    if($res->num_rows>0){

        while($row = $res->fetch_assoc()){
            $email = $row['email'];
            $nama =$row['nama'];
            $id=$row['id'];

            $_SESSION['nama'] = $nama;
            $_SESSION['email'] =$email;
            $_SESSION['id'] = $id;
        }
        echo json_encode(array("status"=>"sukses","nama"=>$nama,"email"=>$email));
    }
    else{
        echo json_encode(array("status"=>"GAGAL"));
    }
?>