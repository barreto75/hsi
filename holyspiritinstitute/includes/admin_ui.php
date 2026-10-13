<?php
require_once __DIR__.'/functions.php';
require_role('admin');
function admin_layout(string $title,string $subtitle=''): void {
 global $base; $pageTitle=$title; require __DIR__.'/header.php';
 echo '<div class="layout">'; require __DIR__.'/sidebar.php'; echo '<section class="content">';
 echo '<div class="content-head"><div><h1>'.e($title).'</h1><p>'.e($subtitle).'</p></div>';
}
function admin_end(): void { echo '</section></div>'; require __DIR__.'/footer.php'; }
function flash(): void {
 if(isset($_GET['ok'])) echo '<div class="alert success">'.e($_GET['ok']).'</div>';
 if(isset($_GET['err'])) echo '<div class="alert error">'.e($_GET['err']).'</div>';
}
function go(string $url,string $msg=''): void { header('Location: '.$url.($msg?'?ok='.urlencode($msg):'')); exit; }
