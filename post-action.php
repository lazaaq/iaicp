<?php

    require 'config.php';

    if (isset($_POST['post'])) {

        $post = $_POST['pesan'];
        $tanggal= date("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        $jam=date("H:i:s");
        $id_akun = $_POST['id_akun'];

        $query="INSERT INTO forum VALUES ( 
            '', '$id_akun', '$post', '$tanggal', '$jam'
        )";
        mysqli_query($db, $query);
        mysqli_affected_rows($db);

        if ($query) {

            header("Location: forum.php?post_action=posted");

        } else {

            header("Location: forum.php?post_action=gagal");
        }
    }

?>