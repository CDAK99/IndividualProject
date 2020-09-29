 <?php
 session_start();
 $Image_Location = $_SESSION["Image_loc"];
 $Console_ID = $_SESSION["Console_ID"];
 $Console_Name = $_SESSION["Console_Name"];
 $Console_Brand = $_SESSION["Console_Brand"];
 $Console_ReleaseDate = $_SESSION["Console_ReleaseDate"];
 $Console_Sales = $_SESSION["Console_Sales"];
 $Console_Cost = $_SESSION["Console_Cost"];
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Consoles/Consoles.php");
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
		<button class = "back" onclick='window.location.href="/Database/Consoles/Consoles.php"'><span>Back</span></button></br> 
		<h1>Edit Console</h1>
		<form action = "" method = "POST" style="max-width:500px;margin:auto">
			<hr>
			<label for="imageloc"><b>Image Location</b></label>
			<input type="text" class = "input" name="imageloc" required value = <?php echo "'$Image_Location'" ?> /><br/>
			
			<label for="consolename"><b>Console Name</b></label>
			<input type="text" class = "input" name="consolename" required value = <?php echo "'$Console_Name'" ?> /><br/>
			
			<label for="consolebrand"><b>Console Brand</b></label>
			<input type ="text" class = "input" name="consolebrand" required value = <?php echo $Console_Brand ?> /><br/>
			
			<label for="consolereleasedate"><b>Release Date</b></label>
			<input type="text" class = "input" name="consolereleasedate" required value = <?php echo $Console_ReleaseDate ?> /><br/>
			
			<label for="consolesales"><b>Sales</b></label>
			<input type="number" class = "input" name="consolesales" required value = <?php echo $Console_Sales ?> /><br/> 
			
			<label for="consolecost"><b>Cost</b></label>
			<input type="text" class = "input" name="consolecost" required value = <?php echo $Console_Cost ?> /><br/>
			<hr>
			
			<button type="submit" name = "submit" class="submitbutton">Submit</button>
		</form>
		<?php

		if ( isset( $_POST[ 'submit' ] ) )
		{
			$imageloc = $_REQUEST[ 'imageloc' ];
			$consolename = $_REQUEST[ 'consolename' ];
			$consolebrand = $_REQUEST[ 'consolebrand' ];
			$consolereleasedate = $_REQUEST[ 'consolereleasedate' ];
			$consolesales = $_REQUEST[ 'consolesales' ];
			$consolecost = $_REQUEST[ 'consolecost' ];
			
			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$query = "UPDATE Console SET item_image_loc = '$imageloc', Console_Name = '$consolename', Console_Brand = '$consolebrand', 
			Console_ReleaseDate = '$consolereleasedate', Console_Sales = $consolesales, Console_Cost = '$consolecost' 
			WHERE Console_ID = $Console_ID";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Consoles/Consoles.php");
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