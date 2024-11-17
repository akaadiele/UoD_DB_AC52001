<?php if (isset($_GET['delete-product'])) {
    $currentItemId = $_GET['delete-product'];
    echo 'it is - ', $currentItemId;
} ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Click to confirm delete</h1>
</div>

<div class="container px-auto align-items-center" style="width: 50%;">
    <form method="post" action="">
        <button class="btn btn-primary w-100 py-2" type="submit" name="deleteProduct">Delete Product</button>
    </form>
</div>


<?php
if (isset($_POST['deleteProduct'])) {

    // php code to delete from DB 

    echo "<script> alert('Product Deleted') </script>";
    echo '<script> window.open("index.php?products", "_self") </script>';
}
?>