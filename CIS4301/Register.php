<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Process</title>
<script src="http://use.edgefonts.net/sarina.js"></script>
<script src="http://use.edgefonts.net/cutive.js"></script>
<link href="Register_css.css" rel="stylesheet" type="text/css"  />
</head>

<body>
	<div id="main">
    	<div id="main_frame">
        <div id="main_body">
        <div id="Register_body">
        <br/><br/><br/>
        <form  method="POST">
          <br/><br/>
         <input class="text" type="text" name="email" size="30" placeholder="Email"/> <br>
         <input class="text" type="text" name="name" size="30" placeholder="Name"/> <br>
         <input class="text" type="password" name="password" size="30" placeholder="Password"/> <br>
         <input class="text" type="test" name="dob" size="20" placeholder="Birthday"/> <br>
         <input class="text" type="text" name="contact" size="15" placeholder="Phone"/> <br>
         <input class="text" type="text" name="country" size="20" placeholder="Country"/> <br>
         <input class="text" type="text" name="gender" size="10" placeholder="Gender"/> <br>
         <input class="submitbutton" type="submit" name="submit" /> <br> <br>
         <script>
         <?php
              if(isset($_POST['submit']))
              {
                $string="host=localhost port=5432 user=gabrielduarte dbname=gabrielduarte";
                $conn=pg_connect($string);


               $name =$_POST['name'];
               $email =$_POST['email'];
               $password =$_POST['password'];
               $birthday =$_POST['dob'];
               $contact =$_POST['contact'];
               $country =$_POST['country'];
               $gender =$_POST['gender'];

               $pwd=md5($password);

               $imgid = rand();

                if(empty($name) or empty($email) or empty($birthday) or empty($gender))
                {
                    echo "alert('Mandatory fields are empty!');";
                }
                 else{
                  $x=pg_query($conn,"INSERT INTO users VALUES ('$email','$name','$pwd','$birthday','$contact','$country','$gender');");
                  pg_query("INSERT INTO images (imgid, imgtag, datetime, emailid, profile) VALUES ('$imgid', 'profilepic', CURRENT_TIMESTAMP, '$email', 't');");
                    if($gender=='M') {
                    pg_query("INSERT INTO mypic (imgid, name, imgurl, emailid) VALUES ('$imgid', 'profilepic', 'upload/defaultprofilepicM.jpg', '$email');");
                    } else {
                      pg_query("INSERT INTO mypic (imgid, name, imgurl, emailid) VALUES ('$imgid', 'profilepic', 'upload/defaultprofilepicF.jpg', '$email');");
                    }
                    echo "alert('Congrats! You can now login with: $email')";
                    //automatic redirect to main page now
                    //header('location: main.php');
                 }
              

              }           
            ?>
            </script>

         </form>
	</div>
        </div>
        
        </div>
        
    </div>
</body>
</html>
