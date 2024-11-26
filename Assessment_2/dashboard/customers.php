<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Customers</h1>
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
    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#customerModal">
      New Customer
    </button>
  </div>
</div>

<h2>Overview</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">customerId</th>
        <th scope="col">customerName</th>
        <th scope="col">customerEmail</th>
        <th scope="col">customerPhone</th>
        <th scope="col">customerAddress</th>
        <th scope="col">customerType</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $select_query = "SELECT * FROM `employee_customer_view` ORDER BY customerId";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $customerId = $row['customerId'];
        $customerName = $row['customerName'];
        $customerEmail = $row['customerEmail'];
        $customerPhone = $row['customerPhone'];
        $customerAddress = $row['customerAddress'];
        $customerType = $row['customerType'];

        echo "<tr>";
        echo "<td>$customerId</td>";
        echo "<td>$customerName</td>";
        echo "<td>$customerEmail</td>";
        echo "<td>$customerPhone</td>";
        echo "<td>$customerAddress</td>";
        echo "<td>$customerType</td>";

        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?edit-customer=' . $customerId . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?delete-customer=' . $customerId . '"><i class="fa-solid fa-trash"></i></a></td>';

        echo "</tr>";
      }
      ?>

    </tbody>
  </table>
</div>



<!-- Modals -->

<!-- Modal - Create Customer -->
<div class="modal fade" id="customerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="customerModalLabel">New Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post">
          <div class="form-floating mb-3">
            <!-- <input type="text" class="form-control rounded-3" id="fullName" name="fullName" placeholder="John Doe" required> -->
            <input type="text" class="form-control rounded-3" id="fullName" name="fullName" placeholder="John Doe" required>
            <label for="fullName">Full name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-3" id="emailAddress" name="emailAddress" placeholder="name@example.com" required>
            <label for="emailAddress">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="tel" class="form-control rounded-3" id="phoneNumber" name="phoneNumber" placeholder="+44" required>
            <label for="phoneNumber">Phone</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="customerAddress" name="customerAddress" placeholder="Home" required>
            <label for="customerAddress">Address</label>
          </div>

          <div class="form-floating mb-3">
            <select name="customerType" id="customerType" name="customerType" class="form-select form-select-sm form-control rounded-3" required>
              <option value="" selected>Customer Type</option>
              <?php
              $select_query_custType = "SELECT * FROM `CustomerType`";
              $query_result_custType = mysqli_query($mysql, $select_query_custType);
              while ($rowCustType = mysqli_fetch_assoc($query_result_custType)) {
                $customerTypeId = $rowCustType['customerTypeId'];
                $customerType = $rowCustType['customerType'];
                echo "<option value='$customerTypeId'>$customerType</option>";
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

          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary form-control" type="submit" name="createCustomer">Create Customer</button>

        </form>

      </div>


    </div>
  </div>
</div>


<?php
if (isset($_POST['createCustomer'])) {

  $p_creator_id = $loggedInId;
  $p_creator_privilege = $loggedInUserPrivilegeLevel;

  $p_customer_name = $_POST['fullName'];
  $p_customer_email = $_POST['emailAddress'];
  $p_customer_phone = $_POST['phoneNumber'];
  $p_customer_address = $_POST['customerAddress'];
  $p_customer_type_id = $_POST['customerType'];
  $p_username = $_POST['username'];
  $p_password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  if ($p_customer_type_id == '') {
    echo "<script> alert('Invalid Customer Type') </script>";
  } elseif ($confirmPassword != $p_password) {
    echo "<script> alert('Passwords do not match') </script>";
  } else {

    // Query to check if customer already exist
    $select_query_cust = "SELECT * FROM `Customer` WHERE customerName = '$p_customer_name' OR customerEmail = '$p_customer_email' OR customerPhone = '$p_customer_phone' ";

    $select_query_cust_result = mysqli_query($mysql, $select_query_cust);
    $select_query_cust_result_numRows = mysqli_num_rows($select_query_cust_result);

    // Query to check if customer login already exist
    $select_query_custLogin = "SELECT * FROM `CustomerLogin` WHERE customerUsername = '$p_username'";
    $select_query_custLogin_result = mysqli_query($mysql, $select_query_custLogin);
    $select_query_custLogin_result_numRows = mysqli_num_rows($select_query_custLogin_result);


    if ($select_query_cust_result_numRows > 0) {
      echo "<script> alert('Customer already exists') </script>";
    } elseif ($select_query_custLogin_result_numRows > 0) {
      echo "<script> alert('Username already exists') </script>";
    } else {
      // Call procedure to create customer
      $procedure_query = "CALL create_customer( '$p_creator_id', '$p_creator_privilege', '$p_customer_name', '$p_customer_email', '$p_customer_phone', '$p_customer_address', '$p_customer_type_id', '$p_username', '$p_password' )";
      $procedure_query_result = mysqli_query($mysql, $procedure_query);

      // Customer created successfully.
      if ($procedure_query_result) {
        echo "<script> alert('Customer created successfully') </script>";
        echo '<script> window.open("index.php?customers", "_self") </script>';
      } else {
        echo "<script> alert('Failed to create customer') </script>";
      }
    }
  }
}
?>

<!-- Modal - Create Customer -->