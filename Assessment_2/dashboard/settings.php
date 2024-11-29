<?php

if ($userType == "customer") {
  // Spool the user's info from customer table
  // $select_query = "SELECT customerId, customerName, customerEmail, customerPhone, customerAddress, customerTypeId FROM `customer` WHERE customerId = '$loggedInId' ";
  $select_query = "SELECT * FROM `customer_personal_view` WHERE customerId = '$loggedInId' ";
  $query_result = mysqli_query($mysql, $select_query);
  $row = mysqli_fetch_assoc($query_result);

  // $loggedInUser_Id = $row['customerId'];
  $loggedInUser_FullName = $row['customerName'];
  $loggedInUser_Email = $row['customerEmail'];
  $loggedInUser_Phone = $row['customerPhone'];
  $loggedInUser_Address = $row['customerAddress'];
  $loggedInUser_Type = $row['customerType'];
} elseif ($userType == "employee") {
  // Spool the user's info from employee table
  // $select_query = "SELECT employeeId, firstName, lastName, employeeEmail, salaryBracketId, privilegeLevelId, branchId FROM `employee`";
  $select_query = "SELECT * FROM `employee_personal_view` WHERE employeeId = '$loggedInId' ";
  $query_result = mysqli_query($mysql, $select_query);
  $row = mysqli_fetch_assoc($query_result);

  // $loggedInUser_Id = $row['employeeId'];
  $firstName = $row['firstName'];
  $lastName = $row['lastName'];
  $loggedInUser_FullName = $firstName . ' ' . $lastName;
  $loggedInUser_Email = $row['employeeEmail'];

  $yearlySalary = $row['yearlySalary'];
  $privilegeLevel = $row['privilegeLevel'];
  $branchName = $row['branchName'];
}

?>

<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Settings</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-3">
      <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateAccountModal">Update Password</button>
    </div>
  </div>
</div>

<h2>Overview</h2>
<div class="table-responsive small p-3">

  <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Username</span>
    <input type="text" class="form-control" placeholder="<?php echo $loggedInUsername ?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Full Name</span>
    <input type="text" class="form-control" placeholder="<?php echo $loggedInUser_FullName ?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Email</span>
    <input type="text" class="form-control" placeholder="<?php echo $loggedInUser_Email ?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
  </div>

  <?php
  if ($userType == "customer") {
    echo '
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Phone</span>
      <input type="text" class="form-control" placeholder="' . $loggedInUser_Phone . '" aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Address</span>
      <input type="text" class="form-control" placeholder="' . $loggedInUser_Address . '" aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">User Type</span>
      <input type="text" class="form-control" placeholder="' . $loggedInUser_Type . '" aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div> ';
  } elseif ($userType == "employee") {
    echo '
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Salary Bracket</span>
      <input type="text" class="form-control" placeholder="' . $yearlySalary . '" aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>

      
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Privilege Level</span>
      <input type="text" class="form-control" placeholder="' . $privilegeLevel . '" aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>

      
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Branch</span>
      <input type="text" class="form-control" placeholder="' . $branchName . '" aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div> ';
  }

  ?>

</div>



<!-- Modals -->
<!-- Modal - Update info -->
<div class="modal fade" id="updateAccountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateAccountModalLabel">Update Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <form method="post" action="">

          <!-- <?php
                // if ($userType == "customer") {
                //   echo '<div class="input-group mb-3">
                //   <span class="input-group-text" id="basic-addon1">Email</span>
                //   <input type="text" class="form-control" placeholder="' . $loggedInUser_Email . '" name="update_Email" aria-label="update_Email" aria-describedby="basic-addon1">
                // </div> 
                // <hr class="my-2"> ';
                // }
                ?> -->

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Current Password</span>
            <input type="text" class="form-control" placeholder="" name="update_CurrentPassword" aria-label="update_CurrentPassword" aria-describedby="basic-addon1" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">New Password</span>
            <input type="text" class="form-control" placeholder="" name="update_NewPassword" aria-label="update_NewPassword" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Re-type New Password</span>
            <input type="text" class="form-control" placeholder="" name="update_NewPassword2" aria-label="update_NewPassword2" aria-describedby="basic-addon1" required>
          </div>

          <hr class="my-4">
          <button class="btn rounded-3 btn-primary btn-sm form-control" type="submit" name="updateInfo">Update</button>

        </form>

      </div>

    </div>
  </div>
