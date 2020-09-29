 <html>
 <head>
    <meta charset="UTF-8" />
    <title>Search by Game</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
	    <button class = "back" onclick='window.location.href="/Search/Platform/GameSearch.php"'><span>Back</span></button></br> 
		<h1>Search by Game Results</h1>
		<?php
		if ( isset( $_POST[ 'submit' ] ) )
		{
			$game = $_REQUEST[ 'game' ];

			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$query = "SELECT * FROM Platform, Game, Console WHERE Platform.Game_ID = Game.Game_ID AND Platform.Console_ID = Console.Console_ID AND Game.Game_name = '" . $game . "';";
			$result = mysqli_query($link, $query)
		    or die("Could not execute SQL query");
			
			if (mysqli_num_rows($result) == 0){
				echo "<h2>0 Search Results Returned</h2>";
			} else{
				echo '<table>';
				echo "<tr><th>Logo</th><th>Platform ID</th><th>Game Name</th><th>Console Name</th></tr>\n";
		 
				while($row = mysqli_fetch_array($result)){
					echo "<tr>\n";
					echo '<tr><td><img src="'.$row['game_image_loc'].'" width = 100px height = 125px></td>',
					'<td><a href = "/Database/Platforms/View_Platform.php?game_image_loc=' . $row['game_image_loc'] . '&Platform_ID=' . $row['Platform_ID'] . '&Game_name=' . $row['Game_name'] . 
					'&Console_Name=' . $row['Console_Name'] . '&Game_ID=' . $row['Game_ID'] . '&Console_ID=' . $row['Console_ID'] .'">', $row['Platform_ID'], '</td></a>',
					'<td>', $row['Game_name'], '</td>',
					'<td>', $row['Console_Name'], '</td>';
					echo "</tr>\n";}
			
				echo '</table>';
			
				$result2 = mysqli_query($link, $query);
				$response = "data:text/csv;charset=utf-8,Platform ID, Game Name, Console Name\n";
		 
				while($data = mysqli_fetch_array($result2)){
				$Data = $data['Platform_ID'] . ',' . $data['Game_name'] . ',' . $data['Console_Name'] . "\n";
		
				$response .= $Data;
				}
		
				echo '<p> <a href="'.$response.'" download="GameSearchResults.csv">Download</a></p>';
				mysqli_close($link);
			}
		}
		?>
	  
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>
</html>