<div class="modal-header">
  <h1 class="modal-title fs-5" id="signInModalLabel">Book an appointment</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

  <form method="post">
    <!-- <div class="form-floating mb-3">
      <input type="text" class="form-control rounded-3" id="fullName" name="fullName" placeholder="John Doe">
      <label for="fullName">Full name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control rounded-3" id="emailAddress" name="emailAddress" placeholder="name@example.com">
      <label for="emailAddress">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="tel" class="form-control rounded-3" id="phoneNumber" name="phoneNumber" placeholder="+44">
      <label for="phoneNumber">Phone</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control rounded-3" id="customerAddress" name="customerAddress" placeholder="Home">
      <label for="customerAddress">Address</label>
    </div> -->

    <?php
    if ($userType == "employee") {
      echo '<div class="form-floating mb-3">
              <select name="customerSelected" id="customerSelected" name="customerSelected" class="form-select form-select-sm form-control rounded-3" required>
              <option value="" selected>--- Booking for Customer: ---</option>';

      $select_query = "SELECT * FROM `employee_customer_view`";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $customerId = $row['customerId'];
        $customerName = $row['customerName'];
        $customerEmail = $row['customerEmail'];
        $customerPhone = $row['customerPhone'];
        $customerAddress = $row['customerAddress'];
        $customerType = $row['customerType'];

        echo "<option value='$customerId'>$customerName</option>";
      }

      echo '</select>
          </div>';
    }
    ?>


    <div class="form-floating mb-3">
      <select name="employeeSelected" id="employeeSelected" name="employeeSelected" class="form-select form-select-sm form-control rounded-3">
        <option value="" selected>--- Select Employee ---</option>
        <?php
        $select_query = "SELECT * FROM `employee_personal_view` WHERE privilegeLevel = 'head-office-manager' ";
        $query_result = mysqli_query($mysql, $select_query);
        while ($row = mysqli_fetch_assoc($query_result)) {
          $employeeId = $row['employeeId'];
          $firstName = $row['firstName'];
          $lastName = $row['lastName'];
          echo "<option value='$employeeId'>$firstName $lastName</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control rounded-3" id="location" name="location" placeholder="Location" required>
      <label for="location">Location</label>
    </div>
    <div class="form-floating mb-3">
      <input type="time" class="form-control rounded-3" id="appointmentTime" name="appointmentTime" placeholder="Time" required>
      <label for="appointmentTime">Time</label>
    </div>
    <div class="form-floating mb-3">
      <input type="date" class="form-control rounded-3" id="appointmentDate" name="appointmentDate" placeholder="Date" required>
      <label for="appointmentDate">Date</label>
    </div>
    <div class="form-floating mb-3">
      <input type="agreedFee" class="form-control rounded-3" id="agreedFee" name="agreedFee" placeholder="Fee" value="£75" disabled>
      <label for="agreedFee">Fee</label>
    </div>

    <hr class="my-4">

    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary form-control" type="submit" name="bookAppointment">Book Appointment</button>
  </form>

</div>



<!-- ------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------ -->
<!-- booking logic -->
<?php
if (isset($_POST['bookAppointment'])) {
  $employeeSelected = $_POST['employeeSelected'];
  $location = $_POST['location'];
  $appointmentTime = $_POST['appointmentTime'];
  $appointmentDate = $_POST['appointmentDate'];
  // $agreedFee = $_POST['agreedFee'];
  // if( $agreedFee == '') { $agreedFee = '75';}
  $agreedFee = '75';

  // Call procedure to create appointment
  $procedure_query = "CALL create_appointment( '$loggedInUserPrivilegeLevel', '$loggedInId', '$employeeSelected', '$appointmentTime', '$appointmentDate', '$location', '$agreedFee' )";
  $procedure_query_result = mysqli_query($mysql, $procedure_query);

  // User created successfully.
  if ($procedure_query_result) {
    echo "<script> alert('Booking successful') </script>";
    echo '<script> window.open("productsInfo.php", "_self") </script>';
  } else {
    echo "<script> alert('Failed to book appointment') </script>";
  }
}

?>