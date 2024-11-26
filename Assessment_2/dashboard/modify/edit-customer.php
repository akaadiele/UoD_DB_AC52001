<?php if (isset($_GET['edit-customer'])) {
    $current_Id = $_GET['edit-customer'];

    $select_query = "SELECT * FROM `customer` WHERE customerId = '$current_Id'";
    $query_result = mysqli_query($mysql, $select_query);
    $row = mysqli_fetch_assoc($query_result);
    $current_customerName = $row['customerName'];
    $current_customerEmail = $row['customerEmail'];
    $current_customerPhone = $row['customerPhone'];
    $current_customerAddress = $row['customerAddress'];
    $current_customerTypeId = $row['customerTypeId'];
    $current_privilegeLevelId = $row['privilegeLevelId'];
} ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Customer</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <!-- <div class="form-floating mb-3">
            <select name="privilegeLevel" id="priviliegeLevel" class="form-select form-select-sm form-control rounded-3">
                <option selected>--- Select Category ---</option>
                <?php
                // // $current_customerTypeId;
                // $select_query_prvLvl = "SELECT * FROM `privilegelevel`";
                // $query_result_prvLvl = mysqli_query($mysql, $select_query_prvLvl);
                // while ($row_prvLvl = mysqli_fetch_assoc($query_result_prvLvl)) {
                //     $privilegeLevelId = $row_prvLvl['categoryId'];
                //     $privilegeLevel = $row_prvLvl['category'];
                    
                //     echo "<option value='$privilegeLevelId'>$privilegeLevel</option>";
                // }
                ?>
            </select>
        </div> -->

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="customerName" placeholder="customerName" name="customerName">
            <label for="customerName">Name: <?php echo $current_customerName ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="customerEmail" placeholder="customerEmail" name="customerEmail">
            <label for="customerEmail">Email: <?php echo $current_customerEmail ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="customerPhone" placeholder="customerPhone" name="customerPhone">
            <label for="customerPhone">Phone: <?php echo $current_customerPhone ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="customerAddress" placeholder="customerAddress" name="customerAddress">
            <label for="customerAddress">Address: <?php echo $current_customerAddress ?></label>
        </div>


        <hr class="my-4">

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="updateCustomer">Update Customer</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>
    </form>
</div>


<?php
if (isset($_POST['updateCustomer'])) {
    $p_editor_id = $loggedInId;
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_customer_id = $current_Id;

    $p_customer_type_id = $current_customerTypeId;


    if ($_POST['customerName'] != '') {
        $p_customer_name = $_POST['customerName'];
    } else {
        $p_customer_name = $current_customerName;
    }

    if ($_POST['customerEmail'] != '') {
        $p_customer_email = $_POST['customerEmail'];
    } else {
        $p_customer_email = $current_customerEmail;
    }

    if ($_POST['customerPhone'] != '') {
        $p_customer_phone = $_POST['customerPhone'];
    } else {
        $p_customer_phone = $current_customerPhone;
    }

    if ($_POST['customerAddress'] != '') {
        $p_customer_address = $_POST['customerAddress'];
    } else {
        $p_customer_address = $current_customerAddress;
    }


    // Call procedure to update customer
    $procedure_query = "CALL update_customer( '$p_editor_id', '$p_editor_privilege', '$p_customer_id', '$p_customer_name', '$p_customer_email', '$p_customer_phone', '$p_customer_address', '$p_customer_type_id')";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Customer Updated successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Customer Updated successfully') </script>";
        echo '<script> window.open("index.php?customers", "_self") </script>';
    } else {
        echo "<script> alert('Failed to update customer') </script>";
    }
}
?>