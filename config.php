<?php

$server = "localhost";
$user = "iaih7936_flaisarly";
$password = "Faisalia2111";
$nama_database = "iaih7936_iaicp";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db)
    die("Gagal terhubung dengan database: " . mysqli_connect_error());

    function query($query) {
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    
    function upload() {
        global $db;
        $namafile=$_FILES['poster']['name'];
        $size=$_FILES['poster']['size'];
        $error=$_FILES['poster']['error'];
        $tmp=$_FILES['poster']['tmp_name'];

        $ext=['jpg', 'jpeg', 'png'];
        $extfile=explode('.', $namafile);
        $extfile=strtolower(end($extfile));
        if(!in_array($extfile, $ext))
        {
            echo "
                <script>
                    alert('Format gambar Anda tidak sesuai!');
                </script>
            ";
            return false;
        }

        if($size>4000000)
        {
            echo "
                <script>
                    alert('Ukuran gambar Anda terlalu besar!');
                </script>
            ";
            return false;
        }
        $namafilebaru=uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $extfile;
        move_uploaded_file($tmp, 'img/orang/' . $namafilebaru);
        return $namafilebaru;
    }


    function uploadpp() {
        global $db;
        $namafile=$_FILES['foto']['name'];
        $size=$_FILES['foto']['size'];
        $error=$_FILES['foto']['error'];
        $tmp=$_FILES['foto']['tmp_name'];

        $ext=['jpg', 'jpeg', 'png'];
        $extfile=explode('.', $namafile);
        $extfile=strtolower(end($extfile));
        if(!in_array($extfile, $ext))
        {
            echo "
                <script>
                    alert('Format gambar Anda tidak sesuai!');
                </script>
            ";
            return false;
        }

        if($size>4000000)
        {
            echo "
                <script>
                    alert('Ukuran gambar Anda terlalu besar!');
                </script>
            ";
            return false;
        }
        $namafilebaru=uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $extfile;
        move_uploaded_file($tmp, 'img/orang/' . $namafilebaru);
        return $namafilebaru;
    }
    
    function ubah($data) {
        global $db;
        $id_ide = $data["id"];
        $posterlama=htmlspecialchars($data["posterlama"]);
        $bidang = htmlspecialchars($data["bidang"]);
        $judul = htmlspecialchars($data["judul"]);
        if($_FILES['poster']['error'] === 4)
        {
            $poster=$posterlama;
        }
        
        else {
            $poster=upload();
        }
        $query="UPDATE idea SET 
            poster='$poster', bidang='$bidang', judul='$judul'
            WHERE id=$id_ide
        ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function ubahprofil($data) {
        global $db;
        $id_profil = $data["id"];
        $username = $data["username"];
        $fotolama=htmlspecialchars($data["fotolama"]);
        $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
        $angkatan = htmlspecialchars($data["angkatan"]);
        $bio = htmlspecialchars($data["bio"]);
        $email = htmlspecialchars($data["email"]);
        $wa = htmlspecialchars($data["wa"]);
        $ig = htmlspecialchars($data["ig"]);
        $linkedin = htmlspecialchars($data["linkedin"]);
        $univ = htmlspecialchars($data["univ"]);
        $bidang = htmlspecialchars($data["bidang"]);
        $fakultas = htmlspecialchars($data["fakultas"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $tk = htmlspecialchars($data["tahun_kuliah"]);
        $pekerjaan = htmlspecialchars($data["pekerjaan"]);
        $instansi = htmlspecialchars($data["instansi"]);
        $tp = htmlspecialchars($data["tahun_kerja"]);
        if($_FILES['foto']['error'] === 4)
        {
            $foto=$fotolama;
        }
        else {
            $foto=uploadpp();
        }
        $query="UPDATE profil SET 
            foto='$foto', nama_lengkap='$nama_lengkap', 
            angkatan='$angkatan', bio='$bio',
            email='$email', wa='$wa',
            ig='$ig', linkedin='$linkedin',
            univ='$univ', bidang='$bidang',
            fakultas='$fakultas', jurusan='$jurusan', 
            tahun_kuliah='$tk', pekerjaan='$pekerjaan',
            instansi='$instansi', tahun_kerja='$tp'
            WHERE id=$id_profil
        ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function buatprofil($data) {
        global $db;
        $id_akun = $data["id_akun"];
        if($_FILES['foto']['error'] === 4)
        {
            $foto="empty.png";
        }
        else {
            $foto=uploadpp();
        }
        $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
        $angkatan = htmlspecialchars($data["angkatan"]);
        $bio = htmlspecialchars($data["bio"]);
        $email = htmlspecialchars($data["email"]);
        $wa = htmlspecialchars($data["wa"]);
        $ig = htmlspecialchars($data["ig"]);
        $linkedin = htmlspecialchars($data["linkedin"]);
        $univ = htmlspecialchars($data["univ"]);
        $bidang = htmlspecialchars($data["bidang"]);
        $fakultas = htmlspecialchars($data["fakultas"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $tk = htmlspecialchars($data["tahun_kuliah"]);
        $pekerjaan = htmlspecialchars($data["pekerjaan"]);
        $instansi = htmlspecialchars($data["instansi"]);
        $tp = htmlspecialchars($data["tahun_kerja"]);
        $query="INSERT INTO profil VALUES ( 
            '', '$id_akun', '$foto', '$nama_lengkap', 
            '$angkatan', '$bio',
            '$email', '$wa', '$ig', '$linkedin',
            '$univ', '$bidang',
            '$fakultas', '$jurusan', '$tk',
            '$pekerjaan', '$instansi', '$tp'
        )";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function saran($data) {
        global $db;
        $id_akun = $data["id_akun"];
        $saran = htmlspecialchars($data["pesan"]);
        $query="INSERT INTO saran VALUES ( 
            '', '$id_akun', '$saran'
        )";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function ubahaccount($data) {
        global $db;
        $id_profil = $data["id_akun"];
        $akun=htmlspecialchars($data["username"]);
        $pw = htmlspecialchars($data["pw"]);
        $query="UPDATE akun SET 
            username='$akun', pw='$pw'
            WHERE id_akun=$id_profil
        ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }
    
    function hapus($id) {
        global $db;
        mysqli_query($db, "DELETE FROM idea WHERE id=$id");
        return mysqli_affected_rows($db);
    }

    function cari($keyword) {
        global $db;
        $query = "SELECT * FROM profil WHERE
            nama_lengkap LIKE '%$keyword%'OR
            angkatan LIKE '%$keyword%'OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'OR
            bidang LIKE '%$keyword%'OR
            fakultas LIKE '%$keyword%'
            ORDER BY nama_lengkap
        ";
        return query($query);
    }

?>