function printpage(){
window.print();
}


function showImage(input){
	console.log(input);
	var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
	var hiddenImage=document.getElementById('imageurl');
	 if (input.files && input.files[0] ) {
		 	if(input.files[0].size<1000000){
				 var reader = new FileReader();
                reader.onload = function (event) {
					var img = new Image();
					img.onload = function(){
						canvas.width = 266;
						canvas.height = 200;
						ctx.drawImage(img,0,0,266,200);
					}
					img.src = event.target.result;
					hiddenImage.value=event.target.result;
					
                }
			    reader.readAsDataURL(input.files[0]);
			 }else{
				 alert('Image size is too large');
			 }
                
				
               
     }

}

function showImageToUpdate(input){
	 var imgwrap = document.getElementById('e_img');
	 var hiddninput=document.createElement('input');
		hiddninput.type='hidden';
		hiddninput.name='up_img';
		hiddninput.id='up_img';
	 if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#e_img_prev')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
					hiddninput.value=e.target.result;
					imgwrap.appendChild(hiddninput);
                };

                reader.readAsDataURL(input.files[0]);
            }

}

function add_ed_field(){
    
 	$('.edit_quali').append("<div><textarea  class='add_edu_fi'  name='e_edu[]'></textarea><input type='button' class='rem_edu_bt'  onclick='remove_item(this)'></div>");
}  // Adding exttra field to education

function add_ex_field(){
   $('.edit_exper').append("<div><textarea  class='add_edu_fi'  name='e_exp[]'></textarea><input type='button' class='rem_edu_bt'  onclick='remove_item(this)'></div>");

}

function remove_item(element){
        $(element).parent('div').remove();    
}


function viewJobsAndCandidates(model){

	var model=model;  // Jobs Model Or Candidates model
	//	alert(model);
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	//	alert(xmlhttp.responseText);
			if(model=='JobsModel'){
			document.getElementById('job_div').innerHTML=xmlhttp.responseText;
			
			}else{
			document.getElementById('candidates_div').innerHTML=xmlhttp.responseText;
			
			}
	    }
	  }
	xmlhttp.open("POST","model/"+model+".php?actionType=view",true);
	xmlhttp.send();
}// End Of View Function

function AddJobsAndCandidates(model,pos,ind,coun,sal,over,user,company){

	//alert(model+pos+ind+coun+sal+over+user+company);
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		//console.log(xmlhttp.responseText);
			location.reload(); 
	    }
	  }
	xmlhttp.open("POST","model/"+model+".php?actionType=insert&pos="+pos+"&ind="+ind+"&coun="+coun+"&sal="+sal+"&over="+over+"&user="+user+"&comp="+company,true);
	xmlhttp.send();
	
}// End of Add
function SearchJobs(model,pos,ind,coun,sal,comp){

	/*alert(pos);
	alert(ind);
	alert(coun);
	alert(sal);

	*/	var model=model;  // Jobs Model Or Candidates model
	//	alert(model);
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	//alert(xmlhttp.responseText);
			
			document.getElementById('mw_search_results').innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("POST","model/"+model+".php?actionType=search&pos="+pos+"&ind="+ind+"&coun="+coun+"&sal="+sal+"&comp="+comp,true);
	xmlhttp.send();
}// End Of Search

function ViewOneJob(ref){
	//alert(ref);
		//alert(s);
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	//alert(xmlhttp.responseText);
			
			document.getElementById('mw_job_content').innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("POST","model/JobsModel.php?actionType=OneJob&id="+ref,true);
	xmlhttp.send();
}
function ViewOneCandidate(ref){
	//alert(ref);
	//alert(s);
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		//alert(xmlhttp.responseText);
				
		document.getElementById('mw_can_content').innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","model/CandidatesModel.php?actionType=OneCandidate&id="+ref,true);
		xmlhttp.send();
}

