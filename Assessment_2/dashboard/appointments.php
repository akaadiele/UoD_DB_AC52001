<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Appointments</h1>
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

    <!-- <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal"> -->
    <button type="button" class="btn btn-sm btn-outline-primary" onclick='window.open("../productsInfo/productsInfo.php", "_self")'>
      New Appointment Booking
    </button>
  </div>
</div>

<h2>Overview</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">


    <?php
    if ($userType == "customer") {
      echo '<thead>
          <tr>
            <th scope="col">appointmentDate</th>
            <th scope="col">appointmentTime</th>
            <th scope="col">appointmentLocation</th>
            <th scope="col">agreedFee</th>
            <th scope="col">employeeName</th>
          </tr>
        </thead>';

      $select_query = "SELECT * FROM `customer_appointments` WHERE customerId = '$loggedInId'";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $appointmentDate = $row['appointmentDate'];
        $appointmentTime = $row['appointmentTime'];
        $appointmentLocation = $row['appointmentLocation'];
        $agreedFee = $row['agreedFee'];
        $employeeName = $row['employeeName'];

        $appointmentId = $row['appointmentId'];

        echo "<tbody>
                <tr>
                  <td>$appointmentDate</td>
                  <td>$appointmentTime</td>
                  <td>$appointmentLocation</td>
                  <td>$agreedFee</td>
                  <td>$employeeName</td>";

        // echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?edit-appointment=' . $appointmentId . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?delete-appointment=' . $appointmentId . '"><i class="fa-solid fa-trash"></i></a></td>';

        echo "</tr> 
            </tbody>";
      }
    } elseif ($userType == "employee") {

      echo '<thead>
          <tr>
            <th scope="col">appointmentDate</th>
            <th scope="col">appointmentTime</th>
            <th scope="col">appointmentLocation</th>
            <th scope="col">agreedFee</th>
            <th scope="col">employeeName</th>
            <th scope="col">customerName</th>
            <th scope="col">customerPhone</th>
            <th scope="col">customerEmail</th>
            <th scope="col">fulfilled</th>
          </tr>
        </thead>';

      $select_query = "SELECT * FROM `employee_appointment_view`";
      $query_result = mysqli_query($mysql, $select_query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $appointmentDate = $row['appointmentDate'];
        $appointmentTime = $row['appointmentTime'];
        $appointmentLocation = $row['appointmentLocation'];
        $agreedFee = $row['agreedFee'];
        $fulfilled = $row['fulfilled'];
        $employeeName = $row['employeeName'];
        $customerName = $row['customerName'];
        $customerPhone = $row['customerPhone'];
        $customerEmail = $row['customerEmail'];

        $appointmentId = $row['appointmentId'];

        echo "<tbody>
                <tr>
                  <td>$appointmentDate</td>
                  <td>$appointmentTime</td>
                  <td>$appointmentLocation</td>
                  <td>$agreedFee</td>
                  <td>$employeeName</td>
                  <td>$customerName</td>
                  <td>$customerPhone</td>
                  <td>$customerEmail</td>
                  <td>$fulfilled</td>";

        if ($loggedInUserPrivilegeLevel == "head-office-manager") {
          echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?edit-appointment=' . $appointmentId . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
        }
        echo '<td><a class="nav-link d-flex align-items-center gap-2" href="index.php?delete-appointment=' . $appointmentId . '"><i class="fa-solid fa-trash"></i></a></td>';

        echo "</tr> 
            </tbody>";
      }
    }
    ?>


  </table>
</div>


<!-- Modal - Appointment -->
<div class="modal fade" id="appointmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <?php
      include('../productsInfo/create-appointment.php');
      ?>

    </div>
  </div>
</div>

<!-- Modals -->