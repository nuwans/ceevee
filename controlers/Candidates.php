<?php class Candidates{


public function ViewCandidates(){
include_once 'DBConnect.php';
$dbCon = new DBConnect();
$connectionState=$dbCon->connection();


$View="SELECT * FROM `candidates`  ORDER BY `id` ;";
$ViewResult=mysqli_query($connectionState,$View);
$output_table= "<table id=\"candidate_list\">
			<tr class='tbl_head'>
				<td>Ref#</td>
				<td>First name</td>
				<td>Last name</td>
				<td>D.O.B</td>
				<td>Gender</td>
				<td>Mobile</td>
				<td>Email</td>
				<td>Industry</td>
				<td>Proffesion</td>
				<td>Status</td>
				<td></td>
			</tr>
"; 



//table start and heading 

while($row = mysqli_fetch_row($ViewResult)){
		$ref= sprintf("%06d", $row[0]);    

	$output_table .= "<tr>
				
				<td>$ref</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[4]</td>				
				<td>$row[6]</td>
				<td>$row[7]</td>
				<td>$row[8]</td>
				<td>$row[9]</td>
				<td>$row[15]</td>
				<td><a href='#can_view' onclick='ViewOneCandidate($row[0])' class='mw_view'></a></td>

		
		</tr>";
}
$output_table .= "</table>";
echo $output_table;
$connectionState->close();
}// end of view









public function InsertCandidates($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$img,$p,$q,$r,$s,$db){
include_once 'DBConnect.php';
$dbCon = new DBConnect();
$connectionState=$dbCon->connection();

/*************************Param Help************************* 
			 $a = $_REQUEST["c_f_name"];  
       $b = $_REQUEST["c_l_name"];
       $c = $_REQUEST["c_b_day"];
       $d = $_REQUEST["c_gender"];
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
	   $r=$_REQUEST['added_by'];
       $s = $_REQUEST["rc_jb_pre2"];
       $img=$_FILES['img'];

				 $sql = "INSERT INTO `ceevee`.`candidates` (`id`, `f_name`, `l_name`, `dob`,
				 `gender`, `marital_st`, `mobile`, `email`, `indusrty`, `proffesion`, `education`,
				 `experiance`, `job_preference`, `exp_salary`, `exp_country`, `status`, `img_id`) 
				 VALUES (NULL, \'Sameera\', \'Madushan\', \'2015-01-13\', \'M\', \'Maried\',
				 \'213555544848\', \'nuaefbb@gmail.com\', \'Banking\', \'Finance\', \'O L\',
				 \'4 years\', \'Banking assistant\', \'322\', \'China\', \'Available\', \'1\');";	
		


*/

		$sql1="SELECT MAX(`id`) FROM `candidates` ;";
		 	$result =mysqli_query($connectionState,$sql1);
		 	$max_id=mysqli_fetch_row($result);
		 	$max_id=$max_id[0]+1;

		 //echo $real_name;
		 	$new_name=strval($max_id);
		 	$today = date("Y_m_d");
		    $new_name= $new_name."_".$today.".png";
			List($type, $img) = explode(';', $img);
			list(, $img)      = explode(',', $img);
			$data = base64_decode($img);
			file_put_contents('../uploads/profile_pics/'.$new_name, $data);
		    
    $edu ="";
    foreach($j as $key => $text_field){
        $edu .= $text_field .",";
    }
    $exp="";
    foreach($k as $key => $exp_ta){
        $exp .= $exp_ta .",";
    }



$db=$_SESSION["db"];
$sql = "INSERT INTO `".$db."`.`candidates`
		 (`id`, `f_name`, `l_name`, `dob`, `gender`, `marital_st`, `mobile`,
		  `email`, `indusrty`, `proffesion`, `education`, `experiance`, 
		  `job_preference`, `exp_salary`, `exp_country`, `status`, `img_id`,`country`, `passport`,`job_preference2`,`added_by`) 
		  VALUES (NULL, '$a', '$b', '$c', '$d', '$e','$f', '$g', '$h', '$i','$edu', '$exp', '$l', 
		  '$n', '$m', '$o', '$new_name', '$p' , '$q' ,'$s' ,'$r');";		 
		 $ViewResult=mysqli_query($connectionState,$sql);
		 if($ViewResult){
		 }
$connectionState->close();		 
		//echo $img['tmp_name'];
} //End of insert





public function SearchCandidates($industry,$proff,$gender,$country,$name,$age,$country_pre,$job_preference,$age_above){
include_once 'DBConnect.php';
$dbCon = new DBConnect();
$connectionState=$dbCon->connection();
//echo $industry;
//echo $proff;/
//echo $gender;
//echo $country;

//$View="SELECT * FROM `candidates` ;";

/*$sql1 = "SELECT * FROM `candidates` WHERE `gender` = '$gender' AND `country` = '$country' AND (`proffesion` 
       like '$proff%' OR `indusrty` like '$industry%' );";
*/       
 $sql = "SELECT * FROM `candidates` ";

if(($industry != '') ||  ($proff != '') || ($gender != '') || ($country != '') ||($name != '') ||  ($age != '') || ($country_pre != '') || ($job_preference != '')) {
    $sql .= "WHERE ";
  }
 
//ADD THE QUERY INFORMATION TO THE WHERE CLAUSE
$combine = '';
if($industry != '')     { $sql .= $combine. " `indusrty` LIKE '%$industry%' "; $combine='AND '; }
if($proff != '') { $sql .= $combine. " `proffesion` LIKE '%$proff%' "; $combine='AND '; }
if($gender != '')  { $sql .= $combine. "  `gender` = '$gender' "; $combine='AND '; }
if($country != '')  { $sql .= $combine. "  `country` = '$country' "; $combine='AND ';}
if($name != '')  { $sql .= $combine. "  `f_name` = '$name' "; $combine='AND ';}
if($age != '')  { $sql .= $combine. "  DATEDIFF(CURRENT_DATE, dob) <= ($age * 365.25) "; $combine='AND ';}
if($age_above != '')  { $sql .= $combine. "  DATEDIFF(CURRENT_DATE, dob) >= ($age_above * 365.25) "; $combine='AND ';}
if($country_pre != '')  { $sql .= $combine. "  `exp_country` = '$country_pre' ";$combine='AND ';}
if($job_preference != '')  { $sql .= $combine. "  `job_preference` = '$job_preference' "; }

//$sql="SELECT * FROM `candidates` WHERE DATEDIFF(CURRENT_DATE, dob) >= (12 * 365.25) AND DATEDIFF(CURRENT_DATE, dob) <= (40* 365.25)  ;";

//echo $sql;
$ViewResult=mysqli_query($connectionState,$sql);
$output_table= "<table id=\"candidate_list\">
			<tr class='tbl_head'>
				<td>Ref#</td>
				<td>First name</td>
				<td>Last name</td>
				<td>D.O.B</td>
				<td>Gender</td>
				<td>Mobile</td>
				<td>Email</td>
				<td>Industry</td>
				<td>Profession</td>
				<td>Status</td>
				<td></td>
			</tr>
"; 


//table start and heading 

while($row = mysqli_fetch_row($ViewResult)){
		$ref= sprintf("%06d", $row[0]);    

	$output_table .= "<tr>
				<td>$ref</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[4]</td>				
				<td>$row[6]</td>
				<td>$row[7]</td>
				<td>$row[8]</td>
				<td>$row[9]</td>
				<td>$row[15]</td>
				<td><a href='#can_view' onclick='ViewOneCandidate($row[0])' class='mw_view'></a></td>

		
		</tr>";
}
$output_table .= "</table>";
echo $output_table;
//echo  date("Y-m-d");
$connectionState->close();
}// end of Search candidates


public function ShowOneCandidate($id){
include_once 'DBConnect.php';
	$dbCon = new DBConnect();
	$connectionState=$dbCon->connection();
	
	
	$ViewJobs="SELECT * FROM `candidates` where id='$id' ;";
	$ViewJobsResult=mysqli_query($connectionState,$ViewJobs);
	$output_table= "";	
	
	//table start and heading 
	
	while($row = mysqli_fetch_row($ViewJobsResult)){
		$ref= sprintf("%06d", $row[0]);
       // echo $row[10];
        
        $eduField = explode(',',$row[10]);
        $exField = explode(',',$row[11]);
       foreach( $eduField as $key => $value)
    {
        if ($value !=="" )
        {
            //echo $value;
        }
    } 

	
	
	/*<table id="job_list">
				<tr>
					<td>JOB#</td>
					<td>POSITION</td>
					<td>INDUSTRY</td>
					<td>COUNTRY</td>
					<td>SALLARY</td>
				</tr>
	*/
	$output_table .="	<form id='add_candidate' action='model/CandidatesModel.php'  enctype='multipart/form-data' method='post'>
	    	<div id='left_col'>
	    		<div id='e_img' disabled='disabled'>
					<img src='uploads/profile_pics/$row[16]'  id='e_img_prev' >
					<!--<canvas  id='up_canvas'></canvas>
					<input type= 'hidden'  disabled='disabled' id='up_img' name='up_img' >
					<video id='up_video'  autoplay></video> -->
	    		</div>
				<div id='up_photo' class='camera-ctrl-btn'>Edit</div>
				<div id='up_snap' class='camera-ctrl-btn'>Capture</div>
				<div id='up_cancel' class='camera-ctrl-btn'>Cancel</div>
	    		    			    			    		
	    		<table  id='ed_tbl' style='width: 100%'>
					<tr>
						<td class='ed_lc_label'>Reference#</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_ref' name='e_ref'
							 value='$row[0]' disabled='disabled'>  
							 	    			<input type='hidden' name='e_ref_h' value='$row[0]' >

						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>First Name</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_f_name' 
							 value='$row[1]' disabled='disabled' name='e_fname' >  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Last name</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_l_name' 
							 value='$row[2]' disabled='disabled' name='e_lname'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Nationality</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_nation' 
							 value='$row[17]' disabled='disabled' name='ed_nation'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Passport No: </td>
						<td  class='ed_lc_input' ><input type='text' id='ed_passport' 
							 value='$row[18]' disabled='disabled' name='e_passport'>  
						</td>
					</tr>


					<tr>
						<td class='ed_lc_label'>DOB</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_dob' 
							 value='$row[3]' disabled='disabled' name='e_dob'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Gender</td>
						<td  class='ed_lc_input'  >
								<select id='ed_lc_gender' name='e_gender' disabled='disabled'>
									<option value='M' ";
										if($row[4] =='M'){
										$output_table .= "selected='selected'";
										}			
																	
					$output_table .= ">Male</option>
									<option value='F' ";
									if($row[4] =='F'){
									$output_table .= "selected='selected'";
										}
									
					$output_table .= ">Female</option>
								</select>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Marital Status</td>
						<td  class='ed_lc_input'  >
								<select id='ed_lc_marital' name='e_marital' disabled='disabled'>
									<option value='Married'>Married</option>
									<option value='Single'";
									
									if($row[5] =='Single'){
									$output_table .= "selected='selected'";
										}									
	
					$output_table .= ">Single</option>
								</select>  
  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Mobile</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_mob' 
							 value='$row[6]' disabled='disabled' name='e_mobile'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Email</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_email' 
							 value='$row[7]' disabled='disabled' name='e_mail'>  
						</td>
					</tr>
					
					
				</table>	    			    		
	    	</div>
	    	<div id='ed_right_col'>
	    	
	    		<table style='width: 100%'>
					<tr>
						<td class='ed_rc_label tp'>Education</td>
						<td  class='ed_rc_input' >	 
						<div class='edit_quali'> 
						
												";
						
					  foreach( $eduField as $key => $value){
    					    if ($value !=="" ){						       
 				       $output_table .= "<div><textarea  disabled='disabled' class='add_edu_fi'  name='e_edu[]'>$value</textarea>
 				                         <input type='button' class='rem_edu_bt'  onclick='remove_item(this)'>
 				       					 </div>";
    					    }
    			      }
                
                $output_table .="</div>
                <div><input type='button' disabled='disabled' class='ed_add_btn'    onclick='add_ed_field()'>
						</div>   						
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Industry</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_ind' 
							 value='$row[8]' disabled='disabled' name='e_ind'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Profession</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_prof' 
							 value='$row[9]' disabled='disabled' name='e_prof'>  
						</td>
					</tr>

					<tr>
						<td class='ed_rc_label tp'>Experience</td>
						<td  class='ed_rc_input' >
						<div class='edit_exper' id='exp_edit_field'  >						
						";
						
//                       $output_table .=	"<input type='button' value='Add'  class='ed_edu_btn'/>";						
					  foreach( $exField as $key => $value1){
    					    if ($value1 !=="" ){						       
 				       $output_table .= "<div><textarea  disabled='disabled' class='add_edu_fi'  name='e_exp[]'>$value1</textarea>
 				       						<input type='button' class='rem_edu_bt'  onclick='remove_item(this)'>
 				       					</div>";
    						}
    			      }
												
						
			$output_table .= "</div><div><input type='button' disabled='disabled'  class='ed_add_btn'    onclick='add_ex_field()'>
							</div>
			     </td> 
					</tr>
					<tr>
						<td class='ed_rc_label'>Job preference Primary</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_j_pref' 
							 value='$row[12]' disabled='disabled' name='e_j_pref'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Job preference Secondary</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_j_pref2' 
							 value='$row[19]' disabled='disabled' name='e_j_pref2'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Country preference</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_e_pref' 
							 value='$row[14]' disabled='disabled' name='e_e_pref'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Salary Expectation</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_s_exp' 
							 value='$row[13]' disabled='disabled' name='e_sal_exp'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Status</td>
						<td  class='ed_rc_input' >
						
						<select  id='ed_sta' disabled='disabled' name='e_status' >
	    			          <option value='Available'";
									if($row[15] =='Available'){
									$output_table .= "selected='selected'";
										}									
	
					  $output_table .= ">Available</option>
	    			    	<option value='In Process'";
	    			    	if($row[15] =='In Process'){
									$output_table .= "selected='selected'";
								}	
	    			    
	    			  $output_table .= ">In Process</option>
	    					<option value='Not Available'";	    				
	    					if($row[15] =='Not Available'){
									$output_table .= "selected='selected'";
										}	
	    			  $output_table .= ">Not Available</option>
					  <option value='Blacklisted'";	    				
	    					if($row[15] =='Blacklisted'){
									$output_table .= "selected='selected'";
										}	
	    			  $output_table .= ">Blacklisted</option>


	    		        </select> 
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Interviewed By By</td>
						<td  class='ed_rc_input' ><input type='text' id='added_by' 
							 value='$row[20]' disabled='disabled' name='added_by'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Added Date</td>
						<td  class='ed_rc_input' ><input type='text' id='added_date' 
							 value='$row[21]' disabled='disabled' name='added_date'>  
						</td>
					</tr>					
				</table>
	    			<input type='hidden' name='actionType' value='update' 
							  >
	    	</div>
	    	<div id='add_cand_footer'>
	    	<!--/*<a href='#' class='mw_footer_icon' id='mw_save_btn' style='visibility: hidden'  > Save  </a>*/-->
				<button class='mw_footer_icon' id='mw_save_btn' style='visibility: hidden'  > Save  </Button>
	    	</div>
	    </form>

		<div id='pwd-confirm' title='Confirm Password' class='pwd-confirm' >  
			<input type='password' id='mw_pwd' length='20'/>
		</div>
";
	
			}
	
	echo $output_table;
	$connectionState->close();

}

public function DeleteCan($id,$db){
include 'DBConnect.php';
	$dbCon = new DBConnect();
	$connectionState=$dbCon->connection();
	
	$sql = "DELETE FROM `".$db."`.`candidates` WHERE `candidates`.`id` = '$id';";
	$Result=mysqli_query($connectionState,$sql);
	//echo $sql;
	$connectionState->close();
	

}

public function UpdateCandidates($ref,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$img,$p,$q,$r,$db){

//echo $b;echo $c;echo $d;echo $e;echo $f;echo $g;echo $h;echo $i;echo $j;echo $k;
include 'DBConnect.php';

$dbCon = new DBConnect();
$connectionState=$dbCon->connection();
//$tmp= $img['temp_name'];
$new_name="";

	//echo $ext;
	if($img!=''){
		$today = date("Y_m_d");
		$new_name= $ref."_".$today.".png";
		List($type, $img) = explode(';', $img);
		list(, $img)      = explode(',', $img);
		$data = base64_decode($img);
		file_put_contents('../uploads/profile_pics/'.$new_name, $data);
	}
	
	

	 
	 //echo $new_name;

/*$sql = "UPDATE `ceevee`.`candidates` SET `f_name` = \'first nnae\', `l_name` = \'Last name\',
 `dob` = \'2015-01-12\',`gender` = \'M\', `mobile` = \'121212122\', `email` = \'12345@gmail.com\', 
`indusrty` = \'gems\', `proffesion` = \'cutter\',`education` = \'Al\', `experiance` = \'5 years\', 
`job_preference` = \'Cutter\', `exp_salary` = \'45645555\', `exp_country` = \'UK\', `status` = \'Not Available\'
 WHERE `candidates`.`id` = 67;";
 
 */
 //echo $h.$k."s";
 $edu ="";
   if($h !=''){
    foreach($h as $key => $text_field){
        $edu .= $text_field .",";
    }
    
  }
   if($k !=''){ 
    $exp="";    
    foreach($k as $key => $exp_ta){
        $exp .= $exp_ta .",";
    }
    
    }


 
$sql = "UPDATE `".$db."`.`candidates` SET `f_name` = '$a', `l_name` = '$b', `dob` = '$c', `gender` = '$d',
 `marital_st` ='$e' , `mobile` = '$f', `email` = '$g', `indusrty` = '$i', `proffesion` = '$j',
 `education` = '$edu', `experiance` = '$exp', `job_preference` = '$l', `exp_salary` = '$n', `exp_country` = '$m',
  `status` = '$o', `country` = '$p',`passport` = '$q' , `job_preference2` = '$r' ";
 if(($tmp !=='') && ($ext !== '') ){
 $sql .= " , `img_id` ='$new_name' " ;
}
 $sql .= " WHERE `candidates`.`id` = $ref;";

 
$Result=mysqli_query($connectionState,$sql);
//echo $new_name;
$connectionState->close();
}

public function SendMessage($title,$content,$atach){
include_once 'DBConnect.php';
include_once 'SMTPSetUp.php';
$dbCon = new DBConnect();
$connectionState=$dbCon->connection();
$sql = "SELECT `email` FROM `candidates` ;";
$ViewResult=mysqli_query($connectionState,$sql);
ini_set("include_path", '/home/ceeveebi/php:' . ini_get("include_path")  ); 
require_once "../Mail.php"; // PEAR Mail package
require_once ('../Mail/mime.php'); // PEAR Mail_Mime packge
//echo $title.$content;
$to="All Candidates";
$subject = $title; 
$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);
$type= $atach['type'];
$name= $atach['name'];
move_uploaded_file($atach['tmp_name'], "../attachments/".$name); 
 
// attachment
$file = "../attachments/".$name;
//echo $file.$type;
$crlf = "\n";
 
$mime = new Mail_mime($crlf);
$mime->setTXTBody($content);
if($name !== ''){
$mime->addAttachment($file,$type,$name);
 }
$body = $mime->get();
$headers = $mime->headers($headers);  
$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
 'username' => $username,'password' => $password));
 
