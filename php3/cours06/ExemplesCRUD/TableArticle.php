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
    }

?>