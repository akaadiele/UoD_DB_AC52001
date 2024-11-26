<?php if (isset($_GET['edit-order'])) {
    $current_Id = $_GET['edit-order'];

    $select_query = "SELECT * FROM `customer_order_history` WHERE saleId = '$current_Id' ";
    $query_result = mysqli_query($mysql, $select_query);

    $row = mysqli_fetch_assoc($query_result);
    $current_saleId = $row['saleId'];
    $current_customerId = $row['customerId'];
    $current_timePlaced = $row['timePlaced'];
    $current_itemName = $row['itemName'];
    $current_itemDescription = $row['itemDescription'];
    $current_category = $row['category'];
    $current_itemQuantity = $row['itemQuantity'];
    $current_totalCost = $row['totalCost'];
    $current_saleStatus = $row['saleStatus'];
} ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Order</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemName" placeholder="itemName" name="itemName" disabled>
            <label for="itemName">Name: <?php echo $current_itemName ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemDescription" placeholder="itemDescription" name="itemDescription" disabled>
            <label for="itemDescription">Description: <?php echo $current_itemDescription ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemQuantity" placeholder="itemQuantity" name="itemQuantity" disabled>
            <label for="itemQuantity">Quantity: <?php echo $current_itemQuantity ?></label>
        </div>

        <div class="form-floating mb-3">
            <!-- <input type="text" class="form-control rounded-3" id="newStatus" placeholder="Product" name="newStatus">
            <label for="newStatus">Status: <?php echo $current_sellPrice ?></label> -->

            <select name="newStatus" id="newStatus" class="form-select form-select-sm form-control rounded-3">
                <option value='' selected>--- Update status ---</option>
                <?php
                if ($userType == "employee") {
                echo "<option value='placed'>Placed</option>
                <option value='dispatched'>Dispatched</option>
                <option value='delivered'>Delivered</option>";
                }?>

                <option value='cancelled'>Cancelled</option>
            </select>
        </div>

        <hr class="my-4">

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="updateProduct">Update Product</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>
    </form>
</div>


<?php
if (isset($_POST['updateProduct'])) {
    $p_editor_id = $loggedInId;
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_sale_id = $current_Id;
    $p_new_status = $_POST['newStatus'];

    if ($p_new_status != '') {
        // Call procedure to update item
        $procedure_query = "CALL update_sale( '$p_editor_id', '$p_editor_privilege', '$p_sale_id', '$p_new_status' )";
        $procedure_query_result = mysqli_query($mysql, $procedure_query);

        // Product Updated successfully.
        if ($procedure_query_result) {
            echo "<script> alert('Order Updated successfully') </script>";
            echo '<script> window.open("index.php?orders", "_self") </script>';
        } else {
            echo "<script> alert('Failed to update order') </script>";
        }
    } else {
        echo "<script> alert('Status not selected') </script>";
    }
}
?>