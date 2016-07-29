<div id="add" class="modalDialog">
	<div>
	    <div class="mw_header"> <a href="#jobs"  title="Close" class="close_btn"></a></div>
	    <div class="mv_form"> 
		    <div id="mw_top_text">
			    <input type="text" id="position" class="mw_text" placeholder="Position">
			    <input type="text" id="industry" class="mw_text" placeholder="Industry">
			    <input type="text" id="country" class="mw_text" placeholder="Country">
			    <input type="text" id="salary" class="mw_text" placeholder="Salary">
				<input type="text" id="company" class="mw_text" placeholder="Company">
				<input type="hidden" id="added_by" name="added_by" value="<?php echo $_SESSION['name'] ?>"> 	    
	  		</div>
  			<div id="label"><span>Job Overview</span></div>
  			<div id="text_area">
  				<textarea class="mw_ta" id="overview" ></textarea>
  			</div>
  			<div id="footer_button">
  				<a href="#" class="mw_action_btn" id="mw_save_job" > Add Job </a>
  			</div>
	    
	    </div> <!--End Of form div onclick="AddJobsAndCandidates('JobsModel')"   -->
	</div>
</div>
<div id="search" class="modalDialog">
	<div>
	    <div class="mw_header"> <a href="#jobs"  title="Close" class="close_btn"></a></div>
	    <div class="mv_form"> 
		    <div id="mw_top_text">
			    <input type="text" id="s_position" class="mw_text" placeholder="Position">
			    <input type="text" id="s_industry" class="mw_text" placeholder="Industry">
			    <input type="text" id="s_country" class="mw_text" placeholder="Country">
			    <input type="hidden" id="s_salary" class="mw_text" value="" placeholder="Salary">
				<input type="text" id="s_company" class="mw_text" placeholder="Company">

	  		</div>
  			<div id="serch_buttons">
  				<a href="#search" class="mw_action_btn" id="mw_search_btn" > Search </a>
  				<a href="#search" class="mw_action_btn" id="mw_refresh_btn" > Refresh </a>
  			</div>
  			<div id="mw_search_results"></div>
	    
	    </div> 
	</div>
</div>
<div id="view" class="modalDialog">
	<div>
	    <div class="mw_header"> <a href="#jobs"  title="Close" class="close_btn"></a></div>
	    <div class="mv_form"> 
		    <div id="mw_job_content" >
							    
	  		</div>
  			<div id="serch_buttons">
  				<a href="#view" class="mw_footer_icon" id="mw_edit_btn" onclick="EnableJOBEditCheck()" >  </a>
<!--  				<a href="#" class="mw_footer_icon" id="mw_message_btn" ></a>-->
<!--  				<a href="#" class="mw_footer_icon" id="mw_print_btn" onclick="printpage()" >  </a>-->
  				<a href="#" class="mw_footer_icon" id="mw_delete_btn" onclick="ValidateDeleteJob()" ></a>

  			</div>
	    
	    </div> 
	</div>
</div>


<div id="content"> 
	<div id="title_buttons">
	
		<a href="#add" id="b_add" class="b_add btn_wt_image" > ADD JOBS </a>
		<a href="#search" id="b_search" class="b_search btn_wt_image"> SEARCH JOBS</a>

	</div>
	<div id="job_div">
	
	</div>
		 
		 
</div>
<script >
function click1(){
alert('clicked');
}
</script>