<!-- 處理刪除的程式碼 -->
<?php
include_once "../base.php";


$table=$_POST['table'];
$DB=new DB($table);

$DB->del($_POST['id']);

//最精簡的寫法 -> 一行程式碼解決
// (new DB($_POST['table']))->del($_POST['id']);
?>