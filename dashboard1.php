<?php
//session_start();
include('server.php');
include('server2.php');
$email=$_SESSION['email'];
$dbconnect=mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');
$query = mysqli_query($dbconnect, "SELECT * FROM studentusers where email='$email'");
$query2 = mysqli_query($dbconnect,"SELECT * FROM jobsposting where Id=1" );
$row = mysqli_fetch_assoc($query);
$row2 = mysqli_fetch_assoc($query2);
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
//profile picture stuufffs
 //for profile pictures and stuff
  $msg = "";
  $msg_class = "";
  if (isset($_POST['upload'])) {
    // for the database
    $profileImageName = time() . '-' . $_FILES["picture"]["name"];
    // For image upload
    $target_dir = "img/";
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
        $sql = "UPDATE studentusers SET profilepicture='$profileImageName' WHERE email='$email'";
        if(mysqli_query($db, $sql)){
          header('location:dashboard1.php');
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['firstname']."'s". " "."Dashboard";  ?></title>
    <link rel="stylesheet" type="text/css" href="css/main3.css">
    <link rel="stylesheet" type="text/css" href="css/newcss/css.css">
    <script type="text/javascript" src="js/java.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  s
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
    <img src="<?php echo 'img/' . $row['profilepicture'] ?>" id="smallpp">
    <a class="myaccount" name="logout" href="logout.php" style="text-decoration:none">logout</a>
    <div class="line">
        
    </div>
  <section class="navigation">
    <!-- Vertical fixed navigation bar -->
    <nav>
        <a href="#" class="links" id="bckg1" style="background:#C8E31C" onclick="displayaboutme()"><img class="icon" src="img/propo.svg">&nbspAbout Me</a>
        <a href="#" class="links" id="bckg3" onclick="displayapplications()" onclick="classes()"><img class="icon" src="img/note.svg">&nbspApplications</a>
        <a href="#" class="links" id="bckg2" onclick="displayjobs()" onclick="classes()" ><img class="icon" src="img/jobi.svg">&nbspJobs</a>
        <a href="#" class="links" id="bckg4" onclick="displayinternships()" onclick="classes()"><img class="icon" src="img/job.svg">&nbspInternships</a>
        <a href="#" class="links" id="bckg5" onclick="displayresources()" onclick="classes()"><img class="icon" src="img/resoure.svg">&nbspResources</a>
        <a href="#" class="links" id="bckg6" onclick="displayaboutme()" onclick="classes()"><img class="icon" src="img/business.png">&nbspEvents</a>
    </nav>
</section>
</header> 
<!-- Profile and ability to change -->
<div id="aboutme">
<div class="portfolio" style="position: fixed;">
   <div class ="container" >
 <img src="<?php echo 'img/' . $row['profilepicture'] ?>" class="profilepic" id="profiledisplay" onclick="triggerclick()">
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
    <div style="top:-20px;position: relative;">
    <button class="btn">Update Resume</button>
    <button class="btn updatebtnn" onclick="updatepop()">Update Info</button></div>
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
<form action="dashboard1.php" class="updateform" method="post" name="updateinfo" id="updateform">
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
    <input type="submit" name="update" value="Update" class="btn updatebtn" onclick="updatepop()">
    <button class="btn cancel" onclick="updatedpop()">Cancel</button>
</form>
</div>

<!-- Application corner and own applications at a glance -->
<div id="applications">
    <!-- filters all related to type of the job -->
    <!-- <h1 style="top:200px;position: absolute;">Applications corner</h1> -->
    <table>
  <thead>
    <tr>
      <th scope="col">Company</th>
      <th scope="col">Job Name</th>
      <th scope="col">Job Type</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="Company">Kigali Today</td>
      <td data-label="Job Name">Communication Specialist</td>
      <td data-label="Job Type">Full-Time</td>
      <td data-label="Status">Pending</td>
    </tr>

    <tr>
      <td data-label="Company">Kigali Today</td>
      <td data-label="Job Name">Communication Specialist</td>
      <td data-label="Job Type">Full-Time</td>
      <td data-label="Status">Pending</td>
    </tr>

    <tr>
      <td data-label="Company">Kigali Today</td>
      <td data-label="Job Name">Communication Specialist</td>
      <td data-label="Job Type">Full-Time</td>
      <td data-label="Status">Pending</td>
    </tr>

    <tr>
      <td data-label="Company">Kigali Today</td>
      <td data-label="Job Name">Communication Specialist</td>
      <td data-label="Job Type">Full-Time</td>
      <td data-label="Status">Pending</td>
    </tr>
    
  </tbody>
</table>
</div>
<!-- jobssssssss -->
<div id="jobs" class="jobscorner">
    <!-- filters all related to type of the job -->
    <!-- <h1 style="top:200px;position: absolute;">Jobs corner</h1> -->
    <div id="myBtnContainer">
        <button class="filterr activee" onclick="filterSelection('All')">All</button>

        <select class="filterr" id="industry" onchange="show_selected()">
           <option value="">Filter by industry</option>
           <option value="Technology">Technology</option>
           <option value="Education">Education</option>
           <option value="Finance">Finance</option>
           <option value="Auditing">Auditing</option>
        </select>
        <!-- <button id="btn">Filter</button> -->
      </div>

      <section class="opcorner">
        <div class="posts" id="Technology" >
            <p class="posttitle" id="Technology"><?php echo $row2['Jobtitle']?></p>
            <img class="postimg" src="img/undraw_responsive_6c8s.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts Part-time" id="Finance">
            <p class="posttitle">Remote accountant at <br> Urumuri Ltd.</p>
            <img class="postimg" src="img/undraw_wallet_aym5.svg">
            <p class="type">Part-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts" id="Auditing">
            <p class="posttitle">Jobs at Mass Design</p>
            <img class="postimg" src="img/undraw_QA_engineers_dg5p.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts Full-time" id="Education">
            <p class="posttitle Technology">Students Affair Manager<br>at ALU Rwanda</p>
            <img class="postimg" src="img/undraw_candidate_ubwv.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts Full-time" id="Finance">
            <p class="posttitle">Remote accountant at <br> H&B Holdings</p>
            <img class="postimg" src="img/undraw_working_late_pukg.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts Part-time" id="Finance">
            <p class="posttitle">Part-time jobs at<br> Kigalitoday</p>
            <img class="postimg" src="img/undraw_online_media_62jb.svg">
            <p class="type">Part-time</p>
            <p class="due">Deadline:6 Nov 2020</p>
        </div>
        <div class="posts Full-time" id="Technology">
            <p class="posttitle">Front End developer at<br>  TalentMatch</p>
            <img class="postimg" src="img/undraw_responsive_6c8s.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts Part-time" id="Finance">
            <p class="posttitle">Remote accountant at <br> Urumuri Ltd.</p>
            <img class="postimg" src="img/undraw_wallet_aym5.svg">
            <p class="type">Part-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts Full-time" id="Auditing">
            <p class="posttitle">Jobs at Mass Design</p>
            <img class="postimg" src="img/undraw_QA_engineers_dg5p.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts Full-time" id="Education">
            <p class="posttitle">Students Affair Manager<br>at ALU Rwanda</p>
            <img class="postimg" src="img/undraw_candidate_ubwv.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        
      </section>
      <script>
        function show_selected() {
    var selector = document.getElementById('industry').value;
    var x = document.getElementById('Technology');
    var y = document.getElementById('Finance');
    var z = document.getElementById('Education');
    var t = document.getElementById('Auditing');
    if (selector=="Technology") {
      y.style.display ="none";
      z.style.display = "none";
      t.style,display = "none";
      console.log("dudue");
    }
    if (selector=="Education") {
      y.style.display ="none";
      x.style.display = "none";
      t.style,display = "none";
      console.log("Education");
    }
    if (selector=="Auditing") {
      y.style.display ="none";
      z.style.display = "none";
      x.style,display = "none";
    }
    else{
      x.style.display ="none";
      z.style.display="none";
      t.style.display="none";
    }
    
}
      </script>
      <script>
        filterSelection("All")
       
        function filterSelection(c) {
          var x, i;
          
          x = document.getElementsByClassName("posts");
          if (c == "All") c = "";
          for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
          }
        }
        
        function w3AddClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
          }
        }
        
        function w3RemoveClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
              arr1.splice(arr1.indexOf(arr2[i]), 1);     
            }
          }
          element.className = arr1.join(" ");
        }
        
        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("filterr");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("activee");
            current[0].className = current[0].className.replace(" activee", "");
            this.className += " activee";
          });
        }
        function show_selected() {
    var selector = document.getElementById('industry');
    var value = selector[selector.selectedIndex].value;
    var x = document.getElementById('Technology');
    var y = document.getElementById('')
    if (value=="Technology") {
      x.style.display="";
    }
    else{
      console.log("nothing");
    }
}
document.getElementById('btn').addEventListener('click', show_selected);
        </script>
