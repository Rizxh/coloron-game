<?php
session_start();

include 'config.php';
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
$id_user = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id_user'");
$pecah = mysqli_fetch_assoc($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>COLORON GAME</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>COLORON GAME</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="https://greghub.github.io/coloron/public/images/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://greghub.github.io/coloron/public/images/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://greghub.github.io/coloron/public/images/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://greghub.github.io/coloron/public/images/touch-icon-ipad-retina.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="https://greghub.github.io/coloron/public/images/coloron-image.png">
    <meta property="og:image" content="https://greghub.github.io/coloron/public/images/coloron-image.png">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,900'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="splash"></div>
    <div class="container">
        <div class="start-game game-full-flex" id="start-game">
            <!-- Logout -->
            <div class="log-out">
                <!-- Profile Account -->
                <div class="account">
                <a href="account.php?id=<?php echo $pecah['id']; ?>">
                    <img class="gambar" src="user.png" style=
                    "
                    display: flex;
                    width: 60px;
                    height: 60px;
                    margin-top: 20px;
                    margin-left: 1400px;
                    border-radius: 100%;
                    position: relative;
                    ">
                </a> 
                </div>
                <h3 style="display: flex; width: 100%; margin-top: -3.5%; padding-left: 1280px;"><a href="logout.php" style="display: flex; text-decoration: none; color: white; font-family: 'Roboto Bold', sans-serif; background-color: red; padding: 10px; border-radius: 10px;">Logout</a></h3> 
            </div>
            <!-- Display Of Content -->
            <div class="start-game-top" style="margin-top: -20%;"><a class="play-full-page" href="#" target="_blank">Full Page Mode</a></div>
            <div class="logo-holder">
                <p class="logo">
                    <span>C</span>
                    <span>o</span>
                    <span>l</span>
                    <span>o</span>
                    <span>r</span>
                    <span>o</span>
                    <span>n</span>
                </p>
                <a class="play-button" href="#" onclick="game.start()">Mulai</a>
                <h4 class="hint">Petunjuk: Warna <span>merah</span> adalah warna pertama</h4>
            </div>

            <div class="how-to-play">
                <div class="section section-1">
                    <h4>Saat bola memantul<br>bola berganti warna</h4>
                    <div class="content">
                        <div class="ball-demo" id="ball-demo"></div>
                    </div>
                </div>

                <div class="section section-2">
                    <h4>Klik Bar di bawah untuk mengganti warna<br>(Merah, Kuning, Ungu)</h4>
                    <div class="content">
                        <div class="bar bar-1" data-index="0"></div>
                        <div class="bar bar-2"></div>
                        <div class="bar bar-3"></div>
                    </div>
                </div>

                <div class="section section-3">
                    <h4>Cocokan warna<br>bola dengan bar di bawah</h4>
                    <div class="content">
                        <div class="ball-demo" id="ball-demo"></div>
                        <div class="bar bar-1"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stop-game game-full-flex">
            <div class="score-container">
                <h1>Coloron</h1>
                <div class="final-score"></div>
                <div class="result"></div>
                <h4>Ayo Ajak Teman Kamu Juga</h4>
                <p>
                    <a class="tweet" href="https://wa.me/087877368452" onclick="game.generateTweet()">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp
                    </a>
                </p>

                <div>
                    <a class="play-again" href="#" onclick="game.start()">Play Again</a>
                    <a class="main-menu" href="#" onclick="game.intro()">Menu</a>
                </div>

            </div>
        </div>

        <div class="small-glows"></div>

        <div class="glow">
            <div class="sun"></div>
        </div>

        <div class="waves">
            <div class="top_wave"></div>
            <div class="wave1"></div>
            <div class="wave2"></div>
            <div class="wave3"></div>
            <div class="wave4"></div>
        </div>

        <div class="mounts">
            <div class="mount1"></div>
            <div class="mount2"></div>
        </div>

        <div class="clouds"></div>

        <div class="scene">
            <div class="learn-to-play">Klik bar yang ada di bawah untuk mengganti warna!</div>
            <div class="score" id="score"></div>
            <div class="ball-holder"></div>
            <div class="sticks" id="sticks"></div>
        </div>

        <div class="noise"></div>

    </div>

    <!-- partial Js -->
    <script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>
    <script src="script.js"></script>

</body>

</html>