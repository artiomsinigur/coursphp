<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des équipes</title>
</head>
<body>
    <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo $row['nom'] . " - " . $row['ville'];
            echo "</li>";
        }
    ?>
</body>
</html>