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
