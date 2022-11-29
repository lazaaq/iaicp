<?php

require 'config.php';

if (isset($_POST['post'])) {

$akun_id = $_POST['id_akun'];
$post_id = $_POST['id_post'];
$comment = $_POST['pesan'];
$tanggal= date("Y-m-d");
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");

$query="INSERT INTO komen VALUES ( 
    '', '$akun_id', '$post_id','$comment', '$tanggal', '$jam'
)";
mysqli_query($db, $query);
mysqli_affected_rows($db);

if ($query) {

header("Location: view-post.php?id_post=$post_id");

} else {

echo $db->error;

}

}

?>