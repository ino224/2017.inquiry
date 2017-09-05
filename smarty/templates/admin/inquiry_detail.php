<?php

//inquiry_detail.php
require_once(__DIR__.'/init_auth.php');

//
//$inquiry_id = (string)@$_GET['inquiry_id'];
//テンプレートを指定して出力
error_reporting(E_ALL & ~E_NOTICE);
$smarty_obj->display('admin/inquiry_detail.tpl');
