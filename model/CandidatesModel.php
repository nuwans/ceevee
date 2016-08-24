<?php
include "../controlers/Candidates.php";
if(!isset($_SESSION))  { 
        session_start(); 

    } 

$db=($_SESSION['db']);

if(isset($_REQUEST['actionType'])){
$actionType = $_REQUEST['actionType'];
//echo $actionType;
if($actionType=='view'){
$m = new Candidates();
$m->ViewCandidates();
}//view candidates

else if($actionType=='insert'){
$candidatesClass = new Candidates();
		

       $a = $_REQUEST["c_f_name"];  
       $b = $_REQUEST["c_l_name"];
       $c = $_REQUEST["c_b_day"];
       $d = $_REQUEST["c_gender"];
       $nic=$_REQUEST["c_l_nic"];
       $e = $_REQUEST["c_marital"];
       $f = $_REQUEST["c_mobile"];
       $g = $_REQUEST["c_email"];
       $h = $_REQUEST["rc_ind"];
       $i = $_REQUEST["rc_pro"];
       $j = $_REQUEST["rc_ed_type"];
       $k = $_REQUEST["rc_ex_per"];
       $l = $_REQUEST["rc_jb_pre"];
       
       $m = $_REQUEST["rc_co_pre"];
       $n = $_REQUEST["rc_sal_exp"];
       $o = $_REQUEST["rc_status"];
       $img=$_REQUEST['imageurl'];
       $p=$_REQUEST['c_l_natio'];
       $q=$_REQUEST['c_l_passport'];
       $r=$_REQUEST['added_by'];
       $s = $_REQUEST["rc_jb_pre2"];

       /*if(($a == "" ) || ($b == '') || ($c == '') || ($d == '') || ($e == '') || ($f == '') || ($g == '') || ($h == '') || ($i == '') 
            || ($j == '') || ($k == '') || ($l == '') ||($m == '') ||($n == '') ||($o == '') || ($p == '') || ($q == '' ) || ($r == '' )  ){
            //echo $p;
           // header("Location: ../home.php?rs=empty#add");
            e
            
            }*/
       
      // echo $img;
       $candidatesClass->InsertCandidates($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$img,$p,$q,$r,$s,$db,$nic);   
       header("Location: ../home.php?rs=success"); /* Redirect browser */
       exit();       
       

      //$candidatesClass->InsertCandidates($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$img,$p,$q);   
     // header("Location: ../home.php"); /* Redirect browser */
      // exit();
//echo $j;
//echo "done" ;

}

else if($actionType=='update'){
$candidatesClass = new Candidates();
		
	 $ref=$_REQUEST["e_ref_h"];
       $a = $_REQUEST["e_fname"];  
       $b = $_REQUEST["e_lname"];
       $c = $_REQUEST["e_dob"];
       $d = $_REQUEST["e_gender"];
       $e = $_REQUEST["e_marital"];
       $f = $_REQUEST["e_mobile"];
       $g = $_REQUEST["e_mail"];
       $h = $_REQUEST["e_edu"];
       $i = $_REQUEST["e_ind"];
       $j = $_REQUEST["e_prof"];
       $k = $_REQUEST["e_exp"];
       $l = $_REQUEST["e_j_pref"];
       $m = $_REQUEST["e_e_pref"];
       $n = $_REQUEST["e_sal_exp"];
       $o = $_REQUEST["e_status"];
       $p=$_REQUEST['ed_nation'];
       $q=$_REQUEST['e_passport'];
       $r=  $_REQUEST["e_j_pref2"];
       $nic=  $_REQUEST["e_nic"];
       
       $img="";
       if(isset($_REQUEST['up_img'])){
           $img=$_REQUEST['up_img'];
       }
       
       
       //echo $img;
      // echo $img1;
      //echo $a;
     // echo $b;echo $c;echo $d;echo $e;echo $f;echo $g;echo $h;echo $i;echo $j;echo $k;
       
       
      $candidatesClass->UpdateCandidates($ref,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$img,$p,$q,$r,$db,$nic);   
      header("Location: ../home.php"); /* Redirect browser */
       // exit();
//echo $name;
//echo "done" ;

}




else if($actionType=='search'){
$candidatesClass = new Candidates();
 
       $industry = $_REQUEST["ind"];  
       $proff = $_REQUEST["pro"];
       $gender = $_REQUEST["gen"];
       $country = $_REQUEST["cou"];
       $name=$_REQUEST["name"];
       $age=$_REQUEST["age"];
       $country_pre=$_REQUEST["cou_pre"];
       $job_preference=$_REQUEST["job_pre"];
       $job_preference2=$_REQUEST["job_pre2"];
       $age_above=$_REQUEST["agea"]; 
       $edu=$_REQUEST["edu"]; 
       $status=$_REQUEST["status"]; 
       //echo $industry;
        //echo $proff;
        //echo $gender;
        //echo $country;
       
       
       $candidatesClass->SearchCandidates($industry,$proff,$gender,$country,$name,$age,$country_pre,$job_preference,$job_preference2,$age_above,$edu,$status);       
//echo $name;
//echo "done" ;
}

else if($actionType=='OneCandidate'){
$id=$_REQUEST['id'];
$cm = new Candidates();
$cm->ShowOneCandidate($id);
//echo "hello from candidate model" ;
}

else if($actionType=='delete'){
$id=$_REQUEST['can_ref'];
$cm = new Candidates();
$cm->DeleteCan($id,$db);

}

else if($actionType=='message'){
$title=$_REQUEST['msg_title'];
$content=$_REQUEST['msg_content'];
$atach=$_FILES['attach'];
//echo  $atach['tmp_name']; 
///echo $title;
$cm = new Candidates();

$cm->SendMessage($title,$content,$atach);
 header("Location: ../home.php?message?d=success");

}
else if($actionType=='sendOneMail'){
$mail=$_REQUEST['email_to'];
$name=$_REQUEST['name'];										
$title=$_REQUEST['can_msg_title'];
$content=$_REQUEST['msg_content'];
$attach =$_FILES['attachment'];
echo  $atach['tmp_name'];
$cm = new Candidates();
$cm->SendOneMessage($name,$mail,$title,$content,$attach);
header("Location: ../home.php#msg_can?");


}



}

?>

