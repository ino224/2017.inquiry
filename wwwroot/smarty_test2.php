<?php
//smarty_test.php

//smartyのinclude
require_once(__DIR__.'vendor/smarty_3.1.30/libs/Smarty.class.php');

//smartyの初期設定
$smarty_obj = new Smarty();
//var_dump($smarty_obj);
$smarty_obj->setTemplateDir(__DIR__'/../smarty_templates/');

$smarty_obj->setCompileDir(__DIR__'/../smarty_templates_c/');
//smartyへのデータの入力
$s = 'データの入力テスト';
$smarty_obj->assign('val',$s);

//テンプレートを指定して出力
$smarty_obj->display('smarty_test_tpl');

//確認用
echo 'ok';
