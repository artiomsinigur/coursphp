<?php
    session_start();

    $province = $_GET['province'] ?? '';
    if ($province) {
        // Créer une nouvelle session s'il n'existe pas
        if (!isset($_SESSION['province'])) {
            $_SESSION['province'] = [];
        }
        // Attribuer une valeur
        $_SESSION['province'] = $province;
    }

    // Si on clique sur le bouton suivante, rédiriger vers la 2ème
    if (isset($_GET['suivante'])) {
        if (!$province) {
            $_SESSION['province'] = '';
        }
        header('Location: deuxiemeQuestion.php');
    }

    // Si l'usager a répondu, supprimer le message d'erreur
    if (!empty($_SESSION['province'])) {
        unset($_SESSION['errors']);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Questionnaire</title>
    <style>
        .errors {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Questionnaire - 1ère question sur 2 questions</h1>
    <form action="" method="GET">
        <h2>Quelle province canadienne a la plus grande superficie ?</h2>
        <div>
            <label><input type="radio" name="province" value="colombie-britannique">Colombie-Britannique</label>
        </div>
        <div>
            <label><input type="radio" name="province" value="ontario">Ontario</label>
        </div>
        <div>
            <label><input type="radio" name="province" value="quebec">Québec</label>
        </div>
        <button type="submit" name="suivante" value="send">Suivante</button>
    </form>
    
    <p class="errors"><?= isset($_SESSION['errors']) ? $_SESSION['errors'] : ""?></p>
</body>
</html>