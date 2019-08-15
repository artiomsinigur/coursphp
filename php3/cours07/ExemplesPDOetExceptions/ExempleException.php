<?php
    //version avec des ifs
    /*
    function inverse($x)
    {   
        if($x != 0)
            return 1 / $x;
        else
        {            
            return false;
        }
    }

    $resultatInverse = inverse(10);

    if($resultatInverse != false)
        echo "L'inverse de 10 est : " . $resultatInverse;

    $resultatInverse = inverse(0); 
    if($resultatInverse != false)
        echo "L'inverse de 0 est : " . $resultatInverse . "<br>";

    $resultatInverse = inverse("bonjour"); 
    if($resultatInverse != false)
        echo "L'inverse de bonjour est : " . $resultatInverse . "<br>";
    */
    
    function inverse($x)
    {   
        
        if(!is_numeric($x))
            throw new Exception("Le paramètre doit être numérique.", 334);
        
        if($x == 0)
            throw new Exception("Le paramètre doit être différent de zéro.", 333);
        
        return 1 / $x;
    }

    try
    {
        //mettre les instructions à "essayer"
        echo "L'inverse de 10 est : " . inverse(10) . "<br>";
        echo "L'inverse de 0 est : " . inverse(0). "<br>";
        echo "L'inverse de 'bonjour' est : " . inverse("bonjour"). "<br>";
    }
    catch(Exception $e)
    {
        echo "Message d'erreur : " . $e->getMessage() . "<br>";
        echo "Ligne de l'erreur : " . $e->getLine() . "<br>";
        echo "Code de l'erreur : " . $e->getCode() . "<br>";
        echo "Fichier de l'erreur : " . $e->getFile() . "<br>";
        echo "Trace de l'erreur : " . $e->getTraceAsString() . "<br>";
    }

    echo "Fin de l'exécution.";
    
?>