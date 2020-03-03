<?php



$db = mysqli_connect('localhost', 'HABUWITEKA', '17170', 'talentmatch');
$query="SELECT * FROM jobsposting";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_assoc($result);
$id=$row[ID];
$del = "DELETE from jobsposting WHERE ID=$id";
$delete = mysqli_query($db, $del);
$deletefunction = mysqli_fetch_assoc($delete);

if (mysqli_fetch_assoc($deletefunction)) {
 	header("location:dashboard1.php");
 } 
 else{
 	header("location:dashboard1.php");
 }


?>