</div>

  
<div id="Internships" class="intern">
    <div class="posts postss">
            <p class="posttitle"><?php echo $row2['Jobtitle'] ?></p>
            <img class="postimg" src="img/undraw_responsive_6c8s.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts postss">
            <p class="posttitle">Remote accountant at <br> Urumuri Ltd.</p>
            <img class="postimg" src="img/undraw_wallet_aym5.svg">
            <p class="type">Part-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts postss">
            <p class="posttitle">Jobs at Mass Design</p>
            <img class="postimg" src="img/undraw_QA_engineers_dg5p.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts postss">
            <p class="posttitle">Students Affair Manager<br>at ALU Rwanda</p>
            <img class="postimg" src="img/undraw_candidate_ubwv.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts postss">
            <p class="posttitle">Remote accountant at <br> H&B Holdings</p>
            <img class="postimg" src="img/undraw_working_late_pukg.svg">
            <p class="type">Full-time</p>
            <p class="due">Deadline:29 Jan 2020</p>
        </div>
        <div class="posts postss">
            <p class="posttitle">Part-time jobs at<br> Kigalitoday</p>
            <img class="postimg" src="img/undraw_online_media_62jb.svg">
            <p class="type">Part-time</p>
            <p class="due">Deadline:6 Nov 2020</p>
        </div>
