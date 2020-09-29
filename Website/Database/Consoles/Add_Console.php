 <?php
 session_start();
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Consoles/Consoles.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Add Console</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Consoles/Consoles.php"'><span>Back</span></button></br> 
		<h1>Add Console</h1></br>
		<?php
		echo '<form action = "" method = "POST" style="max-width:500px;margin:auto">', "\n",
			'<hr>', "\n",
			'<label for ="image"><b>Image Location</b></label>', "\n",
			'<input type="text" class = "input" name="image" required/><br/>', "\n",
			
			'<label for="consolename"><b>Console Name</b></label>', "\n",
			'<input type="text" class = "input" name="consolename" required/><br/>', "\n",
			
			'<label for="consolebrand"><b>Console Brand</b></label>', "\n",
			'<input type="text" class = "input" name="consolebrand" required/><br/>', "\n",
			
			'<label for="consolereleasedate"><b>Release Date</b></label>', "\n",
			'<input type="text" class = "input" name="consolereleasedate" required/><br/>', "\n",
			'<label for="consolesales"><b>Sales</b></label>', "\n",
			'<input type="number" class = "input" name="consolesales" required/><br/>', "\n",
			
			'<label for="consolecost"><b>Cost</b></label>', "\n",
			'<input type="text" class = "input" name="consolecost" required/><br/>', "\n",
			'<hr>', "\n",
			
			'<button type="submit" name = "submit" class="submitbutton">Submit</button>',
		'<p></form></p>', "\n";

		if ( isset( $_POST[ 'submit' ] ) )
		{
			$imageloc = $_REQUEST[ 'image' ];
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

			$query = "INSERT INTO Console (item_image_loc, Console_Name, Console_Brand, Console_ReleaseDate, Console_Sales, Console_Cost) 
			VALUES ('" . $imageloc . "','" . $consolename . "','" . $consolebrand . "','" . $consolereleasedate . "','" . $consolesales . "','" . $consolecost . "')";
			
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