
<?php
/* Connect to the database */
$dbcon = mysqli_connect("localhost", "edenjohns", "catananch5", "edenjohns_assessment");

if($dbcon == NULL) {
    echo "Could not connect to database";
    exit();
}

if(isset($_GET['drink_sel'])){
	$id = $_GET['drink_sel'];
}else{
	$id = 1;
}


/*SQL query to return all drinks*/
$drink_query = "SELECT drink
			   FROM drinks";

/*query the database*/
$drink_result = mysqli_query($dbcon, $drink_query);


/*Drinks query - SELECT drink id, item from drinks */
$all_drinks_query = "SELECT * FROM drinks";
$all_drinks_result = mysqli_query($dbcon, $all_drinks_query);

$this_drink_query = "SELECT drink,cost,calories,sweet_other
					 FROM drinks 
					 WHERE drink_id = '" . $id . "'";
$this_drink_result = mysqli_query($dbcon, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drink_result);





/* Store the query results*/
/* Remove if in while loop*/
/*$all_drinks_record = mysqli_fetch_assoc($all_foods_result);*/

/* Query the database */


/* Store the query results*/
/* Remove if in while loop*/
/*$all_orders_record = mysqli_fetch_assoc($all_orders_result);*/


?>



<!DOCTYPE html>
<html lang="en">
<head>  
		<meta charset="UTF-8">   
		<title>Drink</title> 
		<meta name="description" content="Index" />  
		<meta name="author" content="Eden Johns" />
		<meta name="robots" content= "noindex, nofollow" /> 
		<link rel="stylesheet" type="text/css" href="styles.css"> 
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
	</head>
	
	<header>
				<h1>Drinks</h1>
			</header>
			
	<nav>
				<ul>
					<li><a href="index.html" style="text-decoration: none">Home</a></li>
					<li><a href="foods.php" style="text-decoration: none">Foods</a></li>
					<li><a href="drinks.php" style="text-decoration: none">Drinks</a></li>
					<li><a href="specials.php" style="text-decoration: none">Specials</a></li>
				</ul>
			</nav>	
<body>


<main>
   
	<div id = "container">
		<article>
    <!-- Dropdown Drinks form-->
    <!--name for php; id for css; action page we go to when button clicked-->
    <form name='drinks_form' id='drinks_form' method='get' action='drinks.php'>
        <!--Dropdown menu-->
        <select name='drink_sel' id='drink_sel'>
            <!--Options-->

            <?php
            /* Display the query results into an option tag*/
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                echo "<option value ='".$all_drinks_record['drink_id'] ."'>";
                echo $all_drinks_record['drink'];   // Show the drink name in the option box
                echo "</option>";
            }
            ?>
			<!--drink button-->							 
		
			
        </select>
		<input type="submit" name="drinks_button" value="Show drink info">
		
	</form>
	
	
	<p>
	<?php
			
			echo"<p> Drink: " . $this_drink_record['drink'] . "</p>";
			echo "<p> Cost: $" . $this_drink_record['cost'] . "</p>";
			echo "<p> Calories: " . $this_drink_record['calories'] . "</p>";
			echo "<p> Type: " . $this_drink_record['sweet_other'] . "</p>";
		?>
        
	</p>
	</article>
		</div>

    
         
</main>
</body>
	<footer>
			<p>&copy; Eden Johns, 2022 </p>
			<p id="smalltext"> Image Credits: </p>
	</footer>
</html>
