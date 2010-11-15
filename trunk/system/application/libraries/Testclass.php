<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Testclass {
        public $name;
        private $secret;
        
        function __construct(){
            $this->name = "Hiep Pham";
            $this->hideInfo();  // set method
        }
        
        private function hideInfo(){
            $this->secret = "Private Info";
        }
        
        function getName(){
            echo "<br />getName() was triggered<br />";
        }
        
        public function getSecret(){
            echo $this->secret;
        }
        public static function getInstance(){
            return $this;
        }
    }
?>