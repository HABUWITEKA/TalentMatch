<?php
session_start();
// connect to the database
$db = mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $firstname=mysqli_real_escape_string($db,$_POST['firstname']);
  $lastname=mysqli_real_escape_string($db,$_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $telephone=mysqli_real_escape_string($db,$_POST['telephone']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);
  $currentuniv=mysqli_real_escape_string($db,$_POST['currentuniv']);
  $degree=mysqli_real_escape_string($db,$_POST['degree']);
  $graduation=mysqli_real_escape_string($db,$_POST['graduation']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $confirmpassword) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM studentusers WHERE email='$email'  LIMIT 1";
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

    $query = "INSERT INTO studentusers (firstname,lastname, email,telephone,password,currentuniv,degree,graduation) 
          VALUES('$firstname', '$lastname', '$email', '$telephone' , '$password_hash', '$currentuniv', '$degree', '$graduation')";
    mysqli_query($db, $query);
    // $_SESSION['username'] = $username;
    // $_SESSION['success'] = "You are now logged in";
    header('location:loginid1.php');
  }
}
// ... 
// ... 

//LOGIN USER
if (isset($_POST['login'])) {
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
    $query = "SELECT * FROM studentusers WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      header('location: dashboard1.php');
    }else {
      header('location: loginid1.html');
      echo "Login failed";
    }
  }
}

//logout
if (isset($_POST['logout'])) {
  session_start();
  session_destroy();
  header('location:index.php');

}

//update and saving
if (isset($_POST['update'])) {
  
}
 


?>