<?php
    class Database {

        var $collections = array(
            'users' => __DIR__ .'/../storage/accounts_json.json' ,
            'movies' => __DIR__ .'/../storage/movies_info.json' ,
            'reviews' => __DIR__ .'/../storage/reviews_comments.json'
        );

        /**
         * Find single object.
         * $callback is a function which takes in 1 json object as a parameter and must return true or false.
         */
        public function findOne($collectionName, $callback) {
            $array = $this->read_data($collectionName);

            foreach($array as $object) {
                if ($callback != NULL) {
                    if ($callback($object)) {
                        return $object;  
                    }
                }else {
                    return $object;
                }
            }
            return null;
        }

        /**
         * Find multiple object.
         * $callback is a function which takes in 1 json object as a parameter and must return true or false.
         * 
         * $callback should return true to include the object.
         */
        public function find($collectionName, $callback) {
            $result_set = [];

            $array = $this->read_data($collectionName);

            foreach($array as $object) {
                if ($callback != NULL) {
                    if ($callback($object)) {
                        array_push($result_set,$object);
                    }
                }else {
                    array_push($result_set,$object);
                }
            }
            return $result_set;
        }

        private function read_data($collectionName) {
            $filePath = $this->collections[$collectionName];
            $json_data = file_get_contents($filePath);
            $array = json_decode($json_data,true);
            return $array;
        }
    }
?>