<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
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
  </div>
</div>

<h2>Overview</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">

    <?php
    if ($userType == "customer") {
      echo "<thead>
          <tr>
            <th scope='col'>customerId</th>
            <th scope='col'>customerName</th>
            <th scope='col'>customerEmail</th>
            <th scope='col'>customerPhone</th>
            <th scope='col'>customerAddress</th>
            <th scope='col'>customerType</th>
            <th scope='col'>customerUsername</th>
          </tr>
        </thead>
        <tbody>";

      $select_query = "SELECT * FROM `customer_personal_view` WHERE customerId = '$loggedInId' ";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $customerId = $row['customerId'];
        $customerName = $row['customerName'];
        $customerEmail = $row['customerEmail'];
        $customerPhone = $row['customerPhone'];
        $customerAddress = $row['customerAddress'];
        $customerType = $row['customerType'];
        $customerUsername = $row['customerUsername'];

        echo "<tr>
        <td>$customerId</td>
        <td>$customerName</td>
        <td>$customerEmail</td>
        <td>$customerPhone</td>
        <td>$customerAddress</td>
        <td>$customerType</td>
        <td>$customerUsername</td>
        </tr>";
      }
    } elseif ($userType == "employee") {

      echo "<thead>
          <tr>
        <th scope='col'>employeeId</th>
        <th scope='col'>name</th>
        <th scope='col'>employeeEmail</th>
        <th scope='col'>employeeUsername</th>
        <th scope='col'>yearlySalary</th>
        <th scope='col'>branchName</th>
        <th scope='col'>branchLocation</th>
        <th scope='col'>privilegeLevel</th>
          </tr>
        </thead>
        <tbody>";

      $select_query = "SELECT * FROM `employee_personal_view` WHERE employeeId = '$loggedInId' ";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $employeeId = $row['employeeId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $employeeEmail = $row['employeeEmail'];
        $employeeUsername = $row['employeeUsername'];
        $yearlySalary = $row['yearlySalary'];
        $branchId = $row['branchId'];
        $branchName = $row['branchName'];
        $branchLocation = $row['branchLocation'];
        $privilegeLevel = $row['privilegeLevel'];

        echo "<tr>
        <td>$employeeId</td>
        <td>$firstName $lastName</td>
        <td>$employeeEmail</td>
        <td>$employeeUsername</td>
        <td>$yearlySalary</td>
        <td>$branchName</td>
        <td>$branchLocation</td>
        <td>$privilegeLevel</td>
        </tr>";
      }
    }
    ?>

    </tbody>
  </table>
</div>