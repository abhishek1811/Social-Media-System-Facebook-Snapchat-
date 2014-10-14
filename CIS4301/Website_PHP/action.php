<?php
include 'connection.php';
include 'function.php';

$action=$_GET['action'];
$user=$_GET['user'];
$myid=$_SESSION['name'];
if($action=='send'){
	$x=pg_query("Insert into Request (friend1,friend2) Values('$myid','$user');");
    
}
if($action=='cancel'){
	$x=pg_query("Delete From Request where friend1='$myid' and friend2='$user';");
    
}
if($action=='accept'){
	$x=pg_query("Delete From Request where friend1='$user'and friend2='$myid';");
    $y=pg_query("Insert into Friends (Friend1,Friend2) Values('$user','$myid');");
    $z=pg_query("Insert into Friends (Friend1,Friend2) Values('$myid','$user');");
    /*echo "x: ".$x;
    echo "y: ".$y;
    echo "z: ".$z;*/
}
if ($action=='unfriend'){
    $u=pg_query("Delete From Friends where (friend1='$myid'and friend2='$user') or (friend2='$myid'and friend1='$user');");
    //echo $u."unfriend";
}
if($action=='ignore'){
	//echo "Hey";
	$i=pg_query("Delete From Request where friend2='$myid' and friend1='$user';");
    //echo $i."Pos";
    //$user=$myid;
}
header('location: profile.php?user='.$user);
?> 