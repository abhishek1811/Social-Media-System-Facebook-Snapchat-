<!doctype html>

<?php 

	include 'connection.php';
	include 'function.php';
	$username = $_SESSION['name'];
?>

<html>
<head>
<title>Upload to your Closet</title>

<link href="loggedIn_stylesheet.css" rel="stylesheet" type="text/css">
<link href="header_css.css" rel="stylesheet" type="text/css">
<link href="upload_css.css" rel="stylesheet" type="text/css">
<script src="http://use.edgefonts.net/sarina.js"></script>
<script src="http://use.edgefonts.net/cutive.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<div id ='body'>
	
	<div id="content">
        <div id="header">
          <div id="siteName">
              <a href="home.php">Dressolutions</a>
          </div>
          <div id="user">
            <p id="globalName">
              <?php  echo $username;?> 
            </p>
          </div>
          <div id="friend-requests">
            <p>
              <?php
                $q2 = pg_query("Select count (friend1) as cnt from Request where friend2='$username';");

                while($r=pg_fetch_array($q2))
                {  
                  $count=$r['cnt'];
                  if ($count) {
                    echo 'new requests: '.$count;
                  }
                }
              ?>
            </p>
          </div>
          <form id="search" action="search.php" method="GET">
            <input size="40" type="text" name="s" placeholder="search"/>
          </form>
        </div>
        
        <div id="left-dropdown-wrapper">
          <ul id="left-dropdown">
            <a href="toptenuser.php"><li>Top Users</li></a>
            <a href="topstores.php"><li>Top Stores</li></a>
            <a href="cheapeststores.php"><li>Cheapest Stores</li></a>
            <a href="topdresses.php"><li>Top Dresses</li></a>
            <a href="newsetdresses.php"><li>Newest Dresses</li></a>
          </ul>
        </div>
        <div id="right-dropdown-wrapper">
          <ul id="right-dropdown">
            <a href="upload.php"><li>Upload</li></a>
            <a href="viewfriend.php"><li>Friends</li></a>
            <a href="EditProfile.php"><li>Edit Profile</li></a>
            <a href="logout.php"><li>Logout</li></a>
          </ul>
        </div>
	<img src='YourCloset.jpg' id="uploadbackground"></img>
<div id='container-container'>
	<div id='container'>
		<div id='wrapper'>
		<!--<img src='YourCloset.jpg' id="uploadbackground2"></img>-->
		
	</div>
	</div>
</div>
<div id="noback">
		<form enctype='multipart/form-data' method='post'>
		<script>
		<?php
			if(isset($_POST['upload'])) {
				$name = $_POST['name'];
				$file = $_FILES['file']['name'];
				$file_type = $_FILES['file']['type'];
				$file_tmp = $_FILES['file']['tmp_name'];
				$random_name = rand();
				$random_uploadpath = 'upload/'.$name.$random_name;

				$desc = $_POST['desc'];
				$price = $_POST['price'];
				$buylocation = $_POST['buylocation'];

				$profilepic = isset($_POST['profilepic']) ? 1 : 0;
				
				if(empty($file)) {
					echo "alert('Please Insert A File!');";
				}
				else {
					if ($profilepic) {
						$q = pg_query("Select imgid from images where emailid='$username' and profile='true';");
		                while($row=pg_fetch_assoc($q)) {
		                  $imgid=$row['imgid'];
		                }
		                move_uploaded_file($file_tmp, $random_uploadpath.'.jpg');
		                pg_query("Delete  From mypic where imgid=$imgid;");
		                pg_query("Delete  From Images where imgid=$imgid;");
		                pg_query("INSERT INTO images (imgid, imgtag, datetime, emailid, profile) VALUES('$random_name', 'profilepic', CURRENT_TIMESTAMP, '$username', 't');");
		                pg_query("INSERT INTO mypic (imgid, imgurl, emailid) VALUES('$random_name', '$random_uploadpath.jpg', '$username');");

		                echo "alert('Profile Pic Updated!');";

					} else {
						$q = pg_query("SELECT ucountry FROM users WHERE emailid='$username';");
						while($r=pg_fetch_assoc($q)) {
							$country = $r['ucountry'];
						}
						$q2 = pg_query("SELECT storeid FROM stores WHERE sname = '$buylocation';");
						while($r2=pg_fetch_assoc($q2)) {
							$storeid = $r2['storeid'];
						}
						move_uploaded_file($file_tmp, $random_uploadpath.'.jpg');
						pg_query("INSERT INTO images (imgid, imgtag, datetime, emailid, imgdesc, price, buylocation, country, profile) VALUES('$random_name', '$name', CURRENT_TIMESTAMP, '$username', '$desc', '$price', '$buylocation', '$country', '$profilepic');");
						pg_query("INSERT INTO mypic (imgid, imgurl, name, emailid) VALUES('$random_name', '$random_uploadpath.jpg', '$name', '$username');");
						pg_query("INSERT INTO havedresses (imgid, storeid) VALUES ('$random_name', '$storeid');");
						pg_query("INSERT INTO upload (emailid, imgid, time) VALUES ('$username', '$random_name', CURRENT_TIMESTAMP);");

						echo "alert('Dress Uploaded!');";
					}
				}
			}
		?>
	</script>
			<p>
			<input class="inputtext" type='text' name='name' id="namebox" placeholder="Name"/><br/>
			<input class="inputtext" type='text' name='desc' id="descbox" placeholder="Description"/><br/>
			<input class="inputtext" type='text' name='price' id="pricebox" placeholder="Price"/><br/>
			
			<select class="selectbox" name="buylocation" value="options" id="storebox">
				<option value="Abercrombie & Fitch">Abercrombie & Fitch</option>
				<option value="Hollister">Hollister</option>
				<option value="Forever21">Forever21</option>
				<option value="American Eagle">American Eagle</option>
				<option value="Aeropostale">Aeropostale</option>
				<option value="H & M">H & M</option>
				<option value="Zara">Zara</option>
				<option value="Pac Sun">Pac Sun</option>
				<option value="Ralph Lauren">Ralph Lauren</option>
				<option value="Topshop">Topshop</option>
				<option value="Pepe Jeans London">Pepe Jeans London</option>
				<option value="Claire's">Claire's</option>
				<option value="Ed Hardy">Ed Hardy</option>
				<option value="Victoria's Secret">Victoria's Secret</option>
				<option value="Delia's">Delia's</option>
				<option value="Wet Seal">Wet Seal</option>
				<option value="Tommy Hilfiger">Tommy Hilfiger</option>
				<option value="Nordstrom's">Nordstrom's</option>
				<option value="ASOS">ASOS</option>
				<option value="Guess">Guess</option>
				<option value="Macy's">Macy's</option>
				<option value="Express">Express</option>
				<option value="Diesel">Diesel</option>
				<option value="Lucky">Lucky</option>
				<option value="Michael Kors">Michael Kors</option>
				<option value="J. Crew">J. Crew</option>
				<option value="Chico's">Chico's</option>
			</select>
			
			
			<input class="fileinput" type='file' name='file' id="photosel"/><br/>
			<div id="labelprofile" for="profilecheck">Set profile pic? <input class="check" type="checkbox" name="profilepic" value="1" id="profilecheck"></div>
			</p>
			<input class="submitbutton" type='submit' name='upload' values='Upload' />
			<script type="text/javascript" src="loggedIn_JS.js"></script>
		
		</form>
</div>

</div>

</body>
</html>