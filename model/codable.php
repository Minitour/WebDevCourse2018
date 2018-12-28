<?php
    class Codable {
        /**
         * Create object from json string.
         */
        function __construct($json_string){
        
            $jsonObj = json_decode($json_string,false);
            // foreach($jsonArray as $key=>$value) {
            //     $this->$key = $value;
            // }
            foreach ($this->class_vars() as $key) {
                $this->$key = $jsonObj->$key;
            }
        }
        /**
         * get value by key
         */
        public function get($key) {
            return $this->$key;
        }

        /**
         * update value
         */
        public function put($key,$value) {
            $this->$key = $value;
        }

        private function class_vars() {
            $reflect = new ReflectionClass($this);
            $vars = $reflect->getProperties();
            $array = [];
            foreach ($vars as $field) {
                array_push($array,$field->getName());
            }
            return $array;
        }
    }
?>