<?php
  //header_test.php_check_syntax

  //headerを出力するのでバッファリングob_startを使用
  //header使うばいいはおb
  ob_start();

  //少し待つ
  sleep(5);

  //余計な出力
  echo 'test';

  //移動させる
  header('Location:http://google.com');
 ?>
