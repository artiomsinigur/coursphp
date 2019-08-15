<?php
    require_once("ToDoList.php");

    session_start();

    //La liste des tâches sera stockée dans les variables sessions
    //S'il n'y a pas de liste pour l'usager courant, on doit en créer une
    if(!isset($_SESSION["todo"]))
    {
        $_SESSION["todo"] = new ToDoList();
    }

    //cette variable temporaire est seulement présente pour alléger le code
    $maListe = $_SESSION["todo"];
?>
<html>
    <body>
        <h1>Formulaire d'ajout de tâche</h1>
        <form method="post">
            Nom de la tâche : <input type="text" name="nomTache"/><br/>
            Priorité de la tâche : <input type="text" name="priorite"/><br>
            <input type="submit"/>  
        </form>
        <?php
            if(isset($_POST["nomTache"]) && isset($_POST["priorite"]))
            {
                //on essaie d'ajouter la tâche (la validation est dans les setters de l'objet)
                try
                {
                    $nouvelleTache = new Tache($_POST["nomTache"], $_POST["priorite"]);
                    $maListe->ajouteTache($nouvelleTache);
                    echo "<p>Ajout réussi.</p>";
                }
                catch(Exception $e)
                {
                    echo "<p>" . $e->getMessage() . "</p>";
                }
            }
        ?>
        <h1>Liste des tâches</h1>
        <?php
            echo "<ul>";
            foreach($maListe->getTaches() as $t)
            {
                echo "<li>" . $t->getNom() . " : Priorité " . $t->getPriorite() . "</li>";
            }
            echo "</ul>";
         ?>
        <h1>Affichage de la liste la plus prioritaire</h1>
        <?php
            echo "La tâche la plus prioritaire de votre liste est : " . $maListe->plusPrioritaire()->getNom();
        var_dump($_SESSION['todo']);
        ?>
    </body>
</html>


