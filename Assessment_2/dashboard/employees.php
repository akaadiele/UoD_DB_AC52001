<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Employees</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <!-- <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button"
      class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
      <svg class="bi">
        <use xlink:href="#calendar3" />
      </svg>
      This week
    </button> -->
    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#employeeModal">
      New Employee
    </button>
  </div>
</div>

<h2>Overview</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">


    <?php
    if (($loggedInUserPrivilegeLevel == "head-office-manager") or ($loggedInUserPrivilegeLevel == "branch-manager")) {
      echo '<thead>
            <tr>
              <th scope="col">employeeId</th>
              <th scope="col">firstName</th>
              <th scope="col">lastName</th>
              <th scope="col">employeeEmail</th>
              <th scope="col">employeeUsername</th>
              <th scope="col">yearlySalary</th>
              <th scope="col">branchId</th>
              <th scope="col">branchName</th>
              <th scope="col">branchLocation</th>
              <th scope="col">privilegeLevel</th>
            </tr>
          </thead>';

      $select_query = "SELECT * FROM `head_office_employee_directory` ORDER BY employeeId";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $employeeId = $row['employeeId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $employeeEmail = $row['employeeEmail'];
        $employeeUsername = $row['employeeUsername'];
        $yearlySalary = $row['yearlySalary'];
        $branchId = $row['branchId'];
        $branchName = $row['branchName'];
        $branchLocation = $row['branchLocation'];
        $privilegeLevel = $row['privilegeLevel'];

        echo "<tbody>
              <tr>
                <td>$employeeId</td>
                <td>$firstName</td>
                <td>$lastName</td>
                <td>$employeeEmail</td>
                <td>$employeeUsername</td>
                <td>$yearlySalary</td>
                <td>$branchId</td>
                <td>$branchName</td>
                <td>$branchLocation</td>
                <td>$privilegeLevel</td>";

        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?edit-employee=' . $employeeId . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?delete-employee=' . $employeeId . '"><i class="fa-solid fa-trash"></i></a></td>';

        echo "</tr>
            </tbody>";
      }
    } else {
      echo '<thead>
              <tr>
                <th scope="col">employeeId</th>
                <th scope="col">firstName</th>
                <th scope="col">lastName</th>
                <th scope="col">employeeEmail</th>
                <th scope="col">branchName</th>
                <th scope="col">branchLocation</th>
              </tr>
            </thead>';

      $select_query = "SELECT * FROM `employee_directory` ORDER BY employeeId";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $employeeId = $row['employeeId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $employeeEmail = $row['employeeEmail'];
        $branchName = $row['branchName'];
        $branchLocation = $row['branchLocation'];

        echo "<tbody>
                <tr>
                  <td>$employeeId</td>
                  <td>$firstName</td>
                  <td>$lastName</td>
                  <td>$employeeEmail</td>
                  <td>$branchName</td>
                  <td>$branchLocation</td>
                </tr>
              </tbody>";
      }
    }
    ?>

  </table>
</div>


<!-- Modals -->

