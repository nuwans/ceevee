<?php
	
	session_start();
	//session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['first_name']);
	include("controlers/DBConnect.php");
	$dbCon = new DBConnect();
	

	
	if(isset($_POST['submit'])){
		
		$error= array();
		
		//username		
		if(empty($_POST['username'])){
				$error[]='please enter a username. ';
		}	else if ( ctype_alnum($_POST['username'])) {
				$username = $_POST['username'];
		} 	else{
			$error[]='Username must consist of letters and numbers only. ';
		}
		
		//password
		if(empty($_POST['password'])){
			$error[]='please enter a password. ';
		}	else {
				$password = $_POST['password'];
		}
		
		if(empty($_POST['ceeveedb'])){
			$error[]='Select db name ';
		}else {
			$_SESSION['db'] =  $_POST['ceeveedb'];
		}
		// $error[]=$dbname;
		$connectionState=$dbCon->connection();
		//echo $connectionState;
		
		if (empty ($error)){
				$result ="SELECT * FROM users WHERE username='$username' AND password='$password' ;";
			
				$ViewResult=mysqli_query($connectionState,$result);
				if (mysqli_num_rows($ViewResult)==1){
					$row = mysqli_fetch_row($ViewResult);
					$_SESSION['user_id'] =  $row[0];
					$_SESSION['password'] =  $row[1];
					//$_SESSION['first_name'] =$row[3];
					$_SESSION['name'] =$row[2];
					setcookie('username', $row[0], time() + (86400 * 30), "/");
					setcookie('pass', $row[1], time() + (86400 * 30), "/");
					//echo 'sss';
					header('Location:home.php');
					//echo "done" . $_SESSION['user_id'] .$_SESSION['first_name'];
				}
				
				else{
				$error_message ='<span class="error"> Username or password is incorrect </span> <br /> <br />' ;
			}
			}else{
			$error_message ='<span class="error">' ;
				foreach($error as $key => $values) {
					$error_message.= "$values";
				}
			$error_message.="</span> <br/><br/>";
			}
	

}	
			
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" href="css/style.css"/>
<title>Sign In</title>
<link rel="icon" 
      type="image/png" 
      href="images/favicon.ico">
</head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
	function ChangeDB(){
	var db=	document.getElementById('ceeveedb').value;
	$.ajax({
        url: 'index.php',
        type: 'POST',
        data: {
            txt: db
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {
            console.log(data); // do with data e.g success message
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(textStatus.reponseText);
        }
    });
	}
</script>
<body>
<div id="wrapper">
	 <div id="login_header"><img  id="login_banner" alt="logo" src="images/header.png"  />
	 
	 </div>
	 <div id="content"> 
	 <form id="login" method="post" action="index.php" >
	 
	 <p>
	 <input  class="input_f" type="text" name="username"  placeholder="USERNAME" /> 
	 <input class="input_f" type="password" name="password" placeholder="PASSWORD"/> 
	 <select class="input_f"  name="ceeveedb" >
	 	<option value="ceeveebi_ceevee" selected>ceevee</option>
	 	<option value="ceeveebi_mil" selected>MIL</option>
	 	<option value="ceeveebi_mpl">MPL</option>
	 	<option value="ceeveebi_esl">ESL</option>
	 	<option value="ceeveebi_aims">AIMS</option>
	 	<option value="ceeveebi_has">HAS</option>
	 </select>
	 
	 </p>
	 <p> <input type="submit" id="submit"  value="LOGIN" name="submit"/></p>
	 
	 </form>
	 
	 <?php if (isset($error_message)){ //echo $error_message;
	 }?>

	 </div>

</div>

</body>

</html>
