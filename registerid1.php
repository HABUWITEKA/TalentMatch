<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pleased to welcome you</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main2.css'>
    
</head>
<body>
   <!-- talentmatch logo -->
   <img src="img/talent.png" class="logoo">
   <!-- Register form addon -->
   <div id="firstt">
   <p class="title">Register Form</p>
    <div class="line"></div>
</div>

<div class="reg1">
    <div class="circle1 circle11">1</div>
    <p id="stepp1">Personal Details</p>
</div>


<form method="post" action="registerid1.php" class="forrm" enctype="multipart/form-data">
    <!-- Persona details -->
    <label for="">First name</label><br>
    <input name="firstname" type="text" required><br>
    <div id="lastname">
    <label for="">Last Name</label><br>
    <input name="lastname" type="text" required><br>
</div><br><br>
<label for="">E-mail</label><br>
<input name="email" type="email" required><br>
<div id="telephone">
<label for="">Telephone</label><br>
<input name="telephone" type="tel" required><br>
</div><br><br>
<label for="">Password</label><br>
<input name="password" type="password" required><br>
<div id="cpassword">
<label>Confirm Password</label><br>
<input name="confirmpassword" type="password" required></div><br><br>
<!-- Academic details -->
<div class="reg1">
    <div class="circle1 circle11">2</div>
    <p id="stepp1">Academic Details</p>
</div><br><br>
<section id="academia">
<label>Current University</label><br>
<input name="currentuniv" type="text" required>
<div id="degree">
<label>Degree</label><br>
<input name="degree" type="text">

</div><br><br>
<label>Graduation Year</label><br>
<input name="graduation" type="month" required><br><br>
</section>
<div class="reg1">
    <div class="circle1 circle11">3</div>
    <p id="stepp1">Resume Upload</p>
</div><br>
<input name="Resume" type="file" id="file-upload" accept="application/pdf" required>
  <label for="file-upload">
      <div class="file-upload"> 
          
          <img class="imgupld" src="img/file-upload-svgrepo-com.svg"><p id="textt">Select your Resume</p>
      </div>
  </label>
  <div id="file-upload-filename" onload="document.innerHTML(fileName)"></div><br><br>
  <input name="submit" type="submit">
</form>
<div id="copyrightss" class="posts" style="top:870px;position:absolute;left:392px;" >
    <p id="copy">Copyrights <a target="_blank" href="http://talentmatch.rw/">TalentMatch.inc</a></p>
</div>
    </body>
    </html>