<!-- Modal - Create Employee -->
<div class="modal fade" id="employeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="employeeModalLabel">New Employee</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="firstName" name="firstName" placeholder="firstName" required>
            <label for="firstName">First name</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="lastName" name="lastName" placeholder="lastName" required>
            <label for="lastName">Last Name</label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-3" id="employeeEmail" name="employeeEmail" placeholder="employeeEmail" required>
            <label for="employeeEmail">Employee email</label>
          </div>


          <div class="form-floating mb-3">
            <select name="salaryBracketId" id="salaryBracketId" name="salaryBracketId" class="form-select form-select-sm form-control rounded-3" required>
              <option value="" selected>--- Select Salary Bracket---</option>
              <?php
              $select_query_sb = "SELECT * FROM `salarybracket`";
              $query_result_sb = mysqli_query($mysql, $select_query_sb);
              while ($row_sb = mysqli_fetch_assoc($query_result_sb)) {
                $salaryBracketId = $row_sb['salaryBracketId'];
                $yearlySalary = $row_sb['yearlySalary'];
                echo "<option value='$salaryBracketId'>$yearlySalary</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-floating mb-3">
            <select name="privilegeLevelId" id="privilegeLevelId" name="privilegeLevelId" class="form-select form-select-sm form-control rounded-3" required>
              <option value="" selected>--- Select Privilege Level---</option>
              <?php
              $select_query_pl = "SELECT * FROM `privilegelevel` WHERE privilegeLevel != 'employee'";
              $query_result_pl = mysqli_query($mysql, $select_query_pl);
              while ($row_pl = mysqli_fetch_assoc($query_result_pl)) {
                $privilegeLevelId = $row_pl['privilegeLevelId'];
                $privilegeLevel = $row_pl['privilegeLevel'];
                echo "<option value='$privilegeLevelId'>$privilegeLevel</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-floating mb-3">
            <select name="branchId" id="branchId" name="branchId" class="form-select form-select-sm form-control rounded-3" required>
              <option value="" selected>--- Select Branch ---</option>
              <?php
              $select_query_br = "SELECT * FROM `branch` ORDER BY branchName";
              $query_result_br = mysqli_query($mysql, $select_query_br);
              while ($row_br = mysqli_fetch_assoc($query_result_br)) {
                $branchId = $row_br['branchId'];
                $branchName = $row_br['branchName'];
                $branchLocation = $row_br['branchLocation'];
                $isHeadOffice = $row_br['isHeadOffice'];
                $relevantHeadOffice = $row_br['relevantHeadOffice'];

                echo "<option value='$branchId'>$branchName</option>";
              }
              ?>
            </select>
          </div>


          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="Username" required>
            <label for="username">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-3" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            <label for="confirmPassword">Confirm Password</label>
          </div>

          <hr class="my-4">

          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary form-control" type="submit" name="createEmployee">Create Employee</button>

        </form>

      </div>


    </div>
  </div>
</div>


<?php
if (isset($_POST['createEmployee'])) {

  $p_creator_id = $loggedInId;
  $p_creator_privilege = $loggedInUserPrivilegeLevel;

  $p_first_name = $_POST['firstName'];
  $p_last_name = $_POST['lastName'];
  $p_employee_email = $_POST['employeeEmail'];
  $p_salary_bracket_id = $_POST['salaryBracketId'];
  $p_privilege_level_id = $_POST['privilegeLevelId'];
  $p_branch_id = $_POST['branchId'];
  $p_username = $_POST['username'];
  $p_password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];


  if ($p_salary_bracket_id == '') {
    echo "<script> alert('Invalid salary bracket ') </script>";
  } elseif ($p_privilege_level_id == '') {
    echo "<script> alert('Invalid preivilege level ') </script>";
  } elseif ($p_branch_id == '') {
    echo "<script> alert('Invalid branch ') </script>";
  } elseif ($confirmPassword != $p_password) {
    echo "<script> alert('Passwords do not match') </script>";
  } else {
    // // Query to check if employee already exist
    $select_query_empl = "SELECT * FROM `head_office_employee_view` WHERE firstName = '$p_first_name' OR lastName = '$p_last_name' OR employeeEmail = '$p_employee_email' OR employeeUsername = '$p_username' ";
    $select_query_empl_result = mysqli_query($mysql, $select_query_empl);
    $select_query_empl_result_numRows = mysqli_num_rows($select_query_empl_result);
    if ($select_query_empl_result_numRows > 0) {
      echo "<script> alert('Employee already exists') </script>";
    } else {

      // Call procedure to create employee
      $procedure_query = "CALL create_employee( '$p_creator_id', '$p_creator_privilege', '$p_first_name', '$p_last_name', '$p_employee_email', '$p_salary_bracket_id', '$p_privilege_level_id', '$p_branch_id', '$p_username', '$p_password' )";
      $procedure_query_result = mysqli_query($mysql, $procedure_query);

      // Employee created successfully.
      if ($procedure_query_result) {
        echo "<script> alert('Employee created successfully') </script>";
        echo '<script> window.open("index.php?employees", "_self") </script>';
      } else {
        echo "<script> alert('Failed to create employee') </script>";
      }
    }
  }
}
?>

<!-- Modal - Create Employee -->