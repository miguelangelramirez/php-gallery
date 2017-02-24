<?php
	// echo "nothing to see here" . "<br>";

	//testing the connection 
	// if ($database->connection) {
	// 	echo "We are connected!";
	// }
	
	// $sql = "SELECT * FROM users WHERE id=1";
	// $result = $database->query($sql); 
	// $user_found = mysqli_fetch_array($result);
	// echo "Username: " . $user_found['username'];
	
	// getting all the suers
	
	// $result_set = User::find_all_users();

	// while ($row = mysqli_fetch_array($result_set)) {
	// 	echo $row['id'] . ". " .  "Username: " . $row['username'] . "<br>";
	// }

	// echo "<br><br><br>";

	// $find_user = User::find_user_by_id(1); 

	// echo "The username: " . $find_user['username']; 
	
	// $found_user = User::find_user_by_id(2); 
	// echo $user->id; 

	// $user = new User(); //this we instantiate the object with its properties below
	// $user->id 		= $found_user['id']; //here we are assgining the values to the properties to be called 
	// $user->username = $found_user['username'];
	// $user->password = $found_user['password'];
	// $user->first_name = $found_user['first_name'];
	// $user->last_name = $found_user['last_name'];

	// while ($user = mysqli_fetch_array($find_user)) {
	// 	echo $user['username']; 
	// }

	// $find_this_user = User::find_by_username('guelo'); 
	// echo 	"Id: " . $find_this_user['id'] . "Username: " . $find_this_user['username'] . "First Name: " . $find_this_user['first_name']; 


//	$found_user = User::find_user_by_id(2);
//	$user = User::instantiation($found_user);
//	echo $user->username;

    echo "<br><br><br>";

    $users = User::find_all_users();

    foreach ($users as $user){
        echo "User: " .  $user->username . "<br>";
    }







	echo "<br><br><br>";


    $found_user = User::find_user_by_id(2);
    echo    $found_user->username;



