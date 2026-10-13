<?php
require_once __DIR__.'/session.php'; require_once __DIR__.'/../config/database.php';
function require_login():void{if(empty($_SESSION['user'])){header('Location: ../login.php');exit;}}
function require_role(string ...$roles):void{require_login();if(!in_array($_SESSION['user']['role']??'',$roles,true)){http_response_code(403);exit('Access denied.');}}
function e(?string $v):string{return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function csrf_token():string{if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function verify_csrf(?string $t):void{if(!$t||empty($_SESSION['csrf'])||!hash_equals($_SESSION['csrf'],$t)){http_response_code(419);exit('Invalid request token.');}}
?>