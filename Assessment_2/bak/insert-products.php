<form class="" action="products.php">
  <div class="form-floating mb-3">
    <select name="productCategory" id="productCategory" class="form-select form-select-sm form-control rounded-3">
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
    <input type="text" class="form-control rounded-3" id="itemName" placeholder="Product" required>
    <label for="itemName">Product Name</label>
  </div>

  <div class="form-floating mb-3">
    <input type="text" class="form-control rounded-3" id="itemDescription" placeholder="Product" required>
    <label for="itemDescription">Product Description</label>
  </div>

  <div class="form-floating mb-3">
    <input type="number" class="form-control rounded-3" id="itemHeight" placeholder="Product">
    <label for="itemHeight">Height</label>
  </div>

  <div class="form-floating mb-3">
    <input type="number" class="form-control rounded-3" id="itemWidth" placeholder="Product">
    <label for="itemWidth">Width</label>
  </div>

  <div class="form-floating mb-3">
    <input type="number" class="form-control rounded-3" id="itemLength" placeholder="Product">
    <label for="itemLength">Length</label>
  </div>

  <div class="form-floating mb-3">
    <input type="number" class="form-control rounded-3" id="itemWeight" placeholder="Product">
    <label for="itemWeight">Weight</label>
  </div>

  <div class="form-floating mb-3">
    <input type="number" class="form-control rounded-3" id="itemSellPrice" placeholder="Product" required>
    <label for="itemSellPrice">Sell Price</label>
  </div>

  <div class="form-floating mb-3">
    <select name="supplierId" id="supplierId" class="form-select form-select-sm form-control rounded-3">
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
    <input type="number" class="form-control rounded-3" id="itemSupplierPrice" placeholder="Product">
    <label for="itemSupplierPrice">Supplier Price</label>
  </div>

  <hr class="my-4">
  <button class="w-100 mb-2 btn btn-sm rounded-3 btn-primary" type="submit">Add Product</button>
</form>