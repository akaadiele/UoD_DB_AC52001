<div class="modal-header">
  <h1 class="modal-title fs-5" id="signInModalLabel">Sign In</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

  <form method="post">

    <div class="form-floating">
      <input type="text" class="form-control" id="username" placeholder="name@example.com" name="username" required>
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="userPassword" placeholder="Password" name="userPassword" required>
      <label for="userPassword">Password</label>
    </div>

    <div class="row my-1 gap-2 py-2 justify-content-center">
      <div class="col-md-3">
        <input class="form-check-input" type="radio" name="userType" id="userType" value="customer" checked>
        <label class="form-check-label" for="userType">Customer</label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input" type="radio" name="userType" id="userType" value="employee">
        <label class="form-check-label" for="userType">Employee</label>
      </div>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit" name="userLogInButton">Sign in</button>

    <hr class="my-4">

    <p class="mt-1 mb-3 pb-1 small">
      <em><a href="" class="text-white float-md-start" data-bs-target="#signUpModal" data-bs-toggle="modal">Don't have an account?</a></em>
    </p>

  </form>

</div>



<!-- ------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------ -->
<!-- Sign in logic -->
<?php

if (isset($_POST['userLogInButton'])) {
  $username = $_POST['username'];
  $userPassword = $_POST['userPassword'];
  $userType = test_input($_POST["userType"]);

  if ((isset($userType)) and ($userType == "customer")) {
    // Query to check if customer login already exist
    $select_query_userLogin = "SELECT customerId, customerUsername FROM `CustomerLogin` WHERE customerUsername = '$username' AND customerPassword = '$userPassword' ";

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
        if (isset($_SESSION["loggedInUserType"])) {
          // echo "<script> alert('---user type $userType ---') </script>";
        }

        $_SESSION["loggedInId"] = $loggedInId;
        if (isset($_SESSION["loggedInId"])) {
          // echo "<script> alert('---log id  $loggedInId ---') </script>";
        }

        // echo "<script> alert('Login Successful') </script>";
        echo '<script> window.open("../dashboard/index.php", "_self") </script>';
      } else {
        echo "<script> alert('Invalid username or password') </script>";
      }
    } else {
      echo "<script> alert('User not found') </script>";
    }
  } elseif ((isset($userType)) and ($userType == "employee")) {
    // Query to check if employee login already exist
    $select_query_userLogin = "SELECT employeeId, employeeUsername FROM `employeelogin` WHERE employeeUsername = '$username' AND employeePassword = '$userPassword' ";

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
        if (isset($_SESSION["loggedInUserType"])) {
          // echo "<script> alert('---user type $userType ---') </script>";
        }

        $_SESSION["loggedInId"] = $loggedInId;
        if (isset($_SESSION["loggedInId"])) {
          // echo "<script> alert('---log id  $loggedInId ---') </script>";
        }

        // echo "<script> alert('Login Successful') </script>";
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