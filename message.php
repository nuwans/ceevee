<div id="content"> 
	<form id="msg_frm" method="post"action="model/CandidatesModel.php" enctype="multipart/form-data" >
	<div id="message_div">
	<input type="text" name="msg_title" placeholder="Message Title" class="msg_fields" id="msg_title">
	<textarea  name="msg_content" placeholder="Message" class="msg_fields" id="msg_content" ></textarea>
	<input type="file" name="attach" class="msg_fields" id="msg_attach" >
	<input type="hidden" name="actionType" value="message" >
	<div id="feedback">
	<?php if(isset($_GET['d']) && ($_GET['d'] == 'success')) {
	
	echo "Success";}
	
	?>
	</div>
	
	</div>
	<div id="msg_footer"><input type="submit"  id="msg_submit"  value="Send Message" class="msg_submit" ></div>
		 
	</form>	 
</div>
