<!doctype html>

<?php
    $string_connection = "host=localhost port=5432 user=apple dbname=apple";
    $conn = pg_connect($string_connection);

    $dom = new DOMDocument();
    $html = '
<html>
<head>
<meta charset="utf-8">
<title>Hey, you just logged in !</title>

<link href="loggedIn_stylesheet.css" rel="stylesheet" type="text/css">
<script src="http://use.edgefonts.net/sarina.js"></script>
<script src="http://use.edgefonts.net/cutive.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="sessionvars.js"></script>


</head>

<body id="body">
	
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
            	<p id="photo-overlay-question-mark">?</p>
            </div>
       	</div>
    
    </div>
    
	<div id="content">
        <div id="header">
        	<div id="siteName">
              	<p>Name Here</p>
            </div>
     		<div id="user">
            	<p id="globalName">User</p>
            </div>
        </div>
        <!--wrap this in div? to set scroll bar not over header-->
        <template id="photo-template">
            <div class="template-border">
                <div class="image-holder">
                    <p class="question-mark">?</p>
                </div>
                <p class="user">hello</p>
            </div>
        </template>
        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - -->
	</div>

<script type="text/javascript" src="photoTemplateJS.js"></script>

<script type="text/javascript" src="showPhotoTemplateJS.js"></script>
</body>
<script type="text/javascript" src="screenOverlayJS.js"></script>
<script type="text/javascript" src="tabDynamicSizeJS.js"></script>
<script type="text/javascript" src="hoverPhotoForTabsJS.js"></script>

</html>';

$dom->validateOnParse = true;
$dom->loadHTML($html);
$dom->preserveWhiteSpace = false;

echo $html;

#for ($i = 0; $i < 12; $i++) {

    $x = pg_query($conn, "SELECT winner FROM basketball2 WHERE id = 1");
    $row = pg_fetch_row($x);
    $result = "$row[0]";

    echo '<script type="text/javascript">
    var php_result = "<?php echo $result; ?>";
    for (var i = 0; i < 12; i++) {
       var tmpl = document.getElementById("photo-template").content.cloneNode(true);
        $(".user").text(php_result);
        $("#content").append(tmpl);
    }
    </script>'

#}

?>