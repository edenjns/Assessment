
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

/*Defining the sort form*/
if(isset($_GET['sort_sel'])){
	$sort_id = $_GET['sort_sel'];
}else{
	$sort_id = 1;
}

/*SQL query to return all foods*/
$food_query = "SELECT food
			   FROM foods";

/*query the database*/
$food_result = mysqli_query($dbcon, $food_query);

/*Foods query - SELECT food id, food from foods */
$all_foods_query = "SELECT * FROM foods";
$all_foods_result = mysqli_query($dbcon, $all_foods_query);

/*count our results*/
$food_rows = mysqli_num_rows($food_result);

if($food_rows > 0) {
	
} else {
    echo "No results found.";
}

/*Query for displaying food information*/
$this_food_query = "SELECT food,cost,calories,sweet_sav
					 FROM foods 
					 WHERE food_id = '" . $id . "'";
$this_food_result = mysqli_query($dbcon, $this_food_query);
$this_food_record = mysqli_fetch_assoc($this_food_result);

/*Query for displaying sort by options*/
$sort_query = "SELECT sort_name
			   FROM foods_sort_table
			   WHERE sort_id = 1";

/*query the database*/
$sort_result = mysqli_query($dbcon, $sort_query);

/*Sort query - SELECT sort id, sort name from foods */
$all_sort_query = "SELECT * FROM foods_sort_table";
$all_sort_result = mysqli_query($dbcon, $all_sort_query);


/*Sorting the sort form*/
/*Query for sort form to sort the food menu*/
/*Sort food by ascending*/
if($sort_id == 1){
	$all_foods_query = "SELECT food_id, food
					FROM foods
					ORDER BY food ASC";
	$all_foods_result = mysqli_query($dbcon, $all_foods_query);
	
/*Sort food by descending*/
}elseif($sort_id == 2){
	$all_foods_query = "SELECT food_id, food
					FROM foods
					ORDER BY food DESC";
	$all_foods_result = mysqli_query($dbcon, $all_foods_query);
	
/*Sort food by cost ascending*/
}elseif($sort_id == 3){
	$all_foods_query = "SELECT food_id , food
					FROM foods
					ORDER BY cost ASC
					";
	$all_foods_result = mysqli_query($dbcon, $all_foods_query);
	
/*Sort food by cost descending*/
}elseif($sort_id == 4){
	$all_foods_query = "SELECT food_id , food
					FROM foods
					ORDER BY cost DESC
					";
	$all_foods_result = mysqli_query($dbcon, $all_foods_query);
	
/*Sort food by sweet*/
}elseif($sort_id == 5){
	$all_foods_query = "SELECT food_id , food
					FROM foods
					WHERE sweet_sav = 'Sweet'
					";
	$all_foods_result = mysqli_query($dbcon, $all_foods_query);
	
/*Sort food by savoury*/
}elseif($sort_id == 6){
	$all_foods_query = "SELECT food_id , food
					FROM foods
					WHERE sweet_sav = 'Savoury'
					";
	$all_foods_result = mysqli_query($dbcon, $all_foods_query);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>  
		<meta charset="UTF-8">   
		<title>Foods</title> 
		<meta name="description" content="Index" >  
		<meta name="author" content="Eden Johns" >
		<meta name="robots" content= "noindex, nofollow" > 
		<link rel="stylesheet" type="text/css" href="styles.css"> 
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
	</head>
	<body>
	<header>
				<h1>Canteen Foods</h1>
			</header>
			
	<nav>
				<ul>
					<li><a href="index.html" style="text-decoration: none">Home</a></li>
					<li><a href="foods.php" style="text-decoration: none">Foods</a></li>
					<li><a href="drinks.php" style="text-decoration: none">Drinks</a></li>
					<li><a href="specials.php" style="text-decoration: none">Specials</a></li>
				</ul>
			</nav>	
<main>
	<div id="container">
	
		<article>
			
			<br>
			
			<h2>Select Food</h2>
	<br>
			<br>
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
                echo $all_foods_record['food'];   // Show the food name in the option box
                echo "</option>";
            }
            ?>
        </select>
		
	
		<!--Food button-->
        <input type="submit" name="foods_button" value="Show food info">
		
    </form>
		
	<!-- Dropdown sort by form-->
    <!--name for php; id for css; action page we go to when button clicked-->
    <form name='sort_by_form' id='sort_by_form' method='get' action='foods.php'>
        <!--Dropdown menu-->
        <select name='sort_sel' id='sort_sel'>
            <!--Options-->

            <?php
            /* Display the query results into an option tag*/
            while($all_sort_record = mysqli_fetch_assoc($all_sort_result)){
                echo "<option value ='".$all_sort_record['sort_id'] ."'>";
                echo $all_sort_record['sort_name'];   // Show the drink name in the option box
                echo "</option>";
            }
            ?>
			<!--sort button-->							 
			
        </select>
		<input type="submit" name="sort_button" value="Sort">
		
	</form>	
	
			<br>
			
			<h2>Food Information</h2>
			
	<!-- Food Information Display-->
	<?php
			
			echo"<p> Food: " . $this_food_record['food'] . "<br>";
			echo "<p> Cost: $" . $this_food_record['cost'] . "<br>";
			echo "<p> Calories: " . $this_food_record['calories']. "<br>";
			echo "<p> Type: " . $this_food_record['sweet_sav'] . "<br>";
		?>
        

	</article>
		</div>
	
</main>
	<footer>
			<p>&copy; Eden Johns, 2022 </p>
	</footer>
	</body>
</html>