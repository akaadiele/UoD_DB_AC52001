<?php
session_start();  // Start session
include("../sources/php/db.php"); // Connect to database
?>


<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>FutureFit</title>

  <!-- Generic styles for this page -->
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../sources/assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="home.css" rel="stylesheet">

  <!-- Linking browser tab icon -->
  <link rel="icon" href="../sources/img/future-fit-image.ico">
</head>

<!-- <body class="d-flex h-100 text-center text-bg-dark "> -->

<body class="d-flex h-100 text-center bg-body-tertiary">
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path
        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
      aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>

    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
          aria-pressed="true">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div>


  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0">Future Fit</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="../homepage/home.php">Home</a> &nbsp;
          <a class="nav-link fw-bold py-1 px-0" href="../productsInfo/productsInfo.php">Our Products</a>&nbsp;
          <a class="nav-link fw-bold py-1 px-0" href="" data-bs-toggle="modal" data-bs-target="#signInModal">Sign In</a>&nbsp;
        </nav>
      </div>
    </header>

    <main class="px-3">
      <!-- <h1>Getting you fit for the future</h1> -->
      <!-- <p class="lead">***Cover is a one-page template for building simple and beautiful home pages. Download, edit the
        text, and add your own fullscreen background photo to make it your own.</p> -->
      <h1>Welcome to Future Fit</h1>
      <p class="lead">The future of fitness is here</p>
      <p class="lead">
        <a href="../productsInfo/productsInfo.php" class="btn btn-lg btn-light fw-bold border-white bg-white">Explore...</a>
      </p>
    </main>

    <footer class="mt-auto text-white-50">
      <p>Made with features from <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a></p>
    </footer>
  </div>



  <!-- Modals -->
  <!-- Modal - Sign In -->
  <div class="modal fade" id="signInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <?php
        include('sign-in.php');
        ?>

      </div>
    </div>
  </div>


  <!-- Modal - Sign Up -->
  <div class="modal fade" id="signUpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <?php
        include('sign-up.php');
        ?>

      </div>
    </div>
  </div>

  <!-- Modals -->

  <script src="../sources/assets/js/color-modes.js"></script>
  <script src="../sources/assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>



<!-- Sign in logic -->
<?php
include("../sources/php/functions.php");

if (isset($_POST['userLogInButton'])) {
  $username = $_POST['username'];
  $userPassword = $_POST['userPassword'];
  $userType = test_input($_POST["userType"]);

  if ((isset($userType)) and ($userType == "customer")) {
    // Query to check if customer login already exist
    $select_query_userLogin = "SELECT customerId, customerUsername FROM `CustomerLogin` WHERE customerUsername = '$username' ";

    if ($select_query_userLogin) {
      $select_query_userLogin_result = mysqli_query($mysql, $select_query_userLogin);
      $select_query_userLogin_result_numRows = mysqli_num_rows($select_query_userLogin_result);

      if ($select_query_userLogin_result_numRows > 0) {
        $row = mysqli_fetch_assoc($select_query_userLogin_result);

        $loggedInId = $row['customerId'];
        $loggedInUsername = $row['customerUsername'];


        $_SESSION["loggedInUsername"] = $loggedInUsername;
        if (isset($_SESSION["loggedInUsername"])) {
          // echo "<script> alert('---log username $loggedInUsername ---') </script>";
        }

        $_SESSION["loggedInUserType"] = $userType;
        if (isset($_SESSION["loggedInUsername"])) {
          // echo "<script> alert('---user type $userType ---') </script>";
        }

        $_SESSION["loggedInId"] = $loggedInId;
        if (isset($_SESSION["loggedInUsername"])) {
          // echo "<script> alert('---log id  $loggedInId ---') </script>";
        }

        echo "<script> alert('Login Successful') </script>";
        echo '<script> window.open("../dashboard/index.php", "_self") </script>';
      } else {
        echo "<script> alert('Invalid username or password') </script>";
      }
    } else {
      echo "<script> alert('User not found') </script>";
    }
  } elseif ((isset($userType)) and ($userType == "employee")) {
    // Query to check if employee login already exist
    $select_query_userLogin = "SELECT employeeId, employeeUsername FROM `employeelogin` WHERE employeeUsername = '$username' ";

    if ($select_query_userLogin) {
      $select_query_userLogin_result = mysqli_query($mysql, $select_query_userLogin);
      $select_query_userLogin_result_numRows = mysqli_num_rows($select_query_userLogin_result);

      if ($select_query_userLogin_result_numRows > 0) {
        $row = mysqli_fetch_assoc($select_query_userLogin_result);

        $loggedInId = $row['employeeId'];
        $loggedInUsername = $row['employeeUsername'];

        $_SESSION["loggedInUsername"] = $loggedInUsername;
        if (isset($_SESSION["loggedInUsername"])) {
          // echo "<script> alert('---log username $loggedInUsername ---') </script>";
        }

        $_SESSION["loggedInUserType"] = $userType;
        if (isset($_SESSION["loggedInUsername"])) {
          // echo "<script> alert('---user type $userType ---') </script>";
        }

        $_SESSION["loggedInId"] = $loggedInId;
        if (isset($_SESSION["loggedInUsername"])) {
          // echo "<script> alert('---log id  $loggedInId ---') </script>";
        }

        echo "<script> alert('Login Successful') </script>";
        echo '<script> window.open("../dashboard/index.php", "_self") </script>';
      } else {
        echo "<script> alert('Invalid username or password') </script>";
      }
    } else {
      echo "<script> alert('User not found') </script>";
    }
  }
}
?>



