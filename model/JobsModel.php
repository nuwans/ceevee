<?php
include "../controlers/Jobs.php";

if(isset($_REQUEST['actionType'])){
 
 if(!isset($_SESSION))  { 
        session_start(); 

    } 

$db=($_SESSION['db']);

$actionType = $_REQUEST['actionType'];
if($actionType=='view'){
$m = new Jobs();
$m->ViewJobs();

}
else if($actionType=='insert'){
$pos=$_REQUEST['pos'];
$ind=$_REQUEST['ind'];
$coun=$_REQUEST['coun'];
$sal=$_REQUEST['sal'];
$user=$_REQUEST['user'];
$over=$_REQUEST['over'];
$comp=$_REQUEST['comp'];
echo $pos+$ind+$coun+$sal+$over;
$jobsModel = new Jobs();
$jobsModel->InsertJobs($pos,$ind,$coun,$sal,$over,$user,$comp,$db);
}
else if($actionType=='search'){
$pos=$_REQUEST['pos'];
 
$ind=$_REQUEST['ind'];
$coun=$_REQUEST['coun'];
$sal=$_REQUEST['sal'];
$comp=$_REQUEST['comp'];

//echo $pos;
//echo $ind;echo $coun;
//echo $sal;
//echo $pos+$ind+$coun+$sal;
$jobsModel = new Jobs();
$jobsModel->SearchJobs($pos,$ind,$coun,$sal,$comp);
}
else if($actionType=='OneJob'){
$id=$_REQUEST['id'];
$jobsModel = new Jobs();
$jobsModel->ShowOneJob($id);
}
else if($actionType=='update'){
$id=null;
$id=$_REQUEST['id'];
$pos=$_REQUEST['pos'];
$ind=$_REQUEST['ind'];
$coun=$_REQUEST['coun'];
$sal=$_REQUEST['sal'];
$over=$_REQUEST['over'];

/*echo $id;
echo $pos;
echo $ind;
echo $coun;
echo $sal;
echo $over;
*/$jobsModel = new Jobs();
$jobsModel->UpdateJob($id,$pos,$ind,$coun,$sal,$over,$db);
}
else if($actionType=='delete'){
$id=$_REQUEST['id'];
echo $id;
$jobsModel = new Jobs();
$jobsModel->DeleteJob($id,$db);
}




}

?>