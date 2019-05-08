<?php
    function connectDB()
    {
        $c = mysqli_connect("localhost", "root", "", "usager");
        
        if(!$c)
            trigger_error("Erreur de connexion... " . mysqli_connect_error());
        
        mysqli_query($c, "SET NAMES 'utf8'");
        return $c;
    }

    $connexion = connectDB();

    function Authentification($user, $pass)
    {
        global $connexion;
        
        $requete = "SELECT * FROM usager WHERE username = $user AND password = $pass";
        // Injection. À teste in SQL
        // SELECT * FROM usager WHERE username = 'test' AND password = 'sdfdsfs' OR '1'='1'";
        $resultat = mysqli_query($connexion, $requete);
        
        if ($rangee = mysqli_fetch_assoc($resultat)) {
            return true;
        } else {
            return false;
        }
    }
?>