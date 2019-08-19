<?php
    require 'Database.php';

    abstract class TableBase {
        private $db;

        abstract function getTableName();
        // abstract function getPrimaryKey();

        public function __construct() {
            // Connextion à la BD
            $db = new Database('blog_test');
        }


        /**
         * Obtenir toutes les éléments dans une requête
         */
        public function getAll() {
            try {
                // $sql = "SEECT * FROM " . $this->getTableName();
                // Connecter à la BD et faire une requête
                $result = $this->db->setQuery("SEECT * FROM " . $this->getTableName());
                // var_dump($result);
                
                // $data = $result->setQuery('SELECT * FROM articles');
            } catch (PDOException $e) {
                trigger_error('La requête SQL a donné une erreur:' . $e->getMessage());
            }
        }


        /**
         * Obtenir l'id de dernier élément ajouté 
         */
        public function getLastId() {}
        

        /**
         * Supprimer l'élément indiquer dans la requête
         */
        public function delete() {}
    }
?>