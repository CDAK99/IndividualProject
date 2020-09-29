 <?php
 session_start();
 $Image_Location = $_SESSION["Image_loc"];
 $Developer_ID = $_SESSION["Developer_ID"];
 $Developer_Name = $_SESSION["Developer_Name"];
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Developers/Developers.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Edit Developer</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Developers/Developers.php"'><span>Back</span></button></br> 
		<h1>Edit Developer</h1>
		<form action = "" method = "POST" style="max-width:500px;margin:auto">
			<hr>
			<label for="imageloc"><b>Image Location</b></label>
			<input type="text" class = "input" name="imageloc" required value = <?php echo "'$Image_Location'" ?> /><br/>
			
			<label for="developername"><b>Developer Name</b></label>
			<input type="text" class = "input" name="developername" required value = <?php echo "'$Developer_Name'" ?> /><br/>
			<hr>
			
			<button type="submit" name = "submit" class="submitbutton">Submit</button>
		</form>
		<?php

		if ( isset( $_POST[ 'submit' ] ) )
		{
			$imageloc = $_REQUEST[ 'imageloc' ];
			$developername = $_REQUEST[ 'developername' ];
			
			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$query = "UPDATE Developer SET item_image_loc = '$imageloc', Developer_Name = '$developername' 
			WHERE Developer_ID = $Developer_ID";
			
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