<!-- 撰寫海報的編輯片名/顯示/刪除/動畫等功能 -->
<?php
include_once "../base.php";

foreach($_POST['id'] as $key => $id){

    //判斷是否有資料要刪除的
     if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        
        $Poster->del($id);//刪除指定id的資料

    }else{
        //如果不是刪除,就是要編輯該筆資料
        $row=$Poster->find($id);
        $row['name']=$_POST['name'][$key];
        $row['ani']=$_POST['ani'][$key];


        //判斷$_POST['sh']陣列中是否有指定id的值，
        //有則表示要設定為顯示 1
        //無則表示要設定為隱藏 0
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;



        $Poster->save($row);
    }
}


to("../back.php?do=poster");
?>