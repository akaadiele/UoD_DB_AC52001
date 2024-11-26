<?php if (isset($_GET['delete-appointment'])) {
    $current_Id = $_GET['delete-appointment'];

    $select_query = "SELECT * FROM `employee_appointment_view` WHERE appointmentId = '$current_Id'";
    $query_result = mysqli_query($mysql, $select_query);
    $row = mysqli_fetch_assoc($query_result);

    $appointmentId = $row['appointmentId'];
    $appointmentDate = $row['appointmentDate'];
    $appointmentTime = $row['appointmentTime'];
    $appointmentLocation = $row['appointmentLocation'];
    $agreedFee = $row['agreedFee'];
    $fulfilled = $row['fulfilled'];
    $employeeName = $row['employeeName'];
    $customerName = $row['customerName'];
    $customerPhone = $row['customerPhone'];
    $customerEmail = $row['customerEmail'];
    $customerId = $row['customerId'];
    $employeeId = $row['employeeId'];
} ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Confirm delete</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="appointmentDate" placeholder="appointmentDate" name="appointmentDate" disabled>
            <label for="appointmentDate">Date: <?php echo $appointmentDate ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="appointmentTime" placeholder="appointmentTime" name="appointmentTime" disabled>
            <label for="appointmentTime">Time: <?php echo $appointmentTime ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="appointmentLocation" placeholder="appointmentLocation" name="appointmentLocation" disabled>
            <label for="appointmentLocation">Location: <?php echo $appointmentLocation ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="employeeName" placeholder="employeeName" name="employeeName" disabled>
            <label for="employeeName">Employee: <?php echo $employeeName ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="customerName" placeholder="customerName" name="customerName" disabled>
            <label for="customerName">Customer: <?php echo $customerName ?></label>
        </div>


        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="deleteAppointment">Delete Appointment</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>

    </form>
</div>


<?php
if (isset($_POST['deleteAppointment'])) {
    $p_editor_id = $loggedInId;
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_appointment_id = $current_Id;

    // Call procedure to delete appointment
    $procedure_query = "CALL delete_appointment( '$p_editor_id', '$p_editor_privilege', '$p_appointment_id' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Appointment Deleted successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Appointment Deleted') </script>";
        echo '<script> window.open("index.php?appointments", "_self") </script>';
    } else {
        echo "<script> alert('Failed to delete appointment') </script>";
    }
}
?>