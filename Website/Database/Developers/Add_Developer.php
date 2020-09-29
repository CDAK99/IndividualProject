 <?php
 session_start();
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Developers/Developers.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Add Developer</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Developers/Developers.php"'><span>Back</span></button></br> 
		<h1>Add Developer</h1>
		<?php
		echo '<form action = "" method = "POST" style="max-width:500px;margin:auto">', "\n",
			'<hr>', "\n",
			
			'<label for ="image"><b>Image Location</b></label>', "\n",
			'<input type="text" class = "input" name="image" required/><br/>', "\n",
			
			'<label for="developername"><b>Developer Name</b></label>', "\n",
			'<input type="text" class = "input" name="developername" required/><br/>', "\n",

			'<hr>', "\n",
			
			'<button type="submit" name = "submit" class="submitbutton">Submit</button>',
		'<p></form></p>', "\n";

		if ( isset( $_POST[ 'submit' ] ) )
		{
			$imageloc = $_REQUEST[ 'image' ];
			$developername = $_REQUEST[ 'developername' ];

			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$query = "INSERT INTO Developer (item_image_loc, Developer_Name) VALUES ('" . $imageloc . "', '" .
			$developername . "')";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Developers/Developers.php");
			} else {
				echo "ERROR: Could not execute $sql. " .
				mysqli_error($link);
			}
			
			mysqli_close($link);
		}
		?>
	  
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>