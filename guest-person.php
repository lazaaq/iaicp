<?php

    require 'config.php';

    if(isset($_POST["open"]) ) {
        $id = $_POST["id"];
    }
    else if(isset($_GET["id_akun"]) ) {
        $akun_id = $_GET["id_akun"];
        $cekid = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $akun_id");
        // apakah query simpan berhasil?
        if( mysqli_num_rows($cekid) === 1 ) {
            $baris = mysqli_fetch_assoc($cekid);
            $id = $baris["id"];
        } 
        else    $id = 1;
    }
        else $id = 1;
    $row=query("SELECT * FROM profil WHERE id=$id")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAICP | PROFIL</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profil.css">
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


    <section class="contents">
        <div class="container">
            <div class="row">
                <div class="col judul">
                    <div class="line"></div>
                    <div class="text">PROFIL</div>
                </div> 
            </div>
            <div class="row mb-5">
                <div class="col-6 gambar">
                    <img src="img/orang/<?= $row["foto"] ?>" alt="Picture">
                </div>
            </div>
            <div class="row form">
                <div class="col-6 kiri">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input class="form-control" type="text" value="<?= $row["nama_lengkap"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Angkatan</label>
                            <input class="form-control" type="text" value="<?= $row["angkatan"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio Deskripsi</label>
                            <textarea class="form-control" id="bio" rows="3" disabled readonly><?= $row["bio"] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="univ" class="form-label">Universitas</label>
                            <input class="form-control" type="text" value="<?= $row["univ"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="bidang" class="form-label">Bidang</label>
                            <input class="form-control" type="text" value="<?= $row["bidang"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <input class="form-control" type="text" value="<?= $row["fakultas"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input class="form-control" type="text" value="<?= $row["jurusan"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_kuliah" class="form-label">Tahun Masuk Kuliah</label>
                            <input class="form-control" type="text" value="<?= $row["tahun_kuliah"] ?>" disabled readonly>
                        </div>
                    </div>
                <div class="col-6 kanan">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="text" value="<?= $row["email"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ig" class="form-label">Instagram</label>
                            <input class="form-control" type="text" value="<?= $row["ig"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input class="form-control" type="text" value="<?= $row["linkedin"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input class="form-control" type="text" value="<?= $row["pekerjaan"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="instansi" class="form-label">Instansi/Perusahaan</label>
                            <input class="form-control" type="text" value="<?= $row["instansi"] ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_kerja" class="form-label">Tahun Mulai Kerja</label>
                            <input class="form-control" type="text" value="<?= $row["tahun_kerja"] ?>" disabled readonly>
                        </div>
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
</body>