function EnableJOBEditCheck(){
		$( function() {
			var dialog,     
				password = $( "#mw_pwd" );
			function ValidateUser() {
				var valid = false;
				if(password.val()==getCookie("pass")){
					EnableEdit();
					dialog.dialog( "close" );
				}
				return false;
			}
			dialog = $( "#pwd-confirm" ).dialog({
				autoOpen: false,
				height: 200,
				width: 350,
				position: { my: 'top', at: 'top+150' },
				modal: true,
				buttons: {
					"OK": ValidateUser,
					Cancel: function() {
						dialog.dialog( "close" );
						return false;
					}
				},
				close: function() {
					dialog.dialog( "close" );
					return false;
				}
			});
	
			form = dialog.find( "#mw_cancel_btn" ).on( "click", function( event ) {
				event.preventDefault();
				ValidateUser();
			});
			dialog.dialog( "open" );
		
  } );
	
}
function EnableEdit(){
	console.log('edit job');
	document.getElementById('pos').disabled = false;
	document.getElementById('ind').disabled = false;
	document.getElementById('cou').disabled = false;
	document.getElementById('sal').disabled = false;
	document.getElementById('over').disabled = false;
	document.getElementById('comp_').disabled = false;
	document.getElementById('mw_save_btn').style.visibility = 'visible';

}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
function validateUser(){
	$( function() {
			var dialog,     
				password = $( "#mw_pwd" );
			function ValidateUser() {
				var valid = false;
				if(password.val()==getCookie("pass")){
					EnableCanEdit();
					dialog.dialog( "close" );
				}
				return false;
			}
			dialog = $( "#pwd-confirm" ).dialog({
				autoOpen: false,
				height: 200,
				width: 350,
				position: { my: 'top', at: 'top+150' },
				modal: true,
				buttons: {
					"OK": ValidateUser,
					Cancel: function() {
						dialog.dialog( "close" );
						return false;
					}
				},
				close: function() {
					dialog.dialog( "close" );
					return false;
				}
			});
	
			form = dialog.find( "#mw_cancel_btn" ).on( "click", function( event ) {
				event.preventDefault();
				ValidateUser();
			});
			dialog.dialog( "open" );
		
  } );
	
}

function EnableCanEdit(){
	$("#add_candidate textarea ").prop("disabled", false);
	$("#add_candidate input ").prop("disabled", false);
	$("#add_candidate button").prop("disabled", false);
	$("#add_candidate select").prop("disabled", false);

	document.getElementById('mw_save_btn').style.visibility = 'visible';
   document.getElementById('e_img').disabled=false;
   $("#edu_edit_field textarea").prop("disabled", false);   
   document.getElementById('ed_nation').disabled = false;
   document.getElementById('ed_passport').disabled = false;
		var img=document.getElementById('e_img_prev');
		var originalsrc=img.src;
		var wrapper=document.getElementById('e_img');
		var snap=document.getElementById('up_snap');
		
		var video=document.createElement('video');
		video.autoplay=true;
		video.id='up_video';
		video.width=266;
		video.height=200;
		var canvas=document.createElement('canvas');
		canvas.id='up_canvas';
		canvas.width=266;
		canvas.height=200;
		var hiddninput=document.createElement('input');
		hiddninput.type='hidden';
		hiddninput.name='up_img';
		hiddninput.id='up_img';
		var 	Stream=null;
		var context = canvas.getContext("2d");
		var  videoObj = { "video": true
											 },
				track=null,
				errBack = function(error) {
					console.log("Video capture error: ", error.code); 
				};
		 document.getElementById('up_photo').addEventListener('click',function() {	
			        img.remove();
					$('#e_img').html('');
					wrapper.appendChild(canvas);
					wrapper.appendChild(video);
					wrapper.appendChild(hiddninput);

					navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||  navigator.mozGetUserMedia;
					if (navigator.getUserMedia) {
						navigator.getUserMedia({ video: videoObj },
							function(stream) {		
								video.src = window.URL.createObjectURL(stream);
								Stream=stream.getTracks()[0];
								video.onloadedmetadata = function(e) {
								video.play();
								};
								track=stream.getTracks()[0];
							},
							function(err) {
								console.log("The following error occurred: " + err.name);
							}
						);
					} else {
						console.log("getUserMedia not supported");
					}
			}, false);

			document.getElementById("up_snap").addEventListener("click", function() {
				context.drawImage(video, 0, 0, 266, 200);
				var dataURL = canvas.toDataURL();
				hiddninput.value=dataURL;
				if((Stream!=null)&&(Stream.enabled)){
					video.pause();
					Stream.stop();
					video.remove();
					}else{
						alert('Open camera please');
					}

			});
			
			document.getElementById('up_cancel').addEventListener('click',function(){
				
				if((Stream!=null)&&(Stream.enabled)){
					//video.pause();
					Stream.stop();
					}
				canvas.remove();
				video.remove();
				hiddninput.remove();
				wrapper.appendChild(img);
				img.src=originalsrc;
			});

}

