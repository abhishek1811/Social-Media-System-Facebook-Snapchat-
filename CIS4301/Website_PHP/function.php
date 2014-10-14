<?php
session_start();

function loggedin(){
	if(isset($_SESSION['username']) && ! empty($_SESSION['username']) )
	{
	 return false;
	}
	else{
	return true;
	}
}

function getuser($emailid,$field){
 $query=pg_query("Select $field From users where emailid='$emailid';");
  $run=pg_fetch_array($query);
  return $run[$field];
}	
?>