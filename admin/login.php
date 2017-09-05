<?php

//login.php

/*
認証を行う
*/
ob_start();

//
reqquire_once(__DIR__ . '../dbh.php');

//画面入力のIDとパスワードを取得
$id = (string)@$_POST['id'];
$pw = (string)@$_POST['pw'];
//filter_input
//$id = (string)$_POST['id'] ?? '';
//var_dump($id,$pw); exit;

//db内のID Passwordを取得
//DBハンドルを取得
$dbh = get_dbh();

//SELECt発行して

//プリペアドステートメント
$sql = 'SELECT *from admin_users where admin_users_id=admin_users_id';
$pre = $dbh->prepare($sql);
//バインド
$pre->bindValue(':admin_users_id', $id);
//実行
$r = $pre->execute();
if(false === $r){
//エラー処理
  exit;
}
//var_dump($dbh); exit;

//IDとパスワードを比較して、認証がオKなら

//ログイン後の管理画面TopPageに遷移
header('Location: ./top.php');
//
