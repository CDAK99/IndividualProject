<?php
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Games</title>
	<link rel="stylesheet" href="/Css.css">
  </head>
  <body>
	<div class ="header">
		<a href="/Index.php">Home</a>
	</div>
    <div class="container">
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Database_List.php"'><span>Back</span></button></br> 
		<h1>Games</h1>
		<?php
		 $dbname = 'ck17427';
         $dbuser = 'ck17427';
         $dbpass = 'password';
         $dbhost = 'localhost';
		 
		 $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
		 or die( "Unable to Connect to '$dbhost'" );

		 mysqli_select_db( $link, $dbname )
		 or die("Could not open the db '$dbname'");
		 
		 $query = "SELECT * FROM Game, Developer, Publisher WHERE Game.Publisher = Publisher.Publisher_ID AND Game.Developer = Developer.Developer_ID ORDER BY Game.Game_ID;";
		 $result = mysqli_query($link, $query)
		 or die("Could not execute SQL query");
		
		 echo '<table>';
		 echo "<tr><th>Game Cover</th><th>Game ID</th><th>Game Name</th><th>Release Date</th><th>Developer</th><th>Publisher</th><th>Sales</th><th>Cost</th></tr>\n";
		 
		 while($row = mysqli_fetch_array($result)){
			echo "<tr>\n";
			echo '<tr><td><img src="'.$row['game_image_loc'].'" width = 100px height = 125px></td>',
			'<td><a href = "/Database/Games/View_Game.php?game_image_loc=' . $row['game_image_loc'] . '&Game_ID='. $row['Game_ID'] . 
			'&Game_name=' . $row['Game_name'] . '&Game_ReleaseDate=' . $row['Release_Date'] . '&Developer_ID=' . $row['Developer_ID'] . '&Developer_Name=' . $row['Developer_Name'] .
			'&Publisher_ID=' . $row['Publisher_ID'] . '&Publisher_Name=' . $row['Publisher_Name'] . '&Game_Sales=' . $row['Sales'] . '&Game_Cost=' . $row['Cost'] . '">', $row['Game_ID'], '</td></a>',
			'<td>', $row['Game_name'], '</td>',
			'<td>', $row['Release_Date'], '</td>',
			'<td>', $row['Developer_Name'], '</td>',
			'<td>', $row['Publisher_Name'], '</td>',
			'<td>', $row['Sales'], '</td>',
			'<td>', '£', $row['Cost'], '</td>';
			echo "</tr>\n";}
			
		 echo '</table>';
		 
		 $result2 = mysqli_query($link, $query);
		 $response = "data:text/csv;charset=utf-8,Game ID, Game Name, Release Date, Developer, Publisher, Sales, Cost\n";
		 
		 while($data = mysqli_fetch_array($result2)){
			$Data = $data['Game_ID'] . ',' . $data['Game_name'] . ',' . $data['Release_Date'] . ',' . $data['Developer_Name'] . ',' .
			$data['Publisher_Name'] . ',' . $data['Sales'] . ',' . $data['Cost'] . "\n";
		
			$response .= $Data;
		 }
		
		 echo '<p> <a href="'.$response.'" download="GameTable.csv">Download</a></p>';
		 mysqli_close($link);
		
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<p><button class = "button add" onclick = "window.location.href = (\'/Database/Games/Add_Games.php\');">Add</button></p>',
			'</div>', '<div class="footer">',
			'</div>';
			exit;
		}
		?>
      </div>
      <div class="footer">
      </div>
    </div>
  </body>
</html>