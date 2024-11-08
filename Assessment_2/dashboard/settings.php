<?php

$loggedInUsername = $_SESSION["loggedInUsername"];
$userType = $_SESSION["loggedInUserType"];
$loggedInId = $_SESSION["loggedInId"];

if ($userType == "customer") {
  // Spool the user's info from customer table
  $select_query = "SELECT customerId, customerName, customerEmail, customerPhone, customerAddress, customerTypeId FROM `customer` WHERE customerId = '$loggedInId' ";
  $query_result = mysqli_query($mysql, $select_query);
  $row = mysqli_fetch_assoc($query_result);

  // $loggedInUser_Id = $row['customerId'];
  $loggedInUser_FullName = $row['customerName'];
  $loggedInUser_Email = $row['customerEmail'];
  $loggedInUser_Phone = $row['customerPhone'];
  $loggedInUser_Address = $row['customerAddress'];
  $loggedInUser_TypeId = $row['customerTypeId'];
} elseif ($userType == "employee") {
  // Spool the user's info from employee table
  $select_query = "SELECT employeeId, firstName, lastName, employeeEmail, salaryBracketId, privilegeLevelId, branchId FROM `employee`";
  $query_result = mysqli_query($mysql, $select_query);
  $row = mysqli_fetch_assoc($query_result);

  // $loggedInUser_Id = $row['employeeId'];
  $firstName = $row['firstName'];
  $lastName = $row['lastName'];
  $loggedInUser_FullName = $firstName . ' ' . $lastName;
  $loggedInUser_Email = $row['employeeEmail'];

  $salaryBracketId = $row['salaryBracketId'];
  $privilegeLevelId = $row['privilegeLevelId'];
  $branchId = $row['branchId'];
}

?>

<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Settings</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-3">
      <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateAccountModal">Update</button>
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
    <input type="text" class="form-control" placeholder="<?php echo $loggedInUser_FullName ?>" aria-label="Username" aria-describedby="basic-addon1">
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Email</span>
    <input type="text" class="form-control" placeholder="<?php echo $loggedInUser_Email ?>" aria-label="Username" aria-describedby="basic-addon1">
  </div>

  <?php
  if ($userType == "customer") {
    echo '
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Phone</span>
      <input type="text" class="form-control" placeholder="' . $loggedInUser_Phone . '" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Address</span>
      <input type="text" class="form-control" placeholder="' . $loggedInUser_Address . '" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">User Type</span>
      <input type="text" class="form-control" placeholder="' . $loggedInUser_TypeId . '" aria-label="Username" aria-describedby="basic-addon1">
    </div> ';
  } elseif ($userType == "employee") {
    echo '
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Salary Bracket</span>
      <input type="text" class="form-control" placeholder="' . $salaryBracketId . '" aria-label="Username" aria-describedby="basic-addon1">
    </div>

      
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Privilege Level</span>
      <input type="text" class="form-control" placeholder="' . $privilegeLevelId . '" aria-label="Username" aria-describedby="basic-addon1">
    </div>

      
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Branch</span>
      <input type="text" class="form-control" placeholder="' . $branchId . '" aria-label="Username" aria-describedby="basic-addon1">
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
        <h1 class="modal-title fs-5" id="updateAccountModalLabel">Update Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <form method="post" action="">

        <?php
          if ($userType == "customer") {
            echo '<div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Email</span>
            <input type="text" class="form-control" placeholder="'.$loggedInUser_Email.'" name="update_Email" aria-label="update_Email" aria-describedby="basic-addon1">
          </div> 
          <hr class="my-2"> ';
          }
          ?>

          
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Current Password</span>
            <input type="text" class="form-control" placeholder="" name="update_CurrentPassword" aria-label="update_CurrentPassword" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">New Password</span>
            <input type="text" class="form-control" placeholder="" name="update_NewPassword" aria-label="update_NewPassword" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Re-type New Password</span>
            <input type="text" class="form-control" placeholder="" name="update_NewPassword2" aria-label="update_NewPassword2" aria-describedby="basic-addon1">
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
  $update_Email = $_POST['update_Email'];

  $update_CurrentPassword = $_POST['update_CurrentPassword'];

  $update_NewPassword = $_POST['update_NewPassword'];

  $update_NewPassword2 = $_POST['update_NewPassword2'];


  if ($userType == "customer") {
    $insert_query = "INSERT INTO `Customer` (customerEmail`,`customerPhone`,`customerAddress`) VALUES ('oscott@yahoo.com','07123123123','Newcastle')";
    $insert_query_result = mysqli_query($mysql, $insert_query);

    $insert_query2 = "INSERT INTO `CustomerLogin` (`customerPassword`) VALUES ('Cust001')";
    $insert_query2_result = mysqli_query($mysql, $insert_query2);

    if ( ($insert_query_result) AND ($insert_query2_result) ) {
      $updated = "Y";
    }
  } elseif ($userType == "employee") {
    $insert_query = "INSERT INTO `EmployeeLogin` (`employeePassword`) VALUES ('Emp0001')";
    $insert_query_result = mysqli_query($mysql, $insert_query);

    if ( $insert_query_result ) {
      $updated = "Y";
    }
  }

  if ($updated == "Y") {
    echo "<script> alert('Category added successfully') </script>";
    echo '<script> window.open("index.php", "_self") </script>';
  }
}
?>