<?php
    session_start();
    if( !isset($_SESSION["id_akun"]) ) {
        header("Location: login.php");
        exit;
    }
    require 'config.php';
    $username=$_SESSION["username"];
    $id_akun=$_SESSION["id_akun"];
    
    
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

    $id=$_SESSION["id"];
    if($id === $_SESSION["id"]) {
        $profil=query("SELECT * FROM profil WHERE id=$id")[0];
    }
    else {
        $id = $_SESSION["id"];
        $profil=query("SELECT * FROM profil WHERE id=$id")[0];
    }
    $cekemail = mysqli_query($db, "SELECT * FROM akun WHERE id_akun = $id_akun");
    $row = mysqli_fetch_assoc($cekemail);
    $username = $row["username"];
    $psw = $row["pw"];

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>
    <link rel="shortcut icon" href="img/logo/3.png">
    
    <style>
        .image_area {
		  position: relative;
		}

		img {
		  	display: block;
		  	max-width: 100%;
		}

		.preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.modal-lg{
  			max-width: 1000px !important;
		}

		.overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.gambar .text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
    </style>
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

    <section class="contents">
        <div class="container">
            <div class="row">
                <div class="col judul">
                    <div class="line"></div>
                    <div class="text">PROFIL</div>
                </div>
            </div>
            <form action="profil.php" method="POST" enctype="multipart/form-data">
            <div class="row mb-5">
                <div class="col-6 gambar">
                    <img src="img/orang/<?= $profil["foto"]; ?>">
                    <input type="file" name="foto" id="foto">
                    <br><text style="color: white; font-style: italic;"> format: jpg, jpeg, png | size max: 3 MB rasio foto 1:1</text>
                </div>
                <div class="col-6 id">
                    <div class="mb-3 id-readonly">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="varchar" value="<?= $username; ?>" disabled readonly><br>
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="varchar" value="<?= $psw; ?>" disabled readonly> 
                    </div>
                </div>
            </div>
            <input type="hidden" for="username" name="username" value="<?= $username; ?>">
            <input type="hidden" name="id" value="<?= $profil["id"]; ?>">
            <input type="hidden" name="fotolama" value="<?= $profil["foto"]; ?>">
            <div class="row form">
                <div class="col-6 kiri"><form>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap*</label>
                            <input type="varchar" class="text-line" id="nama_lengkap" name="nama_lengkap" value="<?= $profil["nama_lengkap"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Angkatan*</label>
                            <select class="text-line" id="angkatan" name="angkatan" aria-label="Default select example" required>
                                <option selected value="<?= $profil["angkatan"]; ?>"><?= $profil["angkatan"]; ?></option>
                                <option value="Elysium SAARS">Elysium SAARS</option>
                                <option value="Fradella Elvareth">Fradella Elvareth</option>
                                <option value="La Scienza Guardie">La Scienza Guardie</option>
                                <option value="Estrellas De Quatro">Estrellas De Quatro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio Deskripsi</label>
                            <textarea class="text-line" id="bio" name="bio" rows="3"><?= $profil["bio"]; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="univ" class="form-label">Universitas</label>
                            <input type="varchar" class="text-line" id="univ" name="univ" value="<?= $profil["univ"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="bidang" class="form-label">Bidang</label>
                            <select class="text-line" id="bidang" name="bidang" aria-label="Default select example">
                                <option selected value="<?= $profil["bidang"]; ?>"><?= $profil["bidang"]; ?></option>
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
                        </div>
                        <div class="mb-3">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <input type="varchar" class="text-line" id="fakultas" name="fakultas" value="<?= $profil["fakultas"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="varchar" class="text-line" id="jurusan" name="jurusan" value="<?= $profil["jurusan"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_kuliah" class="form-label">Tahun Masuk Kuliah</label>
                            <select class="text-line" id="tahun_kuliah" name="tahun_kuliah" aria-label="Default select example">
                                <option selected value="<?= $profil["tahun_kuliah"]; ?>"><?= $profil["tahun_kuliah"]; ?></option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                </div>
                <div class="col-6 kanan">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="varchar" class="text-line" id="email" name="email" value="<?= $profil["email"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="wa" class="form-label">No. Whatsapp</label>
                            <input type="varchar" class="text-line" id="wa" name="wa" value="<?= $profil["wa"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ig" class="form-label">Instagram</label>
                            <input type="varchar" class="text-line" id="ig" name="ig" value="<?= $profil["ig"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="varchar" class="text-line" id="linkedin" name="linkedin" value="<?= $profil["linkedin"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="varchar" class="text-line" id="pekerjaan" name="pekerjaan" value="<?= $profil["pekerjaan"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="instansi" class="form-label">Instansi/Perusahaan</label>
                            <input type="varchar" class="text-line" id="instansi" name="instansi" value="<?= $profil["instansi"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_kerja" class="form-label">Tahun Mulai Kerja</label>
                            <select class="text-line" id="tahun_kerja" name="tahun_kerja" aria-label="Default select example">
                                <option selected value="<?= $profil["tahun_kerja"]; ?>"><?= $profil["tahun_kerja"]; ?></option>
                                <option value="Sebelumnya">Sebelumnya</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <text style="color: orange; font-style: italic;"> *  Harus Diisi</text>
                        </div>
                        <button type="submit" class="btn btn-outline-warning" name="ubahpp">Save Profile</button>
                </div>
            </div>
            </form>
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

    <script src="js/upload_foto.js"></script>
</body>