<?php
    require 'config.php';
    $db = mysqli_connect("localhost", "iaih7936_flaisarly", "Faisalia2111", "iaih7936_iaicp");
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
    <link rel="stylesheet" href="css/index.css">
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

    

    <section class="hero" id="home">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/background/icp.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Ikatan Alumni Insan Cendekia Pekalongan</h5>
                        <p>2015-2021</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/background/elsa.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Angkatan 1</h5>
                        <p>Elysium SAARS</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/background/fe.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Angkatan 2</h5>
                        <p>Fradella Elvareth</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/background/lsg.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Angkatan 3</h5>
                        <p>La Scienza Guardie</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/background/estro.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Angkatan 4</h5>
                        <p>Estrellas De Quatro</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev carousel-btn" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next carousel-btn" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="text">
            WELCOME TO IAICP
            <div class="horizontal-line"></div>
            <div class="deskripsi mt-3">Ikatan Alumni Insan Cendekia Pekalongan</div>
            <div class="row sosmed justify-content-center align-items-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 item">
                    <a href="https://www.instagram.com/iaicpkl/">
                        <img src="img/sosmed/instagram.svg" alt="Instagram">
                        <div class="sosmed-text">Instagram</div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 item">
                    <a href="https://medium.com/ia-icp">
                        <img src="img/sosmed/medium.svg" alt="Medium">
                        <div class="sosmed-text">Medium</div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 item">
                    <a href="mailto:iaicp2019@gmail.com">
                        <img src="img/sosmed/mail.svg" alt="Email">
                        <div class="sosmed-text">Email</div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 item">
                    <a href="https://www.youtube.com/channel/UCrvWpaqEEIZVoTe-X5NVmiw">
                        <img src="img/sosmed/youtube.svg" alt="Youtube">
                        <div class="sosmed-text">Youtube</div>
                    </a>
                </div>
            </div>
        </div>
        
    </section>
        
    <div class="angkatan">
        <div class="container">
            <div class="row">
                <div class="col head">
                    <div class="line"></div>
                    <div class="judul">ANGKATAN</div>
                    <div class="horizontal-line-judul"></div>
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="c c1 col-6 col-sm-4 col-md-3">
                    <div class="box text-center">
                        <div class="deskripsi">
                            <div class="text"> Elysium SAARS </div>
                        </div>
                        <div class="deskripsi-angkatan">
                            <div class="horizontal-line"></div>
                            <div class="nomor">
                                First Generation
                            </div>
                        </div>
                        <div class="tombol">
                        <form action="guest-angkatan.php" method="POST">
                            <input type="hidden" name="angkatan" value="Elysium SAARS">
                            <button type="submit" name="open">Lihat</button>
                        </form>
                        </div>
                    </div>
                </div>

                <div class="c c1 col-6 col-sm-4 col-md-3">
                    <div class="box text-center">
                        <div class="deskripsi">
                            <div class="text">Fradella Elvareth</div>
                        </div>
                        <div class="deskripsi-angkatan">
                            <div class="horizontal-line"></div>
                            <div class="nomor">
                                Second Generation
                            </div>
                        </div>
                        <div class="tombol">
                        <form action="guest-angkatan.php" method="POST">
                            <input type="hidden" name="angkatan" value="Fradella Elvareth">
                            <button type="submit" name="open">Lihat</button>
                        </form>
                        </div>
                    </div>
                </div>
 
                <div class="c c1 col-6 col-sm-4 col-md-3">
                    <div class="box text-center">
                        <div class="deskripsi">
                            <div class="text">La Scienza Guardie</div>
                        </div>
                        <div class="deskripsi-angkatan">
                            <div class="horizontal-line"></div>
                            <div class="nomor">
                                Third Generation
                            </div>
                        </div>
                        <div class="tombol">
                            <form action="guest-angkatan.php" method="POST">
                                <input type="hidden" name="angkatan" value="La Scienza Guardie">
                                <button type="submit" name="open">Lihat</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="c c1 col-6 col-sm-4 col-md-3">
                    <div class="box text-center">
                        <div class="deskripsi">
                            <div class="text">Estrellas De Quatro</div>
                        </div>
                        <div class="deskripsi-angkatan">
                            <div class="horizontal-line"></div>
                            <div class="nomor">
                                Fourth Generation
                            </div>
                        </div>
                        <div class="tombol">
                        <form action="guest-angkatan.php" method="POST">
                            <input type="hidden" name="angkatan" value="Estrellas De Quatro">
                            <button type="submit" name="open">Lihat</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bidang">
        <div class="container">
            <div class="row">
                <div class="col head">
                    <div class="line"></div>
                    <div class="judul">BIDANG</div>
                    <div class="horizontal-line-judul"></div>
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                <?php 
                    $bidang_names = array("Agama", "Ekonomi", "Ilmu Murni", "Kesehatan", "Pendidikan", "Perikanan", "Pertanian", "Peternakan", "Sastra", "Seni", "Sospol", "Teknik");

                    foreach ($bidang_names as $bidang_name) {
                        echo "
                        <div class=\"c col-6 col-sm-4 col-md-3 col-lg-2\">
                            <div class=\"box\">
                                <div class=\"deskripsi\">
                                    <div class=\"text\"> " . $bidang_name . "</div>
                                </div>
                                <div class=\"tombol\">
                                    <form action=\"guest-bidang.php\" method=\"POST\">
                                        <input type=\"hidden\" name=\"bidang\" value=\"" . $bidang_name . "\">
                                        <button type=\"submit\" name=\"open\">Lihat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>
        
    <section class="about">
        <div class="background">
            <div class="container">
                <div class="row head">
                    <div class="col">
                        <div class="judul">ABOUT IAICP</div>
                    </div>
                </div>
                <div class="row subhead">
                    <div class="col">
                        <div class="hr"></div>
                    </div>
                </div>
                <div class="row body justify-content-center">
                    <div class="col col-12 col-md-9">
                        <div class="box">
                            <div class="wrap">
                                <div class="text">
                                    IAICP adalah suatu komunitas yang menjadi wadah para alumni MAN Insan Cendekia Pekalongan agar tetap saling terhubung satu sama lain. Diharapkan dengan adanya web apps ini dapat membantu dalam kehidupan kampus maupun pekerjaan kita semua ke depannya.
                                </div>
                                <div class="tombol">
                                    <a href="guest-about.php">
                                        <div class="lihat-selengkapnya">Lihat Selengkapnya</div>
                                    </a>
                                </div>
                            </div>
                        </div>
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
</html>