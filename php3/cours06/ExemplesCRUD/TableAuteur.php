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
    }
?>