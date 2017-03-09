<?php

class User extends Db_object {
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image', 'signup_date'. 'modified_date', 'last_login');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $signup_date = "NOW()";
    public $modified_date;
    public $last_login;
    public $upload_directory = "images";
    public $image_placeholder = "https://unsplash.it/200/200/?random";

    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK           => 'There is no error.',
        UPLOAD_ERR_INI_SIZE     => 'Bigger than the upload_max_filesize directive.',
        UPLOAD_ERR_FORM_SIZE    => 'The uploaded file excees the MAX_FILE_SIZE.',
        UPLOAD_ERR_PARTIAL      => 'The uploaded file was only partially uploaded.',
        UPLOAD_ERR_NO_FILE      => 'There is no file.',
        UPLOAD_ERR_NO_TMP_DIR   => 'Missing a temporary folder.',
        UPLOAD_ERR_CANT_WRITE   => 'Failed to write file to disk.',
        UPLOAD_ERR_EXTENSION    => 'A PHP extension stopped the file upload.',
    );

    public function image_path_and_placeholder(){
        return empty($this->user_image)? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
//        return empty($this->user_image)? $this->image_placeholder :  $this->user_image;
    }


    public static function verify_user($username,$password){
        global $database;

        $username = $database->escape_string($username); //cleaning the username and password
        $password = $database->escape_string($password);

        //generating the sql statement to look for the username and password
        $sql = "SELECT * FROM ". self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

        //reusing the function to return the result set
        $the_result_set = self::find_by_query($sql);
        return !empty($the_result_set) ? array_shift($the_result_set) : false;
    }

    //this is passing the $_FILE['uploaded_file'] as an argument
    public function set_file($file){
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        }elseif($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['errors']];
            return false;
        }else {
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->filetype = $file['type'];
            $this->size =  $file['size'];
        }
    }

    public function save_user_and_image(){

        if ($this->id){
            $this->update();
        }else {

            if (!empty($this->errors)){
                return false;
            }

            if (empty($this->user_image) || empty($this->tmp_path)){
                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

            if (file_exists($target_path)){
                $this->errors[] = "The file {$this->user_image} already exists";
                return false;
            }

            //here is where the file is moved to the folder and created on database with the create() method
            if (move_uploaded_file($this->tmp_path, $target_path)){
                if ($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }else {
                $this->errors[] = "The folder probably has a permissions problem...";
                return false;
            }
        }
    }













}// End of class User
?>