<?php

class DBConnect{
     function connection(){
        if(!isset($_SESSION))  { 
            session_start(); 
        } 
        $name=$_SESSION['db'];
        $con=  mysqli_connect("localhost", "root", "", $name);
        if(!$con){
        	//echo 'connection problem in dbconnect';///////////
        }else{
        	//echo 'connection successful in dbconnect';//////////////
        }
        return $con;
     ;
    }
}

//$connectClass= new DBConnect();
//$connectionState=$connectClass->connection();
//if ($connectionState) {
//    echo 'Connection Successful';///////////
//}  else {
//    echo 'Couldn\'t connect to the DB';//////////////
//}
?>
