 <?php
 session_start();
 $Image_Location = $_SESSION["Image_loc"];
 $Publisher_ID = $_SESSION["Publisher_ID"];
 $Publisher_Name = $_SESSION["Publisher_Name"];
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Publishers/Publishers.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Edit Console</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
	    <button class = "back" onclick='window.location.href="/Database/Publishers/Publishers.php"'><span>Back</span></button></br> 
		<h1>Edit Publisher</h1>
		<form action = "" method = "POST" style="max-width:500px;margin:auto">
			<hr>
			<label for="imageloc"><b>Image Location</b></label>
			<input type="text" class = "input" name="imageloc" required value = <?php echo "'$Image_Location'" ?> /><br/>
			
			<label for="publishername"><b>Publisher Name</b></label>
			<input type="text" class = "input" name="publishername" required value = <?php echo "'$Publisher_Name'" ?> /><br/>
			<hr>
			
			<button type="submit" name = "submit" class="submitbutton">Submit</button>
		</form>
		<?php

		if ( isset( $_POST[ 'submit' ] ) )
		{
			$imageloc = $_REQUEST[ 'imageloc' ];
			$publishername = $_REQUEST[ 'publishername' ];
			
			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$query = "UPDATE Publisher SET item_image_loc = '$imageloc', Publisher_Name = '$publishername' 
			WHERE Publisher_ID = $Publisher_ID";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Publishers/Publishers.php");
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