<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Orders</h1>
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
        <th scope="col">saleId</th>
        <th scope="col">customerId</th>
        <th scope="col">timePlaced</th>
        <th scope="col">itemId</th>
        <th scope="col">itemQuantity</th>
        <th scope="col">saleStatusId</th>
        <th scope="col">totalCost</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if ($userType == "customer") {
        $select_query = "SELECT saleId, customerId, timePlaced, itemId, itemQuantity, saleStatusId, totalCost FROM `sale` WHERE customerId = '$loggedInId'";
      } elseif ($userType == "employee") {
        $select_query = "SELECT saleId, customerId, timePlaced, itemId, itemQuantity, saleStatusId, totalCost FROM `sale`";
      }

      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $saleId = $row['saleId'];
        $customerId = $row['customerId'];
        $timePlaced = $row['timePlaced'];
        $itemId = $row['itemId'];
        $itemQuantity = $row['itemQuantity'];
        $saleStatusId = $row['saleStatusId'];
        $totalCost = $row['totalCost'];

        echo "<tr>";
        echo "<td>$saleId</td>";
        echo "<td>$customerId</td>";
        echo "<td>$timePlaced</td>";
        echo "<td>$itemId</td>";
        echo "<td>$itemQuantity</td>";
        echo "<td>$saleStatusId</td>";
        echo "<td>$totalCost</td>";
        echo "</tr>";
      }
      ?>

    </tbody>
  </table>
</div>