while($row = mysqli_fetch_row($ViewResult)){
$email= $row[0];
if(email!==''){
$mail = $smtp->send($email, $headers, $body);
}
}

//$mail = $smtp->send($to, $headers, $body);
 
/*if (PEAR::isError($mail)) {
    echo("<p>" . $mail->getMessage() . "</p>");
}
else {
    echo("<p>Message successfully sent!</p>");
}
*/

}

public function SendOneMessage($can_name,$mail,$title,$content,$atach){
include_once 'SMTPSetUp.php';
ini_set("include_path", '/home/ceeveebi/php:' . ini_get("include_path")  ); 
require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge

$to=$can_name;
$subject = $title; 
$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);
$type= $atach['type'];
$name= $atach['name'];
//echo $name."aa";
move_uploaded_file($atach['tmp_name'], "../attachments/single/".$name); 
 
// attachment
$file = "../attachments/single/".$name;
//echo $file.$type;
$crlf = "\n";
 
$mime = new Mail_mime($crlf);
$mime->setTXTBody($content);
if($name !== ''){
$mime->addAttachment($file,$type,$name);
 }
$body = $mime->get();
$headers = $mime->headers($headers);  
$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
 'username' => $username,'password' => $password));
$mail = $smtp->send($mail, $headers, $body);
}


}
?>
