
<!doctype html>

<?php

// Connect to postgres database server
$string="host=localhost port=5432 user=gabrielduarte dbname=gabrielduarte";
$conn=pg_connect($string);
if($conn)
{
	//echo "Connected";
}
//

// Get username/password from input text field
$username=$_POST['email'];
$passw=md5($_POST['password']);
//
// Log in if correct, if not redirect to log in page
if($username && $passw)
{


  $x=pg_query($conn," Select emailid,name,password from Users where emailid = '$username';");

  //If username does not exists
  if($x!=0)
  {

	  while($row=pg_fetch_assoc($x))
      {   
      	$username1=$row['emailid'];
	    @$name=$row['name'];
	    @$password=$row['password'];
      }
       
      //echo"<br>".$name."<br>";//.$password."</br>";
    
     if($passw==$password&&$username==$username1 )
     { 
      //echo "you are in!";
      session_start();
      $_SESSION['name']=$username;
      //echo "<br>session: ".$_SESSION['name'];
      //***echo ("<br><a href ='searchfriend.php'>&nbsp;searchforfriend</a>");
      //***echo ("<br></br><a href ='viewfriend.php'>&nbsp;viewfriend</a>");
     }
      else {
        echo '<script type="text/javascript">
                window.location.href = "http://localhost:8888/CIS4301/main.html";
               </script>';
        die();
      }
  }
  else
  die("User does not exist");

}
else {
  die("</br>Please enter username and password");
}
//

?>

<html>
<head>
<meta charset="utf-8">
<title>Welcome! Start Rating Now!</title>

<link href="loggedIn_stylesheet.css" rel="stylesheet" type="text/css">
<link href="header_css.css" rel="stylesheet" type="text/css">
<link href="rateit/src/rateit.css" rel="stylesheet" type="text/css">
<script src="http://use.edgefonts.net/sarina.js"></script>
<script src="http://use.edgefonts.net/cutive.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


</head>

