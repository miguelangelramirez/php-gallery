  <!-- Header Starts -->
  <?php include 'includes/header.php'; ?> 
  <!-- Header Ends -->
  
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
        <li><a href="#"><i class="fa fa-camera-retro" aria-hidden="true"></i> Photos</a></li>
        <li class="active">Management</li>
      </ol>
    </section>

    
    <section class="content">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
              <a class="btn btn-primary" href="upload.php">Add New Photo</a>
              <hr>
              <table class="table table-striped table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>File Size</th>
                    </tr>
                  </thead>
                  <tbody>

                      <?php
                          $photos = Photo::find_all();
                          $images_dir = "http://gallery.dev/" . 'admin'. DS . "images/";

                          foreach($photos as $photo){

                              echo "<tr><td>{$photo->id}</td>";
//                              echo "<td><img class=\"admin-img-grid\" src='" . $images_dir . $photo->filename ."'>";
                              echo "<td><img alt='{$photo->alternate_text}' class=\"admin-img-grid\" src='" . $photo->picture_path() ."'>";
                              echo "<div class='picture_actions'><a class='img-action' href='delete_photo.php?id={$photo->id}'>Delete</a> <a class='img-action' href='edit_photo.php?id={$photo->id}'>Edit</a> <a class='img-action' href='view_photo.php?id={$photo->id}'>View</a></div></td>";

                              echo "<td>{$photo->title}</td>";
                              echo "<td>{$photo->description}</td>";
                              echo "<td>{$photo->filetype}</td>";
                              echo "<td>{$photo->size}</td></tr>";
                          }

                      ?>
                  </tbody>
              </table>
          </div>
        </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include 'includes/footer.php'?>