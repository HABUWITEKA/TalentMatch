<?php 

session_start();
// connect to the database
$db = mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');

if (isset($_POST['submitcompany'])) {
// 	# code...
	$companyname=mysqli_real_escape_string($db,$_POST['companyname']);
	$location = mysqli_real_escape_string($db, $_POST['location']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$telephone=mysqli_real_escape_string($db, $_POST['telephone']);
	$confirmedpassword = mysqli_real_escape_string($db, $_POST['confirmedpassword']);
    

    // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $confirmpassword) {
  array_push($errors, "The two passwords do not match");
  }

// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM comapnyusers WHERE email='$email'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    
    if ($user['email'] === $email) {
     array_push($errors, "email already exists");
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
    header('location:loginid2.php');
  }
  else
  {
    //header('location:registercompany.php');
    echo "not successful";
  }
}


///logn
if (isset($_POST['logincompany'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM comapnyusers WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      header('location: dashboard2.php');
    }else {
      header('location: loginid2.php');
      echo "Login failed";
    }
  }
}
// add a posting to a database
// if (isset($_POST['submitjob'])) {
//   # code...
//   $jobtitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
//   $jobentrylevel = mysqli_real_escape_string($db, $_POST['jobentrylevel']);
//   $jobindustry = mysqli_real_escape_string($db, $_POST['jobindutsry']);
//   $jobdescription = mysqli_real_escape_string($db, $_POST['jobdescription']);
//   $jobdescriptionpdf = mysqli_real_escape_string($db, $_POST['pdfdescription']);
//   //adding to database
//   $adding = "INSERT INTO jobsposting(Jobtitle, Jobentrylevel, Jobindutsry, Job description, Jobdescriptionpdf )VALUES('$jobtitle','$jobentrylevel','$jobindutsry', '$jobdescription', '$jobdescriptionpdf')";
  // mysql_query($db, $adding);

// }


  ?>