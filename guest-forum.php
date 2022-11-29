<?php
    require 'config.php';
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
                <a href="guest-index.php" class="brand">
                    <img src="img/logo/1.png" alt="HOME" width="50rem" height="auto">
                </a>
                <ul>
                    <li class="drop">
                        <a onclick="myFunction()" class="dropbtn not-drop" href="#">ALUMNI</a>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="guest-angkatan.php" class="dropdown-item">ANGKATAN</a>
                            <a href="guest-bidang.php" class="dropdown-item">BIDANG</a>
                            <a href="guest-list.php" class="dropdown-item">LIST</a>
                        </div>
                    </li>
                    <li><a href="guest-forum.php" class="not-drop">FORUM</a></li>
                    <li><a href="guest-about.php" class="not-drop">ABOUT</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="guest-index.php">Home</a></li>
                    <li><a class="dropdown-item" href="guest-angkatan.php">Angkatan</a></li>
                    <li><a class="dropdown-item" href="guest-bidang.php">Bidang</a></li>
                    <li><a class="dropdown-item" href="guest-list.php">List</a></li>
                    <li><a class="dropdown-item" href="guest-forum.php">Forum</a></li>
                    <li><a class="dropdown-item" href="guest-about.php">About</a></li>
                </ul>
            </div>
            <div class="buttons">
                <a href="login.php" tabindex="-1" aria-disabled="true" class="btn btn-danger mr-1" type="submit">Login</a>
            </div>
            <div class="buttons-small">
                <a href="login.php" tabindex="-1" aria-disabled="true" class="btn btn-danger mr-1" type="submit">Login</a>
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
                                <a href="guest-person.php?id_akun=<?= $akun_post["id_akun"]; ?>">
                                    <img src="img/orang/<?= $akun_post["foto"]; ?>" alt="Profile">
                                </a>
                            </div>
                            <div class="nama-angkatan">
                                <div class="nama"><a href="guest-person.php?id_akun=<?= $akun_post["id_akun"]; ?>"><?= $akun_post["nama_lengkap"]; ?></a></div>
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
                            <a href="guest-view-post.php?id_post=<?= $post["id"]; ?>" class="btn btn-outline-warning">Komentar [<?php echo $komen->num_rows ?>]</a>
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
                <div class="col-12 col-md-6">
                    <div class="menu">
                        Menu
                    </div>
                    <div class="menu-line"></div>
                    <div class="menu-item">
                        <div class="item"><a href="guest-index.php">Home</a></div>
                        <div class="item"><a href="guest-angkatan.php">Angkatan</a></div>
                        <div class="item"><a href="guest-bidang.php">Bidang</a></div>
                        <div class="item"><a href="guest-list.php">List</a></div>
                        <div class="item"><a href="guest-forum.php">Forum</a></div>
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