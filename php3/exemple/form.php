<?php
    class form {
        private $data = [];
        public $surround = 'div';

        public function __construct($d = []) {
            $this->data = $d;
        }
        
        // GETTERS
        public function getData() {
            return $this->data;
        }

        private function generateTag($html) {
            return "<{$this->surround}> $html </{$this->surround}>";
        }

        private function getValue($index) {
            return isset($this->data[$index]) ? $this->data[$index] : null;
        }

        public function input($name) {
            return $this->generateTag('<input type="text" name="' . $name . '" value="' . $this->getValue($name) . '">');
        }

        public function submit() {
            return $this->generateTag('<button type="submit" value="envoyer">Envoyer</button>');
        }

    }




?>