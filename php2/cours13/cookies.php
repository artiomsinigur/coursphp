<?php
    $color = "";
    // $color = $_GET["couleur"] ?? "";
    if (isset($_GET["couleur"])) {
        $color = $_GET["couleur"];
        // Créer un cookie qui continet la couleur pour les requêtes suséquetes
        setcookie("cookieCouleur", $color, time() + 365 * 24 * 60 * 60);
    } else {
        if (isset($_COOKIE["cookieCouleur"])) {
            $color = $_COOKIE["cookieCouleur"];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie</title>
</head>
<body bgColor="<?= $color ?>">
    <form method="GET">
        <select name="couleur">
            <option value="red" <?php if($color == "red") echo "selected";?>>Red</option>
            <option value="green" <?php if($color == "green") echo "selected";?>>Green</option>
            <option value="blue" <?php if($color == "blue") echo "selected";?>>Blue</option>
        </select>
        <button type="submit">Sauvegarder</button>
    </form>
</body>
</html>