<?php
    function classAutoloader($class){
//        $class      = strtolower($class);
//        $the_path   = "includes/{$class}.php";
//
////        echo $the_path . " ";
////
////        if (file_exists($the_path)){echo " file exists <br>"; }
//
//        if (file_exists($the_path)){
//            include_once('$the_path');
//        }else {
//            die("The file \"{$class}.php\" does not exist");
//        }

        foreach (glob("includes/*.php") as $filename) {
            if ($filename != 'includes/footer.php' && $filename != 'includes/header.php') {
                echo "Including: " .  $filename . "<br>";
                include_once $filename;
            }
        }

    }

    spl_autoload_register('classAutoloader');


    function redirect($location){
        header("Location: {$location}");
    }







?>