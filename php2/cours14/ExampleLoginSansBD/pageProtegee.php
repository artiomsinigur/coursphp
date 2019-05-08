<?php
    session_start();

    if (!isset($_SESSION['authentification'])) {
        header('Location: login.php');
        die();
    }
    
    var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page protegée</title>
</head>
<body>
    <h1>Cette page est protegée. Vous devez être authentifié</h1>
</body>
</html>