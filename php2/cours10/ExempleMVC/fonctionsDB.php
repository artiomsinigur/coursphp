<?php
    /*
        FonctionsDB.php est le fichier qui représente notre MODÈLE dans notre architecture MVC-lite. C'est donc dnas ce fichier que nous retrouverons TOUTES les requêtes SQL SANS AUCUNE EXCEPTION. C'est aussi ici que nous retoruverons la connexion à la base de données et les informations nécessaires à celle-ci (hostname, username, password, base de données, etc.)  
    
    */

    function connectDB()
    {
        $c = mysqli_connect("localhost", "root", "", "liqueJointures");
        
        if(!$c)
            trigger_error("Erreur de connexion... " . mysqli_connect_error());
        
        mysqli_query($c, "SET NAMES 'utf8'");
        return $c;
    }

    $connexion = connectDB();



    function GetAllEquipes()
    {
        global $connexion;
        
        $requete = "SELECT id, nom, ville FROM equipe";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }



    function GetAllJoueurs()
    {
        global $connexion;
        
        $requete = "SELECT joueur.id as idJoueur, prenom, joueur.nom AS nomJoueur, equipe.nom AS nomEquipe, ville 
        FROM equipe JOIN joueur ON joueur.idEquipe = equipe.id";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }

    /*
    *
    *   GetJoueursParEquipe
    *   Paramètres : L'id de l'équipe dont on veut obtenir les joueurs
    *   Retourne les joueurs de l'équipe dans un resultset
    */
    function GetJoueursParEquipe($idEquipe)
    {
        global $connexion;
        
        $requete = "SELECT id, prenom, nom FROM joueur WHERE idEquipe = $idEquipe";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }

    

    function GetEquipeByID($id)
    {
        global $connexion;
        
        $requete = "SELECT nom, ville FROM equipe WHERE id = $id";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }
?>