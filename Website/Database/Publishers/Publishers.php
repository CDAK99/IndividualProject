<?php
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Publishers </title>
	<link rel="stylesheet" href="/Css.css">
  </head>
  <body>
	<div class ="header">
		<a href="/Index.php">Home</a>
	</div>
    <div class="container">
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Database_List.php"'><span>Back</span></button></br> 
		<h1>Publishers</h1>
		<?php
		 $dbname = 'ck17427';
         $dbuser = 'ck17427';
         $dbpass = 'password';
         $dbhost = 'localhost';
		 
		 $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
		 or die( "Unable to Connect to '$dbhost'" );

		 mysqli_select_db( $link, $dbname )
		 or die("Could not open the db '$dbname'");
		 
		 $query = "SELECT * FROM Publisher;";
		 $result = mysqli_query($link, $query)
		 or die("Could not execute SQL query");
			
		 echo '<table>';
		 echo "<tr><th>Logo</th><th>Publisher ID</th><th>Publisher Name</th></tr>\n";
		 
		 while($row = mysqli_fetch_array($result)){
			echo "<tr>\n";
			echo '<tr><td><img src="'.$row['item_image_loc'].'" width = 125px height = 80px></td>',
			'<td><a href = "/Database/Publishers/View_Publisher.php?item_image_loc=' . $row['item_image_loc'] . '&Publisher_ID=' . $row['Publisher_ID'] . '&Publisher_Name=' . $row['Publisher_Name'] . '">', 
			$row['Publisher_ID'], '</td></a>',
			'<td>', $row['Publisher_Name'], '</td>';
			echo "</tr>\n";}
			
		 echo '</table>';
		
		 $result2 = mysqli_query($link, $query);
		 $response = "data:text/csv;charset=utf-8,Publisher ID, Publisher Name\n";
		 
		 while($data = mysqli_fetch_array($result2)){
			$Data = $data['Publisher_ID'] . ',' . $data['Publisher_Name'] . "\n";
		
			$response .= $Data;
		 }
		
		 echo '<p> <a href="'.$response.'" download="PublisherTable.csv">Download</a></p>';
		 mysqli_close($link);

		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<p> <button class = "button add" onclick="window.location.href=(\'/Database/Publishers/Add_Publisher.php\');">Add</button></p>',
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