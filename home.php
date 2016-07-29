<?php
	session_start();
	if( !isset($_SESSION['user_id']) ){
		header('Location:index.php');
}

	
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" href="style1.css"/>
<link rel="icon" 
      type="image/png" 
      href="images/favicon.ico">
<title>CeeVee</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<!--/*<script type="text/javascript" src="resourses/jquery-2.0.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>*/ -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript" src="main.js" ></script>
<script >
$(document).ready(function() {
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper_ed         = $(".d_education_div"); //Fields wrapper
    var add_ed_button      = $(".rc_add_ed_b"); //Add button ID
    
    
    var x = 1; //initlal text box count
    $(add_ed_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper_ed).append('<div><textarea class="mw_c_right_80" name="rc_ed_type[]"></textarea><a href="#" class="remove_field"></a></div>'); //add input box
        }
    });
      $(wrapper_ed).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
    
    // for add candidate education text fields
     
     var y = 1;
    var wrapper_ex         = $(".d_experiance_div"); //Fields wrapper
    var add_ex_button      = $(".rc_add_ex_b"); //Add button ID
    $(add_ex_button).click(function(e){ //on add input button click
        e.preventDefault();

        if(y < max_fields){ //max input box allowed
            y++; //text box increment
       

            $(wrapper_ex).append('<div><textarea class="mw_c_right_80" name="rc_ex_per[]"></textarea><a href="#" class="remove_field"></a></div>'); //add input box
        }
    });
      $(wrapper_ex).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); y--;
    });
    // for add candidate experience text fields 
      

//  LoadJobs();
	 $('#mw_save_job').click(function() {
		 alert($('#added_by').val());
		AddJobsAndCandidates('JobsModel',$('#position').val(),$('#industry').val(),$('#country').val(),$('#salary').val(),$('#overview').val(),$('#added_by').val(),$('#company').val());     

	    });
	 
		$('#mw_message_btn').click(function() {
	 	var msg_to= $('#ed_email').val();
	 	var name=$('#ed_f_name').val();
	 	var msg_title="Message To : " ;
	 		if(name !==""){
	 		msg_title  += name   ;
	 		}
		window.open('mailto:'+msg_to,'_blank');
	 	//var name= $('#can_msg_to');
	 	/*document.getElementById('can_msg_to').setAttribute("value",msg_title);
	 	document.getElementById('email_to').setAttribute("value",msg_to); 
	 	document.getElementById('can_name').setAttribute("value",name)*/;
	 		
	    });
	   
	$('#can_msg_submit').click(function() {
				var mail =	    $('#email_to').val();
				var name = 	$('#can_name').val();
				var title =		$('#can_msg_title').val();
				var message =		$('#can_msg_content').val();
				//alert(mail+name+title+message);
				$.post("model/CandidatesModel.php", //Required URL of the page on server
									{ // Data Sending With Request To Server
										actionType:'sendOneMail',
										mai:mail ,
										nam :name ,
										tit :title ,
										mes :message 																			
									},function(response,status){ // Required Callback Function
									//alert(response); 
									document.getElementById('can_feedback').innerHTML=response;
						
				});
			
	    });

 
	 
	    
	$('#img').change(function(){
		//alert('dd');
		showImage(this);
	
	});		 
	 $('#mw_search_btn').click(function() {
	 	var posi= $('#s_position').val();
	 	var indu= $('#s_industry').val();
	 	var coun= $('#s_country').val();
	 	var sala= $('#s_salary').val();
	 	var comp= $('#s_company').val();
	 	alert(comp);
	 	SearchJobs("JobsModel",posi,indu,coun,sala,comp);
	
	    });
	   /* $('#mw_delete_can_btn').click(function() {
	 	var ref= $('#ed_ref').val();
	 	var answer = confirm ("Are you Sure you want to delete");
		if (answer){
	 		$.post("model/CandidatesModel.php", //Required URL of the page on server
									{ // Data Sending With Request To Server
										actionType:'delete',
										can_ref:ref																		
									},function(response,status){ // Required Callback Function 
						location.reload();
					});
		}
	 	//SearchJobs("JobsModel",posi,indu,coun,sala);
	
	    });*/

	    
		$('#mw_refresh_btn').click(function() {
			document.getElementById('mw_search_results').innerHTML="";
	    });

		
	    
	    $('#mw_can_refresh_btn').click(function() {
			document.getElementById('mw_can_search_results').innerHTML="";
	    });

	   	$('#mw_can_search_btn').click(function() {
			//alert('start0');
				var industry =	    $('#can_ind').val();
				var profession = 	$('#can_pro').val();
				var gender =		$('#can_gen').val();
				var country =		$('#can_coun').val();
				var name    =		$('#can_s_name').val();
				var age =		$('#can_s_age').val();
				var ageAbove =		$('#can_s_age_a').val();
				var country_pre =		$('#can_s_country').val();
				var job_preference = $('#can_s_job_pre').val();
				//alert(country);
				$.post("model/CandidatesModel.php", //Required URL of the page on server
									{ // Data Sending With Request To Server
										actionType:'search',
										ind:industry ,
										pro :profession ,
										gen :gender ,
										cou :country,
										name:name,
										age:age,
										agea:ageAbove,
										cou_pre:country_pre,
										job_pre:job_preference

									},function(response,status){ // Required Callback Function
									//alert(response); 
									//$('#mw_can_search_results').html=response;
									document.getElementById('mw_can_search_results').innerHTML=response;
						
				});
			
	    });

		

	    
	    		
	
	}
);

	
</script>
</head>

