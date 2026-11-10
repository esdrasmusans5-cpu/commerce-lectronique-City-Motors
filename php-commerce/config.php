<?php
declare(strict_types=1);
session_start();
const DB_HOST='127.0.0.1'; const DB_NAME='city_motors'; const DB_USER='root'; const DB_PASS='';
function db(): PDO { static $p=null; if($p) return $p; $p=new PDO('mysql:host='.(getenv('DB_HOST')?:DB_HOST).';dbname='.(getenv('DB_NAME')?:DB_NAME).';charset=utf8mb4',getenv('DB_USER')?:DB_USER,getenv('DB_PASS')?:DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); return $p; }
function out(array $a,int $s=200): never { http_response_code($s); header('Content-Type: application/json; charset=utf-8'); header('X-Content-Type-Options: nosniff'); echo json_encode($a,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); exit; }
function token(): string { return $_SESSION['csrf']??=bin2hex(random_bytes(32)); }
function check_token(): void { if(!hash_equals(token(),(string)($_SERVER['HTTP_X_CSRF_TOKEN']??''))) out(['error'=>'Session expirée. Rechargez la page.'],419); }
function h(?string $s): string { return htmlspecialchars($s??'',ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8'); }
function admin(): bool { return isset($_SESSION['admin_id']); }