<!-- Sign Up Logic -->
<?php
if (isset($_POST['registerUser'])) {
  $fullName = $_POST['fullName'];
  $emailAddress = $_POST['emailAddress'];
  $phoneNumber = $_POST['phoneNumber'];
  $customerAddress = $_POST['customerAddress'];
  $customerType = $_POST['customerType'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  if ($confirmPassword != $password) {
    echo "<script> alert('Passwords do not match') </script>";
  } else {

    // Query to check if customer already exist
    $select_query_cust = "SELECT * FROM `Customer` WHERE customerName = '$fullName' OR customerEmail = '$emailAddress' OR customerPhone = '$phoneNumber' ";

    $select_query_cust_result = mysqli_query($mysql, $select_query_cust);
    $select_query_cust_result_numRows = mysqli_num_rows($select_query_cust_result);

    // Query to check if customer login already exist
    $select_query_custLogin = "SELECT * FROM `CustomerLogin` WHERE customerUsername = '$username'";
    $select_query_custLogin_result = mysqli_query($mysql, $select_query_custLogin);
    $select_query_custLogin_result_numRows = mysqli_num_rows($select_query_custLogin_result);


    if ($select_query_cust_result_numRows > 0) {
      echo "<script> alert('Customer already exists') </script>";
    } elseif ($select_query_custLogin_result_numRows > 0) {
      echo "<script> alert('Username already exists') </script>";
    } else {
      // Query to insert customer
      $insert_query_cust = "INSERT INTO `Customer` (`customerName`,`customerEmail`,`customerPhone`,`customerAddress`,`customerTypeId`) VALUES ('$fullName','$emailAddress','$phoneNumber','$customerAddress',$customerType)";
      $insert_query_cust_result = mysqli_query($mysql, $insert_query_cust);
      // echo "<script> alert('Customer Result is- $insert_query_cust_result -') </script>"; // ###

      // Query to insert customer login
      $insert_query_custLogin = "INSERT INTO `CustomerLogin` (`customerId`,`customerUsername`,`customerPassword`) VALUES ($insert_query_cust_result,'$username','$password')";
      $insert_query_custLogin_result = mysqli_query($mysql, $insert_query_custLogin);
      // echo "<script> alert('Customer LoginResult is- $insert_query_custLogin_result -') </script>"; // ###

      if ($insert_query_cust_result && $insert_query_custLogin_result) {
        echo "<script> alert('User Registered successfully') </script>";
      }
    }
  }
}
?>