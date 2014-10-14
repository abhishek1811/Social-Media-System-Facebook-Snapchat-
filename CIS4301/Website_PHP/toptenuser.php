<!doctype html>

<?php
include 'connection.php';
include 'function.php';

$username = $_SESSION['name'];

?>

<html>
<head>
<meta charset="utf-8">
<title>Top Users</title>

<link href="header_css.css" rel="stylesheet" type="text/css">
<link href="backupOfOldLoggedInStylesheet.css" rel="stylesheet" type="text/css">
<link href="rateit/src/rateit.css" rel="stylesheet" type="text/css">
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
                <div class="smalltext">Avg Picture Rating:<div class="rateit avg" data-rateit-value="" data-rateit-ispreset="true" data-rateit-readonly="true"></div></div>
                <p class="rating smalltext"></p>
                <p class="description smalltext"></p>
                <p class="other smalltext"></p>
            </div>
        </template>
        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - -->
  		<script>
			<?php
				$query=pg_query("With query as
				(Select u.name,u.emailid ,i.avgrating,i.imgid From users u,images i,upload p where u.emailid=p.emailid and i.imgid=p.imgid)
				Select q.emailid,avg(avgrating) From query q group by emailid order by avg desc limit 10;");
				while($row=pg_fetch_assoc($query)){
					$emailid_array[]=$row['emailid'];
					$avg=$row['avg'] / 2;
					$avg_array[]=number_format((float)$avg, 2, '.', '');
          //$imgurl_array[] = $row['imgurl'];
				}
				$js_email_array = json_encode($emailid_array);
				$js_avg_array = json_encode($avg_array);
        //$js_imgurl_array = json_encode($imgurl_array);
				echo "var javascript_email_array = ".$js_email_array.";\n";
				echo "var javascript_avg_array = ".$js_avg_array.";\n";
        //echo "var javascript_imgurl_array = ".$js_imgurl_array.";\n";
        for ($i = 0; $i < count($emailid_array); $i++) {
        $r2 = pg_query("Select m.imgurl from mypic m,images i where i.imgid=m.imgid and i.profile='true' and m.emailid='".$emailid_array[$i]."';");
        if ($ro2 = pg_fetch_assoc($r2)) {
          $imgurl_array[] = $ro2['imgurl'];
        }
        $js_imgurl_array = json_encode($imgurl_array);
      }
      echo "var javascript_imgurl_array = ". $js_imgurl_array . ";\n";
      ?>
		</script>
  </div>
  <script type="text/javascript" src="loggedIn_JS.js"></script>
  <script type="text/javascript" src="topTenUsersCards.js"></script>
  <script type="text/javascript" src="showTemplateNotHome.js"></script>
  <script type="text/javascript" src="rateit/src/jquery.rateit.js"></script>
</body>


</html>