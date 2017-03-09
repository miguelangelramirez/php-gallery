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
            Edit
            <small>Photo</small>
        </h1>
        <!--        <ol class="breadcrumb">-->
        <!--            <li><a href="#"><i class="fa fa-upload" aria-hidden="true"></i> Uploads </a></li>-->
        <!--            <li class="active">Management</li>-->
        <!--        </ol>-->
    </section>


    <section class="content">
        <div class="row">
            <div class="col-lg-123 col-md-12 col-sm-12 col-xs-12">

                <div class="col-md-8 col-sm-12 col-xs-12">
                    <!--Get the ID-->
                    <?php
                        if (empty($_GET['id'])){
                            echo "ID is empty";
                        }else {
                            $photo = Photo::find_by_id($_GET['id']);

                            if (isset($_POST['update'])){
                                if ($photo){
                                    $photo->title = $_POST['title'];
                                    $photo->caption = $_POST['caption'];
                                    $photo->alternate_text = $_POST['alternate_text'];
                                    $photo->description = $_POST['description'];
                                    $photo->date_modified = date('Y-m-d');

                                    $photo->save();
                                }
                            }

                        }
                    ?>

                    <div class="form-group">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group"><label>Title: </label>
                                <input class="form-control" type="text" name="title" value="<?php echo $photo->title;  ?>">
                            </div>


                            <div class="form-group">
                                <label>Alternate Text: </label>
                                <input class="form-control" type="text" name="alternate_text" value="<?php echo $photo->alternate_text; ?>">
                            </div>
                            <div class="form-group">
                                <label>Caption: </label>
                                <input class="form-control" type="text" name="caption" value="<?php echo $photo->caption;  ?>">
                            </div>

                            <div class="form-group">
                                <label>Description: </label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="15"><?php echo $photo->description;  ?> </textarea>
                            </div>

                    </div>
                </div>


                <div class="col-md-4" >
                    <div  class="photo-info-box">
                        <div class="info-box-header">
                            <h4>Actions <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                        </div>
                        <div class="inside">
                            <div class="box-inner">
                                <p class="text">
                                    <span class="glyphicon glyphicon-calendar"></span> Uploaded on: <?php echo $photo->date_uploaded;  ?>
                                </p>
                                <p class="text">
                                    <span class="glyphicon glyphicon-calendar"></span> Modified on: <?php echo $photo->date_modified;  ?>
                                </p>
                                <p class="text ">
                                    Photo Id: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
                                </p>
                                <p class="text">
                                    Filename: <span class="data"><?php echo $photo->filename; ?></span>
                                </p>
                                <p class="text">
                                    File Type: <span class="data"><?php echo $photo->filetype; ?></span>
                                </p>
                                <p class="text">
                                    File Size: <span class="data"><?php echo $photo->size; ?></span>
                                </p>
                            </div>
                            <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edit_photo">
                        <img  src="<?php echo $photo->picture_path(); ?>" />
                    </div>
                </div>

                </form>





            </div>
        </div>

        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include 'includes/footer.php'?>