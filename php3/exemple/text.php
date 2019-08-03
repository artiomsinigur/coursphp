<?php
    class text {
        public static function publicFormateChiffre($chiffre) {
            return self::FormateChiffre($chiffre);
        }
        
        private static function formateChiffre($chiffre) {
            if ($chiffre < 10) {
                return '0' . $chiffre;
            } else {
                return $chiffre;
            }
        }
    }

?>