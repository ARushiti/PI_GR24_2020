<?php
session_start();
if(isset($_POST['username']))
{
$_SESSION['user']= $_POST['username'];
        $cookie_name = "user";
        $cookie_value = $_SESSION['user'];
        setcookie($cookie_name, $cookie_value, time() +3600, "/"); // 86400 = 1 day
}

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost:3306", "root", "", 'perdoruesit');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, trim($_POST['username']));
  $email = mysqli_real_escape_string($db, trim($_POST['email']));
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if (trim($user['username']) === $username) {
      array_push($errors, "Username already exists");
    }

    if (trim($user['email']) === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database
    $salt='anythingyouwant_' ;
	$password = md5($salt.$password_1);
  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: indexregister.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, trim($_POST['username']));
  $password = mysqli_real_escape_string($db, trim($_POST['password']));

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
	$salt='anythingyouwant_' ;
	$password = md5($salt.$password);
  	//$password = md5($password);
	//$password=sha1($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: indexregister.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}




//<?php
//$user_input = "<script>alert('Your site !');</script>";
//echo "<h4>My Commenting System</h4>";
//echo $user_input;       -------------------------------------------> qiky osht veq ni rast i thjeshte qe nese qet alert 
                          // funksionit strip largohet alerti edhe del i shtypun qajo qka u kon e shkrume ne alert
//$user_input = "<script>alert('Your site !');</script>";
//echo strip_tags($user_input);---------------------> kjo perdoret per me rujt faqen prej atakev

?>

