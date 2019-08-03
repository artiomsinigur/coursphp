<?php

    abstract class TableBase
    {
        //connexion à la base de données
        protected $db;
        
        //méthodes abstraites
        abstract function getTableName();
        abstract function getPrimaryKey();
        
        public function __construct()
        {
            //dans le constructeur, on crée la connexion à la base de données qui sera utilisée par toutes les méthodes de l'objet
            try
            {
                //pour l'encodage utf8
                $options = array(
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                );
                
                //connexion à la base de données
                $this->db = new PDO("mysql:host=localhost;dbname=blog", "root", "", $options);
                
                //forcer PDO à générer des exceptions pour les requêtes SQL
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
                trigger_error("Erreur de la connexion : " . $e->getMessage());
            }
            
        }
        
        public function obtenir_tous()
        {
            try
            {
                $sql = "SELECT * FROM " . $this->getTableName();
                $resultats = $this->db->query($sql);
                return $resultats;
            }
            catch(PDOException $e)
            {
                trigger_error("La requête SQL a donné une erreur : " . $e->getMessage());    
            }
        }
        
        public function obtenir_par_id($id)
        {
            try
            {
                $sql = "SELECT * FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() . " = :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                
                //retourner la seule rangée qui correspond (puisqu'on filtre par la clé primaire)
                return $stmt->fetch();
            }
            catch(PDOException $e)
            {
                trigger_error("La requête SQL a donné une erreur : " . $e->getMessage());    
            }
            
        }
        
        public function supprimer($id)
        {
            try
            {
                $sql = "DELETE FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() . " = :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":id", $id);
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