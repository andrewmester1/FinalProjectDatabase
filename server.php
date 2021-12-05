<?php 

session_start();
$username = "";
$email = "";
$password = "";
$first_name = "";
$last_name = "";
$errors = array();


$db = mysqli_connect('localhost','root','','testproject') or die("could not connect to database");

if (isset($_POST["reg_user"])){
$username = mysqli_real_escape_string($db, $_POST["username"]);
$email = mysqli_real_escape_string($db, $_POST["email"]);
$password = mysqli_real_escape_string($db, $_POST["password"]);
$first_name = mysqli_real_escape_string($db, $_POST["first_name"]);
$last_name = mysqli_real_escape_string($db, $_POST["last_name"]);

if(empty($username)) {array_push($errors, "Username is required");}
if(empty($email)) {array_push($errors, "Email is required");}
if(empty($first_name)) {array_push($errors, "First Name is required");}
if(empty($last_name)) {array_push($errors, "Last Name is required");}
if(empty($password)) {array_push($errors, "Password is required");}

$user_check_query = "SELECT * FROM customer WHERE CUST_USERNAME = '$username' or CUST_EMAIL = '$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user)
{
    if($user['username'] == $username){array_push($errors,"Username already exists");}
    if($user['email'] == $email){array_push($errors, "This email ID is already registered to a username");}
}

if(count($errors)==0)
{
    $password=md5($password);
    $query="INSERT INTO customer (CUST_FNAME,CUST_LNAME,CUST_EMAIL,CUST_USERNAME,CUST_PASSWORD) VALUES ('$first_name','$last_name','$email','$username','$password')";

    mysqli_query($db,$query);
    $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in ";

    header('location: ./index.php');
}
}

if (isset($_POST["login_user"])){
	//echo "Test1";
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	if(empty($username)){
		
	  array_push($errors, "Username is required");
	}
	
	if(empty($password)){
	  array_push($errors, "Password is required");
	}
	
	//echo "Test1";
	if (count($errors) == 0) {
		
		$password = md5($password);
		$query = "SELECT * FROM customer WHERE CUST_USERNAME='$username' AND password='$password'";
		$results = mysqli_query($db, $query);
		if(mysqli_num_rows($results)){
			$_SESSION['username']= $username;
			$_SESSION['success']= "Logged in successfully";
			header('location: index.php');}
		else {array_push($errors, "Wrong username and or password");}
	}
	}		

?>
