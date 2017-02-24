<?php

    class Db_object{
        protected static $db_table = "users";

        public static function find_all(){
            return self::find_this_query("SELECT * FROM " . self::$db_table . " ");
        }

        public static function find_by_id($id){
            global $database;
            $the_result_set = self::find_this_query("SELECT * FROM" . self::$db_table . "WHERE id=$id LIMIT 1");
            return !empty($the_result_set) ? array_shift($the_result_set) : false;
        }

        public static function find_this_query($sql){
            global $database;
            $result_set = $database->query($sql);
            $the_object_array = array();

            while ($row = mysqli_fetch_array($result_set)) {
                $the_object_array[] = self::instantiation($row);
            }

            return $the_object_array;
        }

        public static function instantiation($the_record){//short way instantiation
            $the_object = new self;
            foreach ($the_record as $the_attribute => $value) {
                if ($the_object->has_the_attribute($the_attribute)) {
                    $the_object->$the_attribute = $value;
                }
            }
            return $the_object;
        }

        private function has_the_attribute($the_attribute){
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }
    }//End of class

    $db_object = new Db_object();
?>