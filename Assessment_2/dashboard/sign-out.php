<!-- ### Include PHP code -->
<!-- ### Set session variables -->

<div class="modal-header">
  <h1 class="modal-title fs-5" id="signOutModalLabel">Click to confirm sign out</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
  <form method="post" action="">
    <button class="btn btn-primary w-100 py-2" type="submit" name="userLogOut">Sign Out</button>
  </form>
</div>


<?php
if (isset($_POST['userLogOut'])) {
  session_unset(); // remove all session variables
  session_destroy(); // destroy the session
  
  echo '<script> window.open("../homepage/index.php", "_self") </script>';
  echo "<script> alert('User Logged Out') </script>";
}
?>