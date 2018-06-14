<?php
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["url"]) || $_POST["url"]=="" ||
  !isset($_POST["comment"]) || $_POST["comment"]=="" ||
  !isset($_POST["detail"]) || $_POST["detail"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$url    = $_POST["url"];
$comment = $_POST["comment"];
$detail = $_POST["detail"];

//2. DB接続します(エラー処理追加)
include("functions.php");
$pdo = db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET book_name=:a1, book_URL=:a2, book_comment=:a3, book_detail=:a4 WHERE id=:id");
$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $url);
$stmt->bindValue(':a3', $comment);
$stmt->bindValue(':a4', $detail);
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  //５．ポータルへリダイレクト
  header("Location: bm_select_level2.php");
  exit;
}
?>

