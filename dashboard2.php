
<?php 
include('server2.php');
$email=$_SESSION['email'];
$dbconnect=mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');
$query = mysqli_query($dbconnect, "SELECT * FROM comapnyusers where email='$email'");
$row = mysqli_fetch_assoc($query);

//profile picture things
 if (isset($_POST['upload'])) {
    // for the database
    $profileImageName = time() . '-' . $_FILES["picture"]["name"];
    // For image upload
    $target_dir = "img/company/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['picture']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger1";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger2";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        $sql = "UPDATE comapnyusers SET Companylogo='$profileImageName' WHERE email='$email'";
        if(mysqli_query($db, $sql)){
          header('location:dashboard2.php');
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger3";
        }
      } else {
        $error = "There was an error uploading the file";
        $msg = "alert-danger4";
      }
    }
  }
  //updating info and adding new stuff
  if (isset($_POST['update'])) {
    $updatedcompanyname = mysqli_real_escape_string($dbconnect, $_POST['cname']);
    $update1= "UPDATE comapnyusers SET companyname = '$updatedcompanyname' WHERE email='$email'";
    mysqli_query($dbconnect, $update1);
    header('location:dashboard2.php');
}
if (isset($_POST['update'])) {
    $updatedindustry = mysqli_real_escape_string($dbconnect, $_POST['industry']);
    $update2= "UPDATE comapnyusers SET Industry = '$updatedindustry' WHERE email='$email'";
    mysqli_query($dbconnect, $update2);
    header('location:dashboard2.php');
}
if (isset($_POST['update'])) {
    $updatedwebsite = mysqli_real_escape_string($dbconnect, $_POST['website']);
    $update3= "UPDATE comapnyusers SET Website = '$updatedwebsite' WHERE email='$email'";
    mysqli_query($dbconnect, $update3);
    header('location:dashboard2.php');
}
if (isset($_POST['update'])) {
    $updatedtlephone = mysqli_real_escape_string($dbconnect, $_POST['tel']);
    $update3= "UPDATE comapnyusers SET telephone = '$updatedtlephone' WHERE email='$email'";
    mysqli_query($dbconnect, $update3);
    header('location:dashboard2.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['companyname']."'s". " "."Dashboard";  ?></title>
    <link rel="stylesheet" href="css/main3.css">
    <link rel="stylesheet" type="text/css" href="css/newcss/another.css">
    <script type="text/javascript" src="js/java.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<title></title>
</head>
<body>
<header id="header">
    <img src="img/talent.png" class="logo">
    <img src="<?php echo 'img/company/' . $row['Companylogo'] ?>" id="smallpp">
    <a class="myaccount" name="logout" href="logout2.php" style="text-decoration:none">logout</a>
    <div class="line">
        
    </div>
  <section class="navigation">
    <!-- Vertical fixed navigation bar -->
    <nav>
        <a href="#" class="links" id="bckg1" style="background:#C8E31C" onclick="displayaboutme()"><img class="icon" src="img/propo.svg">&nbspAbout Company</a>
        <a href="#" class="links" id="bckg2" onclick="displayjobs()" onclick="classes()"><img class="icon" src="img/note.svg">&nbspJobs</a>
        <a href="#" class="links" id="bckg4" onclick="displayinternships()" onclick="classes()"><img class="icon" src="img/job.svg">&nbspInternships</a>
        <a href="#" class="links" id="bckg5" onclick="displayresources()" onclick="classes()"><img class="icon" src="img/resoure.svg">&nbspApplicants</a>
        <a href="#" class="links" id="bckg6" onclick="displayaboutme()" onclick="classes()"><img class="icon" src="img/business.png">&nbspEvents</a>
    </nav>
    <div id="aboutme">
<div class="portfolio" style="position: fixed;">
   <div class ="container" >
 <img src="<?php echo 'img/company/' . $row['Companylogo'] ?>" class="profilepic" id="profiledisplay" onclick="triggerclick()">
 <div class="text">
 <a href="#" class="uploadpc" onclick="picturepic()">Upload<br>Picture</a> 
</div>
<form method="post" enctype="multipart/form-data" id="formtoupload">
    <input type="file" name="picture"  id="picture" onchange="displayImage(this)">
    <div id="allbtn">
    <input type="submit" name="cancel" value="cancel" id="cancel" onclick="picturepic()">
    <input type="submit" name="upload" value="upload" id="upload"></div>
</form>
</div>
    <p id="nameoftheperson">
     <?php echo $row['companyname'] ?>
    </p>
    <p id="titleoftheperson"><b>Title:</b>
           <a id="privilege">Company</a>
    </p>
    <p id="usernameoftheperson"><b>Username:</b>
        <a id="username">
        <?php echo $row['email'] ?>
        </a>
    </p>
    <p id="usernameoftheperson"><b>Telephone:</b>
        <a id="username">
        <?php echo $row['telephone'] ?>
        </a>
    </p>
    <p id="schooloftheperson"><b>Industry:</b>
        <a id="Industry">
        <?php echo $row['Industry'] ?>
        </a>
    </p>
    <p id="facultyoftheperson"><b>Website:</b>
        <a id="faculty" href="https://<?php echo $row['Website'] ?>">
        <?php echo $row['Website'] ?>
        </a>
    </p>
    <p id="locationoftheperson"><b>Location:</b>
        <a id="location">Kigali,Rwanda</a>
    </p>
    <div style="top:-20px;position: relative;">
    <button class="btn">Post a job</button>
    <button class="btn updatebtnn" onclick="updatepop()">Update Info</button></div>
</div>
</section>
<!-- In the case the user wants to update his informationn and we update it in the database -->
<form action="dashboard2.php" class="updateform" method="post" name="updateinfo" id="updateform">
    <label>Company Name:</label><br>
    <input type="text" name="cname" value="<?php echo $row['companyname'] ?>"><br>
    <label>Telephone:</label><br>
    <input type="text" name="tel" value="<?php echo $row['telephone'] ?>"><br>
    <label>Industry:</label><br>
    <input type="text" name="industry" value="<?php echo $row['Industry']; ?>"><br>
    <label>Website:</label><br>
    <input type="text" name="website" value="<?php echo $row['Website']; ?>"><br>
    <input type="submit" name="update" value="Update" class="btn updatebtn" onclick="updatepop()">
    <button class="btn cancel" onclick="updatedpop()">Cancel</button>
</form>
</header> 
<div id="jobs">
    <!-- <h1 style="left:300px;position: absolute;top:300px;">Post a job</h1> -->
    <div id="postjob">
        <div id="postbanner">
            <p style="top:-15px;position:relative;">Post it here!</p>
        </div>

        <!--  -->
        <form>
            <label>Job Title</label>
            <input type="text" name="jobtitle" id="jobtitle" placeholder="Job title">
            <label id="entrylevellabel">Entry Level</label>
            <select id="entrylevel">
                <option>Job's Entry Level:</option>
                <option>Basic</option>
                <option>Middle</option>
                <option>High</option>
            </select>
            <label id="jobindustrylabel">Job's Industry</label>
            <input type="text" name="jobindutsry" id="jobindustry" placeholder="Job Industry">
            <label id="jobdescriptionlabel">Job description</label>
            <textarea id="jobdescription" placeholder="Job Description"></textarea>
            <p id="alternative">Or, choose to upload Pdf of job description</p>
            <input type="file" name="pdfdescription" value="Upload Pdf">
            <input type="submit" name="submitjob" value="Post The job">
        </form>
    </div>
</div>
</body>
</html>