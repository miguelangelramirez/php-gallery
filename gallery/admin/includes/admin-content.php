<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo Comment::count_rows(); ?></h3>

                <p>Comments</p>
            </div>
            <div class="icon">
                <i class="fa fa-comments-o"></i>
            </div>
            <a href="comments.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo Photo::count_rows(); ?></h3>

                <p>Photos</p>
            </div>
            <div class="icon">
                <i class="fa fa-camera-retro"></i>
            </div>
            <a href="photos.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo User::count_rows(); ?></h3>

                <p>Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

<?php

	//testing the connection 
	// if ($database->connection) {
	// 	echo "We are connected!";
	// }
	
	// $sql = "SELECT * FROM users WHERE id=1";
	// $result = $database->query($sql); 
	// $user_found = mysqli_fetch_array($result);
	// echo "Username: " . $user_found['username'];
	
//	 getting all the suers
//	 $result_set = User::find_all();
//	 while ($row = mysqli_fetch_array($result_set)) {
//	 	echo $row['id'] . ". " .  "Username: " . $row['username'] . "<br>";
//	 }

//	 echo "<br><br><br>";
//
//	 $find_user = User::find_by_id(1);
//
//	 echo "The username: " . $find_user['username'];
//
//	 $found_user = User::find_by_id(2);
//	 echo $user->id;

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


//    show all the Users
//    $users = User::find_all();
//    foreach ($users as $user) {
//        echo "User: " . $user->username . " " . $user->last_name .  "<br>";
//    }







//    $found_user = User::find_user_by_id(2);
//    echo    $found_user->username;


//    $this_user = new User();
//    $this_user->username = "jack";
//    $this_user->password = "123";
//    $this_user->first_name = "Jack";
//    $this_user->last_name = "Veneno";
//    $this_user->create();


    //updating a record
//    $user = User::find_user_by_id(2);
//    $user->last_name = " ";
//    $user->update();

//    $deleteme = User::find_user_by_id(33);
//    $deleteme->delete();

//    //updating an record on the database
//    $user = User::find_user_by_id(34);
//    $user->username = "sanchez";
//    $user->first_name = "Francisco del Rosario";
//    $user->last_name = "Sanchez";
//    $user->password = '987654321';
//    $user->picture = "http://www.biografiasyvidas.com/biografia/s/fotos/sanchez_francisco.jpg";
//    $user->update();

//    $user = new User();
//    $user->username = "WHATEVER";
//    $user->save();

//    $user = new User();
//    $user->username = "mella";
//    $user->password = "54321";
//    $user->first_name = "Ramon";
//    $user->last_name = "Matias Mella";
//    $user->picture = "http://www.educando.edu.do/files/4813/9333/3191/matias_ramon_mella_250.jpg";
//    $user->save();

//    $thisuser = User::find_user_by_id(36);
//    $thisuser->username = "fidel";
//    $thisuser->password = "123";
//    $thisuser->first_name = "Fidel";
//    $thisuser->last_name = "Castro";
//    $thisuser->picture = "https://media1.britannica.com/eb-media/75/44175-004-1AA92245.jpg";
//    $thisuser->update();

//    $updateme = User::find_user_by_id(38);
//    $updateme->picture = "http://nuevayores.blogs.com/.a/6a00d834518de369e2017d419cc04b970c-pi";
//    $updateme->update();

//    echo "<pre>";
//    print_r(get_declared_classes());
//    echo "</pre>";

//creating  a new user with the class abstration inside db_object.php
//    $this_user = new User();
//    $this_user->username = "freddy";
//    $this_user->first_name = "Freddy";
//    $this_user->last_name = "Veras Goico";
//    $this_user->password = "123";
//    $this_user->picture = "http://waytofamous.com/images/freddy-beras-goico-04.jpg";
//    $this_user->save();

//    $photos = Photo::find_all();
//    foreach($photos as $photo){
//        echo $photo->filename . "<br>";
//    }
//
//    echo "<br><br><br>";
//
//    $all_users = User::find_all();
//    foreach($all_users as $user){
//        echo $user->username . "<br>";
//    }
//
//    echo "<br><br><br>";

//    $picture = Photo::find_by_id(1);
//    $picture->filetype = "JPG";
//    $picture->size =   "100";
//    $picture->description = "this is nothing special";
//    $picture->title = "pal monte";
//    $picture->update();


//    creating a new photo
//    $new_photo = new Photo();
//    $new_photo->title = "driving ";
//    $new_photo->size = 20;
//    $new_photo->create();


?>


