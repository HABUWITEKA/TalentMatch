<?php
//session_start();
include('server.php');
$email=$_SESSION['email'];
$dbconnect=mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');
$query = mysqli_query($dbconnect, "SELECT * FROM studentusers where email='$email'");
$row = mysqli_fetch_assoc($query);
//saving
if (isset($_POST['Save'])) {
   $abouttext = mysqli_real_escape_string($dbconnect,$_POST['editedbio']);
   $saveit = "UPDATE studentusers SET Aboutme = '$abouttext' WHERE email='$email'";
   mysqli_query($dbconnect, $saveit);
   header('location:dashboard1.php');
}
if (isset($_POST['Save2'])) {
   $aboutskills = mysqli_real_escape_string($dbconnect,$_POST['editedskills']);
   $saveit2 = "UPDATE studentusers SET Skills = '$aboutskills' WHERE email='$email'";
   mysqli_query($dbconnect, $saveit2);
   header('location:dashboard1.php');
}
if (isset($_POST['Save3'])) {
   $aboutinterests = mysqli_real_escape_string($dbconnect,$_POST['editedinterests']);
   $saveit3 = "UPDATE studentusers SET Interests = '$aboutinterests' WHERE email='$email'";
   mysqli_query($dbconnect, $saveit3);
   header('location:dashboard1.php');
}

//Update student info
if (isset($_POST['update'])) {
    $updatedfirstname = mysqli_real_escape_string($dbconnect, $_POST['fname']);
    $update1= "UPDATE studentusers SET firstname = '$updatedfirstname' WHERE email='$email'";
    mysqli_query($dbconnect, $update1);
    header('location:dashboard1.php');
}
if (isset($_POST['update'])) {
    $updatedlastname = mysqli_real_escape_string($dbconnect, $_POST['lname']);
    $update2= "UPDATE studentusers SET lastname = '$updatedlastname' WHERE email='$email'";
    mysqli_query($dbconnect, $update2);
    header('location:dashboard1.php');
}
if (isset($_POST['update'])) {
    $updatedemail = mysqli_real_escape_string($dbconnect, $_POST['emaill']);
    $update3= "UPDATE studentusers SET email = '$updatedemail' WHERE email='$email'";
    mysqli_query($dbconnect, $update3);
    header('location:dashboard1.php');
}
if (isset($_POST['update'])) {
    $updateduniv = mysqli_real_escape_string($dbconnect, $_POST['currentt']);
    $update4= "UPDATE studentusers SET Currentuniv = '$updateduniv' WHERE email='$email'";
    mysqli_query($dbconnect, $update4);
    header('location:dashboard1.php');
}
if (isset($_POST['update'])) {
    $updatedfac = mysqli_real_escape_string($dbconnect, $_POST['degree2']);
    $update5= "UPDATE studentusers SET Degree = '$updatedfac' WHERE email='$email'";
    mysqli_query($dbconnect, $update5);
    header('location:dashboard1.php');
}
if (isset($_POST['update'])) {
    $updatedgraddate = mysqli_real_escape_string($dbconnect, $_POST['graduation2']);
    $update6= "UPDATE studentusers SET Current = '$updatedgraddate' WHERE email='$email'";
    mysqli_query($dbconnect, $update6);
    header('location:dashboard1.php');
}
?>
  
<!-- update php script -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/main3.css">
    <!-- For edit scrioopt -->
    <script>
        function edittoggle() {
            var x = document.getElementById("editarea");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
            else{
                x.style.display = "none";
                //alert("Your bio saved successful");
            } // body...
        }

        function edittoggle2() {
            var x = document.getElementById("editarea2");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
            else{
                x.style.display = "none";
                //alert("Your bio saved successful");
            } // body...
        }

        function edittoggle3() {
            var x = document.getElementById("editarea3");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
            else{
                x.style.display = "none";
                //alert("Your bio saved successful");
            } // body...
        }

    </script>
</head>
<body>
<header id="header">
    <img src="img/talent.png" class="logo">
    <img src="img/prostudent.png" id="smallpp">
    <a class="myaccount" name="logout" href="logout.php" style="text-decoration:none">logout</a>
  <section class="navigation">
    <!-- Vertical fixed navigation bar -->
    <nav>
        <a href="#" class="links active"><img class="icon" src="img/business.png">&nbspAbout Me</a>
        <a href="#" class="links"><img class="icon" src="img/business.png">&nbspApplications</a>
        <a href="#" class="links"><img class="icon" src="img/business.png">&nbspJobs</a>
        <a href="#" class="links"><img class="icon" src="img/business.png">&nbspInternships</a>
        <a href="#" class="links"><img class="icon" src="img/business.png">&nbspResources</a>
        <a href="#" class="links"><img class="icon" src="img/business.png">&nbspEvents</a>
        <a href="#" class="links"><img class="icon" src="img/business.png">&nbspCalendar</a>
    </nav>