<body>

<div id="wrapper">
	 <div id="header">
	  	 <div id="logo">
		 	<a href="home.php" >
		 		<img alt="logo" id="header_logo" src="images/header.png"/>
		 	</a> 
		 	<div id="username_div"> USER: <?php echo $_SESSION['name'];
	  ?>  

                <a href="index.php?logout=ok" >
	                <img  id="logout" src="images/logout.png" alt="Logout"  />
	                
                </a> 
 		 	</div>
		 </div>
	  	 
	 </div>
	 <div id="tabs">
	 	<div id="links">
	 		<ul>
	 			<li><a href="?candidates" id="candidates"><img class="images" src="images/usery.png"/>CANDIDATES</a></li>
	 			<li><a href="?jobs" id="jobs"><img  class="images final" src="images/jobsy.png"/> JOBS</a></li>
	 		<!--	<li><a href="?message" id="message"><img  class="images final" src="images/messagey.png"/> CRM</a></li>	 -->
	 		</ul>
	 	</div>
	 	<div id="toolbar">
	 		<ul>
<!--	 			<li><a href="#" ><img class="images" src="images/messagey.png"/></a></li>-->
<!--	 			<li><a href="#" ><img  class="images " src="images/printy.png" onclick="printpage()" /></a></li>-->
<!--	 			<li><a href="#" ><img  class="images " src="images/deletey.png"/></a></li>	-->
	 		</ul>
	 	</div>
	 </div>
	 <div>
	 <?php 
	 
	 if(isset($_GET['jobs'])){
	 	include('jobs.php');
	 	echo " <script type=\"text/javascript\">document.getElementById('jobs').style.backgroundColor = '#242424'; viewJobsAndCandidates('JobsModel');</script>";
	 }
	else if(isset($_GET['message'])){
	 	include('message.php');
	 	echo " <script type=\"text/javascript\">document.getElementById('message').style.backgroundColor = '#242424'; </script>";
	 }

	 else{
	 	include('candidates.php');
	 	echo " <script type=\"text/javascript\">document.getElementById('candidates').style.backgroundColor = '#242424'; viewJobsAndCandidates('CandidatesModel');</script>";
	 }
	 ?>
	 </div>
	 
	 
</div>
</body>

</html>
