<!-- Header Starts -->
<?php include 'includes/header.php'; ?>
<!-- Header Ends -->

<!-- Left side column. contains the logo and sidebar -->
<?php include 'includes/sidebar.php'; ?>
<!-- Left side column ends -->

<?php
    if (empty($_GET['id'])){
        redirect('photos.php');
    }

    if (isset($_GET['id'])) {
        $comments = Comment::find_the_comments($_GET['id']);
    }
?>

<!-- Content Wrapper starts. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content-header">
        <h1>
            Comments
            <small>by Photo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Comments</a></li>
            <li class="active">Management</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="thumbnail col-md-4 col-sm-12">
                <?php
                    $photo = Photo::find_by_id($_GET['id']);
                    echo "<img src='" . $photo->picture_path() . "' />";
                ?>

            </div>

            <div class="col-md-8 col-sm-8 col-xs-12">


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




                                foreach ($comments as $comment) {
                                    echo "<tr><td>{$comment->id}</td>";
                                    echo "<td>{$comment->photo_id}</td>";
                                    echo "<td>{$comment->author}</td>";
                                    echo "<td>{$comment->body}<br>
                                            <a class='picture_actions' href='?aprove=" . $comment->id . "'>Aprove</a> |
                                            <a class='picture_actions' href='delete_comment.php?id=" . $comment->id . "'>Delete</a>
                                          </td>";
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