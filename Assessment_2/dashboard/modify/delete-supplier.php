<?php if (isset($_GET['delete-supplier'])) {
    $current_Id = $_GET['delete-supplier'];

    $select_query = "SELECT * FROM `supplier` WHERE supplierId = '$current_Id'";
    $query_result = mysqli_query($mysql, $select_query);
    $row = mysqli_fetch_assoc($query_result);
    $current_supplierId = $row['supplierId'];
    $current_supplierName = $row['supplierName'];
    $current_supplierPhone = $row['supplierPhone'];
    $current_supplierEmail = $row['supplierEmail'];
    $current_website = $row['website'];
    $current_pointOfContact = $row['pointOfContact'];
    $current_supplierAddress = $row['supplierAddress'];
} ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Confirm delete</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierName" placeholder="supplierName" name="supplierName" disabled>
            <label for="supplierName"><?php echo $current_supplierName ?></label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierAddress" placeholder="supplierAddress" name="supplierAddress" disabled>
            <label for="supplierAddress"><?php echo $current_supplierAddress ?></label>
        </div>

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="deleteSupplier">Delete Supplier</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>

    </form>
</div>


<?php
if (isset($_POST['deleteSupplier'])) {
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_supplier_id = $current_Id;

    // Call procedure to delete supplier
    $procedure_query = "CALL delete_supplier('$p_editor_privilege', '$p_supplier_id' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Supplier Deleted successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Supplier Deleted') </script>";
        echo '<script> window.open("index.php?suppliers", "_self") </script>';
    } else {
        echo "<script> alert('Failed to delete supplier') </script>";
    }
}
?>