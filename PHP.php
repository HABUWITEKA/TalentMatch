if (isset($_POST['Jobsubmit'])) {
  # code...
  $jobtitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
  $jobentrylevel = mysqli_real_escape_string($db, $_POST['jobentrylevel']);
  $jobindustry = mysqli_real_escape_string($db, $_POST['jobindutsry']);
  $jobdescription = mysqli_real_escape_string($db, $_POST['jobdescription']);
  $jobdescriptionpdf = mysqli_real_escape_string($db, $_POST['pdfdescription']);
  //adding to database
  $adding = "INSERT INTO Jobsposting (Jobtitle, Jobentrylevel, Jobindutsry, jobdescription, jobdescriptionpdf )VALUES ('$jobtitle','$jobentrylevel','$jobindutsry', '$jobdescription', '$jobdescriptionpdf')";
  mysqli_query($db, $adding);
  header('location:index.php');
}