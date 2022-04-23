<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Optional Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <title>ONE DIRECTION FAM!!</title>
    <link rel="icon" href="img/toplogo1.png" type="image/icon type">
</head>

<body>

    <div class="container mt-4">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/style.css">
            <link href='https://css.gg/heart.css' rel='stylesheet'>
            <link href='https://css.gg/phone.css' rel='stylesheet'>
            <link href='https://css.gg/mail.css' rel='stylesheet'>
            <link href='https://css.gg/profile.css' rel='stylesheet'>
            <style>
                /* CSS Reset */
                * {
                    margin: 0;
                    padding: 0;
                    font-family: myFont;
                    scroll-behavior: smooth;
                }

                @font-face {
                    font-family: myFont;
                    src: url('Font/OneDirection.ttf');
                }

                #navbar {
                    display: flex;
                    align-items: center;

                }

                #navbar::before {
                    content: "";
                    background-color: black;
                    position: absolute;
                    top: 0px;
                    left: 0px;

                    height: 17%;
                    width: 100%;
                    z-index: -1;
                    opacity: 0.7;
                }


                #logo {
                    margin: 21px 21px;
                }

                #logo img {
                    margin: -15px -15px;
                    height: 100px;
                }


                #navbar ul {
                    display: flex;
                }

                #navbar ul li {
                    list-style: none;
                }

                #navbar ul li a {
                    color: white;
                    font-size: 1.5rem;
                    display: block;
                    padding: 3px 39px;
                    margin: 19px 26px;
                    text-decoration: none;
                    border-radius: 25px;
                }

                #navbar ul li a:hover {
                    color: skyblue;
                    background-color: #a71010;
                }

                #myVideo {
                    position: absolute;
                    right: 0;
                    bottom: 0;
                    min-width: 100%;
                    min-height: 100%;
                    z-index: -10;
                    background-attachment: scroll;
                }



                section {
                    position: relative;
                }

                #home {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    height: 470px;
                    padding: 21px 21px;
                }

                .phding {
                    font-size: 3.5rem;
                    color: #a71010;
                    animation-name: shanks1;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;

                }

                @keyframes shanks1 {
                    from {
                        color: rgba(167, 16, 16, 0.5);
                        font-size: 50px;

                    }

                    to {
                        color: rgba(167, 16, 16, 1);
                        font-size: 80px;
                    }
                }

                .shding {
                    font-size: 2.5rem;
                    color: white;

                }

                #home p {
                    font-size: 1.5rem;
                    color: aqua;
                    margin: 20px 150px;
                    padding: 35px 60px;
                    text-align: center;
                }

                .btn {
                    margin: -30px 0px;
                    padding: 5px 40px;
                    font-size: 2.2rem;
                    font-weight: bolder;
                    border-radius: 2rem;
                    box-shadow: rgba(167, 16, 16, 0.9) 0.3rem 0.3rem;
                    background-color: rgba(167, 16, 16, 0.4);
                    cursor: pointer;
                    animation-name: shanks;
                    animation-duration: 2s;
                    animation-iteration-count: infinite;
                }

                .btn:hover {
                    background-color: rgba(4, 245, 245, 0.1);
                }

                .center {
                    text-align: center;
                }

                #media {
                    margin: 21px;
                    display: flex;
                }

                #media .box {
                    border: 2px solid brown;
                    padding: 34px;
                    margin: -7px 50px;
                    border-radius: 28px;
                    background: #a71010;
                    margin-bottom: 20px;
                    height: 410px;
                }

                #media .box img {
                    height: 291px;
                    margin: -1px -18px;
                    display: block;
                    width: 300px;
                }

                #logout img {
                    height: 50px;
                    position: absolute;
                    right: 48px;
                    top: 27px;
                    width: 50px;
                    animation-name: rot;
                    animation-duration: 2s;
                    animation-iteration-count: infinite;

                }

                #logout img:hover {
                    height: 55px;
                    width: 55px;

                }

                @keyframes rot {
                    0% {
                        transform: rotate(0deg);
                    }

                    25% {
                        transform: rotate(-45deg);
                    }

                    50% {
                        transform: rotate(45deg);
                    }

                    75% {
                        transform: rotate(-45deg);
                    }

                    100% {
                        transform: rotate(0deg);
                    }

                }

                #media h2 {
                    text-decoration-line: underline;
                    animation-name: shanks;
                    animation-duration: 1s;
                    animation-iteration-count: infinite;
                }

                @keyframes shanks {
                    from {
                        color: rgba(0, 253, 253, 0.4);
                    }

                    to {
                        color: rgba(0, 253, 253, 0.9);
                    }
                }

                #music {
                    height: 351px;
                }

                #available {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    bottom: 900px;
                }

                #available img {
                    height: 151px;
                }

                .site {
                    padding: 34px;
                }

                #available::before {
                    content: "";
                    position: absolute;
                    background: url('img/bg5.jpg');
                    width: 100%;
                    height: 630px;
                    z-index: -1;
                    opacity: 0.8;
                }

                .site:hover {
                    height: 200px;
                }

                #contact h1 {
                    padding-top: 200px;
                    margin: 21px 21px;
                }

                #contact::before {
                    content: "";
                    position: absolute;
                    width: 100%;
                    height: 550px;
                    z-index: -20;
                    opacity: 0.6;
                    background: url(img/bgc2.png) no-repeat center center/cover;
                }

                footer {
                    color: white;
                    background: black;
                    font-family: 'Times New Roman', Times, serif;
                }

                #contact-box {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding-bottom: 21px;

                }

                #contact-box input {
                    font-family: 'Times New Roman', Times, serif;
                    width: 100%;
                    padding: 0.5rem;
                    font-size: larger;
                    font-weight: bold;
                    border: 4px inset #a71010;
                    text-align: center;
                    color: #a71010;
                    box-shadow: #a71010 2px 2px;
                    text-shadow: #a71010 1px 1px;
                }

                #contact-box form {
                    width: 40%;
                }

                .gg-profile {
                    color: #a71010;
                    top: 32px;
                    left: -28px;

                }

                .gg-mail {
                    color: #a71010;
                    top: 30px;
                    left: -26px;

                }

                .gg-phone {
                    color: #a71010;
                    top: 33px;
                    left: -28px;

                }

                .gg-heart {
                    color: #a71010;
                    top: 25px;
                    left: -22px;

                }
            </style>
        </head>

        <body>
            <video poster="poster.png" autoplay muted loop id="myVideo">
                <source src="video/bg.mp4" type="video/mp4">
            </video>
            <nav id="navbar">
                <div id="logo">
                    <img src="img/logo.jpg" alt="1D">
                </div>
                <ul>
                    <li class="item"><a href="#ahome">Home</a></li>
                    <li class="item"><a href="#amedia">Media</a></li>
                    <li class="item"><a href="#amusic">MUSIC</a></li>
                    <li class="item"><a href="#acontact">Contact Us</a></li>
                </ul>
                <div id="logout">
                    <a href="logout.php"><img src="img/logout2.webp" alt="LOGOUT"></a>
                </div>
            </nav>
            <section id="home">
                <h1 class="phding center" id="ahome">Welcome to ONE D FAM!!!!!</h1>
                <p>One Direction, often shortened to One D, are an English-Irish pop boy band formed in London, England. The
                    group are composed of Niall Horan, Liam Payne, Harry Styles and Louis Tomlinson.</p>
                <button class="btn">Join Now..!</button>
            </section>

            <section class="media-container">
                <h1 class="phding center" id="amedia">MEDIA</h1>
                <div id="media">
                    <div class="box">
                        <img src="img/1.jpg" alt="">
                        <h2 class="shding center">MADE IN THE A.M.</h2>
                        <p class="center">Made in the A.M. is the fifth studio album by One Direction.Made in the A.M. was the
                            sixth best-selling album that year.</p>
                    </div>
                    <div class="box">
                        <img src="img/2.jpg" alt="">
                        <h2 class="shding center">UP ALL NIGHT</h2>
                        <p class="center">Up All Night is the debut album from One Direction. It was first released in Ireland
                            and the United Kingdom through Syco Records. It was later released in North America.</p>
                    </div>
                    <div class="box">
                        <img src="img/3.jpg" alt="">
                        <h2 class="shding center">FOUR</h2>
                        <p class="center">Four is the fourth album released by One Direction.Four was the band's first
                            criticially acclaimed album.One Direction became the first band ever to have all four albums debut
                            at number one.</p>
                    </div>
                </div>
            </section>
            <section id="Music">
                <h1 class="phding center" id="amusic">Available on</h1>
                <div id="available">
                    <div class="site"><a href="https://gaana.com/artist/one-direction" target="_blank">
                            <img src="img/logo1.webp" alt="Available On">
                        </a>
                    </div>
                    <div class="site"><a href="https://soundcloud.com/onedirectionmusic" target="_blank">
                            <img src="img/logo2.webp" alt="Available On">
                        </a>
                    </div>
                    <div class="site"><a href="https://www.youtube.com/channel/UCb2HGwORFBo94DmRx4oLzow" target="_blank">
                            <img src="img/logo3.webp" alt="Available On">
                        </a>
                    </div>
                    <div class="site"><a href="https://music.apple.com/us/artist/one-direction/396754057" target="_blank">
                            <img src="img/logo4.webp" alt="Available On">
                        </a>
                    </div>
                    <div class="site"><a href="https://open.spotify.com/artist/4AK6F7OLvEQ5QYCBNiQWHq" target="_blank">
                            <img src="img/logo5.webp" alt="Available On">
                        </a>
                    </div>
                </div>
            </section>
            <section id="contact">
                <h1 class="center" id="acontact" style="font-size: 3.5rem; color: #a71010;">Contact Us</h1>
                <div id="contact-box">
                    <form action="">
                        <div class="form-group">
                            <i class="gg-profile"></i>

                            <input type="text" name="name" id="name" placeholder="Enter your Name" value=<?php echo $_SESSION['username'] ?>>
                        </div>
                        <div class="form-group">
                            <i class="gg-mail"></i>

                            <input type="email" name="email" id="email" placeholder="Enter your Email">
                        </div>
                        <div class="form-group">
                            <i class="gg-phone"></i>

                            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
                        </div>
                        <div class="form-group">
                            <i class="gg-heart"></i>

                            <input type="text" name="name2" id="name2" placeholder="Enter your Favourite Band Member Name">
                        </div>
                    </form>
                </div>
            </section>
            <footer class="center">
                Copyright &copy; www.onedirectionfandom.com All Rights Reserved!
            </footer>
        </body>

        </html>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>