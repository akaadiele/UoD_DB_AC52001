<?php if (isset($_GET['edit-supplier'])) {
    $current_Id = $_GET['edit-supplier'];

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
    <h1 class="h2">Edit Supplier</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierName" name="supplierName" placeholder="supplierName">
            <label for="supplierName">Name: <?php echo $current_supplierName ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierPhone" name="supplierPhone" placeholder="supplierPhone">
            <label for="supplierPhone">Phone: <?php echo $current_supplierPhone ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-3" id="supplierEmail" name="supplierEmail" placeholder="supplierEmail">
            <label for="supplierEmail">Email: <?php echo $current_supplierEmail ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierWebsite" name="supplierWebsite" placeholder="supplierWebsite">
            <label for="supplierWebsite">Website: <?php echo $current_website ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierPOC" name="supplierPOC" placeholder="supplierPOC">
            <label for="supplierPOC">Point of Contact: <?php echo $current_pointOfContact ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierAddress" name="supplierAddress" placeholder="supplierAddress">
            <label for="supplierAddress">Address: <?php echo $current_supplierAddress ?></label>
        </div>

        <hr class="my-4">

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="updateSupplier">Update Supplier</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>
    </form>
</div>


<?php
if (isset($_POST['updateSupplier'])) {
    $p_editor_privilege = $loggedInUserPrivilegeLevel;
    $p_supplier_id = $current_Id;
    
    
    if ($_POST['supplierName'] != '') {
        $p_supplier_name = $_POST['supplierName'];
    } else {
        $p_supplier_name = $current_supplierName;
    }

    if ($_POST['supplierPhone'] != '') {
        $p_supplier_phone = $_POST['supplierPhone'];
    } else {
        $p_supplier_phone = $current_supplierPhone;
    }

    if ($_POST['supplierEmail'] != '') {
        $p_supplier_email = $_POST['supplierEmail'];
    } else {
        $p_supplier_email = $current_supplierEmail;
    }

    if ($_POST['supplierWebsite'] != '') {
        $p_website = $_POST['supplierWebsite'];
    } else {
        $p_website = $current_website;
    }

    if ($_POST['supplierPOC'] != '') {
        $p_point_of_contact = $_POST['supplierPOC'];
    } else {
        $p_point_of_contact = $current_pointOfContact;
    }

    if ($_POST['supplierAddress'] != '') {
        $p_supplier_address = $_POST['supplierAddress'];
    } else {
        $p_supplier_address = $current_supplierAddress;
    }


    // Call procedure to update supplier
    $procedure_query = "CALL update_supplier( '$p_editor_privilege', '$p_supplier_id', '$p_supplier_name', '$p_supplier_phone', '$p_supplier_email', '$p_website', '$p_point_of_contact', '$p_supplier_address' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Supplier Updated successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Supplier Updated successfully') </script>";
        echo '<script> window.open("index.php?suppliers", "_self") </script>';
    } else {
        echo "<script> alert('Failed to update supplier') </script>";
    }
}
?>