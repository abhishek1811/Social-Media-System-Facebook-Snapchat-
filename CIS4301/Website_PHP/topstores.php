<!doctype html>

<?php
include 'connection.php';
include 'function.php';

$username = $_SESSION['name'];

?>

<html>
<head>
<meta charset="utf-8">
<title>Top Stores</title>

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
                <a href="" class="name smalltext" target="_blank">username:</a>
                <p class="date smalltext"></p><br/>
                <p class="rating smalltext"></p>
                <p class="description smalltext"></p>
                <p class="other smalltext"></p>
                <p class="other1 smalltext"></p>
                <p class="other2 smalltext"></p>
            </div>
        </template>
        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - -->
  		<script>
			<?php
				$query=pg_query("Select q.Storeid,s.sname,s.url,s.country,s.city,s.street,s.shopno ,q.count from ( Select Storeid,count(imgid) from havedresses group by storeid order by count desc limit 10) q ,Stores s  where q.storeid=s.storeid  order by count desc limit 10;");
				while($row=pg_fetch_assoc($query)){
					$sname_array[]=$row['sname'];
					$count_array[]=$row['count'];
          $url_array[]=$row['url'];
          $street_array[]=$row['street'];
          $city_array[]=$row['city'];
          $country_array[]=$row['country'];
          $shopno_array[]=$row['shopno'];
          //get images for stores. name them 'upload/'.$sname and put in upload folder
          //$imgurl_array[] = 'upload/'.$sname;
				}
				$js_sname_array = json_encode($sname_array);
				$js_count_array = json_encode($count_array);
        $js_url_array = json_encode($url_array);
        $js_street_array = json_encode($street_array);
        $js_city_array = json_encode($city_array);
        $js_country_array = json_encode($country_array);
        $js_shopno_array = json_encode($shopno_array);
        //$js_imgurl_array = json_encode($imgurl_array);
				echo "var javascript_sname_array = ".$js_sname_array.";\n";
				echo "var javascript_count_array = ".$js_count_array.";\n";
        echo "var javascript_url_array = ".$js_url_array.";\n";
        echo "var javascript_street_array = ".$js_street_array.";\n";
        echo "var javascript_city_array = ".$js_city_array.";\n";
        echo "var javascript_country_array = ".$js_country_array.";\n";
        echo "var javascript_shopno_array = ".$js_shopno_array.";\n";
        //echo "var javascript_imgurl_array = ".$js_imgurl_array.";\n";

        for ($i = 0; $i < count($sname_array); $i++) {
        $r2 = pg_query("SELECT * FROM stores WHERE sname='".$sname_array[$i]."';");
        if ($ro2 = pg_fetch_assoc($r2)) {
          $imgurl_array[] = $ro2['imgid'];
        }
        $js_imgurl_array = json_encode($imgurl_array);
        }
        echo "var javascript_imgurl_array = ". $js_imgurl_array . ";\n";
			?>
		</script>
  </div>
  <script type="text/javascript" src="loggedIn_JS.js"></script>
  <script type="text/javascript" src="TopStoresShowCards.js"></script>
  <script type="text/javascript" src="showTemplateNotHome.js"></script>
</body>


</html>