<body id="body">

  <script type='text/javascript'>
    <?php
        // Get all names from table
      $result = pg_query("SELECT imgid FROM images WHERE profile='f';");
      while ($row = pg_fetch_row($result)) {
        $imgid_array[] = $row[0];
      }
      /* get yourrating for pictures
      $imgid_array = array("5850504754","5740584059","4049464049","5759405050","5654505050");
      //for ($i = 0; $i < count($imgid_array); $i++) {
        $arrayindex = $imgid_array[0];
        $query=pg_query($conn,"Select rate from reviews where emailid='$username' and imgid='$arrayindex';");
        while($r=pg_fetch_row($query))
        { 
          $rate=$r[0] / 2;
        }
      //}
      */
      $js_imgid_array = json_encode($imgid_array);
      //$js_rate_array = json_encode($rate);
      echo "var javascript_imgid_array = ". $js_imgid_array . ";\n";
      //echo "var javascript_yourrating_array = ". $js_rate_array . ";\n";
      for ($i = 0; $i < count($imgid_array); $i++) {
        $r = pg_query("SELECT * FROM users, mypic, images WHERE users.emailid = mypic.emailid AND users.emailid=images.emailid AND images.imgid=mypic.imgid AND profile='0' AND mypic.imgid = ".$imgid_array[$i].";");
        while ($ro=pg_fetch_assoc($r)) {
          $emailid_array[] = $ro['emailid'];
          $imgurl_array[] = $ro['imgurl'];

          $imgtag_array[] = $ro['imgtag'];
          $imgdesc_array[] = $ro['imgdesc'];
          $imgcountry_array[] = $ro['country'];
          $imgstore_array[] = $ro['buylocation'];
          $imgavgrate_array[] = $ro['avgrating'] / 2;
          $imgdatetime_array[] = $ro['datetime'];
          $imgprice_array[] = $ro['price'];
        }
        $js_emailid_array = json_encode($emailid_array);
        $js_imgurl_array = json_encode($imgurl_array);

        $js_imgtag_array = json_encode($imgtag_array);
        $js_imgdesc_array = json_encode($imgdesc_array);
        $js_imgcountry_array = json_encode($imgcountry_array);
        $js_imgstore_array = json_encode($imgstore_array);
        $js_imgavgrate_array = json_encode($imgavgrate_array);
        $js_imgdatetime_array = json_encode($imgdatetime_array);
        $js_imgprice_array = json_encode($imgprice_array);
      }
      echo "var javascript_emailid_array = ". $js_emailid_array . ";\n";
      echo "var javascript_imgurl_array = ". $js_imgurl_array . ";\n";

      echo "var javascript_imgtag_array = ". $js_imgtag_array . ";\n";
      echo "var javascript_imgdesc_array = ". $js_imgdesc_array . ";\n";
      echo "var javascript_imgcountry_array = ". $js_imgcountry_array . ";\n";
      echo "var javascript_imgstore_array = ". $js_imgstore_array . ";\n";
      echo "var javascript_imgavgrate_array = ". $js_imgavgrate_array . ";\n";
      echo "var javascript_imgdatetime_array = ". $js_imgdatetime_array . ";\n";
      echo "var javascript_imgprice_array = ". $js_imgprice_array . ";\n";

      for ($i = 0; $i < count($imgid_array); $i++) {
        $r2 = pg_query("SELECT rate FROM reviews WHERE imgid = ".$imgid_array[$i]." AND emailid = '$username';");
        if ($ro2 = pg_fetch_assoc($r2)) {
          $yourrate_array[] = $ro2['rate'] / 2;
        } else {
          $yourrate_array[] = 0;
        }
        $js_yourrate_array = json_encode($yourrate_array);
      }
      echo "var javascript_yourrate_array = ". $js_yourrate_array . ";\n";
    ?>
  </script>
  
    <div id="window-overlay">
    
      <div id="photo-overlay">
          
            <div class="rectangle comments-tab">
              <p class="tab-text" class="inset-text-shadow">comments</p>
            </div>
            <div class="triangle-border comments-tab"></div>
            <div class="triangle comments-tab"></div>
            
            <div class="rectangle prices-tab">
                <p class="tab-text" class="inset-text-shadow">prices</p>
            </div>
            <div class="triangle-border prices-tab"></div>
            <div class="triangle prices-tab"></div>
            
            <div class="rectangle rate-tab">
                <p class="tab-text" class="inset-text-shadow">rate</p>
            </div>
            <div class="triangle-border rate-tab"></div>
            <div class="triangle rate-tab"></div>
        
          <div id="photo-overlay-holder">
              <img id="photo-overlay-question-mark"></img>
          </div>
            <a href="" id="bigname" class="bigtext">asdf</a>
            <div id="big-imgtag">tag</div>
            <div id="big-imgdatetime">datetime</div>
            <div id="big-imgstore">store</div>
            <div id="big-imgprice">price</div>
            <div id="big-imgcountry">country</div>
            <div id="avgrating-cont" class="bigtext">Avg:<div id="avgrating" class="rateit" data-rateit-value="" data-rateit-ispreset="true" data-rateit-readonly="true"></div></div>
            <div id="yourrating-cont" class="bigtext">Your Rating:<div id="yourrating" class="rateit" data-rateit-value="" data-rateit-ispreset="true" data-rateit-readonly="true"></div></div>
            <div id="ratenow-cont" class="bigtext">Rate:<div id="ratenow" class="rateit" data-rateit-value="" data-rateit-ispreset="true" data-rateit-readonly="false" data-rateit-resetable="false"></div></div>
            <div id="timer" class="bigtext">timer</div>
            <div id="big-imgdesc">desc</div>
        </div>
    
    </div>
    
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
                <a class="name smalltext">username:</a><br/><br/>
                <div class="date smalltext">Avg:<div class="avgrating rateit" data-rateit-value="0" data-rateit-ispreset="true" data-rateit-readonly="true"></div></div>
                <div class="rate smalltext">Your Rating:<div class="yourrating rateit" data-rateit-value="" data-rateit-ispreset="true" data-rateit-readonly="true"></div></div>
                <div id="canVote" class="description smalltext">Rate:<div class="ratenow rateit" data-rateit-value="" data-rateit-ispreset="true" data-rateit-readonly="false" data-rateit-resetable="false"></div></div>
                <p class="other smalltext"></p>
                <div class="imgtag">tag</div>
                <div class="imgdesc">desc</div>
                <div class="imgcountry">country</div>
                <div class="imgstore">store</div>
                <div class="imgdatetime">datetime</div>
                <div class="imgprice">price</div>
            </div>
        </template>
        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - -->
  </div>

<script type="text/javascript" src="photoTemplateJS.js"></script>
<script type="text/javascript" src="showPhotoTemplateJS.js"></script>
<script type="text/javascript" src="screenOverlayJS.js"></script>
<script type="text/javascript" src="tabDynamicSizeJS.js"></script>
<!--<script type="text/javascript" src="hoverPhotoForTabsJS.js"></script>-->
<script type="text/javascript" src="loggedIn_JS.js"></script>
<script type="text/javascript" src="rateit/src/jquery.rateit.js"></script>
<script type="text/javascript" src="vote.js"></script>

</body>
</html>