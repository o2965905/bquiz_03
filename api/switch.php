<!-- 處理交換排序值的程式碼 -->
<?php
include_once "../base.php";

//透過post傳過來的table值來建立資料表物件
$table=$_POST['table'];
$DB=new DB($table);

//根據post進來的id陣列分別取得兩筆資料
$ids=$_POST['id'];
$row0=$DB->find($ids[0]);
$row1=$DB->find($ids[1]);

//使用交換變數值機制交換兩筆資料的rank值
$tmp=$row0['rank'];
$row0['rank']=$row1['rank'];
$row1['rank']=$tmp;


//將交換完rank值的兩筆資料各自存回資料表
$DB->save($row0);
$DB->save($row1);


?>