<?php
    session_start();
    session_unset();
    
    if (!isset($_SESSION["nama"])) {
            echo('session terhapus');
    }
    else
    {
        echo'gagal melakukan logout';
    }


?>