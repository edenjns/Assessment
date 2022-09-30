
<?php
/* Connect to the database */
$dbcon = mysqli_connect("localhost", "edenjohns", "catananch5", "edenjohns_assessment");

if($dbcon == NULL) {
    echo "Could not connect to database";
    exit();
}


/*Defining the food form*/
if(isset($_GET['food_sel'])){
	$id = $_GET['food_sel'];
}else{
	$id = 1;
}


/*SQL query to return all foods*/
$food_query = "SELECT food
			   FROM foods";

/*query the database*/
$food_result = mysqli_query($dbcon, $food_query);

/*Foods query - SELECT drink id, item from drinks */
$all_foods_query = "SELECT * FROM foods";
$all_foods_result = mysqli_query($dbcon, $all_foods_query);

/*count our results*/
$food_rows = mysqli_num_rows($food_result);

if($food_rows > 0) {
	
} else {
    echo "No results found.";
}

/*Query for displaying drink information*/
$this_food_query = "SELECT food,cost,calories,sweet_sav
					 FROM foods 
					 WHERE food_id = '" . $id . "'";
$this_food_result = mysqli_query($dbcon, $this_food_query);
$this_food_record = mysqli_fetch_assoc($this_food_result);



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
		<title>Foods</title> 
		<meta name="description" content="Index" />  
		<meta name="author" content="Eden Johns" />
		<meta name="robots" content= "noindex, nofollow" /> 
		<link rel="stylesheet" type="text/css" href="styles.css"> 
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
	</head>
	
	<header>
				<h1>Foods</h1>
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
	
	<div id="container">
	
		<article>
			
    <!-- Dropdown Foods form-->
    <!--name for php; id for css; action page we go to when button clicked-->
    <form name='foods_ form' id='foods_form' method='get' action='foods.php'>
        <!--Dropdown menu-->
        <select name='food_sel' id='food_sel'>
            <!--Options-->

            <?php
            /* Display the query results into an option tag*/
            while($all_foods_record = mysqli_fetch_assoc($all_foods_result)){
                echo "<option value ='".$all_foods_record['food_id'] ."'>";
                echo $all_foods_record['food'];   // Show the drink name in the option box
                echo "</option>";
            }
            ?>
        </select>
		
	
		<!--food button-->
        <input type="submit" name="foods_button" value="Show food info">
		
    </form>
		<p>
	<?php
			
			echo"<p> Food: " . $this_food_record['food'] . "<br>";
			echo "<p> Cost: $" . $this_food_record['cost'] . "<br>";
			echo "<p> Calories: " . $this_food_record['calories']. "<br>";
			echo "<p> Type: " . $this_food_record['sweet_sav'] . "<br>";
		?>
        
	</p>
	</article>
		</div>
	<!-- Food Information Display-->
	
        
    
</main>
</body>
	<footer>
			<p>&copy; Eden Johns, 2022 </p>
			<p id="smalltext"> Image Credits: </p>
	</footer>
</html>
