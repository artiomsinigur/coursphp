<?php
    session_start();

    $ville = $_GET['ville'] ?? "";
    if ($ville) {
        // Créer une nouvelle session s'il n'existe pas
        if (!isset($_SESSION['ville'])) {
            $_SESSION['ville'] = [];
        }
        // Attribuer une nouvelle valeur
        $_SESSION['ville'] = $ville;
    }

    // Si on clique sur le bouton suivante, rédiriger vers la page resultat.php
    if (isset($_GET['suivante'])) {
        if (!$ville) {
            $_SESSION['ville'] = '';
        }
        // Rédiriger à la 1ère page, si l'utilisateur n'a pas répondu à la 1ère question 
        if (empty($_SESSION['province'])) {
            $_SESSION['errors'] = 'Veuillez répondre à cette question.';
            header('Location: premiereQuestion.php');
        } else {
            header('Location: resultats.php');
        }
    }

    // Si l'usager a répondu, supprimer le message d'erreur
    if (!empty($_SESSION['ville'] && !empty($_SESSION['province']))) {
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
    <h1>Questionnaire - 2ème question sur 2 questions</h1>
    <form action="" method="GET">
        <h2>Quel est la plus grande ville du canada par population ?</h2>
        <div>
            <label><input type="radio" name="ville" value="montreal">Montréal</label>
        </div>
        <div>
            <label><input type="radio" name="ville" value="calgary">Calgary</label>
        </div>
        <div>
            <label><input type="radio" name="ville" value="vancouver">Vancouver</label>
        </div>
        <div>
            <label><input type="radio" name="ville" value="toronto">Toronto</label>
        </div>
        <button type="submit" name="suivante" value="send">Suivante</button>
    </form>
    
    <p class="errors"><?= isset($_SESSION['errors']) ? $_SESSION['errors'] : ""?></p>
    <a href="premiereQuestion.php">Rétourner</a>
</body>
</html>