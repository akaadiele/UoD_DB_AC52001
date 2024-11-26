<?php if (isset($_GET['edit-appointment'])) {
    $current_Id = $_GET['edit-appointment'];

    $select_query = "SELECT * FROM `consultancyappointment` WHERE appointmentId = '$current_Id'";
    $query_result = mysqli_query($mysql, $select_query);
    $row = mysqli_fetch_assoc($query_result);
    $current_appointmentId = $row['appointmentId'];
    $current_customerId = $row['customerId'];
    $current_employeeId = $row['employeeId'];
    $current_appointmentTime = $row['appointmentTime'];
    $current_appointmentDate = $row['appointmentDate'];
    $current_appointmentLocation = $row['appointmentLocation'];
    $current_agreedFee = $row['agreedFee'];
    $current_fulfilled = $row['fulfilled'];
} ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Appointment</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <select name="employeeSelected" id="employeeSelected" name="employeeSelected" class="form-select form-select-sm form-control rounded-3">
                <option value="" selected>--- Change Employee ---</option>
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
            <input type="date" class="form-control rounded-3" id="appointmentDate" placeholder="appointmentDate" name="appointmentDate">
            <label for="appointmentDate">Date: <?php echo $current_appointmentDate ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="time" class="form-control rounded-3" id="appointmentTime" placeholder="appointmentTime" name="appointmentTime">
            <label for="appointmentTime">Time: <?php echo $current_appointmentTime ?></label>
        </div>

        <div class="form-floating mb-3">
            <div class="btn-group gap-3 align-items-center">
                <h4>Fulfilled?: </h4>
                <div class="btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="fulfilledStatus" id="btnradio1" autocomplete="off" value="1">
                    <label class="btn btn-outline-primary" for="btnradio1">Yes</label>

                    <input type="radio" class="btn-check" name="fulfilledStatus" id="btnradio2" autocomplete="off" value="0">
                    <label class="btn btn-outline-primary" for="btnradio2">No</label>
                </div>
            </div>
        </div>



        <hr class="my-4">

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="updateAppointment">Update Appointment</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>
    </form>
</div>


<?php
if (isset($_POST['updateAppointment'])) {
    $p_editor_id = $loggedInId;
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_appointment_id = $current_Id;

    
    if ($_POST['employeeSelected'] != '') {
        $p_new_employee_id = $_POST['employeeSelected'];
    } else {
        $p_new_employee_id = $current_employeeId;
    }

    if ($_POST['appointmentTime'] != '') {
        $p_new_time = $_POST['appointmentTime'];
    } else {
        $p_new_time = $current_appointmentTime;
    }

    if ($_POST['appointmentDate'] != '') {
        $p_new_date = $_POST['appointmentDate'];
    } else {
        $p_new_date = $current_appointmentDate;
    }

    if ($_POST['fulfilledStatus'] != '') {
        $p_fulfilled = $_POST['fulfilledStatus'];
    } else {
        $p_fulfilled = $current_fulfilled;
    }

    // Call procedure to update appointment
    $procedure_query = "CALL update_appointment( '$p_editor_id', '$p_editor_privilege', '$p_appointment_id', '$p_new_employee_id', '$p_new_time', '$p_new_date', '$p_fulfilled' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Appointment Updated successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Appointment Updated successfully') </script>";
        echo '<script> window.open("index.php?appointments", "_self") </script>';
    } else {
        echo "<script> alert('Failed to update appointment') </script>";
    }
}
?>