<?php
session_start();
//0.外部ファイル読み込み
include("functions.php");
chk_ssid();

//1.  DB接続します
$pdo = db_con();

//２．データ呼出SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="bm_contents_level2.2.php?id='.$result["id"].'">';
    $view .= h($result["book_name"])."[".h($result["registered_date"])."]";
    $view .= '</a>　';
    $view .= '<a href="bm_update_view.php?id='.$result["id"].'">';
    $view .= '[更新]';
    $view .= '</a>  ';
    $view .= '<a href="bm_delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理ポータル</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <?php echo $_SESSION["name"]; ?>さんこんにちは。
      <?php if($_SESSION["kanri_flg"]==1){ ?>
      <a class="navbar-brand" href="bm_insert_view.php">データ登録</a>
      <?php } ?>
      <a class="navbar-brand" href="bm_logout.php">ログアウト</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
