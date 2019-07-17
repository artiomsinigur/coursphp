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
        
        echo "Accès à la méthode de classe... Le nombre de comptes créés est : ";
        //déconseillé d'accéder à une méthode de classe (statique) via une instance
        //echo $compte2->getCompteur();
        //la bonne façon : à partir de la classe et de l'opérateur de résolution de portée
        echo CompteBancaire::getCompteur() . "<br>";
        
        
        $compte3 = new CompteEpargne(201, "laurence");
        $compte3->depose(2000);
        $compte3->calculeInteret(10 / 100);
        echo "Après intérêt de 10 pourcent, le solde sera : " . $compte3->getSolde() . "<br>";
        echo "Il y a un pourcentage de " . CompteEpargne::getPourcentageComptesEpargnes() . " de comptes épargnes sur le nombre total de comptes.";
        
        ?>
    </body>
</html>    