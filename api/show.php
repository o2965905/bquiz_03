<!-- 處理顯示/隱藏的程式碼 -->
<?php
include_once "../base.php";

//找出要修改顯示狀態的資料
$row=$Movie->find($_POST['id']);

if($row['sh']==1){
    $row['sh']=0;
}else{
    $row['sh']=1;
}

//精簡寫法 -> 一行程式碼完成
// $row['sh']=($row['sh']==1)?0:1;


$Movie->save($row);

?>