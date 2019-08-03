<html>
    <head>
        <meta charset="utf-8">
        <title>Test du CRUD</title>
    </head>
    <body>
        <?php
            require_once("TableArticle.php"); 
            $dbArticle = new TableArticle();
        
            $articles = $dbArticle->obtenir_tous();
        
            echo "<ul>";
            foreach($articles as $a)
            {
                echo "<li>" . $a["titre"] . "</li>";
            }
            echo "</ul>";
        
            require_once("TableAuteur.php"); 
            $dbAuteur = new TableAuteur();
        
            $auteurs = $dbAuteur->obtenir_tous();
        
            echo "<ul>";
            foreach($auteurs as $a)
            {
                echo "<li>" . $a["username"] . "</li>";
            }
            echo "</ul>";
        
            //supprimer un auteur
            echo $dbAuteur->supprimer("jmartel");
        
            //insertion d'un article
            echo $dbArticle->ajouter("Titre test", "Texte test", 1);
        ?>
    </body>
</html>    