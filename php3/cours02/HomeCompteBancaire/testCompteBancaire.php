<?php
    require_once('CompteBancaire.php');
    require_once('CompteEpargne.php');
    
    $compte1 = new CompteBancaire('Artiom', 250);
    $compte2 = new CompteBancaire('Ben', 2400);
    $compte3 = new CompteBancaire('Leo', 650);
    
    $compte1->retirer(200);
    $compte1->afficherCompte();
    $compte1->deposer(1000);
    
    $compte2->transfererVers(500, $compte1);
    $compte1->afficherCompte();
    $compte2->afficherCompte();

    // CompteEpargne
    $compteEpargne = new CompteEpargne('Endy', 1000);
    $compteEpargne->calculerTaux(13);
    echo 'Nouveau solde: ' . $compteEpargne->getSolde() . '<br>';
    echo 'Nombre de comptes épargnes: ' . $compteEpargne::getCompteEpargnes() . '<br>';
    echo 'Pourcentage des comptes épargnes: ' . $compteEpargne::calculerComptesEpargnes();
?>