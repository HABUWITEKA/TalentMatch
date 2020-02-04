<?php 

session_start();
// connect to the database
$db = mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');

if (isset($_POST['submitcompany'])) {
	# code...
	$companyname=mysqli_real_escape_string($db,$_POST['companyname']);
	$location = mysqli_real_escape_string($db, $_POST['location']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$telephone=mysqli_real_escape_string($db, $_POST['telephone']);
	$confirmedpassword = mysqli_real_escape_string($db, $_POST['confirmedpassword']);


// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM comapnyusers WHERE email='$email'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    
    if ($user['email'] === $email) {
      // <script>
      //   alert("email already exists");
      // </script>
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password_hash = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO comapnyusers (companyname, location, email, password, telephone) 
          VALUES('$companyname', '$location' , '$email', '$password_hash', '$telephone')";
    mysqli_query($db, $query);
    // $_SESSION['username'] = $username;
    // $_SESSION['success'] = "You are now logged in";
    header('location:loginid1.php');
  }
  else
  {
    header('location:registerid2.php');
    echo "not successful";
  }
}
  ?>