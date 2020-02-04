<?php include('server2.php') ;
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pleased to have you!</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main2.css'>
</head>
<body>
   <!-- talentmatch logo -->
   <a href="index.php"><img src="img/talent.png" class="logoo"></a>

   <!-- Register form addon -->
   <div id="firstt">
   <p class="title">Register Form</p>
    <div class="line"></div>
</div>

<div class="reg1">
    <div class="circle1 circle11">1</div>
    <p id="stepp1">Company Details</p>
</div>


<form action="" class="forrm">
    <!-- Persona details -->
    <label for="">Company name</label><br>
    <input type="text" name="companyname"><br>
    <div id="lastname">
    <label for="">Location</label><br>
    <input type="text" name="location"><br>
</div><br><br>
<label for="">E-mail</label><br>
<input type="email" name="email"><br>
<div id="telephone">
<label for="">Telephone</label><br>
<input type="tel" name="telephone"><br>
</div><br><br>
<label for="">Password</label><br>
<input type="password" name="password"><br>
<div id="cpassword">
<label>Confirm Password</label><br>
<input type="password" name="confirmedpassword"><br>
<input type="file" id="file-upload" accept="application/pdf" name="companylogo" enctype="multipart/form-data" required ><br>
  <label for="file-upload">
      <div class="file-upload" style="left:-400px;position: absolute;">
          <img class="imgupld" src="img/file-upload-svgrepo-com.svg"><p id="textt">Upload company bio</p>
      </div>
  </label>
  <div id="file-upload-filename" onload="document.innerHTML(fileName)"></div><br><br><br>
  <input type="submit" class="submit2" name="submitcompany">
</form>
<div id="copyrightss" class="posts" style="display: block; left: -300px;position:absolute" >
    <p id="copy">Copyrights <a target="_blank" href="http://talentmatch.rw/">TalentMatch.inc</a></p>
</div>
    </body>
    </html>