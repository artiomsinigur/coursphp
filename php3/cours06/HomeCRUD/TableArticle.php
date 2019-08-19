<?php
    namespace App;
    
    require 'Database.php';
    class TableArticle extends Database {
        
        public function getTableName() {
            return 'articles';
        }

        public function getPrimaryKey() {
            return 'id';
        }

        public function addPost($titre, $contenu, $date) {
            try {
                $sql = "INSERT INTO articles (`titre`, `contenu`, `datePublie`) 
                        VALUES (:titre, :contenu, :datePublie)";
                $result = $this->getPDO()->prepare($sql);
                $result->bindParam(':titre', $titre);
                $result->bindParam(':contenu', $contenu);
                $result->bindParam(':datePublie', $datePublie);
                $result->execute();
                return $result->rowCount();
            } catch (PDOException $e) {
                trigger_error('La requête SQL a donné une erreur:', $e->getMessage());
            }
        }
    }
?>