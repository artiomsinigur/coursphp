<?php
    require_once("TableBase.php");
    class TableAuteur extends TableBase
    {
        public function getTableName()
        {
            return "auteur";
        }
    
        public function getPrimaryKey()
        {
            return "username";
        }

        /**
         * Ajouter un auteur
         */
        public function ajouter($username, $prenom, $nom) {
            try {
                $sql = "INSERT INTO " . $this->getTableName() . " (username, prenom, nom) " . " VALUES " . " (:uN, :p, :n) ";
                $res = $this->db->prepare($sql);
                // Exécute une requête préparée avec un tableau de valeurs
                $res->execute([
                    ':uN'   => $username,
                    ':p'    => $prenom,
                    ':n'    => $nom
                ]);
                return $res->rowCount();
            } catch (Exeption $e) {
                trigger_error('La requête a échoué'. $e->getMessage());
            }
        }
     
     
        /**
         * Ajouter un auteur
         */
        public function update($username, $prenom, $nom) {
            try {
                $sql = "UPDATE " . $this->getTableName() . 
                " SET " . " prenom=:p, nom=:n " .
                " WHERE " . $this->getPrimaryKey() . " =:uN";
                $res = $this->db->prepare($sql);
                // Exécute une requête préparée avec un tableau de valeurs
                $res->execute([
                    ':uN'   => $username,
                    ':p'    => $prenom,
                    ':n'    => $nom
                ]);
                return $res->rowCount();
            } catch (Exeption $e) {
                trigger_error('La requête a échoué'. $e->getMessage());
            }
        }
    }
?>