<!doctype html>

<?php
include 'connection.php';
include 'function.php';

$username = $_SESSION['name'];

?>

<html>
<head>
<meta charset="utf-8">
<title>Newest Dresses</title>

<link href="header_css.css" rel="stylesheet" type="text/css">
<link href="backupOfOldLoggedInStylesheet.css" rel="stylesheet" type="text/css">
<script src="http://use.edgefonts.net/sarina.js"></script>
<script src="http://use.edgefonts.net/cutive.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>

<body id="body">
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
        <!--wrap this in div? to set scroll bar not over header-->
        <template id="photo-template">
            <div class="template-border">
                <div class="image-holder">
                    <img class="question-mark"></img>
                </div>
                <a href="" class="name smalltext">username:</a>
                <p class="date smalltext"></p>
                <p class="rating smalltext"></p>
                <p class="description smalltext"></p>
                <p class="other smalltext"></p>
            </div>
        </template>
        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - -->
  		<script>
			<?php
				$query=pg_query($conn,"SELECT users.emailid, users.name, imgurl FROM images, users, mypic where users.emailid = images.emailid AND users.emailid=mypic.emailid AND images.imgid=mypic.imgid AND profile='t' AND users.emailid IN (Select friend2 From friends f, users u where f.Friend1='$username'and u.emailid=f.friend2);");
				while($row=pg_fetch_assoc($query))
				{
				  $name_array[]=$row['name'];
					$name2_array[]=$row['emailid'];
          $imgurl_array[]=$row['imgurl'];	
				}
				$js_name_array = json_encode($name_array);
				$js_name2_array = json_encode($name2_array);
        $js_imgurl_array = json_encode($imgurl_array);
				echo "var javascript_name_array = ".$js_name_array.";\n";
				echo "var javascript_name2_array = ".$js_name2_array.";\n";
        echo "var javascript_imgurl_array = ".$js_imgurl_array.";\n";
			?>
		</script>
  </div>
  <script type="text/javascript" src="loggedIn_JS.js"></script>
  <script type="text/javascript" src="showFriendCards.js"></script>
  <script type="text/javascript" src="photoTemplateJS.js"></script>
</body>


</html>