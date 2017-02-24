<?php
    echo __FILE__ . "<br>";
    echo __LINE__ . "<br>";
    echo __DIR__ . "<br>";

    //check if file exists
    if(file_exists("file.php")){echo "yes" . "<br>"; }

    //ternary operator
    echo file_exists("file.php") ? "Yes it exists" : "no, it doesn't";


?>