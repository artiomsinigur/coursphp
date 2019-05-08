<?php
    /*
        FonctionsDB.php est le fichier qui représente notre MODÈLE dans notre architecture MVC-lite. C'est donc dnas ce fichier que nous retrouverons TOUTES les requêtes SQL SANS AUCUNE EXCEPTION. C'est aussi ici que nous retoruverons la connexion à la base de données et les informations nécessaires à celle-ci (hostname, username, password, base de données, etc.)  
    
    */

    function connectDB()
    {
        $c = mysqli_connect("localhost", "root", "", "exemplelogin");
        
        if(!$c)
            trigger_error("Erreur de connexion... " . mysqli_connect_error());
        
        mysqli_query($c, "SET NAMES 'utf8'");
        return $c;
    }

    $connexion = connectDB();

    function Authentification($user, $pass)
    {
        global $connexion;
        
        $requete = "SELECT password FROM usager WHERE username = '" . filtre($user) . "'";
    
        $resultat = mysqli_query($connexion, $requete);
    
        if($rangee = mysqli_fetch_assoc($resultat))
        {
            if(password_verify($pass, $rangee["password"]))                
                return true;
            else
                return false;
        }
        else
            return false;
    }

    function GetBioParUsager($user)
    {
        global $connexion;
        
        $requete = "SELECT bio FROM usager WHERE username = '" . filtre($user) . "'";
        $resultat = mysqli_query($connexion, $requete);
        
        if($rangee = mysqli_fetch_assoc($resultat))
            return $rangee["bio"];
        else
            return false;
    }
    
    function UpdateBioParUsager($user, $bio)
    {
        global $connexion;
        
        $requete = "UPDATE usager SET bio = '" . filtre($bio) . "' WHERE username = '" . filtre($user) . "'";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }

    function filtre($var)
    {
        global $connexion;
        
        $varFiltre = mysqli_real_escape_string($connexion, $var);
        //appliquer d'autres filtres
        //se prémunir contre les attaques de type XSS (cross-site scripting)
        $varFiltre = strip_tags($varFiltre, "<a><b><em>");
        
        return $varFiltre;
    }

?>