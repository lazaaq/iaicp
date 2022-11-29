<?php
    session_start();
    if( !isset($_SESSION["id_akun"]) ) {
        header("Location: login.php");
        exit;
    }

    require 'config.php';
    $username = $_SESSION["username"];
    $id_akun = $_SESSION["id_akun"];

    
    if(isset($_POST['saran'])){

        $saran = saran($_POST);
        if( $saran > 0 ) {
            echo "<script>
            alert('Saran Anda sudah masuk! Terima kasih atas sarannya ^^')
            </script>";
        }
        else
        {
            echo "<script>
            alert('Saran Anda gagal ditambahkan!')
            </script>";
        }
    }

    if (isset($_GET['id_post'])) {
        $post_id = $_GET["id_post"];
        $cekid = mysqli_query($db, "SELECT * FROM forum WHERE id = $post_id");
        // apakah query simpan berhasil?
        if( mysqli_num_rows($cekid) === 1 ) {
            $baris = mysqli_fetch_assoc($cekid);
            $id = $baris["id"];
        } 
        else    $id = 1;

        $post_data = query("SELECT * FROM forum WHERE id = $id")[0];
        $akun_id = $post_data["id_akun"];
        $akun_post = query("SELECT * FROM profil WHERE id_akun = $akun_id")[0];

    } else {

        header("Location: forum.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAICP | POST</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view-post.css">
    <link rel="shortcut icon" href="img/logo/3.png">

</head>
<body>

    <header>
        <div class="container">
        <div class="items">
                <a href="index.php" class="brand">
                    <img src="img/logo/1.png" alt="HOME" width="50rem" height="auto">
                </a>
                <ul>
                    <li class="drop">
                        <a onclick="myFunction()" class="dropbtn not-drop" href="#">ALUMNI</a>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="angkatan.php" class="dropdown-item">ANGKATAN</a>
                            <a href="bidang.php" class="dropdown-item">BIDANG</a>
                            <a href="list.php" class="dropdown-item">LIST</a>
                        </div>
                    </li>
                    <li><a href="forum.php" class="not-drop">FORUM</a></li>
                    <li><a href="about.php" class="not-drop">ABOUT</a></li>
                    <li><a href="profil.php" class="not-drop">PROFIL</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="index.php">Home</a></li>
                    <li><a class="dropdown-item" href="angkatan.php">Angkatan</a></li>
                    <li><a class="dropdown-item" href="bidang.php">Bidang</a></li>
                    <li><a class="dropdown-item" href="list.php">List</a></li>
                    <li><a class="dropdown-item" href="forum.php">Forum</a></li>
                    <li><a class="dropdown-item" href="about.php">About</a></li>
                    <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                </ul>
            </div>
            <div class="buttons">
                <a href="logout.php" tabindex="-1" aria-disabled="true" onclick="return confirm('Apakah Anda yakin ingin keluar?');" class="btn btn-danger mr-1" type="submit">Logout</a>
            </div>
            <div class="buttons-small">
                <a href="logout.php" tabindex="-1" aria-disabled="true" onclick="return confirm('Apakah Anda yakin ingin keluar?');" class="btn btn-danger mr-1" type="submit">Logout</a>
            </div>
        </div>
    </header>

    <section class="postingan">
        <div class="container">
            <a href="forum.php">
            <button class="btn btn-outline-primary" id="back">Back</button>
            </a>
            <div class="poster">
                <div class="image">
                    <a href="person.php?id_akun=<?= $akun_post["id_akun"]; ?>"><img src="img/orang/<?= $akun_post["foto"]; ?>" alt="Picture"></a>
                </div>
                <div class="nama-angkatan">
                    <div class="nama"><a href="person.php?id_akun=<?= $akun_post["id_akun"]; ?>#"><?= $akun_post["nama_lengkap"]; ?></a></div>
                    <div class="angkatan"><?= $akun_post["angkatan"]; ?></div>
                </div>
                <div class="tanggal"><?= $post_data['tanggal'] ?>   <?= $post_data['waktu'] ?></div>
            </div>
            <div class="post">
                <?= $post_data['pesan'] ?>
            </div>
            <div>
                <?php while($akun_post == $id_akun) : ?>
                <button class="btn btn-outline-danger" name="edit">Edit</button>
                <?php endwhile; ?>
            </div>
            <button class="btn btn-outline-primary" id="tambah-komentar" onclick="tambah_komentar()">Tambah Komentar</button>
            <button class="btn btn-outline-primary" id="tutup-komentar" onclick="tutup_komentar()">Tambah Komentar</button>
            <form  method="post" action="comment-action.php" id="postingan">
                <div class="tambah-komentar" id="tambah">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Tambah Komentar</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="pesan" rows="3" placeholder="Write your comment here.."></textarea>
                        
                        <input type="hidden" name="id_akun" value="<?= $id_akun; ?>">
                        <input type="hidden" name="id_post" value="<?= $id; ?>">
                        <button class="btn btn-outline-primary" name="post">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php

        $comments = $db->query("SELECT * FROM komen WHERE id_post = $id");

    ?>
    <section class="komentar">
        <div class="container">
            <div class="total-komen"><?php echo $comments->num_rows ?></b> Komentar</div>
            <?php
            if ($comments->num_rows == null) {

                echo "no comments yet";

            } else if ($comments->num_rows != null) {

            foreach($comments as $comment_data) : ?>
            <?php $id_komen = $comment_data["id_akun"];
                $akun_komen = query("SELECT * FROM profil WHERE id_akun = $id_komen")[0];

            ?>
            <div class="data-komen"> <!-- Bisa di Loop pake PHP (backend) -->
                <div class="poster">
                    <div class="image">
                        <a href="person.php?id_akun=<?= $akun_komen["id_akun"]; ?>"><img src="img/orang/<?= $akun_komen["foto"]; ?>" alt="Picture"></a>
                    </div>
                    <div class="nama-angkatan">
                        <div class="nama"><a href="person.php?id_akun=<?= $akun_komen["id_akun"]; ?>"><?= $akun_komen["nama_lengkap"]; ?></a></div>
                        <div class="angkatan"><?= $akun_komen["angkatan"]; ?></div>
                    </div>
                    <div class="tanggal"><?= $comment_data['tanggal'] ?>   <?= $comment_data['waktu'] ?></div>
                </div>
                <div class="post">
                    <?= $comment_data['pesan'] ?>
                </div>
            </div>
            <?php endforeach; }?>
            <div class="to-the-top">
                <a href="#"><span class="btn btn-primary">TO TOP</span></a>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <button class="button-saran" id="tambah-saran" onclick="tambah_saran()">Saran</button>
                    <button class="button-saran" id="tutup-saran" onclick="tutup_saran()">Saran</button>
                    <div class="saran" id="saran">    
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Kotak Saran</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="pesan" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="id_akun" value="<?= $id_akun; ?>">
                            <button type="submit" name="saran" class="btn btn-outline-primary mb-3">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="menu">
                        Menu
                    </div>
                    <div class="menu-line"></div>
                    <div class="menu-item">
                        <div class="item"><a href="index.php">Home</a></div>
                        <div class="item"><a href="angkatan.php">Angkatan</a></div>
                        <div class="item"><a href="bidang.php">Bidang</a></div>
                        <div class="item"><a href="list.php">List</a></div>
                        <div class="item"><a href="forum.php">Forum</a></div>
                        <div class="item"><a href="profil.php">Profil</a></div>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <div class="sosmed">
                        Sosmed
                    </div>
                    <div class="sosmed-line"></div>
                    <div class="sosmed-item justify-content-center justify-content-md-end">
                        <div class="item instagram">
                            <a href="https://www.instagram.com/iaicpkl/">
                                <img src="img/sosmed/instagram.svg" alt="Instagram">
                            </a>
                        </div>
                        <div class="item medium">
                            <a href="https://medium.com/ia-icp">
                                <img src="img/sosmed/medium.svg" alt="Medium">
                            </a>
                        </div>
                        <div class="item email">
                            <a href="mailto:iaicp2019@gmail.com">
                                <img src="img/sosmed/mail.svg" alt="Email">
                            </a>
                        </div>
                        <div class="item github">
                            <a href="https://www.youtube.com/channel/UCrvWpaqEEIZVoTe-X5NVmiw">
                                <img src="img/sosmed/youtube.svg" alt="Youtube">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-line"></div>
            <div class="copyright">&copy; 2021 IAICP</div>
        </div>
    </section>

    <script type="text/javascript" src="js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/navbar2.js"></script>
    <script src="js/footer.js"></script>
    <script>
        function tambah_komentar() {
            document.getElementById("tambah-komentar").style.display = "none";
            document.getElementById("tutup-komentar").style.display = "block";
            document.getElementById("tambah").style.display = "block";
        }
        function tutup_komentar() {
            document.getElementById("tambah-komentar").style.display = "block";
            document.getElementById("tutup-komentar").style.display = "none";
            document.getElementById("tambah").style.display = "none";
        }
    </script>

</body>