  <!-- Header Starts -->
  <?php include 'includes/header.php'; ?> 
  <!-- Header Ends -->

  <!-- Inserting Session check -->
  <?php //if (!$session->is_signed_in()){ redirect("upload.php"); } ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'includes/sidebar.php'; ?>
  <!-- Left side column ends -->
  
  <!-- Content Wrapper starts. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-upload" aria-hidden="true"></i> Uploads </a></li>
        <li class="active">Management</li>
      </ol>
    </section>

    
    <section class="content">
      <div class="row">
        <div class="col-lg-123 col-md-12 col-sm-12 col-xs-12">
            <?php
                if (isset($_POST['submit'])){
                    $photo =  new Photo();
                    $photo->title = $_POST['title'];
                    $photo->description = $_POST['description'];
                    $photo->set_file($_FILES['file_upload']);
                    $photo->date_uploaded = date('Y-m-d');
                    $photo->alternate_text = $_POST['alternate_text'];

                    if ($photo->save()){
                        $message = "Photo uploaded succesfully";
                    }else {
                        $message = join("<br>", $photo->errors);
                    }
//                    echo "Filename: " . $_FILES['file_upload']['name'];
                }

            ?>



            <div class="col-md-6 col-sm-12 col-xs-12">
                <?php
                    if (isset($message)) {
                        echo $message;
                    }

                    $target_path = "<p>" .  SITE_ROOT . 'admin'. DS . "images" . DS . $_FILES['file_upload']['name']  . "</p>";
//                    echo $target_path;
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" required placeholder="Title field is required">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="description" placeholder="Type photo description here">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="alternate_text" placeholder="Alternate text">
                    </div>
                    <div class="form-group">
                        <input type="file" name="file_upload">
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit" >


                </form>
            </div>
        




        </div>
      </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include 'includes/footer.php'?>