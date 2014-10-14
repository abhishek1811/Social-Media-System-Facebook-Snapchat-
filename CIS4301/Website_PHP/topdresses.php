<!doctype html>

<?php
include 'connection.php';
include 'function.php';

$username = $_SESSION['name'];

?>

<html>
<head>
<meta charset="utf-8">
<title>Top Dresses</title>

<link href="header_css.css" rel="stylesheet" type="text/css">
<link href="topStoreCSS.css" rel="stylesheet" type="text/css">
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
                <p class="name smalltext">username:</p>
                <p class="date smalltext"></p>
                <div class="avgrate smalltext">Avg:<div class="rateit avg" data-rateit-value="" data-rateit-ispreset="true" data-rateit-readonly="true"></div></div>
                <p class="description smalltext"></p>
                <p class="other2 smalltext"></p><br/>
                <p class="other smalltext"></p><br/>
                <p class="desc smalltext">Description:</p>
                <p class="other1 smalltext"></p>

            </div>
        </template>
        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - -->
  		<script>
			<?php
				$query=pg_query("Select s.sname,i.imgtag,i.imgdesc,i.price,i.buylocation,i.avgrating,i.datetime,i.country,m.imgurl from Images i ,Stores s,havedresses h,mypic m
where s.storeid=h.storeid and h.imgid=i.imgid  and m.imgid=i.imgid
order by i.Avgrating desc limit 10;");
				while($row=pg_fetch_assoc($query)){
					$imgtag_array[]=$row['imgtag'];
					$avgrating_array[]=$row['avgrating'] / 2;
          $sname_array[]=$row['sname'];
          $price_array[]=$row['price'];
          $time_array[]=$row['datetime'];
          $imgdesc_array[]=$row['imgdesc'];
          $country_array[]=$row['country'];
          $imgurl_array[]=$row['imgurl'];
				}
				$js_imgtag_array = json_encode($imgtag_array);
				$js_avgrating_array = json_encode($avgrating_array);
        $js_sname_array = json_encode($sname_array);
        $js_price_array = json_encode($price_array);
        $js_time_array = json_encode($time_array);
        $js_imgdesc_array = json_encode($imgdesc_array);
        $js_country_array = json_encode($country_array);
        $js_imgurl_array = json_encode($imgurl_array);
				echo "var javascript_imgtag_array = ".$js_imgtag_array.";\n";
				echo "var javascript_avgrating_array = ".$js_avgrating_array.";\n";
        echo "var javascript_sname_array = ".$js_sname_array.";\n";
        echo "var javascript_price_array = ".$js_price_array.";\n";
        echo "var javascript_time_array = ".$js_time_array.";\n";
        echo "var javascript_imgdesc_array = ".$js_imgdesc_array.";\n";
        echo "var javascript_country_array = ".$js_country_array.";\n";
        echo "var javascript_imgurl_array = ".$js_imgurl_array.";\n";
			?>
		</script>
  </div>
  <script type="text/javascript" src="loggedIn_JS.js"></script>
  <script type="text/javascript" src="topDressesShowCards.js"></script>
  <script type="text/javascript" src="photoTemplateTopCheapDresses.js"></script>
  <script type="text/javascript" src="rateit/src/jquery.rateit.js"></script>
</body>


</html>