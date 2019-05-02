<?php
    /*
        FonctionsDB.php est le fichier qui représente notre MODÈLE dans notre architecture MVC-lite. C'est donc dnas ce fichier que nous retrouverons TOUTES les requêtes SQL SANS AUCUNE EXCEPTION. C'est aussi ici que nous retoruverons la connexion à la base de données et les informations nécessaires à celle-ci (hostname, username, password, base de données, etc.)  
    
    */

    function connectDB()
    {
        $c = mysqli_connect("localhost", "root", "", "ligueJointures");
        
        if(!$c)
            trigger_error("Erreur de connexion... " . mysqli_connect_error());
        
        mysqli_query($c, "SET NAMES 'utf8'");
        return $c;
    }

    $connexion = connectDB();

    // ====================//
    // RAQUÊTES AVEC LA TABLE ÉQUIPE
    // ====================//
    function GetAllEquipes()
    {
        $requete = "SELECT id, nom, ville, nbVictoire FROM equipe";
        return getSqlData($requete);
    }

    /*
    *   GetEquipeParID
    *   Paramètres : L'id de l'équipe dont on veut obtenir les infos
    *   Retourne les infos de l'équipe dans un resultset
    */
    function GetEquipeParID($id)
    {
        global $connexion;
        
        $requete = "SELECT nom, ville FROM equipe WHERE id = $id";
        $resultat = mysqli_query($connexion, $requete);
        
        return mysqli_fetch_assoc($resultat);
    }

    /*
    *   InsereEquipe
    *   Paramètres : Une chaine pour le nom, une chaine pour la ville
    */
    function InsereEquipe($nom, $ville)
    {
        global $connexion;
        
        $requete = "INSERT INTO equipe(nom, ville) VALUES('$nom', '$ville')";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }

    // Supprimer l'équipe
    function SupprimerEquipe($idEquipe) {
        $requete = "DELETE FROM equipe WHERE id = $idEquipe";
        return getSqlData($requete);
    }

    // =====================//
    // RAQUÊTES AVEC LA TABLE JOUEUR
    // =====================//
    function GetAllJoueurs()
    {
        $requete = "SELECT joueur.id as idJoueur, prenom, joueur.nom AS nomJoueur, equipe.nom AS nomEquipe, ville 
        FROM equipe JOIN joueur ON joueur.idEquipe = equipe.id";
        return getSqlData($requete);
    }

    /*
    *   GetJoueursParEquipe
    *   Paramètres : L'id de l'équipe dont on veut obtenir les joueurs
    *   Retourne les joueurs de l'équipe dans un resultset
    */
    function GetJoueursParEquipe($idEquipe)
    {
        $requete = "SELECT id, prenom, nom FROM joueur WHERE idEquipe = $idEquipe";
        return getSqlData($requete);
    }

    // Supprrimer le joueur
    function SupprimeJoueur($idJoueur) {
        $requete = "DELETE FROM joueur WHERE id = $idJoueur";
        return getSqlData($requete);
    }

    // Insertion d'un joueur
    function InsereJoueur($nom, $prenom, $idEquipe)
    {
        $requete = "INSERT INTO joueur(nom, prenom, idEquipe) VALUES('$nom', '$prenom', '$idEquipe')";
        return getSqlData($requete);
    }
    
    // Mise à jour d'un joueur
    function updatePlayer($nom, $prenom, $idEquipe, $idJoueur) {
        global $connexion;

        $requete = "UPDATE joueur SET nom='$nom', prenom='$prenom', idEquipe=$idEquipe WHERE id = $idJoueur";

        $resultat = mysqli_query($connexion, $requete);
        return $resultat;
    }

    // ====================//
    // TRIER LA TABLE ÉQUIPE
    // ====================//
    // Trier par nom, ville et nombre de victoires
    function sortByOrderDesc($sortBy)
    {
        $requete = "SELECT id, nom, ville, nbVictoire FROM equipe ORDER BY $sortBy DESC";
        return getSqlData($requete);
    }

    // function sortByOrderAsc($sortBy)
    // {
    //     $requete = "SELECT id, nom, ville, nbVictoire FROM equipe ORDER BY $sortBy ASC";
    //     return getSqlData($requete);
    // }


    // Obtenir le résultat d'une requête
    function getSqlData($requete) {
        global $connexion;
        $resultat = mysqli_query($connexion, $requete);
        // Retourner le resultat sous forme d'un tableau
        return mysqli_fetch_all($resultat, MYSQLI_ASSOC);
    }
?>