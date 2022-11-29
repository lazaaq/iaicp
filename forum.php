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

    $result = mysqli_query($db, "SELECT * FROM profil");
    $cekemail = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id_akun");
    $row = mysqli_fetch_assoc($cekemail);
    $forum = mysqli_query($db, "SELECT * FROM forum ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAICP | HOME</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/forum.css">
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

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="judul">FORUM</div>
            </div>
        </div>
    </section>

    <section class="contents">
        <div class="container">
            <button class="btn-box" id="tambah-postingan" onclick="tambah_postingan()">TAMBAH POSTINGAN</button>
            <button class="btn-box" id="tutup-postingan" onclick="tutup_postingan()">TAMBAH POSTINGAN</button>
            <form  method="post" action="post-action.php" id="postingan">    
                <div class="mb-3 box">
                    <label class="form-label">Tambah Postingan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pesan" placeholder="Write your post here.." required></textarea>
                    <input type="hidden" name="id_akun" value="<?= $id_akun; ?>">
                    <button class="btn btn-outline-primary mt-3" name="post">POST</button>
                </div>
            </form>
            <?php

                if (isset($_GET["post_action"])) {

                    if ($_GET["post_action"] === "posted") {

                        echo "Diskusi Berhasil Ditambahkan!";

                    }
                    else{

                        echo "Diskusi Gagal Ditambahkan!";

                    }

                }

            ?>
            <div class="mt-5 banyak-post">
                <div class="text"><?php echo $forum->num_rows ?> Total Posts</div>
            </div>
            <?php

                if ($forum->num_rows == null) {

                    echo "no posts yet";

                } else if ($forum->num_rows != null) {

                foreach($forum as $post) : ?>
                <?php $akun_id = $post["id_akun"]; ?>
                <?php $akun_post = query("SELECT * FROM profil WHERE id_akun = $akun_id")[0]; 
            ?>
            <div class="posted">
                <div class="body">
                    <div class="box mt-5"> <!-- Disini bisa di loop--> 
                        <div class="wrap">
                            <div class="image">
                                <a href="person.php?id_akun=<?= $akun_post["id_akun"]; ?>">
                                    <img src="img/orang/<?= $akun_post["foto"]; ?>" alt="Profile">
                                </a>
                            </div>
                            <div class="nama-angkatan">
                                <div class="nama"><a href="person.php?id_akun=<?= $akun_post["id_akun"]; ?>"><?= $akun_post["nama_lengkap"]; ?></a></div>
                                <div class="angkatan"><?= $akun_post["angkatan"]; ?></div>
                            </div>
                        </div>
                        <div class="date">
                            <div class="tanggal"><?= $post["tanggal"]; ?></div>
                            &nbsp;&nbsp;&nbsp;
                            <div class="jam"><?= $post["waktu"]; ?></div>
                        </div>
                        <div class="tulisan mt-3">
                            <?= $post["pesan"]; ?><br>
                        </div>
                        <?php
                            $id_post = $post["id"];
                            $komen = mysqli_query($db, "SELECT * FROM komen WHERE id_post = $id_post");

                        ?>
                        <div class="btn-komen mt-3">
                            <a href="view-post.php?id_post=<?= $post["id"]; ?>" class="btn btn-outline-warning">Komentar [<?php echo $komen->num_rows ?>]</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; }?>
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
    


    <!-- JS -->
    <script type="text/javascript" src="js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/navbar2.js"></script>
    <script src="js/footer.js"></script>
    <script>
        function tambah_postingan() {
            document.getElementById("tambah-postingan").style.display = "none";
            document.getElementById("tutup-postingan").style.display = "block";
            document.getElementById("postingan").style.display = "block";
        }
        function tutup_postingan() {
            document.getElementById("tambah-postingan").style.display = "block";
            document.getElementById("tutup-postingan").style.display = "none";
            document.getElementById("postingan").style.display = "none";
        }
    </script>
</body>