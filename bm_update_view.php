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
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_select_level2.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新する書籍</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$rs["book_name"]?>"></label><br>
     <label>URL：<input type="text" name="url" value="<?=$rs["book_URL"]?>"></label><br>
     <label>簡易紹介：</label><br>
     <label><textArea name="comment" rows="4" cols="40"><?=$rs["book_comment"]?></textArea></label><br>
     <label>詳細紹介：</label><br>
     <label><textArea name="detail" rows="4" cols="40"><?=$rs["book_detail"]?></textArea></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$rs["id"]?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
