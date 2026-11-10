<?php
declare(strict_types=1); require __DIR__.'/config.php';
$a=$_GET['action']??'';
if($_SERVER['REQUEST_METHOD']==='GET' && $a==='products'){
$q=trim((string)($_GET['q']??''));$cat=trim((string)($_GET['category']??''));$sql="SELECT id,sku,name,category,brand,standard_code,bore_mm,outer_mm,width_mm,material,price,stock,image_url,description FROM products WHERE active=1";$p=[];
if($q!==''){$sql.=" AND (sku LIKE ? OR name LIKE ? OR category LIKE ? OR brand LIKE ? OR standard_code LIKE ?)";$v="%$q%";$p=[$v,$v,$v,$v,$v];}
if($cat!==''){$sql.=" AND category=?";$p[]=$cat;}
$sql.=" ORDER BY name";$s=db()->prepare($sql);$s->execute($p);out(['products'=>$s->fetchAll()]);
}
if($_SERVER['REQUEST_METHOD']==='POST' && $a==='quote'){
check_token();$d=json_decode(file_get_contents('php://input'),true)??[];$name=trim((string)($d['name']??''));$email=filter_var(trim((string)($d['email']??'')),FILTER_VALIDATE_EMAIL);$phone=trim((string)($d['phone']??''));$company=trim((string)($d['company']??''));$message=trim((string)($d['message']??''));$items=$d['items']??[];
if(!$name||!$email||!is_array($items)||!$items||count($items)>30)out(['error'=>'Nom, e-mail et au moins un article sont requis.'],422);
$pdo=db();$pdo->beginTransaction();try{$ref='DEV-'.date('Ymd').'-'.strtoupper(bin2hex(random_bytes(3)));$s=$pdo->prepare("INSERT INTO quotes(quote_ref,customer_name,email,phone,company,message) VALUES(?,?,?,?,?,?)");$s->execute([$ref,$name,$email,$phone,$company,$message]);$qid=(int)$pdo->lastInsertId();$find=$pdo->prepare("SELECT id,sku,name FROM products WHERE id=? AND active=1");$ins=$pdo->prepare("INSERT INTO quote_items(quote_id,product_id,sku,product_name,quantity) VALUES(?,?,?,?,?)");foreach($items as $i){$find->execute([(int)($i['id']??0)]);$x=$find->fetch();$qty=(int)($i['qty']??0);if(!$x||$qty<1||$qty>10000)throw new DomainException('Article ou quantité invalide.');$ins->execute([$qid,$x['id'],$x['sku'],$x['name'],$qty]);}$pdo->commit();out(['success'=>true,'reference'=>$ref,'message'=>'Demande de devis transmise.']);}catch(Throwable $e){$pdo->rollBack();out(['error'=>$e instanceof DomainException?$e->getMessage():'Erreur lors de la demande.'],422);}
}
if($_SERVER['REQUEST_METHOD']==='GET' && $a==='track'){$ref=trim((string)($_GET['reference']??''));$s=db()->prepare("SELECT order_ref,status,created_at,total FROM orders WHERE order_ref=?");$s->execute([$ref]);$x=$s->fetch();if(!$x)out(['error'=>'Commande introuvable.'],404);out(['order'=>$x]);}
out(['error'=>'Action inconnue.'],404);
