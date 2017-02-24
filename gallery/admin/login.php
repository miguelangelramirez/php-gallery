<?php require_once("includes/header.php"); ?>

<?php
    if ($session->is_signed_in()){
        redirect("index.php");
    }

    if (isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        //method to check database user
        $user_found = User::verify_user($username,$password);

        if ($user_found){
            $session->login($user_found);
            redirect("index.php");
        } else {
            $the_message = "Password or Username do not match...";
        }
    }else {
        $username = NULL;
        $password = NULL;
    }
?>
<style>
    @import url("/css/custom.css");
</style>

<div class="wrapper">


<div class="container">
    <div class="centered col-lg-3 col-md-4 col-sm-12 col-xs-12">
        <h4 class="bg-danger"><?php echo $the_message; ?></h4>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="form-signin-heading">Sign-in</h2>
            </div>

            <div class="panel-body">
                <form class="form-signin" id="login-id" action="" method="post">
                    <label for="inputEmail" class="sr-only">Email address</label>
<!--                    <input type="text" class="form-control" name="username" value="--><?php //echo htmlentities($username); ?><!--" id="username" class="form-control" placeholder="Username" required autofocus>-->
                    <input placeholder="Username" type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >
                    <label for="inputPassword" class="sr-only">Password</label>
<!--                    <input type="password" id="password" class="form-control" placeholder="Password" required>-->
                    <input placeholder="Password" type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
                    <div class="checkbox">
<!--                        <label>-->
<!--                            <input type="checkbox" value="remember-me"> Remember me-->
<!--                        </label>-->
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" value="submit" name="submit" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div> <!-- /container -->

</div>
