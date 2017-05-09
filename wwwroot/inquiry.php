<?php
  //inquiry.php
  //
  ob_start();
  session_start();

  //確認
  var_dump($_SESSION);

  //入力内容を取得
  //$input = $_SESSION['buffer']['input'] ?? [];//PHP 7.0以降はこちら
  if(true === isset($_SESSION['buffer']['input'])){
    $input = $_SESSION['buffer']['input'];
  }else{
    $input = array();
  }

  //エラー内容を取得
  //$error_detail = $_SESSION['buffer']['error_detail'];
  if(true === isset($_SESSION['buffer']['error_detail'])){
    $error_detail = $_SESSION['buffer']['error_detail'];
  }else{
    $error_detail = array();
  }

  //xss対策関数
  function h($s){
    return htmlspecialchars($s,ENT_QUOTES);
  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php
        if(0 < count($error_detail)){
          echo '<div>error</div>';
        }
      ?>

      <?php
        //error_must_email
        if(isset($error_detail['error_must_email'])){
          echo '<div style="color:red;">Enter mail</div>';
        }
      ?>
     <form action="./inquiry_fin.php" method="post">
       Email     : <input type="text" name="email" value="<?php echo h((string)@$input['email']);?>"><br>
       Name      : <input type="text" name="name" value="<?php echo h((string)@$input['name']);?>"><br>
       Birthday  : <input type="text" name="birthday" value="<?php echo h((string)@$input['birthday']);?>"><br>
       Comment   : <textarea name="body" rows="8" cols="80"><<?php echo h((string)@$input['textarea']);?>/textarea><br>
       <button type="submit" name="button">Contact</button>
     </form>
   </body>
 </html>
