<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Appointments</h1>
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
        <th scope="col">appointmentId</th>
        <th scope="col">customerId</th>
        <th scope="col">employeeId</th>
        <th scope="col">appointmentTime</th>
        <th scope="col">appointmentDate</th>
        <th scope="col">appointmentLocation</th>
        <th scope="col">agreedFee</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $select_query = "SELECT appointmentId, customerId, employeeId, appointmentTime, appointmentDate, appointmentLocation, agreedFee FROM `consultancyappointment`";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $appointmentId = $row['appointmentId'];
        $customerId = $row['customerId'];
        $employeeId = $row['employeeId'];
        $appointmentTime = $row['appointmentTime'];
        $appointmentDate = $row['appointmentDate'];
        $appointmentLocation = $row['appointmentLocation'];
        $agreedFee = $row['agreedFee'];

        echo "<tr>";
        echo "<td>$appointmentId</td>";
        echo "<td>$customerId</td>";
        echo "<td>$employeeId</td>";
        echo "<td>$appointmentTime</td>";
        echo "<td>$appointmentDate</td>";
        echo "<td>$appointmentLocation</td>";
        echo "<td>$agreedFee</td>";
        echo "</tr>";
      }
      ?>

    </tbody>
  </table>
</div>