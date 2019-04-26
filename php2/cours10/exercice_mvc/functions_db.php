<?php
    // Fonction connexion de base de données
    function connectBd() {
        $connection = mysqli_connect("localhost", "root", "", "liguejointures");

        if (!$connection) {
            $error = trigger_error("Erreur de connexion: " . mysqli_connect_error());
        }
        return $connection;
    }
    $connect = connectBd();


    function getAllEquipes() {
        global $connect;

        $query = "SELECT nom, ville FROM `equipe`";
        $result = mysqli_query($connect, $query);

        return $result;
    }

?>