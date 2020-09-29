<?php
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Platforms</title>
	<link rel="stylesheet" href="/Css.css">
  </head>
  <body>
	<div class ="header">
		<a href="/Index.php">Home</a>
	</div>
    <div class="container">
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Database_List.php"'><span>Back</span></button></br> 
		<h1>Platforms</h1>
		<?php
		 $dbname = 'ck17427';
         $dbuser = 'ck17427';
         $dbpass = 'password';
         $dbhost = 'localhost';
		 
		 $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
		 or die( "Unable to Connect to '$dbhost'" );

		 mysqli_select_db( $link, $dbname )
		 or die("Could not open the db '$dbname'");
		 
		 $query = "SELECT * FROM Platform, Game, Console WHERE Platform.Game_ID = Game.Game_ID AND Platform.Console_ID = Console.Console_ID;";
		 $result = mysqli_query($link, $query)
		 or die("Could not execute SQL query");	
		 	
		 echo '<table>';
		 echo "<tr><th>Platform ID</th><th>Game Name</th><th>Console Name</th></tr>\n";
		 
		 while($row = mysqli_fetch_array($result)){
			echo "<tr>\n";
			echo '<tr><td><a href = "/Database/Platforms/View_Platform.php?Platform_ID=' . $row['Platform_ID'] . '&Game_name=' . $row['Game_name'] . 
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
		
		 echo '<p> <a href="'.$response.'" download="PlatformTable.csv">Download</a></p>';
		 mysqli_close($link);
		
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<p><button class = "button add" onclick="window.location.href=(\'/Database/Platforms/Add_Platform.php\');">Add</button></p>',
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