<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Suppliers</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <!-- <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button"
      class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
      <svg class="bi">
        <use xlink:href="#calendar3" />
      </svg>
      This week
    </button> -->
    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#supplierModal">
      New Supplier
    </button>
  </div>
</div>

<h2>Overview</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">

    <?php
    echo '<thead>
            <tr>
              <th scope="col">supplierId</th>
              <th scope="col">supplierName</th>
              <th scope="col">supplierPhone</th>
              <th scope="col">supplierEmail</th>
              <th scope="col">website</th>
              <th scope="col">pointOfContact</th>
              <th scope="col">supplierAddress</th>
              <th scope="col">uniqueItemsSupplied
              <th scope="col">totalUnitsSold</th>
              <th scope="col">totalRevenue</th>
              <th scope="col">totalSupplierCost</th>
              <th scope="col">totalProfit</th>
              <th scope="col">averageProfitMarginPercentage</th>
              <th scope="col">totalSalesCount</th>
            </tr>
          </thead>';

    $select_query = "SELECT * FROM `head_office_supplier_view`";
    $query_result = mysqli_query($mysql, $select_query);
    while ($row = mysqli_fetch_assoc($query_result)) {
      $supplierId = $row['supplierId'];
      $supplierName = $row['supplierName'];
      $supplierPhone = $row['supplierPhone'];
      $supplierEmail = $row['supplierEmail'];
      $website = $row['website'];
      $pointOfContact = $row['pointOfContact'];
      $supplierAddress = $row['supplierAddress'];
      $uniqueItemsSupplied = $row['uniqueItemsSupplied'];
      $totalUnitsSold = $row['totalUnitsSold'];
      $totalRevenue = $row['totalRevenue'];
      $totalSupplierCost = $row['totalSupplierCost'];
      $totalProfit = $row['totalProfit'];
      $averageProfitMarginPercentage = $row['averageProfitMarginPercentage'];
      $totalSalesCount = $row['totalSalesCount'];

      echo "<tbody>
                <tr>
                  <td>$supplierId</td>
                  <td>$supplierName</td>
                  <td>$supplierPhone</td>
                  <td>$supplierEmail</td>
                  <td>$website</td>
                  <td>$pointOfContact</td>
                  <td>$supplierAddress</td>
                  <td>$uniqueItemsSupplied</td>
                  <td>$totalUnitsSold</td>
                  <td>$totalRevenue</td>
                  <td>$totalSupplierCost</td>
                  <td>$totalProfit</td>
                  <td>$averageProfitMarginPercentage</td>
                  <td>$totalSalesCount</td>";

      echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?edit-supplier=' . $supplierId . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
      echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?delete-supplier=' . $supplierId . '"><i class="fa-solid fa-trash"></i></a></td>';

      echo "</tr>
              </tbody>";
    }
    ?>

  </table>
</div>



<!-- Modals -->

<!-- Modal - Create Supplier -->
<div class="modal fade" id="supplierModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="supplierModalLabel">New Supplier</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierName" name="supplierName" placeholder="supplierName" required>
            <label for="supplierName">Supplier Name</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierPhone" name="supplierPhone" placeholder="supplierPhone" required>
            <label for="supplierPhone">Supplier Phone number</label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-3" id="supplierEmail" name="supplierEmail" placeholder="supplierEmail" required>
            <label for="supplierEmail">Supplier email</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierWebsite" name="supplierWebsite" placeholder="supplierWebsite" required>
            <label for="supplierWebsite">Supplier Website</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierPOC" name="supplierPOC" placeholder="supplierPOC" required>
            <label for="supplierPOC">Point of Contact</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="supplierAddress" name="supplierAddress" placeholder="supplierAddress" required>
            <label for="supplierAddress">Supplier address</label>
          </div>


          <hr class="my-4">

          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary form-control" type="submit" name="createSupplier">Create Supplier</button>

        </form>

      </div>


    </div>
  </div>
</div>


<?php
if (isset($_POST['createSupplier'])) {
  $p_creator_privilege = $loggedInUserPrivilegeLevel;
  $p_supplier_name = $_POST['supplierName'];
  $p_supplier_phone = $_POST['supplierPhone'];
  $p_supplier_email = $_POST['supplierEmail'];
  $p_website = $_POST['supplierWebsite'];
  $p_point_of_contact = $_POST['supplierPOC'];
  $p_supplier_address = $_POST['supplierAddress'];

  // // Query to check if supplier already exist
  $select_query_suppl = "SELECT * FROM `supplier` WHERE supplierName = '$p_supplier_name' OR supplierEmail = '$p_supplier_email' OR website = '$p_website' ";
  $select_query_suppl_result = mysqli_query($mysql, $select_query_suppl);
  $select_query_suppl_result_numRows = mysqli_num_rows($select_query_suppl_result);
  if ($select_query_suppl_result_numRows > 0) {
    echo "<script> alert('Supplier already exists') </script>";
  } else {

    // Call procedure to create supplier
    $procedure_query = "CALL create_supplier( '$p_creator_privilege', '$p_supplier_name', '$p_supplier_phone', '$p_supplier_email', '$p_website', '$p_point_of_contact', '$p_supplier_address' )";
    $procedure_query_result = mysqli_query($mysql, $procedure_query);

    // Supplier created successfully.
    if ($procedure_query_result) {
      echo "<script> alert('Supplier created successfully') </script>";
      echo '<script> window.open("index.php?suppliers", "_self") </script>';
    } else {
      echo "<script> alert('Failed to create supplier') </script>";
    }
  }
}
?>

<!-- Modal - Create Supplier -->