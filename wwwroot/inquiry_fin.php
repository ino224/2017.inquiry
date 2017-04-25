<?php
  //inquiry_fin.php

  //入力された情報を取得
  //var_dump($_POST);　//postの中に情報が格納されている
  //$email = $_POST['email'];
  $params = array(
    'email', 'name', 'birthday', 'body',
  );
    $input_data = array();
    foreach ($params as $p) {
        $input_data[$p] = (string) @$_POST[$p]; //空文字対策
    }
    var_dump($input_data);

  //Validation(情報は正しいか)
    $error_detail = array();//error情報格納用変数
    //必須チェック
    $must_params = array('email', 'body');
    foreach ($must_params as $p) {
        if ('' === $input_data[$p]) {
            //error処理
        $error_detail["error_must_{$p}"] = true;
        }
    }

    //型チェック　email
    // xxx RFC非準拠のメアドは知らん！！
    if(false === filter_var($input_data['email'],FILTER_VALIDATE_EMAIL)){
      //error処理
      $error_detail["error_format_email"] = true;
    }

    //型チェック　日付
    if('' !== $input_data['birthday']){
      if(false === strtotime($input_data['birthday'])){
        //error処理
        $error_detail["error_format_birthday"] = true;
    }
  }
  //error判定
    if (array() != $error_detail) {
        //
    echo 'error';
        exit();
    }
  //ダミー
    echo 'データのvalidate  ok';

  //DBにinsert

  //[Thank you for Contact] pageの出力
