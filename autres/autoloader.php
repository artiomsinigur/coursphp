<?php

    // Méthod 1 - pas de class
    function __autoload($class_name) {
        require_once "class/" . $class_name . ".php";
    }

    // Méthod 2 avec class
    // 1. Dans le dossier class/ créer la class Autoloader.php
    class Autoloader {

        static function register() {
            // Ecrire dans le tableau le nom de la class et celui de la founction
            // Récuperer dinamiquement le nom de la class avec "__CLASS__"
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        static function autoload($class_name) {
            require_once "class/" . $class_name . ".php";
        }
    } 

    // 2. Dans le fichier index.php
    // Appeler la function autolod de la class Autoloader
    require_once('class/Autoloader.php');
    Autoloader::register(); 