<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Username cannot be blank";
  } else {
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set the value of param username
      $param_username = trim($_POST['username']);

      // Try to execute this statement
      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already taken";
        } else {
          $username = trim($_POST['username']);
        }
      } else {
        echo "Something went wrong";
      }
    }
  }

  mysqli_stmt_close($stmt);


  // Check for password
  if (empty(trim($_POST['password']))) {
    $password_err = "Password cannot be blank";
  } elseif (strlen(trim($_POST['password'])) < 5) {
    $password_err = "Password cannot be less than 5 characters";
  } else {
    $password = trim($_POST['password']);
  }

  // Check for confirm password field
  if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
    $password_err = "Passwords should match";
  }


  // If there were no errors, go ahead and insert into the database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

      // Set these parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      // Try to execute the query
      if (mysqli_stmt_execute($stmt)) {
        header("location: login.php");
      } else {
        echo "Something went wrong... cannot redirect!";
      }
    }
    mysqli_stmt_close($stmt);
  }
  mysqli_close($conn);
}
?>




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Optional Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css"> -->
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
      opacity: 0.4;
    }

    .container::before {
      content: "";
      position: absolute;
      background: url('poster1.jpg') no-repeat center center/cover;
      height: 642px;
      top: 0px;
      left: 0px;
      width: 100%;
      z-index: -1;
      opacity: 0.65;
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

    #formm label {
      font-family: 'Bungee', cursive;
      font-weight: bolder;
      color: #a71010;
    }

    .btn {
      margin: 19px 142px;
      padding: 2px 40px;
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

    #p {
      position: absolute;
      top: 355px;
      left: 418px;
    }

    #cp {
      position: absolute;
      top: 443px;
      left: 418px;
    }

    #u {
      position: absolute;
      top: 270px;
      left: 418px;
    }
  </style>
  <title>ONE DIRECTION FAM!!</title>
  <link rel="icon" href="img/toplogo1.png" type="image/icon type">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
    <h3 id="xyz">Please Register Here:</h3>
    <div id="formm">
      <form action="" method="post">
        <div class="form-row">

          <div class="form-group col-md-6">
            <span id="u" class="material-symbols-outlined">
              person
            </span>
            <label for="inputEmail4">Username</label>
            <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Enter Username">
          </div>
          <div class="form-group col-md-6">
            <span id="p" class="material-symbols-outlined">
              vpn_key
            </span>
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <span id="cp" class="material-symbols-outlined">
            vpn_key
          </span>
          <label for="inputPassword4">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" id="inputPassword" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
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