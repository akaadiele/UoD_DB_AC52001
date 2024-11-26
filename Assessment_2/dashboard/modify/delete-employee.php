<?php if (isset($_GET['delete-employee'])) {
    $current_Id = $_GET['delete-employee'];

    $select_query = "SELECT * FROM `employee` WHERE employeeId = '$current_Id'";
    $query_result = mysqli_query($mysql, $select_query);
    $row = mysqli_fetch_assoc($query_result);
    $current_employeeId = $row['employeeId'];
    $current_firstName = $row['firstName'];
    $current_lastName = $row['lastName'];
    $current_employeeEmail = $row['employeeEmail'];
    $current_salaryBracketId = $row['salaryBracketId'];
    $current_privilegeLevelId = $row['privilegeLevelId'];
    $current_branchId = $row['branchId'];
} ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Confirm delete</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="employeeName" placeholder="employeeName" name="employeeName" disabled>
            <label for="employeeName"><?php echo $current_firstName.' '.$current_lastName ?></label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="employeeEmail" placeholder="employeeName" name="employeeEmail" disabled>
            <label for="employeeEmail"><?php echo $current_employeeEmail ?></label>
        </div>

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="deleteEmployee">Delete Employee</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>

    </form>
</div>


<?php
if (isset($_POST['deleteEmployee'])) {
    
    $p_editor_id = $loggedInId;
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_employee_id = $current_Id;

    // Call procedure to delete employee
    $procedure_query = "CALL delete_employee( '$p_editor_id', '$p_editor_privilege', '$p_employee_id' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Employee Deleted successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Employee Deleted') </script>";
        echo '<script> window.open("index.php?employees", "_self") </script>';
    } else {
        echo "<script> alert('Failed to delete employee') </script>";
    }
}
?>