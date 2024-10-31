<?php
// Include the database connection
include 'db.php';
$query = "SELECT * FROM Students";
$stmt = $mysql->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
?>

<table>
    <thead>
        <td>Firstname</td>
        <td>Surname</td>
    </thead>
    <tbody>

        <?php
        foreach ($result as $row) {
            echo "<td>" . $row['Firstname'] . "</td>";
            echo "<td>" . $row['Surname'] . "</td></tr>";
        }
        ?>

        </thead>
</table>