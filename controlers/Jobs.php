<?php class Jobs{


public function ViewJobs(){
	include 'DBConnect.php';
	$dbCon = new DBConnect();
	$connectionState=$dbCon->connection();
	
	
	$ViewJobs="SELECT * FROM `jobs` ORDER BY `job_id` ;";
	$ViewJobsResult=mysqli_query($connectionState,$ViewJobs);
	$output_table= "<table id=\"job_list\">
				<tr class='tbl_head'>
					<td>JOB#</td>
					<td>POSITION</td>
					<td>INDUSTRY</td>
					<td>SALARY</td>
					<td>COUNTRY</td>
					<td>DATE</td>
					<td>ADDED BY</td>
					<td>COMPANY</td>
					<td></td>
				</tr>
	"; 
	
	
	//table start and heading 
	
	while($row = mysqli_fetch_row($ViewJobsResult)){
	
	/*<table id="job_list">
				<tr>
					<td>JOB#</td>
					<td>POSITION</td>
					<td>INDUSTRY</td>
					<td>COUNTRY</td>
					<td>SALLARY</td>
					
				</tr>
	*/
	$ref= sprintf("%06d", $row[0]);
	$date=substr($row[7],0,10);

	
		$output_table .= "<tr>
					<td>$ref</td>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>
					<td>$date</td>
					<td>$row[6]</td>
					<td>$row[8]</td>
					<td><a href='#view' onclick='ViewOneJob($row[0])' class='mw_view'></a></td>
			
			</tr>";
	}
	$output_table .= "</table>";
	echo $output_table;
}//End of view Jobs

public function InsertJobs($pos,$ind,$coun,$sal,$over,$user,$comp,$db){
	
	/*echo $pos;	
	echo $comp;
	echo $db;*/
	include 'DBConnect.php';
	$dbCon = new DBConnect();
	$connectionState=$dbCon->connection();	
	$sql = "INSERT INTO `".$db."` .`jobs` (`job_id`, `position`, `industry`, `sallary`, `country`, `overview`,`added_by`,`company`) VALUES (NULL, '$pos', '$ind', '$sal', '$coun', '$over','$user','$comp');";
	$result=mysqli_query($connectionState,$sql);
	/*echo $sql;
	echo $result;*/
	//$ViewJobs="SELECT * FROM `jobs` ;";
}


public function SearchJobs($pos,$ind,$coun,$sal,$company){
	//echo $pos;  echo $ind ; echo $coun; echo $sal;
	 
		$sal=intval($sal);
		include 'DBConnect.php';
		$dbCon = new DBConnect();
		$connectionState=$dbCon->connection();	
		$sql="SELECT * FROM `jobs`";   
		
		
		if(($ind != '') ||  ($pos != '') || ($coun != '') ||  ($company != '')) {
		$sql .= "WHERE ";
	}
	
	//ADD THE QUERY INFORMATION TO THE WHERE CLAUSE
	$combine = '';
	if($ind != '') { $sql .= $combine. "`industry` like '%$ind%' "; $combine='AND '; }
	if($pos != '') { $sql .= $combine. " `position` LIKE '%$pos%' "; $combine='AND '; }
	if($coun != '')  { $sql .= $combine. "  `country` = '$coun' "; $combine='AND '; }
	if($company != '')  { $sql .= $combine. "  `company` = '$company' "; $combine='AND '; }
	/*if($sal != '')  { $sql .= $combine. "  `sallary` <= $sal ";}*/



    /*
    if(!empty($pos)){
    $ViewJobs .= " AND `position` like '$pos%' ";
    }

    
    if(!empty($ind)){
    $ViewJobs .= " AND `industry` like '$ind%' ";
    }
          
    if(!empty($sal)){
    $ViewJobs .= " AND `sallary` <= $sal ";
    }
  

    $ViewJobs .= ";"; 
	*/    //AND `sallary` <= '$sal' AND (`position` like 'pos%' OR `industry` like '$ind'  ;";    
	$ViewJobsResult=mysqli_query($connectionState,$sql);
	$output_table= "<table id=\"job_list\">
				<tr class='tbl_head'>
					<td>JOB#</td>
					<td>POSITION</td>
					<td>INDUSTRY</td>
					<td>SALLARY</td>
					<td>COUNTRY</td>
					<td>COMPANY</td>
					<td></td>
				</tr>
	"; 
	
	//table start and heading 
	while($row = mysqli_fetch_row($ViewJobsResult)){
	
	/*<table id="job_list">
				<tr>
					<td>JOB#</td>
					<td>POSITION</td>
					<td>INDUSTRY</td>
					<td>COUNTRY</td>
					<td>SALLARY</td>
					<td>COMPANY</td>
				</tr>
	*/
	$ref= sprintf("%06d", $row[0]);
	
		$output_table .= "<tr>
					<td>$ref</td>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>
					<td>$row[8]</td>
					<td><a href='#view' onclick='ViewOneJob($row[0])' class='mw_view'></a></td>
			
			</tr>";
			
	}
	$output_table .= "</table>";
	echo $output_table;	//$ViewJobs="SELECT * FROM `jobs` ;";
}
public function ShowOneJob($id){
	include 'DBConnect.php';
	$dbCon = new DBConnect();
	$connectionState=$dbCon->connection();
	
	
	$ViewJobs="SELECT * FROM `jobs` where job_id='$id' ;";
	$ViewJobsResult=mysqli_query($connectionState,$ViewJobs);
	$output_table= "";	
	
	//table start and heading 
	
	while($row = mysqli_fetch_row($ViewJobsResult)){
		$ref= sprintf("%06d", $row[0]);
	
	
	/*<table id="job_list">
				<tr>
					<td>JOB#</td>
					<td>POSITION</td>
					<td>INDUSTRY</td>
					<td>COUNTRY</td>
					<td>SALLARY</td>
				</tr>
	*/
	$output_table .="	<table id='view_job_table'>
				<tr>
					<td class='label'>Job#</td>
					<td><input type='text' class='mw_tf' disabled='disabled' id='ref' value='$row[0]'	></td>
				</tr>
				<tr>
					<td class='label'>Position</td>
					<td><input type='text' class='mw_tf' disabled='disabled' id='pos' value='$row[1]'	></td>
				</tr>
				<tr>
					<td class='label'>Industry</td>
					<td><input type='text' class='mw_tf' disabled='disabled' id='ind' value='$row[2]'	></td>
				</tr>
				<tr>
					<td class='label'>Country</td>
					<td><input type='text' class='mw_tf' disabled='disabled' id='cou' value='$row[4]'	></td>
				</tr>
				<tr>
					<td class='label'>Salary</td>
					<td><input type='text' class='mw_tf' disabled='disabled' id='sal' value='$row[3]'	></td>
				</tr>
				<tr>
					<td class='label'>Company</td>
					<td><input type='text' class='mw_tf' disabled='disabled' id='comp_' value='$row[8]'	></td>
				</tr>
				<tr>
					<td class='label'>Added By</td>
					<td><input type='text' class='mw_tf' disabled='disabled' id='added_by' value='$row[6]'	></td>
				</tr>
				<tr>
					<td class='label'>Added Date</td>
					<td><input type='text' class='mw_tf' disabled='disabled' id='added_date' value='$row[7]'	></td>
				</tr>
				<tr>
					<td class='label' >Overview</td>
					<td ><textarea class='mw_ta_edit' id='over' disabled='disabled' >$row[5]</textarea>
					</td>
				</tr>
				<tr>
					<td class='label' ></td>
					<td ><a href='#view' class='mw_footer_icon' id='mw_save_btn' style='visibility: hidden'  onclick='UpdateJob()' > Save  </a>
					</td>
				</tr>

			</table>
			<div id='pwd-confirm' title='Confirm Password' class='pwd-confirm' >  
				<input type='password' id='mw_pwd' length='20'/>
			</div>

			";
	
			}
	
	echo $output_table;

}

public function UpdateJob($id,$pos,$ind,$coun,$sal,$over,$comp,$db){
include 'DBConnect.php';
	$dbCon = new DBConnect();
	$connectionState=$dbCon->connection();
	
	$sql = "UPDATE `".$db."`.`jobs` SET `position` = '$pos', `industry` = '$ind', `sallary` = '$sal', `country` = '$coun', `overview` = '$over' ,`company` = '$comp' WHERE `jobs`.`job_id` = '$id';";
		
	$Result=mysqli_query($connectionState,$sql);
	//if($Result){echo "done";}
}
public function DeleteJob($id,$db){
	include 'DBConnect.php';
		$dbCon = new DBConnect();
		$connectionState=$dbCon->connection();
		
		$sql = "DELETE FROM `".$db."`.`jobs` WHERE `jobs`.`job_id` = '$id';";
		$Result=mysqli_query($connectionState,$sql);

	}

}
?>
