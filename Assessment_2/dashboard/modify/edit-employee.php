<?php if (isset($_GET['edit-employee'])) {
    $current_Id = $_GET['edit-employee'];

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
    <h1 class="h2">Edit Employee</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="firstName" placeholder="firstName" name="firstName">
            <label for="firstName">First Name: <?php echo $current_firstName ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="lastName" placeholder="lastName" name="lastName">
            <label for="lastName">Last Name: <?php echo $current_lastName ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="employeeEmail" placeholder="employeeEmail" name="employeeEmail">
            <label for="employeeEmail">Email: <?php echo $current_employeeEmail ?></label>
        </div>
        
        <div class="form-floating mb-3">
            <select name="salaryBracketId" id="salaryBracketId" name="salaryBracketId" class="form-select form-select-sm form-control rounded-3" required>
                <option value="" selected>--- Change Salary Bracket---</option>
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
                <option value="" selected>--- Change Privilege Level---</option>
                <?php
                $select_query_pl = "SELECT * FROM `privilegelevel` WHERE privilegeLevel != 'customer'";
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
                <option value="" selected>--- Change Branch ---</option>
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

        <hr class="my-4">

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="updateEmployee">Update Employee</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>
    </form>
</div>


<?php
if (isset($_POST['updateEmployee'])) {
    $p_editor_id = $loggedInId;
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_employee_id = $current_Id;

    if ($_POST['firstName'] != '') {
        $p_first_name = $_POST['firstName'];
    } else {
        $p_first_name = $current_firstName;
    }

    if ($_POST['lastName'] != '') {
        $p_last_name = $_POST['lastName'];
    } else {
        $p_last_name = $current_lastName;
    }

    if ($_POST['employeeEmail'] != '') {
        $p_employee_email = $_POST['employeeEmail'];
    } else {
        $p_employee_email = $current_employeeEmail;
    }

    if ($_POST['salaryBracketId'] != '') {
        $p_salary_bracket_id = $_POST['salaryBracketId'];
    } else {
        $p_salary_bracket_id = $current_salaryBracketId;
    }

    if ($_POST['privilegeLevelId'] != '') {
        $p_privilege_level_id = $_POST['privilegeLevelId'];
    } else {
        $p_privilege_level_id = $current_privilegeLevelId;
    }

    if ($_POST['branchId'] != '') {
        $p_branch_id = $_POST['branchId'];
    } else {
        $p_branch_id = $current_branchId;
    }


    // Call procedure to update employee
    $procedure_query = "CALL update_employee( '$p_editor_id', '$p_editor_privilege', '$p_employee_id', '$p_first_name', '$p_last_name', '$p_employee_email', '$p_salary_bracket_id', '$p_privilege_level_id', '$p_branch_id' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Employee Updated successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Employee Updated successfully') </script>";
        echo '<script> window.open("index.php?employees", "_self") </script>';
    } else {
        echo "<script> alert('Failed to update employee') </script>";
    }
}
?>