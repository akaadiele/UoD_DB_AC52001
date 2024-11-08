<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Suppliers</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button"
      class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
      <svg class="bi">
        <use xlink:href="#calendar3" />
      </svg>
      This week
    </button>
  </div>
</div>

<h2>Overview</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">supplierId</th>
        <th scope="col">supplierName</th>
        <th scope="col">supplierPhone</th>
        <th scope="col">supplierEmail</th>
        <th scope="col">website</th>
        <th scope="col">pointOfContact</th>
        <th scope="col">supplierAddress</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $select_query = "SELECT supplierId, supplierName, supplierPhone, supplierEmail, website, pointOfContact, supplierAddress FROM `supplier`";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $supplierId = $row['supplierId'];
        $supplierName = $row['supplierName'];
        $supplierPhone = $row['supplierPhone'];
        $supplierEmail = $row['supplierEmail'];
        $website = $row['website'];
        $pointOfContact = $row['pointOfContact'];
        $supplierAddress = $row['supplierAddress'];

        echo "<tr>";
        echo "<td>$supplierId</td>";
        echo "<td>$supplierName</td>";
        echo "<td>$supplierPhone</td>";
        echo "<td>$supplierEmail</td>";
        echo "<td>$website</td>";
        echo "<td>$pointOfContact</td>";
        echo "<td>$supplierAddress</td>";
        echo "</tr>";
      }
      ?>

    </tbody>
  </table>
</div>