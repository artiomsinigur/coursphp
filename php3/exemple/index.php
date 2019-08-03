<?php
    require_once('personnage.php');
    require_once('form.php');
    require_once('text.php');

    // Exemplae avec les personnages
    $merlin = new personnage('Merlin');    
    $harry = new personnage('Harry');
    $merlin->attaquer($harry);
    $harry->setNom('Frodo');


    // Exemple avec la forme
    $form = new form([
        'username' => 'Harry',
        'password' => '1234'
        ]);
    echo $form->input('username');
    echo $form->input('password');
    echo $form->submit();

    $form = new form();
    echo $form->input('username');
    echo $form->input('password');
    echo $form->submit();

    var_dump($form->getData());


    // var_dump(text::formateChiffre(3));
    var_dump(text::publicFormateChiffre(3));


?>