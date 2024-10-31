<!-- Session Variables -->
<!-- To simply free up a variable that is no longer needed, use the unset() function. -->
<?php session_start();
if (isset($_SESSION['views'])) {
    unset($SESSION['views']);
}
?>