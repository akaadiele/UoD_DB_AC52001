<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Orders</h1>
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
    <button type="button" class="btn btn-sm btn-outline-primary" onclick='window.open("../productsInfo/productsInfo.php", "_self")'>
      New Order
    </button>
  </div>
</div>

<h2>Overview</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">

    <?php
    if ($userType == "customer") {
      echo "<thead>
        <tr>
          <th scope='col'>saleId</th>
          <th scope='col'>customerId</th>
          <th scope='col'>timePlaced</th>
          <th scope='col'>itemName</th>
          <th scope='col'>itemDescription</th>
          <th scope='col'>category</th>
          <th scope='col'>itemQuantity</th>
          <th scope='col'>totalCost</th>
          <th scope='col'>saleStatus</th>
        </tr>
      </thead>
      <tbody>";
      $select_query = "SELECT * FROM `customer_order_history` WHERE customerId = '$loggedInId' ORDER BY saleId";

      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $saleId = $row['saleId'];
        $customerId = $row['customerId'];
        $timePlaced = $row['timePlaced'];
        $itemName = $row['itemName'];
        $itemDescription = $row['itemDescription'];
        $category = $row['category'];
        $itemQuantity = $row['itemQuantity'];
        $totalCost = $row['totalCost'];
        $saleStatus = $row['saleStatus'];

        echo "<tr>
          <td>$saleId</td>
          <td>$customerId</td>
          <td>$timePlaced</td>
          <td>$itemName</td>
          <td>$itemDescription</td>
          <td>$category</td>
          <td>$itemQuantity</td>
          <td>$totalCost</td>
          <td>$saleStatus</td>";

        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?edit-order=' . $saleId . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
        // echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?delete-order=' . $saleId . '"><i class="fa-solid fa-trash"></i></a></td>';
        echo '</tr>';
      }
    } elseif ($userType == "employee") {

      echo "<thead>
        <tr>
          <th scope='col'>saleId</th>
          <th scope='col'>timePlaced</th>
          <th scope='col'>itemName</th>
          <th scope='col'>itemQuantity</th>
          <th scope='col'>totalCost</th>
          <th scope='col'>saleStatus</th>
          <th scope='col'>customerName</th>
          <th scope='col'>customerPhone</th>
          <th scope='col'>customerEmail</th>
        </tr>
      </thead>
      <tbody>";

      $select_query = "SELECT * FROM `employee_order_view` ORDER BY saleId";

      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $saleId = $row['saleId'];
        $timePlaced = $row['timePlaced'];
        $itemName = $row['itemName'];
        $itemQuantity = $row['itemQuantity'];
        $totalCost = $row['totalCost'];
        $saleStatus = $row['saleStatus'];
        $customerName = $row['customerName'];
        $customerPhone = $row['customerPhone'];
        $customerEmail = $row['customerEmail'];

        echo "<tr>
          <td>$saleId</td>
          <td>$timePlaced</td>
          <td>$itemName</td>
          <td>$itemQuantity</td>
          <td>$totalCost</td>
          <td>$saleStatus</td>
          <td>$customerName</td>
          <td>$customerPhone</td>
          <td>$customerEmail</td>";

        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?edit-order=' . $saleId . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
        // echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?delete-order=' . $saleId . '"><i class="fa-solid fa-trash"></i></a></td>';
        echo '</tr>';
      }
    }
    ?>

    </tbody>
  </table>
</div>