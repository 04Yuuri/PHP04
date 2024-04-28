<?php
//1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];
$hearing = $_POST["hearing"];
$naiyou = $_POST["naiyou"];



//2. DB接続します
//*** function化する！  *****************
include("funcs.php"); //まず、include関数でfuncs.phpを読み込む.
$pdo = db_conn();


//３．データ登録SQL作成
$sql="INSERT INTO `gs_an_table`(`name`, `email`, `age`, `hearing`, `naiyou`, `indate`) VALUES(:name,:email,:age,:hearing,:naiyou,sysdate());";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':name',  $name ,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':hearing', $hearing, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
?>
