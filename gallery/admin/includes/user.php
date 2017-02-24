<?php

class User extends Db_object {
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'picture');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $picture;


    public static function verify_user($username,$password){
        global $database;

        $username = $database->escape_string($username); //cleaning the username and password
        $password = $database->escape_string($password);

        //generating the sql statement to look for the username and password
        $sql = "SELECT * FROM ". self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

        //reusing the function to return the result set
        $the_result_set = self::find_this_query($sql);
        return !empty($the_result_set) ? array_shift($the_result_set) : false;
    }


    protected function properties(){

        $properties = array();
        foreach(self::$db_table_fields as $db_field){
            if (property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    protected function clean_properties(){
        global $database;

        $clean_properties = array();

        foreach($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;

    }









    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . self::$db_table  . "(" . implode(", ", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "') ";

        if($database->query($sql)) {
//                echo "Query successful";
            $this->id = $database->the_insert_id();
            return true;
        }else {
            return false;
        }
    }

    public function update(){
        global $database;

        $properties = $this->clean_properties();

        $property_pairs = array();

        foreach ($properties as $key => $value){
            $property_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . self::$db_table . " SET ";
        $sql .= implode(", ", $property_pairs);
        $sql .= " WHERE id="   . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? TRUE : false;
    }



    public function delete(){
        global $database;

        $sql = "DELETE FROM " . self::$db_table . " WHERE id='" . $database->escape_string($this->id) ."'";
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1)? true : false;

//            $message =  "The User: " . $this->username . " was deleted";
//            return $message;
    }
}// End of class User

















?>