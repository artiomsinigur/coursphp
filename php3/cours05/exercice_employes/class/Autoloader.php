<?php
    namespace Artiom;

    class Autoloader {
        static function register() {
            // Ecrire dans le tableau le nom de la class et celui de la founction
            // Récuperer dynamiquement le nom de la class avec "__CLASS__"
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        static function autoload($class) {
            // Le __NAMESPACE__ récuperer le nom de la namespace
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            var_dump($class);
            // Récuperer dynamiquement le nom de dossier avec __DIR__
            require __DIR__ . "/" . $class . ".php";
        }
    }
?>