</section></header> 
<!-- Profile and ability to change -->
<div class="portfolio" style="position: fixed;">
    <img src="img/prostudent.png" class="profilepic">
    <p id="nameoftheperson">
     <?php echo $row['firstname']." ".$row['lastname'] ?>
    </p>
    <p id="titleoftheperson"><b>Title:</b>
           <a id="privilege">Student</a>
    </p>
    <p id="usernameoftheperson"><b>Username:</b>
        <a id="username">
        <?php echo $row['email'] ?>
        </a>
    </p>
    <p id="schooloftheperson"><b>School:</b>
        <a id="school">
        <?php echo $row['Currentuniv'] ?>
        </a>
    </p>
    <p id="facultyoftheperson"><b>Faculty:</b>
        <a id="faculty">
        <?php echo $row['Degree'] ?>
        </a>
    </p>
    <p id="locationoftheperson"><b>Location:</b>
        <a id="location">Kigali</a>
    </p>
    <button class="btn">Update Resume</button>
    <button class="btn">Update Info</button>
</div>
<div class="aboutmediv">
    <div id="toptitle">
    <p id="titlediv">About me/Bio</p>
    <button class="edit btn" onclick="edittoggle()">Edit</button></div>
    <p id="abouttext">
        <?php
         echo $row['Aboutme'];
            ?>
    </p>
</div>
<!-- EDIT BIOGRAPHY -->
<div id="editarea">
     <form method="post" action="dashboard1.php">
         <textarea name="editedbio" id="editedbio" cols="30" rows="10"><?php echo $row['Aboutme'] ?></textarea>
         <input type="submit" name="Save" id="savebutton" class="btn edit " value="Save" onclick="edittoggle()">
     </form>
</div>
<!-- edit skilss -->
<div class="aboutmediv">
    <div id="toptitle">
    <p id="titlediv">Skills</p>
    <button class="edit btn" onclick="edittoggle2()" >Edit</button></div>
    <p id="abouttext">
         <?php
         echo $row['Skills'];
            ?>
    </p>
</div>
<div id="editarea2">
     <form method="post" action="dashboard1.php">
         <textarea name="editedskills" id="editedbio" cols="30" rows="10"><?php echo $row['Skills'] ?></textarea>
         <input type="submit" name="Save2" id="savebutton" class="btn edit " value="Save" onclick="edittoggle2()">
     </form>
     </form>
</div>
<!-- interests edit -->
<div class="aboutmediv">
    <div id="toptitle">
    <p id="titlediv">Interests</p>
    <button class="edit btn" onclick="edittoggle3()">Edit</button></div>
    <p id="abouttext">
         <?php
         echo $row['Interests'];
            ?>
    </p>
</div>
<div id="editarea3">
     <form method="post" action="dashboard1.php">
         <textarea name="editedinterests" id="editedbio" cols="30" rows="10"><?php echo $row['Interests'] ?></textarea>
         <input type="submit" name="Save3" id="savebutton" class="btn edit " value="Save" onclick="edittoggle3()">
     </form>
</div>

<!-- In the case the user wants to update his informationn and we update it in the database -->
<form action="dashboard1.php" class="updateform" method="post" name="updateinfo">
    <label>First Name:</label><br>
    <input type="text" name="fname" value="<?php echo $row['firstname'] ?>"><br>
    <label>Last Name:</label><br>
    <input type="text" name="lname" value="<?php echo $row['lastname']; ?>"><br>
    <label>E-mail:</label><br>
    <input type="email" name="emaill" value="<?php echo $row['email']; ?>"><br>
    <label>Current University:</label><br>
    <input type="text" name="currentt" value="<?php echo $row['Currentuniv']; ?>"><br>
    <label>Degree:</label><br>
    <input type="text" name="degree2" value="<?php echo $row['Degree']; ?>"><br>
    <label>Graduation Date:</label><br>
    <input type="month" name="graduation2" value="<?php echo $row['Graduation']; ?>" ><br><br>
    <input type="submit" name="update" value="update">
</form>
</body>
</html>