<?php
    session_start();
    if (isset($_GET["nouveauMessage"])) {
        if (isset($_SESSION["message"])) {
            $_SESSION["ancienMessage"] = $_SESSION["message"];
            $_SESSION["message"] = $_GET["nouveauMessage"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecriture session</title>
</head>
<body>
    <form action="" method="GET">
        <p>Entrez le message a garder dans la variable session nommee message</p>
        <div>
            <input type="text" name="nouveauMessage">
        </div>
        <button type="submit">Sauvegarder</button>
    </form>
    <a href="lectureSession.php">Aller a la lecture</a>
</body>
</html>