function validateBeforeDelete(){
	 var ref= $('#ed_ref').val();
		$( function() {
			var dialog,     
				password = $( "#mw_pwd" );
			function ValidateUser() {
				var valid = false;
				if(password.val()==getCookie("pass")){
					deleteUser(ref);
					dialog.dialog( "close" );
				}
				return false;
			}
			dialog = $( "#pwd-confirm" ).dialog({
				autoOpen: false,
				height: 200,
				width: 350,
				top:100,
				modal: true,
				buttons: {
					"OK": ValidateUser,
					Cancel: function() {
						dialog.dialog( "close" );
						return false;
					}
				},
				close: function() {
					dialog.dialog( "close" );
					return false;
				}
			});
	
			form = dialog.find( "#mw_cancel_btn" ).on( "click", function( event ) {
				event.preventDefault();
				ValidateUser();
			});
			dialog.dialog( "open" );
		
  } );
}
function deleteUser(ref){
	console.log(ref);
	$.post("model/CandidatesModel.php", //Required URL of the page on server
									{ // Data Sending With Request To Server
										actionType:'delete',
										can_ref:ref																		
									},function(response,status){ // Required Callback Function 
						//console.log(response);
						location.reload();
					});
}

function UpdateJob(){
	var id=document.getElementById('ref').value;
	var pos=document.getElementById('pos').value;
	var coun=document.getElementById('cou').value;
	var sal=document.getElementById('sal').value;
	var over=document.getElementById('over').value;
	var ind=document.getElementById('ind').value;
	var comp=document.getElementById('comp_').value;
	//alert(id+pos+coun+ind+over);
	if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
		else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
			//alert(xmlhttp.responseText);
			location.reload();
				
				}
			}
		xmlhttp.open("POST","model/JobsModel.php?actionType=update&id="+id+"&pos="+pos+"&ind="+ind+"&coun="+coun+"&sal="+sal+"&over="+over+"&comp="+comp,true);
		xmlhttp.send();

	}// Update Job


function DeleteJob(){
		var id=document.getElementById('ref').value;

		var answer = confirm ("Are you Sure ?")
		if (answer){
			if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
					}
				else
					{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange=function()
					{
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
					//alert(xmlhttp.responseText);
					location.reload();
						
						}
					}
				xmlhttp.open("POST","model/JobsModel.php?actionType=delete&id="+id,true);
				xmlhttp.send();
		}
		else
		return;

}
function ValidateDeleteJob(){
	 var ref= $('#ed_ref').val();
		$( function() {
			var dialog,     
				password = $( "#mw_pwd" );
			function ValidateUser() {
				var valid = false;
				if(password.val()==getCookie("pass")){
					DeleteJob();
					dialog.dialog( "close" );
				}
				return false;
			}
			dialog = $( "#pwd-confirm" ).dialog({
				autoOpen: false,
				height: 200,
				width: 350,
				top:100,
				modal: true,
				buttons: {
					"OK": ValidateUser,
					Cancel: function() {
						dialog.dialog( "close" );
						return false;
					}
				},
				close: function() {
					dialog.dialog( "close" );
					return false;
				}
			});
	
			form = dialog.find( "#mw_cancel_btn" ).on( "click", function( event ) {
				event.preventDefault();
				ValidateUser();
			});
			dialog.dialog( "open" );
		
  } );
}

/*function AddCandidates(fname,lname,dob,gen,marital,mob,email,indu,prof,ed_type,ed_ins,ed_comp
						,ex_comp,ex_coun,ex_post,ex_dur,jb_pre,cou_pre,exp_sal,status
					){
			//alert(fname+lmame+dob+gender+marital+mobile+email+indu+prof+ed_type+ed_ins+ed_comp
			//			+ex_comp+ex_coun+ex_post+ex_dur+jb_pre+cou_pre+exp_sal+status
			
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		alert(xmlhttp.responseText);
			
	    }
	  }
	xmlhttp.open("POST","model/CandidatesModel.php?actionType=insert&fn="+fname+"&ln="+lname+"&dob="+
							dob+"&gen="+gen+"&mari="+marital+"&mob"+mob+"&email"+email+"&ind"+indu
							+"&prof"+prof+"&ed_type"+ed_type+"&ed_ins"+ed_ins+"&ed_comp"+ed_comp+"&ex_comp"+ex_comp+
							"&ex_coun"+ex_coun+"&ex_post"+ex_post+"&ex_dur"+ex_dur+"&jb_pre"+jb_pre+"&cou_pre"+cou_pre+
							"&exp_sal"+exp_sal+"&status"+status,true);
	xmlhttp.send();

			
	
)

}*/