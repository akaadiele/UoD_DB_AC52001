<!-- ### Include PHP code -->
<!-- ### Set session variables -->
<div class="modal-header">
  <h1 class="modal-title fs-5" id="signInModalLabel">Sign Up</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

  <form method="post">
    <div class="form-floating mb-3">
      <!-- <input type="text" class="form-control rounded-3" id="fullName" name="fullName" placeholder="John Doe" required> -->
      <input type="text" class="form-control rounded-3" id="fullName" name="fullName" placeholder="John Doe">
      <label for="fullName">Full name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control rounded-3" id="emailAddress" name="emailAddress" placeholder="name@example.com" >
      <label for="emailAddress">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="tel" class="form-control rounded-3" id="phoneNumber" name="phoneNumber" placeholder="+44" >
      <label for="phoneNumber">Phone</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control rounded-3" id="customerAddress" name="customerAddress" placeholder="Home" >
      <label for="customerAddress">Address</label>
    </div>

    <div class="form-floating mb-3">
      <select name="customerType" id="customerType" name="customerType" class="form-select form-select-sm form-control rounded-3" >
        <option selected>Customer Type</option>
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
      <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="Username" >
      <label for="username">Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password" >
      <label for="password">Password</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control rounded-3" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" >
      <label for="confirmPassword">Confirm Password</label>
    </div>

    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary form-control" type="submit" name="registerUser">Sign up</button>
    <small class="text-body-secondary">By clicking 'Sign up', you agree to the terms of use.</small>

    <hr class="my-4">

    <p class="mt-2 mb-5 small"> <em><a href="" class="text-white float-md-start" data-bs-target="#signInModal" data-bs-toggle="modal">Already have an account?</a> </em> </p>
    
  </form>

</div>



<!-- ------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------ -->
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

  // echo "<script> alert('customerType- $customerType -') </script>";

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
      // Call procedure to create customer and customerLogin      
      $procedure_query = "CALL create_customer_account('$fullName', '$emailAddress', '$phoneNumber', '$customerAddress', $customerType, '$username','$password')";
      $procedure_query_result = mysqli_query($mysql, $procedure_query);
      
      // User created successfully.
      if ($procedure_query_result) {
        echo "<script> alert('User Registered successfully') </script>";
        
      }
    }
  }
}

?>