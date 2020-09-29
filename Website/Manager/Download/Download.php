<?php
if(!empty($_GET['file'])){
	$filename = basename($_GET['file']);
	
	if(file_exists($filename)){
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename= test.jpg");
		header("Content-Length: " . filesize( $filename) );
		header("Cache-Control: must-revalidate");
		readfile( $filename );

		exit;
	}
}
?>
 <head>
    <meta charset="UTF-8" />
	<?php
		session_start();
		if(isset($_SESSION["loggedin"]) === false){
			header("location: /Index.php");
			exit;
		}
	?>
    <title>Test Downloads</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Manager/Manager_Index.php"'><span>Back</span></button></br> 
		<h1>Test Downloads Page</h1></br>
		<a href="download.php?file=Test3.jpg">Download File (55MB)</a>
		<a href="download.php?file=Test.jpg">Download File (39MB)</a>
		<a href="download.php?file=Test2.jpg">Download File (17MB)</a>
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>