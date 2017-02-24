<?php
    if (isset($_POST['submit'])){
//        echo "<pre>";
//        print_r($_FILES['file_upload']);
//        echo "</pre>";

        $upload_errors = array(
                UPLOAD_ERR_OK           => 'There is no error.',
                UPLOAD_ERR_INI_SIZE     => 'Bigger than the upload_max_filesize directive.',
                UPLOAD_ERR_FORM_SIZE    => 'The uploaded file excees the MAX_FILE_SIZE.',
                UPLOAD_ERR_PARTIAL      => 'The uploaded file was only partially uploaded.',
                UPLOAD_ERR_NO_FILE      => 'There is no file.',
                UPLOAD_ERR_NO_TMP_DIR   => 'Missing a temporary folder.',
                UPLOAD_ERR_CANT_WRITE   => 'Failed to write file to disk.',
                UPLOAD_ERR_EXTENSION    => 'A PHP extension stopped the file upload.',
        );

        $temp_name = $_FILES['file_upload']['tmp_name']; //getting the temp name
        $the_file = $_FILES['file_upload']['name'];
        $directory = "uploads";

        if (move_uploaded_file($temp_name,$directory . "/" . $the_file)) {
            echo "<h2>File uploaded successfully!</h2>";
        }else{
            $the_error = $_FILES['file_upload']['error'];
            $the_message = $upload_errors[$the_error];
        }

        $ext = pathinfo($temp_name, PATHINFO_EXTENSION); //getting the extension
        echo "<img class='img_grid' src=\"{$directory}/{$the_file}\" />"; //printing it as an image, now it works
    }

    //Uploads directory
    $directory = "uploads";
?>
<style>
    .img_grid{
        max-width: 100px;
        display: inline-flex;
        margin: 10px;
        padding: 2px;
        border: 1px solid grey;
        vertical-align: top;
    }

    .img_grid:hover{
        border:1px dotted mediumvioletred;
    }

</style>

<html>
    <head></head>
    <body>
        <form action="uploads.php" method="post" enctype="multipart/form-data">
            <h2>
                <?php
                    if(!empty($upload_errors)){
                        echo $the_message;
                    }
                ?>
            </h2>

            <input type="file" name="file_upload"><br>
            <input type="submit" name="submit" value="Upload">


        </form>
        <?php
            $all_files = scandir($directory);
//            echo "<pre>";
//            print_r($all_files);
//            echo "</pre>";

            $counter = 0;
            foreach ($all_files as $file) {
                if ($counter++ < 2) {
                    continue;
                } else {
                    echo "<a href='{$directory}/{$file}' ><img class='img_grid' src=\"{$directory}/{$file}\" /></a>";

                }
            }

        ?>









    </body>
</html>
