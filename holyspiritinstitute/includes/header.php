<?php
require_once __DIR__.'/functions.php';
$schoolName=school_setting($pdo,'school_name','Holy Spirit Institute');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($pageTitle??$schoolName)?> · <?=e($schoolName)?></title>
<link rel="stylesheet" href="<?=e($base??'')?>assets/css/style.css">
<script defer src="<?=e($base??'')?>assets/js/app.js"></script>
</head>
<body>
<header class="topbar">
<a class="brand" href="<?=e($base??'')?>index.php"><?=e($schoolName)?></a>
<nav><a href="<?=e($base??'')?>index.php">Home</a><?php if(isset($_SESSION['user'])):?><a href="<?=e($base??'')?>logout.php">Logout</a><?php else:?><a href="<?=e($base??'')?>login.php">Login</a><?php endif;?></nav>
</header>
<main class="page">
