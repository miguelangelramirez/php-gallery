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
        <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Comments</a></li>
        <li class="active">Management</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <table class="table table-striped table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Author</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $comments = Comment::find_all();

                        foreach ($comments as $comment){
                            echo "<tr><td>{$comment->id}</td>";
                            echo "<td>{$comment->photo_id}</td>";
                            echo "<td>{$comment->author}</td>";
                            echo "<td>{$comment->body}<br> <a class='picture_actions' href='#'>Aprove</a> | <a class='picture_actions' href='#'>Edit</a> | <a class='picture_actions' href='#'>Delete</a></td>";
                            echo "<td>{$comment->created}</td>";
                            echo "<td>{$comment->status}</td></tr>";
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