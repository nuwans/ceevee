<div id="add" class="modalDialog">
	
	<div>
	    <div class="mw_header"> <a href="#jobs"  title="Close" class="close_btn"></a></div>
	    <form id="add_candidate" action="model/CandidatesModel.php"  enctype="multipart/form-data" method="post">
	    	<div id="left_col">
	    		<div id="cam_img">
					<canvas id="canvas" width="266" height="200">click here to add</canvas>  
					<video id="video"  autoplay></video>
				</div>
				<input type="hidden" name='imageurl' id='imageurl'/>
				<div id="snap">Take Photo</div>				
				<script type="text/javascript" src='webcam.js'>
					
				</script>

	    		
	    	    <input type="text" id="c_f_name" name="c_f_name" placeholder="First Name" class="mw_c_left" required  >
	    		<input type="text" id="c_l_name" name="c_l_name" placeholder="Last Name" class="mw_c_left" required  >
	    		<input type="text" id="c_l_nation" name="c_l_natio" placeholder="Nationality" class="mw_c_left" required  >
				<input type="text" id="c_l_passport" name="c_l_passport" placeholder="Passport#" class="mw_c_left" required   >
            <?php if (isset($_GET['rs']) && ($_GET['rs']=='faild')){ 
            			echo '<script>alert("Please upload an image");</script>'; 
            		}else if(isset($_GET['rs']) && ($_GET['rs']=='empty')){
            		    echo '<script>alert("All fields ");</script>';
            		}
            
 
             ?>

	    		<input type="date" id="c_b_day" name="c_b_day"  class="mw_c_left" required  placeholder="DOB" >
	    		<select  id="c_gender" name="c_gender" class="mw_c_left" required  > 
	    				<option>Gender</option>
	    				<option value="M" >Male</option>
	    				<option value="F">Female</option>
	    		</select>
				
	    		<select  id="c_marital" name="c_marital" class="mw_c_left" required  >
	    				<option>Marital Status</option>
 
	    				<option value="Married">Married</option>
	    				<option value="Single">Single</option>
	    		</select>
				<input type="text" id="c_mobile" name="c_mobile" placeholder="Mobile" class="mw_c_left" required  >
	    		<input type="email" id="c_email" name="c_email" placeholder="Email" class="mw_c_left" required  >	    		
	    	</div>
	    	<div id="right_col">
	    	<input type="text" id="rc_ind" placeholder="Industry" name="rc_ind" class="mw_c_right"required  >
	    	<input type="text" id="rc_pro" placeholder="Profession" name="rc_pro" class="mw_c_right"required  > 
	    	<font class="rc_label"><p>Education</p></font> 
	    	<div class="d_education_div"> 
	    		<div><textarea class="mw_c_right_80" name="rc_ed_type[]" ></textarea>
	    			<input type="button" id="rc_add_ed_row"  class="rc_add_ed_b" >
	    		</div>	    	
	    	</div>
	    	
	    	
	    	<font class="rc_label"><p>Experience</p></font>
	    	<div class="d_experiance_div"> 
	    		<div><textarea class="mw_c_right_80" name="rc_ex_per[]"></textarea>
	    			<input type="button" id="rc_add_ex_row"  class="rc_add_ex_b" >
	    		</div>	    	
	    	</div>
	    	
	    	
	    	<!--<textarea id="rc_ex_per" class="mw_c_right_required 80" name="rc_ex_per" ></textarea>
		    	<input type="button" id="rc_add_ex_row" class="rc_add_ed_b ex_btn">
	    	-->
	    	<input type="text" id="rc_jb_pre" name="rc_jb_pre" placeholder="Job preference Primary" class="mw_c_right"required  >
	    	<input type="text" id="rc_jb_pre2" name="rc_jb_pre2" placeholder="Job preference Secondary" class="mw_c_right"required  >
	    	<input type="text" id="rc_co_pre" name="rc_co_pre" placeholder="Country Preference" class="mw_c_right"required  >
	    	<input type="text" id="rc_sal_exp" name="rc_sal_exp" placeholder="Salary Expectation" class="mw_c_right"required  >
	    	
	    	<select  id="rc_status" name="rc_status" class="mw_c_right"required  >
	    				<option value="Available">Employement Status</option>

	    			    <option value="Available">Available</option>
	    				<option value="In Process">In Process</option>
	    				<option value="Not Available">Not Available</option>
	    			    <option value="Blacklisted">Blacklisted</option>
	    		</select>
				
	    	
	    	
	    	<input type="hidden" name="actionType" value="insert"> 
			<input type="hidden" name="added_by" value="<?php echo $_SESSION['name'] ?>"> 
			

	    	</div>
	    	
	    	<div id="add_cand_footer">
	    	<button  id="b_add_cand" class="b_add_cand">Add Candidate</button>
<!--	    	<a href="#"  id="b_add_cand" class="b_add_cand">Add Candidate</a>-->
	    	</div>
	    </form>
	</div>
