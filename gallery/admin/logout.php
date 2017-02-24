<?php require_once 'includes/header.php'; ?>

<?php 
	 $session->logout();
	 session_destroy();
	 redirect("login.php");
?>