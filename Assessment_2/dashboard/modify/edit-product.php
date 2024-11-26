<?php if (isset($_GET['edit-product'])) {
    $current_Id = $_GET['edit-product'];

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
    <h1 class="h2">Edit Product</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <!-- <div class="form-floating mb-3">
            <select name="productCategory" id="productCategory" class="form-select form-select-sm form-control rounded-3">
                <option selected>--- Select Category ---</option>
                <?php
                // $select_query_categ = "SELECT * FROM `itemcategory`";
                // $query_result_categ = mysqli_query($mysql, $select_query_categ);
                // while ($row_categ = mysqli_fetch_assoc($query_result_categ)) {
                //     $itemCategId = $row_categ['categoryId'];
                //     $itemCateg = $row_categ['category'];
                //     echo "<option value='$itemCategId'>$itemCateg</option>";
                // }
                ?>
            </select>
        </div> -->

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemName" placeholder="itemName" name="itemName">
            <label for="itemName">Name: <?php echo $current_itemName ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemDescription" placeholder="itemDescription" name="itemDescription">
            <label for="itemDescription">Description: <?php echo $current_itemDescription ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemHeight" placeholder="itemHeight" name="itemHeight">
            <label for="itemHeight">Height: <?php echo $current_itemHeight ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemWidth" placeholder="itemWidth" name="itemWidth">
            <label for="itemWidth">Width: <?php echo $current_itemWidth ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemLength" placeholder="itemLength" name="itemLength">
            <label for="itemLength">Length: <?php echo $current_itemLength ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemWeight" placeholder="itemWeight" name="itemWeight">
            <label for="itemWeight">Weight: <?php echo $current_itemWeight ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemSellPrice" placeholder="itemSellPrice" name="itemSellPrice">
            <label for="itemSellPrice">Price: <?php echo $current_sellPrice ?></label>
        </div>

        <!-- <div class="form-floating mb-3">
            <select name="supplierId" id="supplierId" class="form-select form-select-sm form-control rounded-3">
                <option selected>--- Select Supplier ---</option>
                <?php
                // echo $current_itemSupplierId;
                // $select_query_supplier = "SELECT * FROM `supplier`";
                // $query_result_supplier = mysqli_query($mysql, $select_query_supplier);
                // while ($row_supplier = mysqli_fetch_assoc($query_result_supplier)) {
                //     $supplierId = $row_supplier['supplierId'];
                //     $supplierName = $row_supplier['supplierName'];
                //     echo "<option value='$supplierId'>$supplierName</option>";
                // }
                ?>
            </select>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemSupplierPrice" placeholder="itemSupplierPrice" name="itemSupplierPrice">
            <label for="itemSupplierPrice"><?php echo $current_supplierPrice ?></label>
        </div> -->

        <hr class="my-4">

        <div class="form-floating btn-group me-2 gap-2 w-100">
            <button class="btn btn-primary" type="submit" name="updateProduct">Update Product</button>
            <button class="btn btn-secondary" type="button" onclick="history.back()">Discard</button>
        </div>
    </form>
</div>


<?php
if (isset($_POST['updateProduct'])) {

    // php code
    $p_editor_privilege = $loggedInUserPrivilegeLevel;

    $p_item_id = $current_Id;

    if ($_POST['itemName'] != '') {
        $p_item_name = $_POST['itemName'];
    } else {
        $p_item_name = $current_itemName;
    }

    if ($_POST['itemDescription'] != '') {
        $p_item_description = $_POST['itemDescription'];
    } else {
        $p_item_description = $current_itemDescription;
    }

    if ($_POST['itemWidth'] != '') {
        $p_item_width = $_POST['itemWidth'];
    } else {
        $p_item_width = $current_itemWidth;
    }

    if ($_POST['itemHeight'] != '') {
        $p_item_height = $_POST['itemHeight'];
    } else {
        $p_item_height = $current_itemHeight;
    }

    if ($_POST['itemLength'] != '') {
        $p_item_length = $_POST['itemLength'];
    } else {
        $p_item_length = $current_itemLength;
    }

    if ($_POST['itemWeight'] != '') {
        $p_item_weight = $_POST['itemWeight'];
    } else {
        $p_item_weight = $current_itemWeight;
    }

    if ($_POST['itemSellPrice'] != '') {
        $p_sell_price = $_POST['itemSellPrice'];
    } else {
        $p_sell_price = $current_sellPrice;
    }

    // if ($_POST['itemSupplierPrice'] != '') {
    //     $p_supplier_price = $_POST['itemSupplierPrice'];
    // } else {
        $p_supplier_price = $current_supplierPrice;
    // }

    // if ($_POST['supplierId'] != '') {
    //     $p_supplier_id = $_POST['supplierId'];
    // } else {
        $p_supplier_id = $current_itemSupplierId;
    // }

    if ($_POST['productCategory'] != '') {
        $p_category_id = $_POST['productCategory'];
    } else {
        $p_category_id = $current_categoryId;
    }

    // Call procedure to update item
    $procedure_query = "CALL update_item( '$p_editor_privilege', '$p_item_id', '$p_item_name', '$p_item_description', '$p_item_height', '$p_item_width', '$p_item_length', '$p_item_weight', '$p_sell_price', '$p_supplier_price', '$p_supplier_id', '$p_category_id' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Product Updated successfully.
    if ($procedure_query_result) {
        echo "<script> alert('Product Updated successfully') </script>";
        echo '<script> window.open("index.php?products", "_self") </script>';
    } else {
        echo "<script> alert('Failed to update product') </script>";
    }
}
?>