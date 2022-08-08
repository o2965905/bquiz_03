<!-- 新增院線片的功能 -->
<?php 
include_once "../base.php";

if(isset($_FILES['trailer']['tmp_name'])){
    $_POST['trailer']=$_FILES['trailer']['name'];
    move_uploaded_file($_FILES['trailer']['tmp_name'],'../upload/'.$_FILES['trailer']['name']);
}
if(isset($_FILES['poster']['tmp_name'])){

    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],'../upload/'.$_FILES['poster']['name']);
}

//把三個日期資料以符號'-'連成一個日期字串
$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];

//完成日期字串後，再把三個日期變數從$_POST陣列中刪除，
//目的是確保$_POST陣列中的資料符合資料表的欄位
unset($_POST['year'],$_POST['month'],$_POST['day']);

//預設的排序值為資料的id值，因此使用函式去計算目前的最大id值
//藉此來計算最大的排序值
$_POST['sh']=1;
$_POST['rank']=$Movie->math('max','id')+1;

$Movie->save($_POST);

to("../back.php?do=movie");
?> 