</div>
<div id="search_can" class="modalDialog">
	<div>
	    <div class="mw_header"> <a href="#"  title="Close" class="close_btn"></a></div>
	    <div class="mv_form"> 
		    <div id="mw_top_text">
			    
			    <input type="text" id="can_ind" class="mw_text" placeholder="Industry">
			    <input type="text" id="can_pro" class="mw_text" placeholder="Proffesion">
			    <input type="text" id="can_gen" class="mw_text" placeholder="Gender"> 
			    <input type="text" id="can_coun" class="mw_text" placeholder="Nationality">
			   	<input type="text" id="can_s_name" class="mw_text" placeholder="Name">
			    <input type="text" id="can_s_age" class="mw_text" placeholder="Age Under">
			    <input type="text" id="can_s_age_a" class="mw_text" placeholder="Age Above">
			    <input type="text" id="can_s_country" class="mw_text" placeholder="Country Preference">
			    <input type="text" id="can_s_job_pre" class="mw_text" placeholder="Job Preference">
	  		</div>
  			<div id="serch_buttons">
  				<a href="#search_can" class="mw_action_btn" id="mw_can_search_btn" > Search </a>
  				<a href="#search_can" class="mw_action_btn" id="mw_can_refresh_btn" > Refresh </a>
  			</div>
  			<div id="mw_can_search_results"></div>
	    
	    </div> 
	</div>
</div>

<div id="msg_can" class="modalDialog">
	<div>
	    <div class="mw_header"> <a href="#"  title="Close" class="close_btn"></a></div>
	    <form action="model/CandidatesModel.php" method="post" enctype="multipart/form-data">
	    <div id="message_div">
	 
	    	<input type="text" name="can_msg_to" value="Send Message To:" disabled="disabled" class="msg_fields" id="can_msg_to">
	    	<input type="hidden" value="" name="email_to" id="email_to">
	    	<input type="hidden" value="" name="name" id="can_name">

			<input type="text" name="can_msg_title" placeholder="Message Title" class="msg_fields" id="can_msg_title">
			<textarea  name="msg_content" placeholder="Message" class="msg_fields" id="can_msg_content" ></textarea>
			<input type="file" name="attachment"  class="msg_fields" >
			<input type="hidden" name="actionType" value="sendOneMail">
				<div id="can_feedback">
				
				</div>
		</div>
	<div id="msg_footer"><input type="submit"  id="can_msg_submit" value="Send Message"  class="msg_submit" ></div>
	</form>
	</div>
	
</div>


<div id="can_view" class="modalDialog">
	<div>
	    <div class="mw_header"> <a href="#jobs"  title="Close" class="close_btn"></a></div>
	    <div class="mv_form"> 
		    <div id="mw_can_content" >
		    <!--<form id='add_candidate' action='#'  enctype='multipart/form-data' method='post'>
	    	<div id='left_col'>
	    		<div id="cam_img">
	    		<input type="file" id="img" >
	    		</div>
	    		    			    			    		
	    		<table  id="ed_tbl" style='width: 100%'>
					<tr>
						<td class='ed_lc_label'>Reference#</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_ref' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>First Name</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_f_name' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Last name</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_l_name' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>DOB</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_dob' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Gender</td>
						<td  class='ed_lc_input' >
								<select id='ed_lc_gender' disabled='disabled'>
									<option value='M'>Male</option>
									<option value='F'>Female</option>
								</select>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Marital Status</td>
						<td  class='ed_lc_input' >
								<select id='ed_lc_marital' disabled='disabled'>
									<option value='M'>Married</option>
									<option value='S'>Single</option>
								</select>  
  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Mobile</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_mob' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_lc_label'>Email</td>
						<td  class='ed_lc_input' ><input type='text' id='ed_email' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					
					
				</table>	    			    		
	    	</div>
	    	<div id='ed_right_col'>
	    	
	    		<table style='width: 100%'>
					<tr>
						<td class='ed_rc_label'>Education</td>
						<td  class='ed_rc_input' ><textarea id='ed_rc_edu' disabled='disabled'>hhh</textarea>						
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Industry</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_ind' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Profesion</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_prof' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>

					<tr>
						<td class='ed_rc_label'>Experiance</td>
						<td  class='ed_rc_input' ><textarea id='ed_rc_exp' disabled='disabled'>hhh</textarea> 
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Job preference</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_j_pref' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Employment preference</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_e_pref' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Salary Expectation</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_s_exp' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>
					<tr>
						<td class='ed_rc_label'>Status</td>
						<td  class='ed_rc_input' ><input type='text' id='ed_sta' 
							 value='custom' disabled='disabled'>  
						</td>
					</tr>					
				</table>
	    	
	    	</div>
	    	<div id="add_cand_footer">
	    	<a href='#' class='mw_footer_icon' id='mw_save_btn'   > Save  </a>
			
	    	</div>
	    </form>
-->												    
	  		</div>
  			<div id="serch_buttons">
			  	
  				<a href="#can_view" class="mw_footer_icon" id="mw_edit_btn" onclick="validateUser()" >  </a>
  				<a  class="mw_footer_icon" id="mw_message_btn" ></a>
  				<a href="" class="mw_footer_icon" id="mw_print_btn" onclick="printpage()"  >  </a>
  				<a href="#" class="mw_footer_icon" id="mw_delete_can_btn" onclick="validateBeforeDelete()" ></a>

  			</div>
	    
	    </div> 
	</div>
	
</div>


<div id="content"> 
	<div id="title_buttons">
		<a href="#add" id="b_add" class="b_add btn_wt_image"> ADD CANDIDATE </a>
		<a href="#search_can" id="b_search" class="b_search btn_wt_image" > SEARCH CANDIDATE</a>
	</div>
	
	<div id="candidates_div">
	
	</div>
	
		 
</div>


 <!--
 <div id="pwd-confirm" class='pwd-confirm' >  
		<input type="password" id="mw_pwd" length="20"/>
		<button id="mw_ok_btn">OK</button>
		<button id="mw_cancel_btn">Cancel</button>
	</div>
 
  -->

	 
