<?php
    namespace App;
    use \PDO;

    class Database{
        private $db_name;
        private $db_host;
        private $db_user;
        private $db_pass;
        private $pdo;


        public function __construct($db_name, $db_host = 'localhost', $db_user = 'root', $db_pass = '') {
            $this->db_name = $db_name;
            $this->db_host = $db_host;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;
        }

        // Lorsque on veut le PDO on appelera ce getter getPDO()
        private function getPDO() {
            // Le problem c'est que si on fait 10 requêtes(appeller getPDO()), 
            // ça initiera 10 conextion à la BD
            // Pour rémedier ça on fait comme suit
            if ($this->pdo === null) {
                try {
                    $pdo = new PDO('mysql:dbname=blog_test;host:localhost', 'root', '');
                } catch (PDOException $e) {
                    throw new Exception('Erreur de connection à la BD...' . $e->getMessage());
                    // trigger_error('Erreur de connection à la BD...' . $e->getMessage());
                }
                //forcer PDO à générer/afficher des exceptions pour les erreurs de requête SQL
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
                // var_dump('PDO initialise');
            }
            return $this->pdo;
            // var_dump('getPDO colled');
        }

        
        /**
        * Récuperer tous les articles
        * PDO::query - Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet
        * fetchAll() - Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
        * Dans la paramètre de fetchAll on peut utiliser fetch_style: 
        *      fetchAll(PDO::FETCH_BOTH(défaut))
        *      fetchAll(PDO::FETCH_ASSOC)
        *      fetchAll(PDO::FETCH_OBJ)
        */
        public function setQuery($statement) {
            // Lorsque on veut le constructeur on doit appeler getPDO()
            // $statement en place de la requête query('SELECT * FROM articles')
            $result = $this->getPDO()->query($statement);
            
            // $data = $result->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($data[0]['titre']);
            $data = $result->fetchAll(PDO::FETCH_OBJ);
            // var_dump($data[0]->titre);
            return $data;
        }
    }
?>