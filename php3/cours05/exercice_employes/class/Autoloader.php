<?php
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
?>