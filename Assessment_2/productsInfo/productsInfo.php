<?php
session_start();  // Start session
include("../sources/php/db.php"); // Connect to database
include("../sources/php/functions.php"); // custom functions

$loggedInStatus = "";
if (isset($_SESSION["loggedInUsername"])) {
  $loggedInUsername = $_SESSION["loggedInUsername"];
  $userType = $_SESSION["loggedInUserType"];
  $loggedInId = $_SESSION["loggedInId"];
  $loggedInUserPrivilegeLevel = $_SESSION["loggedInUserPrivilegeLevel"];

  $loggedInStatus = "Y";
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Products</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="../sources/assets/dist/css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this page -->
  <link href="productsInfo.css" rel="stylesheet">

  <!-- Linking browser tab icon -->
  <link rel="icon" href="../sources/img/future-fit-image.ico">
</head>

<body>
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


  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
      stroke-width="2" viewBox="0 0 24 24">
      <circle cx="12" cy="12" r="10" />
      <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
    </symbol>
    <symbol id="cart" viewBox="0 0 16 16">
      <path
        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
    <symbol id="chevron-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
    </symbol>
  </svg>


  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto px-5">
      <div>
        <h3 class="float-md-start mb-0">Future Fit</h3>

        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="../homepage/home.php">Home</a> &nbsp;
          <a class="nav-link fw-bold py-1 px-0 active" href="../productsInfo/productsInfo.php">Our Products</a>&nbsp;

          <?php if ($loggedInStatus == "Y") {
            echo '<a class="nav-link fw-bold py-1 px-0" aria-current="page" href="../dashboard/index.php">Account</a> &nbsp;';
          } else {
            echo '<a class="nav-link fw-bold py-1 px-0" href="" data-bs-toggle="modal" data-bs-target="#signInModal">Sign In</a>&nbsp;';
          }
          ?>

        </nav>
      </div>
    </header>
  </div>

  <main>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
      <div class="col-md-6 p-lg-5 mx-auto my-5">
        <h1 class="display-4 fw-bold">Not sure how to start?</h1>
        <h3 class="fw-normal text-muted mb-3">Book and appointment with us today</h3>
        <div class="d-flex gap-3 justify-content-center lead fw-normal">

          <?php
          if ($loggedInStatus == "Y") {
            echo '<a class="icon-link" href="" data-bs-toggle="modal" data-bs-target="#appointmentModal"><em>Make a booking</em> <svg class="bi"><use xlink:href="#chevron-right" /></svg> </a>';
          } else {
            echo '<a class="icon-link" href="#" data-bs-toggle="modal" data-bs-target="#signInModal"><em>Sign in to make a booking</em> <svg class="bi"><use xlink:href="#chevron-right" /></svg> </a>';
          }
          ?>
          <!-- <a class="icon-link" href="#">
            Buy
            <svg class="bi">
              <use xlink:href="#chevron-right" />
            </svg>
          </a> -->
        </div>
      </div>
      <div class="product-device shadow-sm d-none d-md-block"></div>
      <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>


    <div class="row justify-content-center w-100 my-md-1 ps-md-1">
      <?php
      $select_query = "SELECT * FROM `item`";
      // $select_query = "SELECT * FROM `item` WHERE itemId = 5";
      $query_result = mysqli_query($mysql, $select_query);

      // $row = mysqli_fetch_assoc($query_result); 
      while ($row = mysqli_fetch_assoc($query_result)) {
        $itemId = $row['itemId'];
        $itemName = $row['itemName'];
        $itemDescription = $row['itemDescription'];
        $itemHeight = $row['itemHeight'];
        $itemWidth = $row['itemWidth'];
        $itemLength = $row['itemLength'];
        $itemWeight = $row['itemWeight'];
        $sellPrice = $row['sellPrice'];
        $supplierPrice = $row['supplierPrice'];
        $supplierId = $row['supplierId'];
        $categoryId = $row['categoryId'];


        echo '<div class="bg-body-tertiary mx-md-2 pt-3 px-1 pt-md-1 px-md-1 text-center overflow-hidden col-3 my-2">
        <div class="my-3 p-3">
          <h2 class="display-6">' . $itemName . '</h2>
          <p class="lead"><small>Price: £' . $sellPrice . '</small></p>';

        if ($loggedInStatus == "Y") {
          echo '<a class="icon-link" href="create-order.php?product-id=' . $itemId . '"><em>Order</em></a>';
        } else {
          echo '<a class="icon-link" href="create-order.php?product-id=' . $itemId . '" data-bs-toggle="modal" data-bs-target="#signInModal"><em>Sign in to order</em></a>';
        }

        echo '</div>
        <div class="bg-dark shadow-sm mx-auto mb-2 align-items-center py-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="../sources/img/products_images/' . $itemId . '.jpg" alt="Item ' . $itemId . '" class="img-thumbnail">
        </div>
      </div>';



        // img-fluid img-thumbnail card-img-top
      }
      ?>

    </div>

    <!-- <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden"> -->



    <!-- <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-body-tertiary shadow-sm mx-auto"
          style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        </div>
      </div>
      <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        </div>
      </div>
    </div> -->

    <!-- <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
      <div class="text-bg-primary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-body-tertiary shadow-sm mx-auto"
          style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
      <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
      <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
    </div> -->

  </main>

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column align-items-center just justify-content-center">
    <footer class="mt-auto text-white-50">
      <p>Made with features from <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a></p>
    </footer>
  </div>

  <!-- <footer class="container py-5">
    <div class="row">
      <div class="col-12 col-md">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
          stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img"
          viewBox="0 0 24 24">
          <title>Product</title>
          <circle cx="12" cy="12" r="10" />
          <path
            d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
        </svg>
        <small class="d-block mb-3 text-body-secondary">&copy; 2017–2024</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary text-decoration-none" href="#">Cool stuff</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary text-decoration-none" href="#">Business</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Education</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Government</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Gaming</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary text-decoration-none" href="#">Team</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
          <li><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer> -->

  <!-- Modals -->
  <!-- Modal - Sign In -->
  <div class="modal fade" id="signInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <?php
        include('../homepage/sign-in.php');
        ?>

      </div>
    </div>
  </div>

  <!-- Modal - Sign Up -->
  <div class="modal fade" id="signUpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <?php
        include('../homepage/sign-up.php');
        ?>

      </div>
    </div>
  </div>


  <!-- Modal - Appointment -->
  <div class="modal fade" id="appointmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <?php
        include('create-appointment.php');
        ?>

      </div>
    </div>
  </div>

  <!-- Modals -->


  <script src="../sources/assets/js/color-modes.js"></script>
  <script src="../sources/assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>