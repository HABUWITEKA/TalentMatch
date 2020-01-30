<?php
   if(isset($_FILES['Resume'])){
      $errors= array();
      $file_name = $_FILES['Resume']['name'];
      $file_size = $_FILES['Resume']['size'];
      $file_tmp = $_FILES['Resume']['tmp_name'];
      $file_type = $_FILES['Resume']['type'];
   }
?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "Resume" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['Resume']['name'];  ?>
            <li>File size: <?php echo $_FILES['Resume']['size'];  ?>
            <li>File type: <?php echo $_FILES['Resume']['type'] ?>
         </ul>
			
      </form>
      
   </body>
</html>
