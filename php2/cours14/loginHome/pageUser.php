<?php
    session_start();
    // Verifier si l'usager est est authentifie
    if (!isset($_SESSION['authentification'])) {
        header("Location: login.php");
        die();
    }
    var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Vous êtes authentifié.</h1>
</body>
</html>