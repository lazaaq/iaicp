<?php
   require 'config.php';
   

    if(isset($_POST["klik"]) ) {
        $bidang = $_POST["bidang"];
        if($bidang === "Seluruh Bidang") $result = mysqli_query($db, "SELECT * FROM profil ORDER BY nama_lengkap");
        $result = mysqli_query($db, "SELECT * FROM profil WHERE bidang = '$bidang' ORDER BY nama_lengkap");
    }
    else { 
        $bidang = "Seluruh Bidang";
        $result = mysqli_query($db, "SELECT * FROM profil ORDER BY nama_lengkap");
    }

    if(isset($_POST["open"]) ) {
        $bidang = $_POST["bidang"];
        $result = mysqli_query($db, "SELECT * FROM profil WHERE bidang = '$bidang' ORDER BY nama_lengkap");
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAICP | BIDANG</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bidang.css">
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
                <div class="judul">BIDANG</div>
                <div class="judul" style="font-size: 50px"><?= $bidang; ?></div>
            </div>
        </div>
    </section>

    <section class="contents"> 
        <div class="container">
            <div class="outer-wrap">
                <div class="inner-wrap">
                    <form action="guest-bidang.php" method="POST">
                        <div class="mb-3 form">
                            <label for="bidang" class="form-label">Pilih Bidang</label>
                            <select class="form-select" id="bidang" name="bidang" aria-label="Default select example">
                                <option selected value="<?= $bidang ?>">Pilih Bidang</option>
                                <option value="Seluruh Bidang">Seluruh Bidang</option>
                                <option value="Agama">Agama</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Ilmu Murni">Ilmu Murni</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Perikanan">Perikanan</option>
                                <option value="Pertanian">Pertanian</option>
                                <option value="Peternakan">Peternakan</option>
                                <option value="Sastra">Sastra</option>
                                <option value="Seni">Seni</option>
                                <option value="Sospol">Sospol</option>
                                <option value="Teknik">Teknik</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <button type="submit" class="btn btn-warning mt-2" name="klik">GO</button>
                        </div>
                    </form>
                </div>
                <div class="row data-orang justify-content-center">
                    <?php foreach($result as $row) : ?>
                    <div class="col col-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="box text-center">
                            <div class="gambar">
                                <img src="img/orang/<?= $row["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="deskripsi">
                                <div class="text"><?= $row["nama_lengkap"]; ?></div>
                                <div class="horizontal-line"></div>
                                <div class="text orange"><?= $row["angkatan"]; ?></div>
                                <div class="text"><?= $row["jurusan"]; ?></div>
                            </div>
                            <div class="tombol">
                                <form action="guest-person.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                                    <button type="submit" class="btn btn-outline-light" name="open">Lihat</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
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
    <script type='text/javascript'> 
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>