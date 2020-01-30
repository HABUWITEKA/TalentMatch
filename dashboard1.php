<?php
session_start();
include('server.php');
$email=$_SESSION['email'];
$dbconnect=mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');
$query = mysqli_query($dbconnect, "SELECT * FROM studentusers where email='$email'");
$row = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    # code...
    //update from form
      $emaill = $_POST['emaill'];
      $lname = $_POST['lname'];
      $fname = $_POST['fname'];

      // mysql query to Update data
   $query_update = "UPDATE `studentusers` SET `firstname`='".$fname."',`lastname`='".$lname."' WHERE `email` = $emaill";
   $result = mysqli_query($dbconnect, $query_update);
   if ($result)
    {
         # code...{
       echo 'Data Updated';
    }
    else{
        echo 'Data Not Updated';
    }
         mysqli_close($dbconnect);
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
    <button class="edit btn">Edit</button></div>
    <p id="abouttext">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
</div>
<div class="aboutmediv">
    <div id="toptitle">
    <p id="titlediv">Skills</p>
    <button class="edit btn">Edit</button></div>
    <p id="abouttext">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
</div>

<div class="aboutmediv">
    <div id="toptitle">
    <p id="titlediv">Interests</p>
    <button class="edit btn">Edit</button></div>
    <p id="abouttext">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
</div>
<!-- In the case the user wants to update his informationn and we update it in the database -->
<!-- <form action="dashboard1.php" method="post" name="updateinfo" class="updateform">
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
</form> -->
</body>
</html>