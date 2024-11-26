<?php if (isset($_GET['delete-customer'])) {
    $current_Id = $_GET['delete-customer'];

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
    <h1 class="h2">Confirm delete</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="customerName" placeholder="customerName" name="customerName" disabled>
            <label for="customerName"><?php echo $current_customerName ?></label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="customerEmail" placeholder="customerName" name="customerEmail" disabled>
            <label for="customerEmail"><?php echo $current_customerEmail ?></label>
        </div>

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="deleteCustomer">Delete Customer</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>

    </form>
</div>


<?php
if (isset($_POST['deleteCustomer'])) {
    
    $p_editor_id = $loggedInId;
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_customer_id = $current_Id;

    // Call procedure to delete customer
    $procedure_query = "CALL delete_customer( '$p_editor_id', '$p_editor_privilege', '$p_customer_id' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Customer Deleted successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Customer Deleted') </script>";
        echo '<script> window.open("index.php?customers", "_self") </script>';
    } else {
        echo "<script> alert('Failed to delete customer') </script>";
    }
}
?>