<h1>Page home</h1>
<p><a href="index.php?page=article">Aller à la page article</a></p>

<?php
    try {
        $pdo = new PDO('mysql:dbname=blog_test;host:localhost', 'root', '');
    } catch (PDOException $e) {
        throw new Exception('Erreur de connection à la BD...' . $e->getMessage());
        // trigger_error('Erreur de connection à la BD...' . $e->getMessage());
    }

    //forcer PDO à générer/afficher des exceptions pour les erreurs de requête SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * Ajouter une article
     * PDO::exec — Exécute une requête SQL et retourne le nombre de lignes affectées
     */
    // $count = $pdo->exec('INSERT INTO articles SET 
    //         titre="Mon titre", 
    //         datePublie="' . date('Y-m-d H:i:s') . '"');
    // var_dump($count); // 1


    /**
     * Récuperer tous les articles
     * PDO::query - Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet
     * fetchAll() - Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
     * Dans la paramètre de fetchAll on peut utiliser fetch_style: 
     *      fetchAll(PDO::FETCH_BOTH(défaut))
     *      fetchAll(PDO::FETCH_ASSOC)
     *      fetchAll(PDO::FETCH_OBJ)
     */
    $result = $pdo->query('SELECT * FROM articles');
    // $data = $result->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($data[0]['titre']);
    $data = $result->fetchAll(PDO::FETCH_OBJ);
    var_dump($data[0]->titre);

?>