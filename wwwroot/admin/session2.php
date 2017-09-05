<?php
//admin/session1.php
ob_start();
session_start(); //session開始

//乱数を表示
var_dump($_SESSION['rand']);//表示
