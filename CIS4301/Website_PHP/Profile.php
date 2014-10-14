<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
include 'connection.php';
include 'function.php';

$username = $_SESSION['name'];

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<script src="http://use.edgefonts.net/sarina.js"></script>
<script src="http://use.edgefonts.net/cutive.js"></script>
<link href="Profile_css.css" rel="stylesheet" type="text/css"/>
<link href="header_css.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
	
  <div id = "content">
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
  </div>

  <img src='closet2.jpg' id="uploadbackground"></img>

	<div id="main">
    	<div id="main_frame">
        <div id="main_body">
        <br/><br /><br /><br />
        <div id="ProfilePage">
    <div id="LeftCol">
        <div id="Photo">
          <img id="profilepic"></img>
        </div>
        <div id="ProfileOptions"></div>
    </div><br /> <br /><br />
    
    <div id="Info">
      <script>
         <?php
           if(isset($_GET['user']) && !empty($_GET['user'])){
            $user=$_GET['user'];
            $query=pg_query($conn,"Select * From users where emailid='$user';");
            $q2=pg_query("Select m.imgurl from mypic m,images i where i.imgid=m.imgid and i.profile='true' and m.emailid='$user';");
           }
           else{
             //echo "hey";
             $user=$_SESSION['name'];
             $query=pg_query($conn,"Select * From users where emailid='{$_SESSION['name']}';");
             $q2=pg_query("Select m.imgurl from mypic m,images i where i.imgid=m.imgid and i.profile='true' and m.emailid='{$_SESSION['name']}';");
              
           }
           $myid=$_SESSION['name'];
           while($row=pg_fetch_assoc($query))
            {   
            $name=$row['name'];
            $emailid=$row['emailid'];
            $dob=$row['dob'];
            $phoneno=$row['phoneno'];
            $country=$row['ucountry'];
            $gender=$row['gender'];
            }
            while($row=pg_fetch_assoc($q2))
            {
              $imgurl=$row['imgurl'];
            }
            $js_imgurl = json_encode($imgurl);
            echo "var javascript_imgurl = ". $js_imgurl . ";\n";

        ?>
        </script>
        Name :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $name; ?><br /> <br />
         Email : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $emailid; ?><br /><br />
         Date of Birth : &nbsp; <?php echo $dob; ?><br /><br />
         Phone No. : &nbsp; &nbsp; <?php echo $phoneno; ?><br /><br />
         Country : &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $country; ?><br /><br />
         Gender : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $gender; ?><br /><br />
         <?php 
         // to check who is using the profile
         if($user!=$myid){
          
           $check=pg_query("Select friend1,Friend2 from Friends where (Friend1='$myid' and Friend2='$user')or (Friend2='$myid' and Friend1='$user');"); 
           //

           if(pg_num_rows($check)>=1){ 
              echo "<a href='action.php?action=unfriend&user=$user'>Unfriend $name</a>";
           }
           else{
            //echo "<a href=''>Other Options</a>";
            $from=pg_query("Select friend1,friend2 From Request where friend1='$user' and friend2='$myid';");
            //echo $from;
            $to=pg_query("Select friend1,friend2 From Request where friend1='$myid' and friend2='$user';");
            //echo $to;
            if (pg_num_rows($from)>=1){
             
             echo "<a href='action.php?action=ignore&user=$user'>Ignore</a>" ." <a href='action.php?action=accept&user=$user'>Accept</a>";    
            }
            else if(pg_num_rows($to)>=1) {
               echo "<a href='action.php?action=cancel&user=$user'>Cancel Request</a>";
            }
            else{
              echo "<a href='action.php?action=send&user=$user '>Send Request</a>";
            }

           }
         }
         ?>
    </div> <br/> <br/><br /><br/>
	

    <!-- Needed because other elements inside ProfilePage have floats -->
    <div style="clear:both"></div>
</div>
        </div>
        
        </div>
        
    </div>
    <script type="text/javascript" src="loggedIn_JS.js"></script>
    <script type="text/javascript">
      $("#profilepic").attr('src', javascript_imgurl);
    </script>
</body>
</html>
