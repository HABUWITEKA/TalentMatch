
<?php 
include('server2.php');
$email=$_SESSION['email'];
$dbconnect=mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');
$query = mysqli_query($dbconnect, "SELECT * FROM comapnyusers where email='$email'");
$query2 = mysqli_query($dbconnect,"SELECT * FROM jobsposting where Email='$email'" );
$row = mysqli_fetch_assoc($query);
$row2 = mysqli_fetch_assoc($query2);
$jobcount = "SELECT COUNT(*) FROM jobsposting";

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
if (isset($_POST['Jobsubmit'])) {
    # code...
    $jobtitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
    $jobentrylevel = mysqli_real_escape_string($db, $_POST['jobentrylevel']);
    $jobindustry = mysqli_real_escape_string($db, $_POST['jobindustry']);
    $jobdescription = mysqli_real_escape_string($db, $_POST['jobdescription']);
    $jobdescriptionpdf = mysqli_real_escape_string($db, $_POST['pdfdescription']);
    $jobdeadline = mysqli_real_escape_string($db, $_POST['Deadline']);
    //adding to database
    $query = "INSERT INTO jobsposting (Jobtitle, Jobentrylevel, Jobindustry, jobdescription, jobdescriptionpdf, Deadline, Email )
    VALUES ('$jobtitle','$jobentrylevel','$jobindustry', '$jobdescription', '$jobdescriptionpdf', '$jobdeadline', '$email')";
    mysqli_query($db, $query);
    $addingposts="SELECT COUNT(*) FROM jobsposting";
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
    <link rel="stylesheet" href="css/newcss/another.css">
    <script type="text/javascript" src="js/java.js"></script>
    <script type="text/javascript">
      function displayjobposter(){
	var element = document.getElementById("postjob")
	element.style.display = "block";
}
function closedisplayjobposter(){
	var element = document.getElementById("postjob")
	element.style.display = "none";
}
function displayjobposter2(){
	var element = document.getElementById("postjob2")
	element.style.display = "block";
}
function closedisplayjobposter2(){
	var element = document.getElementById("postjob2")
	element.style.display = "none";
}
    </script>
	<title></title>
</head>
<body>
<header id="header">
  <img src="img/talent.png" class="logo">
    <img src="<?php echo 'img/company/' . $row['Companylogo'] ?>" id="smallpp">
    <a class="myaccount" name="logout" href="logout2.php" style="text-decoration:none">logout</a>
    <div class="line" style="height:388px;">
        
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
    <button class="btn updatebtnn" onclick="updatepop()">Update Info</button>
</div>
</div>
  <div>  <!-- In the case the user wants to update his informationn and we update it in the database -->

<!-- udukoryo -->
<div class="aboutmediv activejobs">
    <div id="toptitle">
    <p id="titlediv">Active Job offers</p>
    <button class="edit btn" onclick="edittoggle()">View</button></div>
    <p id="abouttext" class="statistics">
        <?php
         echo $row['companyname']." "."has 2 active job offers";
            ?>
    </p>
</div>

<div class="aboutmediv activejobs deadjobs">
    <div id="toptitle">
    <p id="titlediv">Dead Job offers</p>
    <button class="edit btn" onclick="edittoggle()">View</button></div>
    <p id="abouttext" class="statistics">
        <?php
         echo $row['companyname']." "."has 0 Dead job offers";
            ?>
    </p>
    
</div>

<div class="aboutmediv activejobs ">
    <div id="toptitle">
    <p id="titlediv">Active Internship offers</p>
    <button class="edit btn" onclick="edittoggle()">View</button></div>
    <p id="abouttext" class="statistics">
        <?php
         echo $row['companyname']." "."has 0 active job offers";
            ?>
    </p>
</div>

<div class="aboutmediv activejobs deadjobs">
    <div id="toptitle">
    <p id="titlediv">Dead Internship offers</p>
    <button class="edit btn" onclick="edittoggle()">View</button></div>
    <p id="abouttext" class="statistics">
        <?php
         echo $row['companyname']." "."has 1 dead internship offers";
            ?>
    </p>
</div>
</header> 
</div>
</section>
<form action="dashboard2.php" class="updateform" method="post" name="updateinfo" id="updateform">
    <label class="label">Company Name:</label><br>
    <input type="text" name="cname" value="<?php echo $row['companyname'] ?>"><br>
    <label class="label">Telephone:</label><br>
    <input type="text" name="tel" value="<?php echo $row['telephone'] ?>"><br>
    <label class="label">Industry:</label><br>
    <input type="text" name="industry" value="<?php echo $row['Industry']; ?>"><br>
    <label class="label">Website:</label><br>
    <input type="text" name="website" value="<?php echo $row['Website']; ?>"><br>
    <div id="mybtns">
    <button class="btn cancel" onclick="updatedpop()">Cancel</button>
    <button type="submit" name="update" value="Update" onclick="updatepop()" class="btn updatebtn">Update</button></div>
</form>
<div id="jobs">
    <!-- <h1 style="left:300px;position: absolute;top:300px;">Post a job</h1> -->
    <div id="postjob">
        <div id="postbanner">
            <p style="top:-15px;position:relative;">Post it here!</p>
        </div>
        <img src="img/close.png" class="closeimage" onclick="closedisplayjobposter()">
        <!--  -->
        <form action="dashboard2.php" method="post" id="Joobb">
            <div id="jobbdead">
            <label id="jobtitlelabel">Job Title</label>
            <input type="text" name="jobtitle" id="jobtitle" placeholder="Job title"></div>
            <div id="deadline">
            <label id="deadlinelabel">Deadline</label>
            <input type="date" name="Deadline" id="Deadline"></div>
            <label id="entrylevellabel">Entry Level</label>
            <select id="jobentrylevel" name="jobentrylevel">
                <option>Job's Entry Level:</option>
                <option>Basic</option>
                <option>Middle</option>
                <option>High</option>
            </select>
            
            <label id="jobindustrylabel">Job's Industry</label>
            <input type="text" name="jobindustry" id="jobindustry" placeholder="Job Industry">
            <div style="top:-270px;position:relative;">
            <input type="file" name="pdfdescription" value="Upload Pdf">
            <p id="alternative">Upload Pdf of job description</p>
            <input type="submit" name="Jobsubmit" value="Post The job" style="top:490px;left:-70px;position:relative;text-align: center;
	font-size: 20px;
	font-family: Microsoft Yahei UI;
	font-weight: bold;
	width:300px;
	border-style: solid;
	border-color: orange;
	background-color: orange;
	color: white;">
        </div>
        </form>
    </div>
    <table>
        <tr>
            <th>Job id</th>
            <th>Job title</th>
            <th>Date posted</th>
            <th>Deadline</th>
            <th>status</th>
        </tr>
        <?php 
  
  $result = mysqli_query($dbconnect, "SELECT * FROM jobsposting where email='$email'");
  while ($mydata = mysqli_fetch_assoc($result)) { ?>
    <tr>
            <td><?php echo $mydata['ID']; ?></td>
            <td><?php echo $mydata['Jobtitle']; ?></td>
            <td>Any</td>
            <td><?php echo $mydata['Deadline']; ?></td>
            <td>
            <a href="delete.php?id=<?echo $mydata['ID'];?>"><button class="desactivate" name="desactivate">Desactivate</button>
            </td>
        </tr>
  <?php } ?>
  
  ?>
        
    </table>
    <button class="postbtn" onclick="displayjobposter()">Post A job!</button>
</div>


<div id="Internships">
    <!-- <h1 style="left:300px;position: absolute;top:300px;">Post a job</h1> -->
    
    <button class="postbtn" onclick="displayjobposter()">Post Internship!</button>
</div>
</body>
</html>