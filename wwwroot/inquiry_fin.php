<?php
  //inquiry_fin.php
  //
  ob_start();
  session_start();

  //
  require_once(__DIR__.'/dbh.php');
  //var_dump(__DIR__.'/dbh.php')

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
    //var_dump($input_data);

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

    //CSRFチェック
    //tokenの存在確認
    $posted_token = $_POST['csrf_token'];
    if(false === isset($_SESSION['csrf_token'][$posted_token])){
      //
      $error_detail['error_csrf_token'] = true;
    }else {
      //tokenの寿命確認
      $ttl = $_SESSION['csrf_token'][$posted_token];
      if(time() >= $ttl + 60){
        $error_detail['error_csrf_timeover'] = true;
      }
      //いずれにしてもtokenは一回しか使えないので
      unset($_SESSION['csrf_token']['$posted_token']);
    }

    //tokenの寿命確認



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
        //エラー内容をセッションに保持する
        $_SESSION['buffer']['error_detail'] = $error_detail;
        //入力情報をセッションに保持する
        $_SESSION['buffer']['input'] = $input_data;
  //var_dump($error_detail);
        //echo 'error';
        //入力ページに突きかえす
    header('Location: ./inquiry.php');
        exit();
    }
  //ダミー
    echo 'データのvalidate  ok';

  //DBにinsert

  //DBハンドルを取得
  $dbh = get_dbh();
  //var_dump($dbh);

  //SQL文を作成
  $sql = 'INSERT INTO inquirys(email, inquiry_body, name, birthday) VALUES(:email, :inquiry_body, :name, :birthday);';
  $pre = $dbh->prepare($sql);
  var_dump($pre);
  //プレースホルダーにデータをバインド
  $pre->bindValue(':email', $input_data['email']);
  $pre->bindValue(':inquiry_body', $input_data['body']);
  $pre->bindValue(':birthday', $input_data['birthday']);
  $pre->bindValue(':name', $input_data['name']);
  //SQL実行
  $r = $pre->execute();
  var_dump($r);
  if(false === $r){
    //
    echo 'すみませんデータが取得できません';
    exit;
  }
  //[Thank you for Contact] pageの出力
