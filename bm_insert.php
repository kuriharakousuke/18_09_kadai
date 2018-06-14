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
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$name = $_POST["name"];
$url = $_POST["url"];
$comment = $_POST["comment"];
$detail = $_POST["detail"];


//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('dbError:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql="INSERT INTO gs_bm_table(id,book_name,book_URL,book_comment,book_detail,registered_date) values(null, :a1, :a2, :a3, :a4, sysdate())";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR); 
$stmt->bindValue(':a2', $url, PDO::PARAM_STR); 
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR); 
$stmt->bindValue(':a4', $detail, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("sqlError:".$error[2]);
}else{
  //５．ポータルへリダイレクト
 header("location: bm_select_level2.php");

}
?>
