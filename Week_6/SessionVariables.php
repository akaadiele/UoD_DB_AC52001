<!-- Session Variables
Information stored on the server for temporary use is known as a session variable e.g. username,
contents of a shopping cart. This information is deleted when the user leaves the website, so should
only be used for transient data. -->
<?php session_start();
// store session data
if (isset($_SESSION['views'])) {
    $_SESSION['views'] = $_SESSION['views'] + 1;
} else {
    $_SESSION['views'] = 1;
}
// display the session variable
echo "The number of views is " . $_SESSION['views'];
?>
