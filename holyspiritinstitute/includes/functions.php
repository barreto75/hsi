<?php
require_once __DIR__.'/auth.php';
function audit(PDO $pdo,string $action,string $description):void{try{$s=$pdo->prepare("INSERT INTO audit_logs(user_id,action,description,ip_address) VALUES(?,?,?,?)");$s->execute([$_SESSION['user']['id']??null,$action,$description,$_SERVER['REMOTE_ADDR']??null]);}catch(Throwable $e){error_log($e->getMessage());}}
function school_setting(PDO $pdo,string $key,string $default=''):string{$s=$pdo->prepare("SELECT setting_value FROM school_settings WHERE setting_key=?");$s->execute([$key]);return (string)($s->fetchColumn()??$default);}
function metric(PDO $pdo,string $sql,array $params=[]):string{$s=$pdo->prepare($sql);$s->execute($params);return (string)$s->fetchColumn();}
function json_response(bool $success,string $message='',array $data=[]):never{header('Content-Type: application/json');echo json_encode(['success'=>$success,'message'=>$message,'data'=>$data]);exit;}
?>