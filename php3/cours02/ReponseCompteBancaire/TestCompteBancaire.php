<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
    <?php
        require_once("CompteBancaire.php");
        $compte1 = new CompteBancaire(115, "gharvey");
        $compte1->afficherCompte();
        
        $compte2 = new CompteBancaire(116, "mcharp");
        $compte2->depose(500);
        $compte2->afficherCompte();
        
        
        //transfert d'un compte à l'autre
        $compte2->transfertVers($compte1, 500);
        $compte2->afficherCompte();
        $compte1->afficherCompte();
        ?>
    </body>
</html>    