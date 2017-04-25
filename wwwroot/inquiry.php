<?php
  //inquiry.php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form action="./inquiry_fin.php" method="post">
       Email     : <input type="text" name="email" value=""><br>
       Name      : <input type="text" name="name" value=""><br>
       Birthday  : <input type="text" name="birthday" value=""><br>
       Comment   : <textarea name="body" rows="8" cols="80"></textarea><br>
       <button type="submit" name="button">Contact</button>
     </form>
   </body>
 </html>
