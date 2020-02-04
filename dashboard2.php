<?php 
include('server2.php');
$email=$_SESSION['email'];
$dbconnect=mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');
$query = mysqli_query($dbconnect, "SELECT * FROM comapnyusers where email='$email'");
$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['companyname']."'s". " "."Dashboard";  ?></title>
    <link rel="stylesheet" href="css/main3.css">
    <link rel="stylesheet" href="css/main4.css">
    <script type="text/javascript" src="js/java.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<title></title>
</head>
<body>
<header id="header">
    <img src="img/talent.png" class="logo">
    <img src="" id="smallpp">
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
</body>
</html>