<?php require_once 'includes/login-header.php'; ?>

<?php 
	
	if ($session->is_signed_in()) {
		redirect('index.php'); 
	}

	if (isset($_POST['submit'])) {
		$username = trim($_POST['username']); 
		$password = trim($_POST['password']); 

		// method to check the database for the user 
		$username_found = User::verify_user($username, $password);

		if ($username_found) {
			$session->login($username_found); 
			redirect("index.php");
		}else {
			$the_message = "Password and/or Username are incorrect."; 
		}
	}else {
		$the_message = ""; 
		$username = null; 
		$password = null; 		
	}

?>

<!-- new form starts -->
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <!-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <h4 class="bg-danger"><?php echo $the_message; ?></h4>
					<form id="loginform login-id" class="form-horizontal" role="form action="" method="post">
                    <!-- <form id="loginform" class="form-horizontal" role="form">           -->
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo htmlentities($username); ?>" >
                        </div>
                            
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
           					<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo htmlentities($password); ?>">
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                              	<input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>   
                    </form>     
                </div>                     
            </div>  
        </div>
    </div>

<!-- new form ends -->















<!-- <div class="container">
	<div class="row">

		<div class="col-md-4 col-md-offset-3">
			<h4 class="bg-danger"><?php echo $the_message; ?></h4>
			<form id="login-id" action="" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				</div>
			</form>
		</div>



	</div>
</div>
 -->


  <!-- Footer -->
  <?php //include 'includes/footer.php'?>