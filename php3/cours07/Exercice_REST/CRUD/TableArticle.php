<?php

    require_once("TableBase.php");
    class TableArticle extends TableBase
    {
        public function getTableName()
        {
            return "article";
        }
    
        public function getPrimaryKey()
        {
            return "id";
        }
        
        public function ajouter($titre, $texte, $idAuteur)
        {
            try
            {
                $sql = "INSERT INTO article(titre, texte, idAuteur) VALUES (:ti, :te, :idA)";
                $stmt = $this->db->prepare($sql);
                // Exécute une requête préparée avec des variables et valeurs liées
                $stmt->bindParam(":ti", $titre);
                $stmt->bindParam(":te", $texte);
                $stmt->bindParam(":idA", $idAuteur);
                $stmt->execute();
                
                //retourner le nombre de rangées affectées
                return $stmt->rowCount();
            }
            catch(PDOException $e)
            {
                trigger_error("La requête SQL a donné une erreur : " . $e->getMessage());    
            }
            
        }

        /**
         * Mise à jour d'un article
         */
        public function update($id, $titre, $texte)
        {
            try
            {
                $sql = "UPDATE " . $this->getTableName() . 
                        " SET " . " `titre`=:ti,`texte`=:te " . 
                        " WHERE " . $this->getPrimaryKey() . "= :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":ti", $titre);
                $stmt->bindParam(":te", $texte);
                $stmt->execute();
                
                //retourner le nombre de rangées affectées
                return $stmt->rowCount();
            }
            catch(PDOException $e)
            {
                trigger_error("La requête SQL a donné une erreur : " . $e->getMessage());    
            }
            
        }
    }

?>