<?php

    /*
    function inverse($x)
    {
        if($x != 0)
            return 1 / $x;
        else
            return false;
    }

    $resultatInverse = inverse(10);

    if($resultatInverse)
    {
        echo "L'inverse de 10 est : " . $resultatInverse ."<br>";
        
        $resultatInverse = inverse(0);
        
        if($resultatInverse)
        {
            echo "L'inverse de 0 est : " . $resultatInverse ."<br>";

            $resultatInverse = inverse("BONJOUR");
            if($resultatInverse)
                echo "L'inverse de Bonjour est : " . $resultatInverse ."<br>";
            else
                echo "Erreur c'est une chaine...";
        }
        else
            echo "Erreur division par zéro...";
    }
    */

    function inverse($x)
    {
        if(!is_numeric($x))
            throw new Exception("Le paramètre doit être numérique.", 101);
        
        if($x == 0)
            throw new Exception("Le paramètre doit être différent de zéro.", 102);
        
        return 1 / $x;
    }

    try
    {
        $resultatInverse = inverse(10);
        echo "L'inverse de 10 est : " . $resultatInverse ."<br>";

        $resultatInverse = inverse("Bonjour");
        echo "L'inverse de Bonjour est : " . $resultatInverse ."<br>";
    }
    catch(Exception $e)
    {
        echo "Message de l'erreur : " . $e->getMessage()."<br>";
        echo "Code de l'erreur : " . $e->getCode()."<br>";
        echo "Ligne de l'erreur : " . $e->getLine()."<br>";
        echo "Fichier de l'erreur : " . $e->getFile()."<br>";
        echo "Trace de l'erreur : " . $e->getTraceAsString()."<br>";
    }

    echo "Fin de l'exécution.";
?>