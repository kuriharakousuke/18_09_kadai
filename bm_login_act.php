<?php
//最初にSESSIONを開始！！
session_start();

//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//2-1. データ呼出SQL作成　管理者
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND kanri_flg=1");
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

//2-2. データ呼出SQL作成　非管理者
$stmt1 = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND kanri_flg=0");
$stmt1->bindValue(':lid', $lid);
$stmt1->bindValue(':lpw', $lpw);
$res1 = $stmt1->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
  queryError($stmt);
}
if($res1==false){
  queryError($stmt);
}

//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法
$val1 = $stmt1->fetch();

//5. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: bm_select_level2.php");
}else if($val1["id"] != ""){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val1['kanri_flg'];
  $_SESSION["name"]      = $val1['name'];
  header("Location: bm_select_level1.php");
}else{
  //logout処理を経由して全画面へ
  header("Location: bm_logout.php");
}

exit();
?>

