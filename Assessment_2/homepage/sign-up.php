<!-- ### Include PHP code -->
<!-- ### Set session variables -->
<div class="modal-header">
  <h1 class="modal-title fs-5" id="signInModalLabel">Sign Up</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

  <!-- <form method="post" action="../sign-in/sign-in.php"> -->
  <form method="post">
    <div class="form-floating mb-3">
      <input type="text" class="form-control rounded-3" id="fullName" name="fullName" placeholder="John Doe" required>
      <label for="fullName">Name</label>
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

    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary form-control" type="submit" name="registerUser">Sign up</button>
    <small class="text-body-secondary">By clicking 'Sign up', you agree to the terms of use.</small>

    <hr class="my-4">

    <p class="mt-2 mb-5 small"> <em><a href="" class="text-white float-md-start" data-bs-target="#signInModal" data-bs-toggle="modal">Already have an account?</a> </em> </p>
    <!-- <p class="mt-2 mb-5 small"> <em><a href="home.php?sign-in" class="text-white float-md-start" data-bs-target="#signInModal" data-bs-toggle="modal">Already have an account?</a> </em> </p> -->

  </form>

</div>

