<?php
    class Database {

        var $collections = array(
            'users' => __DIR__ .'/../storage/accounts_json.json' ,
            'movies' => __DIR__ .'/../storage/movies_info.json' ,
            'reviews' => __DIR__ .'/../storage/reviews_comments.json',
            'sessions' => __DIR__ .'/../storage/sessions.json'
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

        public function insert($collecctionName, $value) {
            $array = $this->read_data($collecctionName);
            array_push($array,$value);
            $this->write_data($array);
        }

        private function read_data($collectionName) {
            $filePath = $this->collections[$collectionName];
            $json_data = file_get_contents($filePath);
            $array = json_decode($json_data,true);
            return $array;
        }
        
        private function write_data($collectionName, $data) {
            $filePath = $this->collections[$collectionName];
            $json = json_encode($data);
            file_put_contents($filePath, $json);
        }

        /**
         * Map reduce function for calculations.
         * $mapFunc = function($object,$emitter)
         * $reduceFunc = function($values)
         *
         */
        public function mapReduce($collection, $mapFunc, $reduceFunc, $filter = null) {
            $result_set = array();

            $array = $this->read_data($collection);

            // define emitter object. will be passed to the map function.
            $emitter = function($key, $value) use (&$result_set){
                // get exiting values
                $current = $result_set[$key];

                if ($current == null) {
                    $current = array($value);
                    
                }else {
                    array_push($current,$value);
                }
                $result_set[$key] = $current;

            };

            // filter and map
            foreach($array as $object) {
                $include = false;

                // filter first
                if ($filter != NULL) {
                    if ($filter($object)) {
                        $include = true;
                    }
                }else {
                    $include = true;
                }
                if ($include) {
                    // apply map
                    $mapFunc($object,$emitter);
                }
            }
            // reduce

            $final_result = array();

            foreach ($result_set as $key => $value) {
                $res = $reduceFunc($value);
                $final_result[$key] = $res;
            }

            return $final_result;
        }
    }
?>