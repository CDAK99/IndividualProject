<html>
  <head>
    <meta charset="UTF-8" />
    <title>Consoles</title>
	<link rel="stylesheet" href="/Css.css">
  </head>
  <body>
	<div class ="header">
		<a href="/Index.php">Home</a>
	</div>
    <div class="container">
      <div class="content">
        <button class = "back" onclick='window.location.href="/Database/Database_List.php"'><span>Back</span></button></br> 
		<h1>Consoles</h1>
		<?php
		 $dbname = 'ck17427';
         $dbuser = 'ck17427';
         $dbpass = 'password';
         $dbhost = 'localhost';
		 
		 $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
		 or die( "Unable to Connect to '$dbhost'" );

		 mysqli_select_db( $link, $dbname )
		 or die("Could not open the db '$dbname'");
		 
		 $query = "SELECT * FROM Console";
		 $result = mysqli_query($link, $query)
		 or die("Could not execute SQL query");
			
		 echo '<table>';
		 echo "<tr><th>Console</th><th>Console ID</th><th>Console Name</th><th>Developer</th><th>Release Date</th><th>Sales</th><th>Cost</th></tr>\n";
		 
		 while($row = mysqli_fetch_array($result)){
			echo "<tr>\n";
			echo '<tr><td><img src="'.$row['item_image_loc'].'" width = 150px height = 75px></td>',
			'<td><a href = "/Database/Consoles/View_Console.php?item_image_loc=' . $row['item_image_loc'] . '&Console_ID=' . $row['Console_ID'] . '&Console_Name=' . $row['Console_Name'] . '&Console_Brand=' .
			$row['Console_Brand'] . '&Console_ReleaseDate=' . $row['Console_ReleaseDate'] . '&Console_Sales=' . $row['Console_Sales'] .
			'&Console_Cost=' . $row['Console_Cost'] . '">', $row['Console_ID'], '</td></a>',
			'<td>', $row['Console_Name'], '</td>',
			'<td>', $row['Console_Brand'], '</td>',
			'<td>', $row['Console_ReleaseDate'], '</td>',
			'<td>', $row['Console_Sales'], '</td>',
			'<td>', '£', $row['Console_Cost'], '</td>';
			echo "</tr>\n";}
			
			echo '</table>';
		 
		 $result2 = mysqli_query($link, $query);
		 $response = "data:text/csv;charset=utf-8,Console ID, Console Name, Developer, Release Date, Sales, Cost\n";
		 
		 while($data = mysqli_fetch_array($result2)){
			$Data = $data['Console_ID'] . ',' . $data['Console_Name'] . ',' . $data['Console_Brand'] . ',' . $data['Console_ReleaseDate'] . ',' .
			$data['Console_Sales'] . ',' . $data['Console_Cost'] . "\n";
		
			$response .= $Data;
		 }
		
		 echo '<p> <a href="'.$response.'" download="ConsoleTable.csv">Download</a></p>';
		 mysqli_close($link);
		
		session_start();
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<p> <button class = "button add" onclick="window.location.href=(\'/Database/Consoles/Add_Console.php\');">Add</button></p>',
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