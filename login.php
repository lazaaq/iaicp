<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

$db = mysqli_connect("localhost", "iaih7936_flaisarly", "Faisalia2111", "iaih7936_iaicp");

if (isset($_POST['login'])) {

    // ambil data dari formulir
    $username = $_POST['username'];
    $pw = $_POST['pw'];



    // buat query
    global $db;
    $cekemail = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");

    // apakah query simpan berhasil?
    if (mysqli_num_rows($cekemail) === 1) {
        global $pw;
        $row = mysqli_fetch_assoc($cekemail);
        $id_akun = $row["id_akun"];
        $psw = $row["pw"];
        if ($pw === $psw) {
            global $username;
            $_SESSION["username"] = $username;
            $_SESSION["id_akun"] = $id_akun;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAICP | LOGIN</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">

    <link rel="shortcut icon" href="img/logo/3.png">

</head>

<body>
    <header>
        <div class="container">
            <div class="items">
                <img src="img/logo/2.png" alt="HOME" width="50rem" height="auto" id="img1">
                <img src="img/logo/6.png" alt="HOME" width="50rem" height="auto" id="img2">
            </div>
        </div>
    </header>


    <section class="big-login">
        <div class="login-page">
            <div class="box">
                <div class="head">
                    <div class="line"></div>
                    <div class="text">LOG IN</div>
                </div>
                <form action="login.php" method="POST">
                    <div class="body">
                        <div class="text">
                            <?php if (isset($error)) : ?>
                                <p style="font-style: italic;"> Email atau password salah!</p>
                            <?php endif ?>
                        </div>
                        <div class="username pt-2 pb-2">
                            <input type="text" class="text-line" name="username" id="username" placeholder="Username" autocomplete="off" required>
                        </div>
                        <div class="password pt-2 pb-2">
                            <input type="password" class="text-line" name="pw" id="pw" placeholder="Password" required>
                        </div>
                        <div class="submit pt-2">
                            <button name="login" class="btn btn-outline-danger">LOGIN</button>
                        </div>
                        <div class="text text-center pt-3">
                            <p></p>
                            <p>Login As a <a href="guest-index.php">Guest</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="small-login">
        <div class="small-box">
            <div class="wrap">
                <div class="head">
                    <div class="line"></div>
                    <div class="text">LOG IN</div>
                </div>
                <form action="login.php" method="POST">
                    <div class="body">
                        <div class="text">
                            <?php if (isset($error)) : ?>
                                <p style="font-style: italic;"> Email atau password salah!</p>
                            <?php endif ?>
                        </div>
                        <div class="username pt-2 pb-2">
                            <input type="text" class="text-line" name="username" id="username" placeholder="Username" autocomplete="off" required />
                        </div>
                        <div class="password pt-2 pb-2">
                            <input type="password" class="text-line" name="pw" id="pw" placeholder="Password" required>
                        </div>
                        <div class="submit pt-2">
                            <button name="login" class="btn btn-outline-danger">LOGIN</button>
                        </div>
                        <div class="text text-center pt-3">
                            <p></p>
                            <p>Login As a <a href="guest-index.php">Guest</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Javascript -->

</body>

</html>