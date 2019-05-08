<?php
    //toutes les pages qui utilisent les variables sessions doivent avoir ceci comme première instruction, en haut, avant TOUTE FORME DE HTML OU D'OUTPUT
    session_start();

        //si on reçoit un nouvel item du formulaire
    if(isset($_POST["nouvelItem"]))
    {
        if(!isset($_SESSION["listeItems"]))
            $_SESSION["listeItems"] = array();
            //on ajoute la liste dans les variables sessions
            $_SESSION["listeItems"][] = $_POST["nouvelItem"];
    }
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Exemple d'écriture de variable session</title>
	</head>
	<body>
		<h1>Entrez l'item à ajouter dans la liste</h1>
		<form method="POST">
			<input type="text" name="nouvelItem"/>	
            <input type="submit" value="Ajouter">
		</form>
        <ul>
            <?php
                if(isset($_SESSION["listeItems"]))
                {
                    foreach($_SESSION["listeItems"] as $item)
                        echo "<li>$item</li>";
                }
            ?>
        </ul>
        
    </body>
</html>