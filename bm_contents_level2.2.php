<?php
$id = $_GET["id"];

//1.  DB接続します
include("functions.php");
$pdo = db_con();

//２．データ呼出SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table where id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  errorMsg($stmt);
}else{
    $rs = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ紹介</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
　　<nav class="navbar navbar-default">
     <a class="navbar-brand" href="bm_logout.php">ログアウト</a>
   </nav>
    <div class="container-fluid">
      <div class="navbar-header">
      
      </div>
      
    </div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div><a class="navbar-brand" href="bm_select_level2.php">書籍一覧</a></div>
<form method="" action="">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍の内容</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$rs["book_name"]?>"></label><br>
     <label>URL：<input type="text" name="url" value="<?=$rs["book_URL"]?>"></label><br>
     <label>簡易紹介：</label><br>
     <label><textArea name="comment" rows="4" cols="40"><?=$rs["book_comment"]?></textArea></label><br>
     <label>詳細紹介：</label><br>
     <label><textArea name="detail" rows="4" cols="40"><?=$rs["book_detail"]?></textArea></label><br>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>
