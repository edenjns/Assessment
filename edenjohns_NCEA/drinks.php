
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

if(isset($_GET['sort_sel'])){
	$sort_id = $_GET['sort_sel'];
}else{
	$sort_id = 1;
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


/*Display sort by options*/
$sort_query = "SELECT sort_name
			   FROM drinks_sort_table
			   WHERE sort_id = 1";

/*query the database*/
$sort_result = mysqli_query($dbcon, $sort_query);

/*Drinks query - SELECT sort id, sort name from drinks */
$all_sort_query = "SELECT * FROM drinks_sort_table";
$all_sort_result = mysqli_query($dbcon, $all_sort_query);


/*Sorting the drinks form*/
/*Query for sort form*/
/*Sort drink by ascending*/
if($sort_id == 1){
	$all_drinks_query = "SELECT drink_id, drink
					FROM drinks
					ORDER BY drink ASC";
	$all_drinks_result = mysqli_query($dbcon, $all_drinks_query);
	
/*Sort drink by descending*/
}elseif($sort_id == 2){
	$all_drinks_query = "SELECT drink_id, drink
					FROM drinks
					ORDER BY drink DESC";
	$all_drinks_result = mysqli_query($dbcon, $all_drinks_query);
	
/*Sort drink by cost ascending*/
}elseif($sort_id == 3){
	$all_drinks_query = "SELECT drink_id , drink
					FROM drinks
					ORDER BY cost ASC
					";
	$all_drinks_result = mysqli_query($dbcon, $all_drinks_query);
	
/*Sort drink by cost descending*/
}elseif($sort_id == 4){
	$all_drinks_query = "SELECT drink_id , drink
					FROM drinks
					ORDER BY cost DESC
					";
	$all_drinks_result = mysqli_query($dbcon, $all_drinks_query);
	
/*Sort drink by sweet*/
}elseif($sort_id == 5){
	$all_drinks_query = "SELECT drink_id , drink
					FROM drinks
					WHERE sweet_other = 'Sweet'
					";
	$all_drinks_result = mysqli_query($dbcon, $all_drinks_query);
	
/*Sort drink by other*/
}elseif($sort_id == 6){
	$all_drinks_query = "SELECT drink_id , drink
					FROM drinks
					WHERE sweet_other = 'Other'
					";
	$all_drinks_result = mysqli_query($dbcon, $all_drinks_query);
}




?>



<!DOCTYPE html>
<html lang="en">
<head>  
		<meta charset="UTF-8">   
		<title>Drink</title> 
		<meta name="description" content="Index" >  
		<meta name="author" content="Eden Johns" >
		<meta name="robots" content= "noindex, nofollow" > 
		<link rel="stylesheet" type="text/css" href="styles.css"> 
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
	</head>
	<body>
	<header>
				<h1>Canteen Drinks</h1>
			</header>
			
	<nav>
				<ul>
					<li><a href="index.html" style="text-decoration: none">Home</a></li>
					<li><a href="foods.php" style="text-decoration: none">Foods</a></li>
					<li><a href="drinks.php" style="text-decoration: none">Drinks</a></li>
					<li><a href="specials.php" style="text-decoration: none">Weekly Specials</a></li>
				</ul>
			</nav>	



<main>
   
	<div id = "container">
		<article>
			
		<br>
			
		<h2>Select Drink</h2>
	<br><br>
	
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
	
			<!-- Dropdown sort by form-->
    <!--name for php; id for css; action page we go to when button clicked-->
    <form name='sort_by_form' id='sort_by_form' method='get' action='drinks.php'>
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
	
	<h2>Drink Information</h2>
	<?php
			
			echo"<p> Drink: " . $this_drink_record['drink'] . "</p>";
			echo "<p> Cost: $" . $this_drink_record['cost'] . "</p>";
			echo "<p> Calories: " . $this_drink_record['calories'] . "</p>";
			echo "<p> Type: " . $this_drink_record['sweet_other'] . "</p>";
		?>
        

	</article>
		</div>

    
         
</main>

	<footer>
			<p>&copy; Eden Johns, 2022 </p>
			<p id="smalltext"> Image Credits: </p>
	</footer>
	</body>
</html>