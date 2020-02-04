<?php include('server2.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - TalentMatch</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main2.css'>

</head>
<body>
    <!-- talentmatch logo -->
   <img src="img/talent.png" class="logoo">
   <!-- Register form addon -->
   <div id="firstt">
   <p class="title" style="padding-left: 620px;">Login</p>
    <div class="line"></div>
</div>
<form style="left:205px;position: absolute;;top: 190px;" method=post action=loginid2.php>
    <label for="">E-mail</label><br>
    <input type="email" name="email"><br><br>
    <label for="">Password</label><br>
    <input type="password" name="password"><br>
    <input type="submit" style="width: 250px;left:24px;position: absolute;top:140px;" value="Login" name="logincompany">

</form>
<p id="alt">I have no account,<a href="registercompany.php">Register</a></p>
<div id="copyrightss" class="posts" style="display: block; left: 410px;position:absolute;top:625px" >
    <p id="copy">Copyrights <a target="_blank" href="http://talentmatch.rw/">TalentMatch.inc</a></p>
</div>
</body>
</html>