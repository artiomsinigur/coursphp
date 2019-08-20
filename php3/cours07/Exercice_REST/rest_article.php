<?php
    //ne pas afficher les erreurs -- commenter la ligne si on veut afficher les erreurs
    error_reporting(0);

    //entêtes de réponse requise
    header("Access-Control-Allow-Origin: *");
    
    //spécifier que la réponse est en JSON
    header("Content-Type: application/json; charset=UTF-8");

    //connexion à la BD
    require_once("./CRUD/TableArticle.php");

    $dbArticle = new TableArticle();

    //structure de contrôle reliée à la méthode de la requête

    switch($_SERVER["REQUEST_METHOD"])
    {
        case "GET":
            if(isset($_GET["id"]))
            {
                //une seule ressource
                $article = $dbArticle->obtenir_par_id($_GET["id"]);
                if($article)
                {
                    $chaineJson = json_encode($article);
                    echo $chaineJson;
                    http_response_code(200);
                }
                else
                {
                    http_response_code(404);
                }
            }
            else
            {
                //on va chercher tous les articles
                $articles = $dbArticle->obtenir_tous();
                $tableau = $articles->fetchAll(PDO::FETCH_ASSOC);

                //on transforme le tableau associatif en json
                $chaineJson = json_encode($tableau);
                //on affiche le json
                echo $chaineJson;
                //code de retour 200 OK tel que spécifié dans les standards
                http_response_code(200);
            }
            break;
        case "POST":
            //obtenir le corps de la requête
            $data = file_get_contents("php://input");
            $article = json_decode($data);
            //si l'article envoyé a tous les bons attributs
            if(isset($article->titre, $article->texte, $article->idAuteur))
            {
                //on crée l'article
                $ajout = $dbArticle->ajouter($article->titre, $article->texte, $article->idAuteur);
                
                if($ajout)
                {
                    http_response_code(201);
                }
                else
                {
                    //l'insertion n'a pas fonctionné - une clé étrangère n'a pas été respectée ou une clé primaire est un doublon
                    http_response_code(409);
                }
            }
            else
            {
                //le JSON envoyé en paramètres n'est pas du bon format (n'a pas les attributs nécessaires à l'insertion)
                http_response_code(400);
            }
            break;
        case "PUT":
            
            break;
        case "DELETE":
    }
?>