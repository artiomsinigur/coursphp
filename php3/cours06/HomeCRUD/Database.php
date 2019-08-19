<?php
    namespace App;
    use \PDO;

    abstract class Database {
        private $db_dsn = 'mysql:dbname=blog_test;host:localhost';
        private $db_user = 'root';
        private $db_pass = '';
        private $pdo;
        
        abstract function getTableName();
        abstract function getPrimaryKey();

        public function __construct() {
            // Dans le constructeur, on crée la connexion à la base de données qui sera utilisée par toutes les méthodes de l'objet
            try {
                $pdo = new PDO($this->db_dsn, $this->db_user, $this->db_pass);
            } catch (PDOExeption $e) {
                throw new Excepsion('Connexion échoué...' . $e->getMessage());
            }

            // Forcer d'afficher le message d'erreur
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Storer la rêquete PDO dans la variable actuelle ($this->pdo)
            $this->pdo = $pdo;
        }

        // Initialiser la BD
        public function getPDO() {
            return $this->pdo;
        }
  

        /**
         * Obtenir toutes les éléments dans une requête
         */
        public function getAll() {
            try {
                // Connecter à la BD et faire une requête
                $sql = "SELECT * FROM " . $this->getTableName();
                $result = $this->getPDO()->query($sql);
                return $result->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                trigger_error('La requête SQL a donné une erreur:' . $e->getMessage());
            }
        }


        /**
         * Obtenir l'élément par id 
         */
        public function getById($id) {
            try {
                $sql = "SELECT * FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() . "= :id";
                $result = $this->getPDO()->prepare($sql);
                $result->bindParam(':id', $id);
                $result->execute();
    
                return $result->fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                trigger_error('La requête SQL a donné une erreur:', $e->getMessage());
            }
        }
        

        /**
         * Supprimer l'élément indiquer dans la requête
         */
        public function delete($id) {
            try {
                $sql = "DELETE FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() . "= :id";
                $result = $this->getPDO()->prepare($sql);
                $result->bindParam(':id', $id);
                $result->execute();
                return $result->rowCount();
            } catch (PDOException $e) {
                trigger_error('La requête SQL a donné une erreur:', $e->getMessage());
            }
        }


        /**
         * Ajout d'un élément
         */
        // public function addPost($titre, $contenu, $date) {
        //     try {
        //         $sql = "INSERT INTO articles (`titre`, `contenu`, `datePublie`) 
        //                 VALUES (:titre, :contenu, :datePublie)";
        //         $result = $this->getPDO()->prepare($sql);
        //         $result->bindParam(':titre', $titre);
        //         $result->bindParam(':contenu', $contenu);
        //         $result->bindParam(':datePublie', $datePublie);
        //         $result->execute();
        //         return $result->rowCount();
        //     } catch (PDOException $e) {
        //         trigger_error('La requête SQL a donné une erreur:', $e->getMessage());
        //     }
        // }
    }
?>