<?php

    class Photo extends Db_object{
        protected static $db_table = "photos";
        protected static $db_table_fields = array('id', 'title', 'description', 'filename', 'filetype', 'size', 'date_uploaded', 'alternate_text', 'caption', 'date_modified');
        public $id;
        public $title;
        public $description;
        public $filename;
        public $filetype;
        public $size;
        public $date_uploaded;
        public $alternate_text;
        public $caption;
        public $date_modified;

        public $tmp_path;
        public $upload_directory = "images";
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


        //this is passing the $_FILE['uploaded_file'] as an argument
        public function set_file($file){
            if (empty($file) || !$file || !is_array($file)) {
                $this->errors[] = "There was no file uploaded here";
                return false;
            }elseif($file['error'] != 0) {
                $this->errors[] = $this->upload_errors_array[$file['errors']];
                return false;
            }else {
                $this->filename = basename($file['name']);
                $this->tmp_path = $file['tmp_name'];
                $this->filetype = $file['type'];
                $this->size =  $file['size'];
            }
        }

        public function picture_path(){
//            return $this->upload_directory.DS.$this->filename;
            $images_dir = "http://gallery.dev/" . 'admin'. DS . "images/" . $this->filename;

            return $images_dir;
        }


        public function save(){

            if ($this->id){
                $this->update();
            }else {

                if (!empty($this->errors)){
                    return false;
                }

                if (empty($this->filename) || empty($this->tmp_path)){
                    $this->errors[] = "the file was not available";
                    return false;
                }

                $target_path = SITE_ROOT . 'admin' . DS . $this->upload_directory . DS . $this->filename;

                if (file_exists($target_path)){
                    $this->errors[] = "The file {$this->filename} already exists";
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

        public function delete_photo(){

            if ($this->delete()){
                $target_path  = $this->picture_path();
                return unlink($target_path) ? true : false;

            } else {

                return false;
            }







        }

    }//END OF CLASS
?>