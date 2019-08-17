<h1>Page home</h1>
<p><a href="index.php?page=article">Aller à la page article</a></p>

<?php
    $db = new App\Database('blog_test');
    $data = $db->setQuery('SELECT * FROM articles');
    $data = $db->setQuery('SELECT * FROM articles');
    $data = $db->setQuery('SELECT * FROM articles');
    $data = $db->setQuery('SELECT * FROM articles');
    var_dump($data);

    /**
     * Ajouter une article
     * PDO::exec — Exécute une requête SQL et retourne le nombre de lignes affectées
     */
    // $count = $pdo->exec('INSERT INTO articles SET 
    //         titre="Mon titre", 
    //         datePublie="' . date('Y-m-d H:i:s') . '"');
    // var_dump($count); // 1

?>