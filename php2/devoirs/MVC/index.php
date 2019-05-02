<?php

    function vd(){
        foreach (func_get_args() as $arg) {
            var_dump($arg);
        }
        die();
    }
    
    /*
    *
        index.php est le CONTRÔLEUR de notre application "MVC-lite". TOUTES les
        requêtes vers notre application vont passer par ici. Le coeur du contrôleur est sa structure décisionnelle qui traite un paramètre que l'on nommera ACTION. C'est la valeur de ce paramètre qui déterminera les actions que posera le contrôleur.
    
    */
    //1. Recevoir le paramètre action
    $action = $_REQUEST["action"] ?? "Accueil";


    //inclure le modèle
    require_once("fonctionsDB.php");
    //structure décisionnelle
    switch($action)
    {
        case "Accueil":
            require_once("vues/Accueil.html");
            break;
        case "ListeEquipes":
            afficheListeEquipes();
            require_once("vues/ListeEquipes.php");
            break;
        case "ListeJoueurs":
            //afficher la liste des joueurs
            //1. aller chercher les joueurs dans le modèle
            $donnees = GetAllJoueurs();
            //2. inclure la vue de la liste des joueurs
            require_once("vues/ListeJoueurs.php");
            break;
        case "ListeJoueursParEquipe":
            //afficher la liste des joueurs de l'équipe sur laquelle on a cliqué
            //vérifier la présence du paramètre GET idE
            if(!isset($_GET["idE"]) || !is_numeric($_GET["idE"]))
            {
                //afficher la liste des équipes
                afficheListeEquipes();
            }
            else
            {
                //1. le paramètre idE existe -- obtenir les joueurs de l'équipe sélectionnée
                $donneesJoueurs = GetJoueursParEquipe($_GET["idE"]);
                //obtenir les données de l'équipe
                $donneesEquipe = GetEquipeParID($_GET["idE"]);
                //2. inclure la vue de la liste des joueurs par équipe
                require_once("vues/ListeJoueursParEquipe.php");
            }
            break;
        case "FormAjoutEquipe":
            //aller au formulaire d'ajout
            require_once("vues/FormulaireAjoutEquipe.php");
            break;
        case "AjoutEquipe":
            //tester les présences des paramètres attendus
            if(isset($_POST["nom"]) && isset($_POST["ville"]))
            {
                //on arrive du formulaire
                //valider, puis insérer
                if(trim($_POST["nom"]) != "" && trim($_POST["ville"]) != "")
                {
                    InsereEquipe($_POST["nom"], $_POST["ville"]);
                    //après l'ajout, afficher la liste des équipes
                    afficheListeEquipes();
                }
                else
                {
                    $erreurs = "Veuillez remplir les deux champs correctement.";
                    require_once("vues/FormulaireAjoutEquipe.php");
                }
            }
            else
            {
                header("Location: index.php");
            }
            break;
        case "supprimerEquipe":
            if (isset($_GET["idEquipe"])) {
                $donnees = SupprimerEquipe($_GET["idEquipe"]);
                header("Location:index.php?action=ListeEquipes");
            } else {
                header("Location: vues/ListeEquipes.php");
            }
            break;
        case "supprimerJoueur":
            if (isset($_GET["idJoueur"])) {
                $donnees = SupprimeJoueur($_GET["idJoueur"]);
                header("Location:index.php?action=ListeJoueurs");
            } else {
                header("Location: vues/ListeJoueurs.php");
            }
            break;
        case "FormAjoutJoueur":
            $donnees = GetAllEquipes();
            require_once("vues/FormAjoutJoueur.php");
            break;
        case "AjoutJoueur":
            $required_fields = ['nom', 'prenom'];
            $erreurs = "";

            foreach($required_fields as $field) {
                if (empty(trim($_POST[$field]))) {
                    $erreurs = "Veuillez remplir les deux champs correctement.";
                    $donnees = GetAllEquipes();
                    require_once("vues/FormAjoutJoueur.php");
                    // header("Location: index.php?action=FormAjoutJoueur");
                }
            }
            if ($erreurs == "") {
                InsereJoueur($_POST["nom"], $_POST["prenom"], $_POST["idEquipe"]);
                $donnees = GetAllJoueurs();
                // require_once("vues/ListeJoueurs.php");
                header("Location: index.php?action=ListeJoueurs");
            }
            break;
        case "sortByColumn":
            // Récuperer les données déjà ordonnées
            if (isset($_GET["sort"])) {
                // Supprimer les apostrophes
                $strTrim = str_replace("'", "", $_GET["sort"]);
                $donnees = sortByOrderDesc($strTrim);
                require_once("vues/ListeEquipes.php");
            } else {
                header("Location: index.php?action=ListeEquipes");
            }
            break;
        case "sortBy":
            $donnees = GetAllEquipes();
            //
            // Méthode 2 avec array_multisort() ==================//
            //
            $sort = $_POST["sort"]; 
            if (isset($sort)) {
                if ($sort == 'nbVictoire') {
                    array_multisort(array_column($donnees, $sort), SORT_DESC, $donnees);
                    require_once("vues/ListeEquipes.php");
                } else {
                    array_multisort(array_column($donnees, $sort), SORT_ASC, $donnees);
                    require_once("vues/ListeEquipes.php");
                }
            } else {
                header("Location: index.php?action=ListeEquipes");
            }

            //
            // Méthode 1 avec usort() ==================//
            //
            // 1. Trier par une colonne définis 
                // En ordre décroisant
            function orderAsc($a, $b) {
                // return strcmp($a['ville'], $b['ville']);
                return $a['nbVictoire'] < $b['nbVictoire'];
            }
                // En ordre croissant
            function orderDesc($a, $b) {
                return $a['nbVictoire'] > $b['nbVictoire'];
            }
            usort($donnees, 'orderAsc');
            // var_dump($donnees);
            break;


            // function sortByArr($field, $array, $direction = 'asc') {
            //     usort($array, create_function('$a, $b', '
            //         $a = $a["' . $field . '"];
            //         $b = $b["' . $field . '"];

            //         if ($a == $b) return 0;
            //         $direction = strtolower(trim($direction));
            //         return ($a ' . ($direction == 'desc' ? '>' : '<') . ' $b) ? -1 : 1;
            //     '));
            //     return true;
            // }
        case "FormModifierJoueur":
            $donneesJoueur = GetAllJoueurs();
            $donneesEquipe = GetAllEquipes();
            require_once("vues/FormModifierJoueur.php");
            break;
        case "SauvegarderJoueur":
            $required_fields = ['nom', 'prenom', 'idEquipe'];
            $erreurs = "";
            
            // Validation des champs
            foreach($required_fields as $field) {
                if (empty(trim($_POST[$field]))) {
                    $erreurs = "Veuillez remplir les deux champs correctement.";
                    $donneesEquipe = GetAllEquipes();
                    require_once("vues/FormModifierJoueur.php");
                }
            }

            // Modification de joueur
            if ($erreurs == "") {
                $donneesJoueur = updatePlayer($_POST["nom"], $_POST["prenom"], $_POST["idEquipe"], $_POST["idJoueur"]);
                $donneesJoueur = GetAllJoueurs();
                header("Location: index.php?action=ListeJoueurs");
            }
            break;
    }
        var_dump($_POST, $_GET);
        
    function afficheListeEquipes()
    {
        //afficher la liste des équipes
        //1. aller chercher les équipes dans le modèle
        $donnees = GetAllEquipes();
        //2. inclure la vue de la liste des équipes
        require_once("vues/ListeEquipes.php");
    }
?>