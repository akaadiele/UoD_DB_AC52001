<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Employees</h1>
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
        <th scope="col">employeeId</th>
        <th scope="col">firstName</th>
        <th scope="col">lastName</th>
        <th scope="col">employeeEmail</th>
        <th scope="col">salaryBracketId</th>
        <th scope="col">privilegeLevelId</th>
        <th scope="col">branchId</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $select_query = "SELECT employeeId, firstName, lastName, employeeEmail, salaryBracketId, privilegeLevelId, branchId FROM `employee`";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $employeeId = $row['employeeId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $employeeEmail = $row['employeeEmail'];
        $salaryBracketId = $row['salaryBracketId'];
        $privilegeLevelId = $row['privilegeLevelId'];
        $branchId = $row['branchId'];

        echo "<tr>";
        echo "<td>$employeeId</td>";
        echo "<td>$firstName</td>";
        echo "<td>$lastName</td>";
        echo "<td>$employeeEmail</td>";
        echo "<td>$salaryBracketId</td>";
        echo "<td>$privilegeLevelId</td>";
        echo "<td>$branchId</td>";
        echo "</tr>";
      }
      ?>

    </tbody>
  </table>
</div>