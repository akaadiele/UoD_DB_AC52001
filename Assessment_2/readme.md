../assets/
../sources/assets/


<?php
include("../php/db.php")
?>


<!-- Connect to database -->

<?php
// Connect to database
include("../sources/php/db.php");
?>

include("../sources/php/functions.php");


<?php
$select_query = "SELECT * FROM `itemcategory`";
$query_result = mysqli_query($mysql, $select_query);
while ($row = mysqli_fetch_assoc($query_result)) {
    $itemCategId = $row['categoryId'];
    $itemCateg = $row['category'];
    echo "<option value='$itemCategId'>$itemCateg</option>";
}
?>


if (isset($_GET['insert_product'])) {
    include('insert-products.php')
}
if (isset($_GET['insert_category'])) {
    include('insert-category.php')
}


$select_query_categ_result->num_rows
$select_query_categ_result_numRows = mysqli_num_rows($select_query_categ_result)


<input type="radio" id="customer" name="userType" value="customer">
<label for="customer">Customer</label><br>
<input type="radio" id="employee" name="userType" value="employee">
<label for="employee">Employee</label><br>

<div class="form-check form-floating mb-3">
    <input class="form-check-input form-control rounded-3" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
    <label class="form-check-label" for="flexRadioDefault1">Default radio</label>
</div>
<div class="form-check form-floating mb-3">
    <input class="form-check-input form-control rounded-3" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
    <label class="form-check-label" for="flexRadioDefault2">Default checked radio</label>
</div>



session_start();

$_SESSION['loggedInUsername'] = $loggedInUsername;
$_SESSION['userType'] = $userType;

echo "The number of views is " . $_SESSION['views'];

if (isset($_SESSION['views'])) {
    unset($SESSION['views']);
}


<?php
echo "<script> alert('hi') </script>";
?>
