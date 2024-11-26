<?php if (isset($_GET['delete-product'])) {
    $current_Id = $_GET['delete-product'];

    $select_query = "SELECT * FROM `item` WHERE itemId = '$current_Id'";
    $query_result = mysqli_query($mysql, $select_query);
    $row = mysqli_fetch_assoc($query_result);
    $current_Id = $row['itemId'];
    $current_itemName = $row['itemName'];
    $current_itemDescription = $row['itemDescription'];
    $current_itemHeight = $row['itemHeight'];
    $current_itemWidth = $row['itemWidth'];
    $current_itemLength = $row['itemLength'];
    $current_itemWeight = $row['itemWeight'];
    $current_sellPrice = $row['sellPrice'];
    $current_supplierPrice = $row['supplierPrice'];
    $current_itemSupplierId = $row['supplierId'];
    $current_categoryId = $row['categoryId'];
} ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Confirm delete</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemName" placeholder="itemName" name="itemName" disabled>
            <label for="itemName"><?php echo $current_itemName ?></label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemDescription" placeholder="itemDescription" name="itemDescription" disabled>
            <label for="itemDescription"><?php echo $current_itemDescription ?></label>
        </div>

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="deleteProduct">Delete Product</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>

    </form>
</div>


<?php
if (isset($_POST['deleteProduct'])) {
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_item_id = $current_Id;
    
    // Call procedure to delete item
    $procedure_query = "CALL delete_item( '$p_editor_privilege', '$p_item_id' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Product Deleted successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Product Deleted') </script>";
        echo '<script> window.open("index.php?products", "_self") </script>';
    } else {
        echo "<script> alert('Failed to delete product') </script>";
    }
}
?>