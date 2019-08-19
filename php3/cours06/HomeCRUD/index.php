<?php
    namespace App;

    require 'TableArticle.php';

    // $result = new Database('blog_test');
    // $data = $result->setQuery('SELECT * FROM articles');
    // var_dump($data->fetchAll());

    $bd = new TableArticle();
    $data = $bd->getAll();

    foreach ($data as $key => $val) {
        var_dump($key[$val]);
    }

    $id = $bd->getById(1);

    $deletePost = $bd->delete(3);

    // $addPost = $bd->addPost('Titre ajoute', 'Ceci est un contenu', '15-02-2019');
    var_dump($data);
    
?>