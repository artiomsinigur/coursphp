<?php
    require_once('TableBase.php');
    require_once('TableArticle.php');
    require_once('TableAuteur.php');

    // Instancier la classe TableArticle 
    $bdArticle = new TableArticle();
    echo "<h1> Manipulation avec la classe TableArticle </h1>";
    echo "<h2> Afficher tous les articles </h2>";
    $res = $bdArticle->obtenir_tous();
    while($r = $res->fetch(PDO::FETCH_OBJ)) {
        echo "<table>";
            echo "<tr><td>" . $r->titre . "</tr></td>";
            echo "<tr><td>" . $r->texte . "</tr></td>";
            echo "<tr><td>" . $r->idAuteur . "</tr></td>";
        echo "</table>";
        echo "<br>";
    }

    echo "<h2> Ajouter un article </h2>";
    // $res = $bdArticle->ajouter('Test', 'article', 'Artiom');

    echo "<h2> Modifier cet article </h2>";
    // $res = $bdArticle->update(5, 'change', 'moi aussi', 'Artiom');
    
    echo "<h2> Supprimer un article </h2>";
    // $res = $bdArticle->supprimer(14);
    var_dump($res);


    // Instancier la classe TableAuteur 
    $bdAuteur = new TableAuteur();
    echo "<h1> Manipulation avec la classe TableAuteur </h1>";
    echo "<h2> Afficher tous les auteurs </h2>";
    $res = $bdAuteur->obtenir_tous();
    while($r = $res->fetch(PDO::FETCH_OBJ)) {
        echo "<table>";
            echo "<tr><td>" . $r->username . "</tr></td>";
            echo "<tr><td>" . $r->prenom . "</tr></td>";
            echo "<tr><td>" . $r->nom . "</tr></td>";
        echo "</table>";
        echo "<br>";
    }

    echo "<h2> Ajouter un auteur </h2>";
    // $res = $bdAuteur->ajouter('powermen', 'Leo', 'Basta');
    // $res = $bdAuteur->ajouter('test', 'Marge', 'Purdy');

    echo "<h2> Modifier un auteur </h2>";
    // $res = $bdAuteur->update('powermen', 'Jacob', 'Bondary');

    echo "<h2> Supprimer un auteur </h2>";
    // $res = $bdAuteur->supprimer('test');
    // var_dump($res);
?>