</div>
<div id="Resources">
    <!-- filters all related to type of the job -->
   
    <div class="box">
      <p class="coursename">Course 1</p>
      <p class="coursedesc">A solid background in microeconomics is useful for anyone who wants a better understanding of many important economic issues and problems. How do people decide whether and when to purchase a new laptop computer or cellular phone? 
        How do firms decide whether to hire new employees, or to lay off some of their existing employees?</p>
        <button class="btnw">Enroll</button>
    </div>
    <div class="box">
    <p class="coursename">Course 1</p>
      <p class="coursedesc">A solid background in microeconomics is useful for anyone who wants a better understanding of many important economic issues and problems. How do people decide whether and when to purchase a new laptop computer or cellular phone? 
        How do firms decide whether to hire new employees, or to lay off some of their existing employees?</p>
        <button class="btnw">Enroll</button>
    </div>
    <div class="box">
    <p class="coursename">Course 1</p>
      <p class="coursedesc">A solid background in microeconomics is useful for anyone who wants a better understanding of many important economic issues and problems. How do people decide whether and when to purchase a new laptop computer or cellular phone? 
        How do firms decide whether to hire new employees, or to lay off some of their existing employees?</p>
        <button class="btnw">Enroll</button>
    </div>
    <div class="box">
    <p class="coursename">Course 1</p>
      <p class="coursedesc">A solid background in microeconomics is useful for anyone who wants a better understanding of many important economic issues and problems. How do people decide whether and when to purchase a new laptop computer or cellular phone? 
        How do firms decide whether to hire new employees, or to lay off some of their existing employees?</p>
        <button class="btnw">Enroll</button>
    </div>
    <div class="box">
    <p class="coursename">Course 1</p>
      <p class="coursedesc">A solid background in microeconomics is useful for anyone who wants a better understanding of many important economic issues and problems. How do people decide whether and when to purchase a new laptop computer or cellular phone? 
        How do firms decide whether to hire new employees, or to lay off some of their existing employees?</p>
        <button class="btnw">Enroll</button>
    </div>
    <div class="box">
    <p class="coursename">Course 1</p>
      <p class="coursedesc">A solid background in microeconomics is useful for anyone who wants a better understanding of many important economic issues and problems. How do people decide whether and when to purchase a new laptop computer or cellular phone? 
        How do firms decide whether to hire new employees, or to lay off some of their existing employees?</p>
        <button class="btnw">Enroll</button>
    </div>
</div>
</body>
</html>
 