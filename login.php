<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
  header("location: welcome.php");
  exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
    $err = "Please enter Username + Password";
  } else {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }


  if (empty($err)) {
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;


    // Try to execute this statement
    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
        if (mysqli_stmt_fetch($stmt)) {
          if (password_verify($password, $hashed_password)) {
            // this means the password is corrct. Allow user to login
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            $_SESSION["loggedin"] = true;

            //Redirect user to welcome page
            header("location: welcome.php");
          }
        }
      }
    }
  }
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Optional Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>ONE DIRECTION FAM!!</title>
  <link rel="icon" href="img/toplogo1.png" type="image/icon type">
  <style>
    .navbar {
      display: flex;
      align-items: center;

    }

    @font-face {
      font-family: myFont;
      src: url('Font/OneDirection.ttf');
    }

    .navbar ul {
      display: flex;
    }

    #logo img {
      margin: 6px 20px;
      /* padding: 8px 24px; */
      top: 2px;
      position: absolute;
      height: 85px;
    }


    .navbar ul li {
      margin: 21px 21px;
      list-style-type: none;

    }

    .navbar ul li a {
      color: white;
      font-size: 1.5rem;
      font-family: myFont;
      display: block;
      padding: 3px 40px;
      margin: 0px 40px;
      text-decoration: none;
      border-radius: 25px;

    }

    .navbar ul li a:hover {
      color: skyblue;
      background-color: #a71010;
    }

    .navbar::before {
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

    .container::before {
      content: "";
      position: absolute;
      background: url('poster.jpg') no-repeat center center/cover;
      height: 642px;
      top: 0px;
      left: 0px;
      width: 100%;
      z-index: -1;
      opacity: 0.6;
    }

    #xyz {
      text-align: center;
      font-size: 3rem;
      font-family: myFont;
      color: #a71010;
      animation-name: shanks1;
      animation-iteration-count: infinite;
      animation-duration: 1s;

    }

    #u {
      position: absolute;
      top: 270px;
      left: 470px;
    }

    #p {
      position: absolute;
      top: 355px;
      left: 465px;
    }

    @keyframes shanks1 {
      from {
        color: rgba(167, 16, 16, 0.5);


      }

      to {
        color: rgba(167, 16, 16, 1);

      }
    }

    #formm {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    #formm input {
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

    .btn {
      margin: 17px 100px;
      padding: 0px 26px;
      font-size: 2rem;
      font-weight: bolder;
      font-family: myFont;
      border-radius: 2rem;
      box-shadow: rgba(167, 16, 16, 0.9) 0.3rem 0.3rem;
      background-color: rgba(167, 16, 16, 0.4);
      cursor: pointer;
      animation-name: shanks1;
      animation-duration: 2s;
      animation-iteration-count: infinite;
    }

    .btn:hover {
      background-color: rgba(4, 245, 245, 0.9);
      font-size: 2.3rem;
    }

    #formm label {
      font-family: 'Bungee', cursive;
      font-weight: bolder;
      color: #a71010;
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <div id="logo">
      <img src="img/logo.jpg" alt="1D">
    </div>

    <ul class="navbar-nav">
      <li>
        <a class="nav-link" href="#">Home</a>
      </li>
      <li>
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li>
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li>
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

    </ul>
  </nav>

  <div class="container mt-4">
    <h3 id="xyz">Please Login Here:</h3>

    <div id="formm">
      <form action="" method="post">
        <div class="form-group">
          <span id="u" class="material-symbols-outlined">
            person
          </span>
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <span id="p" class="material-symbols-outlined">
            vpn_key
          </span>
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
        </div>

        <button type="submit" class="btn btn-primary">Log In</button>
      </form>
    </div>


  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>