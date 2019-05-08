<?php
    session_start();
    $arrItems = [];
    
    if (isset($_POST["newItem"])) {
        $_SESSION["listeItems"] = $_POST["newItem"];
    }

    
    $_SESSION["listeItems"] = $_SESSION["newItem"];  

    $arr["niveau1"] = [];

    var_dump($_SESSION, $arr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercice sur session</title>
</head>
<body>
    <form action="" method="POST">
        <div>
            <input type="text" name="newItem">
            <button type="submit" name="envoie">Envoyer</button>
            <?php
                foreach($arrItems as $item) {
                    echo "<li>" . $item . "</il>";
                }
            ?>
        </div>
    </form>
</body>
</html>