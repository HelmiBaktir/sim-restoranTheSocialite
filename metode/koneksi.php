<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'restoranDB';

    $conn= new mysqli($server,$username,$password,$database)or die ("Could not connect to mysql".mysqli_error($con));
?>