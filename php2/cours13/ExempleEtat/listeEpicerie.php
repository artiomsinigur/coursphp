<?php
    //toutes les pages qui utilisent les variables sessions doivent avoir ceci comme première instruction, en haut, avant TOUTE FORME DE HTML OU D'OUTPUT
    session_start();

    $liste = array();

    //vérifier si la liste existe déjà dans la session
    if(isset($_SESSION["listeItems"]))
    {
        $liste = $_SESSION["listeItems"];
    }

    //si on reçoit un nouvel item du formulaire
    if(isset($_POST["nouvelItem"]))
    {
        //on ajoute l'item dans la liste
        $liste[] = $_POST["nouvelItem"];
        //on ajoute la liste dans les variables sessions
        $_SESSION["listeItems"] = $liste;
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
                foreach($liste as $item)
                    echo "<li>$item</li>";
            ?>
        </ul>
        
    </body>
</html>