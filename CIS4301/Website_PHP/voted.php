<?php
include 'connection.php';
include 'function.php';

$username = $_SESSION['name'];

$rating = $_POST['value'];
$productid = $_POST['id'];

$maxquery = pg_query("SELECT MAX(reviewid) FROM reviews;");
$maxarray = pg_fetch_array($maxquery);
$max = $maxarray[0] + 1;
$query = pg_query("INSERT INTO reviews (reviewid, emailid, imgid, rate) VALUES ('$max', '$username', '$productid', '$rating');");
$query2 = pg_query("SELECT AVG(rate) AS avg FROM reviews WHERE imgid = '$productid'");
while($row=pg_fetch_assoc($query2)){
	$avg=$row['avg'];
}
pg_query("UPDATE images SET avgrating = '$avg' WHERE imgid = '$productid';");
?>