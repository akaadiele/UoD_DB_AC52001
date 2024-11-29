<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Products</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#categoryModal">
        New category
      </button>
      <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#productModal">
        New product
      </button>
    </div>
  </div>
</div>

<!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

<h2>Overview</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">itemId</th>
        <th scope="col">itemName</th>
        <th scope="col">itemDescription</th>
        <th scope="col">itemHeight</th>
        <th scope="col">itemWidth</th>
        <th scope="col">itemLength</th>
        <th scope="col">itemWeight</th>
        <th scope="col">sellPrice</th>
        <th scope="col">supplierName</th>
        <th scope="col">supplierPrice</th>
        <th scope="col">category</th>
      </tr>
    </thead>

    <tbody>
      <?php
      // $select_query = "SELECT itemId, itemName, itemDescription, itemHeight, itemWidth, itemLength, itemWeight, sellPrice, supplierPrice, supplierId, categoryId FROM `item`";
      $select_query = "SELECT * FROM `head_office_item_view` ORDER BY itemId";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $itemId = $row['itemId'];
        $itemName = $row['itemName'];
        $itemDescription = $row['itemDescription'];
        $itemHeight = $row['itemHeight'];
        $itemWidth = $row['itemWidth'];
        $itemLength = $row['itemLength'];
        $itemWeight = $row['itemWeight'];
        $sellPrice = $row['sellPrice'];
        $supplierPrice = $row['supplierPrice'];
        $supplierId = $row['supplierId'];
        $categoryId = $row['categoryId'];
        $category = $row['category'];
        $supplierName = $row['supplierName'];

        echo '<tr>';
        echo "<td>$itemId</td>";
        echo "<td>$itemName</td>";
        echo "<td>$itemDescription</td>";
        echo "<td>$itemHeight</td>";
        echo "<td>$itemWidth</td>";
        echo "<td>$itemLength</td>";
        echo "<td>$itemWeight</td>";
        echo "<td>$sellPrice</td>";
        echo "<td>$supplierName</td>";
        echo "<td>$supplierPrice</td>";
        echo "<td>$category</td>";

        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?edit-product=' . $itemId . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?delete-product=' . $itemId . '"><i class="fa-solid fa-trash"></i></a></td>';
        echo '</tr>';
      }
      ?>

    </tbody>
  </table>
</div>

<!-- Modals -->
<!-- Modal - Add Category -->
<div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="categoryModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="categoryName" name="categoryName" placeholder="Insert Category" required>
            <label for="categoryName">Category Name</label>
          </div>
          <hr class="my-4">
          <button class="btn rounded-3 btn-primary btn-sm form-control" type="submit" name="submitCategory">Create Category</button>
        </form>

        <?php
        if (isset($_POST['submitCategory'])) {
          $categoryName = $_POST['categoryName'];

          // Query to check if category already exist
          $select_query_categ = "SELECT * FROM `itemcategory` WHERE category = '$categoryName'";
          $select_query_categ_result = mysqli_query($mysql, $select_query_categ);
          $select_query_categ_result_numRows = mysqli_num_rows($select_query_categ_result);
          if ($select_query_categ_result_numRows > 0) {
            echo "<script> alert('Category already exists') </script>";
          } else {
            // Query to insert category
            $insert_query_categ = "INSERT INTO `itemcategory` (`category`) VALUES ('$categoryName')";
            $insert_query_categ_result = mysqli_query($mysql, $insert_query_categ);
            if ($insert_query_categ_result) {
              echo "<script> alert('Category added successfully') </script>";
            }
          }
        }
        ?>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal - Add Product -->
<div class="modal fade" id="productModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="productModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="">

          <div class="form-floating mb-3">
            <select name="productCategory" id="productCategory" class="form-select form-select-sm form-control rounded-3" required>
              <option selected>Select Category</option>
              <?php
              $select_query_categ = "SELECT * FROM `itemcategory`";
              $query_result_categ = mysqli_query($mysql, $select_query_categ);
              while ($row_categ = mysqli_fetch_assoc($query_result_categ)) {
                $itemCategId = $row_categ['categoryId'];
                $itemCateg = $row_categ['category'];
                echo "<option value='$itemCategId'>$itemCateg</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemName" placeholder="itemName" name="itemName" required>
            <label for="itemName">Product Name</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="itemDescription" placeholder="itemDescription" name="itemDescription" required>
            <label for="itemDescription">Product Description</label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemHeight" placeholder="itemHeight" name="itemHeight" required>
            <label for="itemHeight">Height</label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemWidth" placeholder="itemWidth" name="itemWidth" required>
            <label for="itemWidth">Width</label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemLength" placeholder="itemLength" name="itemLength" required>
            <label for="itemLength">Length</label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemWeight" placeholder="itemWeight" name="itemWeight" required>
            <label for="itemWeight">Weight</label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemSellPrice" placeholder="itemSellPrice" name="itemSellPrice" required>
            <label for="itemSellPrice">Sell Price</label>
          </div>

          <div class="form-floating mb-3">
            <select name="supplierId" id="supplierId" class="form-select form-select-sm form-control rounded-3" required>
              <option selected>Select Supplier</option>
              <?php
              $select_query_supplier = "SELECT * FROM `supplier`";
              $query_result_supplier = mysqli_query($mysql, $select_query_supplier);
              while ($row_supplier = mysqli_fetch_assoc($query_result_supplier)) {
                $supplierId = $row_supplier['supplierId'];
                $supplierName = $row_supplier['supplierName'];
                echo "<option value='$supplierId'>$supplierName</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="itemSupplierPrice" placeholder="itemSupplierPrice" name="itemSupplierPrice" required>
            <label for="itemSupplierPrice">Supplier Price</label>
          </div>

          <hr class="my-4">
          <button class="w-100 mb-2 btn btn-sm rounded-3 btn-primary" type="submit" name="createProduct">Create Product</button>

        </form>

      </div>
    </div>
  </div>
</div>




<?php
if (isset($_POST['createProduct'])) {

  // php code
  $p_creator_privilege = $loggedInUserPrivilegeLevel;
  $p_item_name = $_POST['itemName'];
  $p_item_description = $_POST['itemDescription'];
  $p_item_height = $_POST['itemHeight'];
  $p_item_width = $_POST['itemWidth'];
  $p_item_length = $_POST['itemLength'];
  $p_item_weight = $_POST['itemWeight'];
  $p_sell_price = $_POST['itemSellPrice'];
  $p_supplier_price = $_POST['itemSupplierPrice'];
  $p_supplier_id = $_POST['supplierId'];
  $p_category_id = $_POST['productCategory'];

  // Call procedure to update item
  $procedure_query = "CALL create_item( '$p_creator_privilege', '$p_item_name', '$p_item_description', '$p_item_height', '$p_item_width', '$p_item_length', '$p_item_weight', '$p_sell_price', '$p_supplier_price', '$p_supplier_id', '$p_category_id' )";
  $procedure_query_result = mysqli_query($mysql, $procedure_query);

  // Product created successfully.
  if ($procedure_query_result) {
    echo "<script> alert('Product created successfully') </script>";
    echo '<script> window.open("index.php?products", "_self") </script>';
  } else {
    echo "<script> alert('Failed to create product') </script>";
  }
}
?>