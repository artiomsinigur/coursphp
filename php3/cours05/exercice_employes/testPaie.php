<?php
    // require_once('Employe.php');
    // require_once('Telephoniste.php');
    // require_once('Vendeur.php');
    // require_once('Superviseur.php');
    // require_once('Paie.php');
    session_start();

    // Méthod 1 - pas de class
    function __autoload($class_name) {
        require_once "class/" . $class_name . ".php";
    }

    // Méthod 2 avec class
    // Appeler la function autolod de la class Autoloader
    // require_once('class/Autoloader.php');
    // Autoloader::register(); 

    $errors = '';
    if (!isset($_SESSION['paie'])) {
        $_SESSION['paie'] = new Paie();
    }

    // ==========================
    // Ajout salaire Telephoniste
    // ==========================
    $nomTel = $_POST['nomTel'] ?? '';
    $prenomTel = $_POST['prenomTel'] ?? '';
    $salaireHeureTel = $_POST['salaireHeureTel'] ?? '';
    $heuresTel = $_POST['heuresTel'] ?? '';

    if ($nomTel != '' && $prenomTel != '' && $salaireHeureTel != '' && $heuresTel != '') {
        try {
            $newTelephoniste = new Telephoniste($_POST['nomTel'], $_POST['prenomTel'], $_POST['salaireHeureTel'], $_POST['heuresTel']);
            $_SESSION['paie']->addEmploye($newTelephoniste);

            echo "<p class='alert alert-success'>Operation réussi!</p>";
        }
        catch(Exception $e) {
            echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
        }
    } else {
        $errors = "<p class='alert alert-danger'>Les champs sont requis!</p>";
    }


    // ==========================
    // Ajout salaire Vendeur
    // ==========================
    $nomV = $_POST['nomV'] ?? '';
    $prenomV = $_POST['prenomV'] ?? '';
    $salaireHeureV = $_POST['salaireHeureV'] ?? '';
    $heuresV = $_POST['heuresV'] ?? '';
    $tauxCommission = $_POST['tauxCommission'] ?? '';
    $totalVent = $_POST['totalVent'] ?? '';

    if ($nomV != '' && $prenomV != '' && $salaireHeureV != '' && $heuresV != '' && $tauxCommission != '' && $totalVent) {
        try {
            $newVendeur = new Vendeur($_POST['nomV'], $_POST['prenomV'], $_POST['salaireHeureV'], $_POST['heuresV'], $_POST['tauxCommission'], $_POST['totalVent']);
            $_SESSION['paie']->addEmploye($newVendeur);

            echo "<p class='alert alert-success'>Operation réussi!</p>";
        }
        catch(Exception $e) {
            echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
        }
    } else {
        $errors = "<p class='alert alert-danger'>Les champs sont requis!</p>";
    }

    // ==========================
    // Ajout salaire Superviseur
    // ==========================
    $nomS = $_POST['nomS'] ?? '';
    $prenomS = $_POST['prenomS'] ?? '';
    $salaireAnnuel = $_POST['salaireAnnuel'] ?? '';

    if ($nomS != '' && $prenomS != '' && $salaireAnnuel != '') {
        try {
            $newSuperviseur = new Superviseur($_POST['nomS'], $_POST['prenomS'], $_POST['salaireAnnuel']);
            $_SESSION['paie']->addEmploye($newSuperviseur);

            echo "<p class='alert alert-success'>Operation réussi!</p>";
        }
        catch(Exception $e) {
            echo "<p class='alert alert-danger'>" . $e->getMessage() . "</p>";
        }
    } else {
        $errors = "<p class='alert alert-danger'>Les champs sont requis!</p>";
    }

    // Afficher les erruers
    if (isset($errors)) {
        echo $errors;
    }
?>

<!doctype html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Système de calcul de paie</title>
    </head>
    <body class="container">
        <h1 class="my-4 text-center">Formulaire pour le calcul de paie</h1>
        <div class="row">
            <!-- Formulaire téléphoniste -->
            <div class="col-md-4 mb-4">
                <form action="" method="post" class="card pt-3">
                    <fieldset class="card-body">
                        <legend>Téléphonistes</legend>
                        <div class="form-group">
                            <label>Nom:</label>
                            <input type="text" name="nomTel" class="form-control">
                            <label>Prénom:</label>
                            <input type="text" name="prenomTel" class="form-control">
                        </div>
                        <div class="row align-items-end">
                            <div class="form-group col-md-6">
                                <label>Salaire heure:</label>
                                <input type="number" name="salaireHeureTel" class="form-control">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Heures:</label>
                                <input type="number" name="heuresTel" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">Ajouter</button>
                    </fieldset>
                </form>
            </div>

            <!-- Formulaire vendeur -->
            <div class="col-md-4 mb-4">
                <form action="" method="post" class="card pt-3">
                    <fieldset class="card-body">
                        <legend>Vendeurs</legend>
                        <div class="form-group">
                            <label>Nom:</label>
                            <input type="text" name="nomV" class="form-control">
                            <label>Prénom:</label>
                            <input type="text" name="prenomV" class="form-control">
                        </div>
                        <div class="row align-items-end">
                            <div class="form-group col-md-6">
                                <label>Salaire heure:</label>
                                <input type="number" name="salaireHeureV" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Heures:</label>
                                <input type="number" name="heuresV" class="form-control">
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="form-group col-md-6">
                                <label>Taux commission:</label>
                                <input type="number" name="tauxCommission" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Total vente:</label>
                                <input type="number" name="totalVent" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">Ajouter</button>
                    </fieldset>
                </form>
            </div>

            <!-- Formulaire superviseur -->
            <div class="col-md-4 mb-4">
                <form action="" method="post" class="card pt-3">
                    <fieldset class="card-body">
                        <legend>Superviseur</legend>
                        <div class="form-group">
                            <label>Nom:</label>
                            <input type="text" name="nomS" class="form-control">
                            <label>Prénom:</label>
                            <input type="text" name="prenomS" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Salaire annuel:</label>
                            <input type="number" name="salaireAnnuel" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">Ajouter</button>
                    </fieldset>
                </form>
            </div>
        </div>

        <?php
            echo '*Tous les champs du chaque formulaire sont requis!';            
        
            $arrEmployes = $_SESSION['paie'];
            
            // Obtenir le resumé de la facture
            echo '<h2 class="mt-4">Obtenir le résumé de la facturation</h2>';
            echo '<hr>';
            $arrEmployes->getResume();

            // Afficher la description
            echo '<h4>Historique des opérations</h4>';
            foreach ($arrEmployes->getEmployes() as $e) {
                echo $e->getDescription();
                echo '<hr>';
            }
       
            // unset($_SESSION['paie']);
            // var_dump($_SESSION['paie'], $_POST);
        ?>
    </body>
</html>