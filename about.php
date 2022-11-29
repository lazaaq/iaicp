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
    $idihsan = 4;
    $ihsan = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $idihsan");
    $ihsanf = mysqli_fetch_assoc($ihsan);
    $idtiara = 91;
    $tiara = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $idtiara");
    $tiaraf = mysqli_fetch_assoc($tiara);
    $idfirsta = 36;
    $firs = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $idfirsta");
    $firstaf = mysqli_fetch_assoc($firs);
    $id1 = 6;
    $aina = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id1");
    $ainaf = mysqli_fetch_assoc($aina);
    $id2 = 20;
    $asa = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id2");
    $asaf = mysqli_fetch_assoc($asa);
    $id3 = 56;
    $abi = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id3");
    $abif = mysqli_fetch_assoc($abi);
    $id4 = 72;
    $nayla = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id4");
    $naylaf = mysqli_fetch_assoc($nayla);
    $id5 = 3;
    $akmal = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id5");
    $akmalf = mysqli_fetch_assoc($akmal);
    $id6 = 66;
    $mufqi = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id6");
    $mufqif = mysqli_fetch_assoc($mufqi);
    $id7 = 22;
    $wodha = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id7");
    $wodhaf = mysqli_fetch_assoc($wodha);
    $id8 = 92;
    $ulya = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id8");
    $ulyaf = mysqli_fetch_assoc($ulya);
    $id9 = 8;
    $arafi = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id9");
    $arafif = mysqli_fetch_assoc($arafi);
    $id10 = 19;
    $arin = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id10");
    $arinf = mysqli_fetch_assoc($arin);
    $id11 = 41;
    $halima = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id11");
    $halimaf = mysqli_fetch_assoc($halima);
    $id12 = 63;
    $alfath = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id12");
    $alfathf = mysqli_fetch_assoc($alfath);
    $id13 = 10;
    $syafi = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id13");
    $syafif = mysqli_fetch_assoc($syafi);
    $id14 = 13;
    $alif = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id14");
    $aliff = mysqli_fetch_assoc($alif);
    $id15 = 46;
    $jay = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id15");
    $jayf = mysqli_fetch_assoc($jay);
    $id16 = 61;
    $haifzh = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id16");
    $hafizhf = mysqli_fetch_assoc($haifzh);
    $id17 = 62;
    $haidar = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id17");
    $haidarf = mysqli_fetch_assoc($haidar);
    $id18 = 99;
    $afifah = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id18");
    $afifahf = mysqli_fetch_assoc($afifah);
    $id19 = 116;
    $aqil = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id19");
    $aqilf = mysqli_fetch_assoc($aqil);
    $id20 = 1;
    $isal = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id20");
    $isalf = mysqli_fetch_assoc($isal);
    $id21 = 126;
    $diba = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id21");
    $dibaf = mysqli_fetch_assoc($diba);
    $id22 = 120;
    $difa = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id22");
    $difaf = mysqli_fetch_assoc($difa);
    $id23 = 159;
    $zaka = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id23");
    $zakaf = mysqli_fetch_assoc($zaka);
    $id24 = 179;
    $shafa = mysqli_query($db, "SELECT * FROM profil WHERE id_akun = $id24");
    $shafaf = mysqli_fetch_assoc($shafa);
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
    <link rel="stylesheet" href="css/about.css">
    
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

    <section class="about-judul">
        <div class="container">
            <div class="text">
                ABOUT IAICP
            </div>
        </div>
    </section>

    <section class="contents">
        <div class="cont">
            <div class="deskripsi">
                IAICP adalah suatu komunitas yang menjadi wadah para alumni MAN Insan Cendekia Pekalongan agar tetap saling terhubung satu sama lain. Diharapkan dengan adanya web apps ini dapat membantu dalam kehidupan kampus maupun pekerjaan kita semua ke depannya.
            </div>
            <div class="pengurus">PENGURUS</div>

            <!-- BPH -->
            <div class="bph" id="bph">
                <button class="judul" id="tambah-bph" onclick='show_box_bph()'>BPH</button>
                <button class="judul" id="tutup-bph" onclick='hide_box_bph()'>BPH</button>
                <div class="box-bph box-wrap" id="box-bph">
                    <div class="horizontal-line"></div>
                    <div class="wrap">
                        <a href="person.php?id_akun=<?= $ihsanf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $ihsanf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $ihsanf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Ketua Umum</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="wrap">
                        <a href="person.php?id_akun=<?= $tiaraf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $tiaraf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $tiaraf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Wakil Ketua Umum</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $firstaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $firstaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $firstaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Sekretaris Umum</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $ainaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $ainaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $ainaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Bendahara Umum</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="humas" id="humas">
                <button class="judul" id="tambah-humas" onclick='show_box_humas()'>HUMAS</button>
                <button class="judul" id="tutup-humas" onclick='hide_box_humas()'>HUMAS</button>
                <div class="box-humas box-wrap" id="box-humas">
                    <div class="horizontal-line"></div>
                    <div class="wrap">
                        <a href="person.php?id_akun=<?= $naylaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $naylaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $naylaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Ketua Divisi</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $asaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $asaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $asaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $abif["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $abif["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $abif["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $aqilf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $aqilf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $aqilf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Fradella Elvareth</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $difaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $difaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $difaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Fradella Elvareth</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="wrap">
                        <a href="person.php?id_akun=<?= $zakaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $zakaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $zakaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Fradella Elvareth</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="kreatif" id="kreatif">
                <button class="judul" id="tambah-kreatif" onclick='show_box_kreatif()'>KREATIF</button>
                <button class="judul" id="tutup-kreatif" onclick='hide_box_kreatif()'>KREATIF</button>
                <div class="box-kreatif box-wrap" id="box-kreatif">
                    <div class="horizontal-line"></div>
                    <div class="wrap">
                        <a href="person.php?id_akun=<?= $akmalf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $akmalf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $akmalf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Ketua Divisi</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $ulyaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $ulyaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $ulyaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $mufqif["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $mufqif["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $mufqif["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $wodhaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $wodhaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $wodhaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $shafaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $shafaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $shafaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Fradella Elvareth</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $isalf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $isalf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $isalf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Fradella Elvareth</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $dibaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $dibaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $dibaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Fradella Elvareth</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="rohani" id="rohani">
                <button class="judul" id="tambah-rohani" onclick='show_box_rohani()'>ROHANI</button>
                <button class="judul" id="tutup-rohani" onclick='hide_box_rohani()'>ROHANI</button>
                <div class="box-rohani box-wrap" id="box-rohani">
                    <div class="horizontal-line"></div>
                    <div class="wrap">
                        <a href="person.php?id_akun=<?= $arinf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $arinf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $arinf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Ketua Divisi</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $halimaf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $halimaf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $halimaf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $arafif["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $arafif["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $arafif["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $alfathf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $alfathf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $alfathf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $afifahf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $afifahf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $afifahf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Fradella Elvareth</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Staff</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="regional" id="regional">
                <button class="judul" id="tambah-regional" onclick='show_box_regional()'>KETUA REGIONAL</button>
                <button class="judul" id="tutup-regional" onclick='hide_box_regional()'>KETUA REGIONAL</button>
                <div class="box-regional box-wrap" id="box-regional">
                    <div class="horizontal-line"></div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $hafizhf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $hafizhf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $hafizhf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Jabodetabek</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $syafif["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $syafif["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $syafif["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Bandung</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="berdua">
                        <a href="person.php?id_akun=<?= $jayf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $jayf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $jayf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Semarang-Purwokerto-Pekalongan</div>
                            </div>
                        </div>
                        </a>
                        <a href="person.php?id_akun=<?= $haidarf["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $haidarf["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $haidarf["nama_lengkap"]; ?></div>
                                <div class="angkatan">Elysium SAARS</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Jogja-Solo</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="wrap">
                        <a href="person.php?id_akun=<?= $aliff["id_akun"]; ?>">
                        <div class="box-orang">
                            <div class="image">
                                <img src="img/orang/<?= $aliff["foto"]; ?>" alt="Picture">
                            </div>
                            <div class="text">
                                <div class="nama"><?= $aliff["nama_lengkap"]; ?></div>
                                <div class="angkatan">Angkatan</div>
                                <div class="horizontal-line"></div>
                                <div class="jabatan">Malang-Surabaya</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="developer">
        <div class="container">
            <div class="row">
                <div class="col head">
                    <div class="line"></div>
                    <div class="judul">DEVELOPER</div>
                    <div class="horizontal-line-judul"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="c col-6">
                    <div class="box">
                        <div class="gambar">
                            <img src="img/developer/isal2.jpg" alt="Picture">
                        </div>
                        <div class="deskripsi">
                            <div class="text">
                                <p>Faisal Ibrahim Abusalam</p>
                                <p class="type1">-</p>
                                <p style="color: orange;">Fradella Elvareth</p>
                            </div>
                            <div class="horizontal-line"></div>
                            <div class="keahlian mt-2">
                                <p>Backend Developer</p>
                                <p>UX Researcher</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c col-6">
                    <div class="box">
                        <div class="gambar">
                            <img src="img/developer/ipul.png" alt="Picture">
                        </div>
                        <div class="deskripsi">
                            <div class="text">
                                <p>Lana Saiful Aqil</p>
                                <p class="type1">-</p>
                                <p style="color: orange;">La Scienza Guardie</p>
                            </div>
                            <div class="horizontal-line"></div>
                            <div class="keahlian mt-2">
                                <p>Frontend Developer</p>
                                <p>UI Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

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
    <script src="js/about.js"></script>
    <script type='text/javascript'> 
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>
</html>