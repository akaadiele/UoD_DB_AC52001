../assets/
../sources/assets/


<?php
include("../php/db.php")
?>


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
