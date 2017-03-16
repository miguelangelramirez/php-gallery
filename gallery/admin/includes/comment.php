<?php
    class Comment extends Db_object{
        protected static $db_table = "comments";
        protected static $db_table_fields = array('id', 'photo_id', 'author', 'body', 'created', 'status');
        public $id;
        public $photo_id;
        public $author;
        public $body;
        public $created;
        public $status;

        public static function create_comment($photo_id, $author="test author", $body=""){
            if (!empty($photo_id) && !empty($author) && !empty($body)) {
                $comment = new Comment();

                $comment->photo_id = (int)$photo_id;
                $comment->author = $author;
                $comment->created = date('Y-m-d');
                $comment->status = "Pending";
                $comment->body = $body;

                return $comment;
            }else {
                return false;
            }
        }

        public static function find_the_comments($photo_id=0){
            global $database;

            $sql = "SELECT * FROM " . self::$db_table . " WHERE photo_id = " . $database->escape_string($photo_id) . " AND status='Aproved' ORDER BY photo_id";

            return  self::find_by_query($sql);
        }

        public static function comment_count($id=0){
            global $database;

            $sql = "SELECT * FROM " . self::$db_table . " WHERE photo_id=" . $id;

            $num_rows = count(self::find_by_query($sql));

            return $num_rows;

        }

        public static function status(int $id, string $field, string $state){
            global $database;

            $sql = "UPDATE " . self::$db_table . " SET " . $field . "='" . $state . "' WHERE id= " . $id;
            $database->query($sql);
        }










    } //END OF CLASS Comment
?>