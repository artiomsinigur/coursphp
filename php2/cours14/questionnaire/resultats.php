<?php
    session_start();

    // Vérifier si l'usager à répondu à la 2ème question
    if ($_SESSION['ville'] == '') {
        $_SESSION['errors'] = 'Veuillez répondre à cette question.';
        header('Location: deuxiemeQuestion.php');
    }
    
    // 1.Affiche le nombre des bonnes réponses
    $correctAnswers = ['quebec', 'toronto'];
    $numAnswers = 0;
    $message = '';

    foreach ($correctAnswers as $answer) {
        // if ($answer == $_SESSION['province'] || $answer == $_SESSION['ville']) {
        if (in_array($answer, $_SESSION)) {
            $numAnswers++;
        }
    }
 
    // 2.Afficher un message de félicitation ou de réprimande
    if (count($correctAnswers) == $numAnswers) {
        $message = 'Félicitation! Vous êtes un(une) vrais intello.';
    } else {
        $message = 'Vous êtes preque parvenu';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats</title>
</head>
<body>
    <h1>Résultats</h1>
    <?php
        echo "<h2>$message </h2><br>";
        echo "Vous avez répondu à $numAnswers bonnes réponces<br>";
    ?>

    <a href="deuxiemeQuestion.php">Rétourner</a>
    <a href="premiereQuestion.php">Réfaire la questionnaire</a>
</body>
</html>