</div>

<?php
if (isset($_POST['updateInfo'])) {
  $updated = "";

  // $update_Email = $_POST['update_Email'];
  $update_CurrentPassword = $_POST['update_CurrentPassword'];
  $update_NewPassword = $_POST['update_NewPassword'];
  $update_NewPassword2 = $_POST['update_NewPassword2'];

  if ($update_CurrentPassword == $update_NewPassword) {
    echo "<script> alert('New password must be different') </script>";
    echo '<script> window.open("index.php?settings", "_self") </script>';
  } elseif ($update_NewPassword == $update_NewPassword2) {

    if ($userType == "customer") {
      $select_query_pwCheck = "SELECT `customerId`,`customerUsername`,`customerPassword` FROM `customerlogin` WHERE customerUsername = '$loggedInUsername' AND customerPassword = '$update_CurrentPassword' ";
    } elseif ($userType == "employee") {
      $select_query_pwCheck = "SELECT `employeeId`,`employeeUsername`,`employeePassword` FROM `employeeLogin` WHERE employeeUsername = '$loggedInUsername' AND employeePassword = '$update_CurrentPassword' ";
    }

    $select_query_pwCheck_result = mysqli_query($mysql, $select_query_pwCheck);
    $select_query_pwCheck_result_numRows = mysqli_num_rows($select_query_pwCheck_result);

    if ($select_query_pwCheck_result_numRows > 0) {
      $row_pwCheck = mysqli_fetch_assoc($select_query_pwCheck_result);

      if ($userType == "customer") {
        $customerId_pwCheck = $row_pwCheck['customerId'];
        $customerUsername_pwCheck = $row_pwCheck['customerUsername'];
        $customerPassword_pwCheck = $row_pwCheck['customerPassword'];

        $insert_query = "UPDATE `customerlogin` SET `customerPassword` = '$update_NewPassword' WHERE customerId = '$loggedInId'";
        $insert_query_result = mysqli_query($mysql, $insert_query);
        if ($insert_query_result) {
          $updated = "Y";
        }
        // $insert_query2 = "INSERT INTO `customer` (customerEmail`,`customerPhone`,`customerAddress`) VALUES ('oscott@yahoo.com','07123123123','Newcastle')";
        // $insert_query2_result = mysqli_query($mysql, $insert_query2);
        // if ($insert_query2_result) {
        //   $updated = "Y";
        // }
      } elseif ($userType == "employee") {
        $employeeId_pwCheck = $row_pwCheck['employeeId'];
        $employeeUsername_pwCheck = $row_pwCheck['employeeUsername'];
        $employeePassword_pwCheck = $row_pwCheck['employeePassword'];

        $insert_query3 = "UPDATE `employeeLogin` SET `employeePassword` = '$update_NewPassword' WHERE employeeId = '$loggedInId'";
        $insert_query3_result = mysqli_query($mysql, $insert_query3);
        if ($insert_query3_result) {
          $updated = "Y";
        }
      }
    } else {
      echo "<script> alert('Incorrect Current Password ') </script>";
      echo '<script> window.open("index.php?settings", "_self") </script>';
    }
  } else {
    echo "<script> alert('New passwords do not match ') </script>";
    echo '<script> window.open("index.php?settings", "_self") </script>';
  }

  if ($updated == "Y") {
    echo "<script> alert('Password updated successfully') </script>";
    echo '<script> window.open("index.php?settings", "_self") </script>';
  }
}

?>