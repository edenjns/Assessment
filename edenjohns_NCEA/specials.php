
<?php
/* Connect to the database */
$dbcon = mysqli_connect("localhost", "edenjohns", "catananch5", "edenjohns_assessment");

if($dbcon == NULL) {
    echo "Could not connect to database";
    exit();
}

/*Defining the special form*/
if(isset($_GET['special_sel'])){
	$special_id = $_GET['special_sel'];
}else{
	$special_id = 1;
}


	
/*SQL query to return all specials*/
$special_query = "SELECT day, special_id 
				  FROM specials";

/*query the database*/
$special_result = mysqli_query($dbcon, $special_query);

/*specials query - SELECT drink id, item from specials */
$all_specials_query = "SELECT * 
					   FROM specials";
	

$all_specials_result = mysqli_query($dbcon, $all_specials_query);

/*count our results*/
$special_rows = mysqli_num_rows($special_result);

if($special_rows > 0) {
	
} else {
    echo "No results found.";
}

/*Display specials information*/
/*Query for displaying special information*/
$this_special_query = "SELECT foods.food, drinks.drink, specials.cost
					   	FROM foods, drinks, specials
					   	WHERE specials.food_id = foods.food_id
					   	AND specials.drink_id = drinks.drink_id
					   	AND specials.special_id = '" . $special_id . "'";
$this_special_result = mysqli_query($dbcon, $this_special_query);
$this_special_info = mysqli_fetch_assoc($this_special_result);


?>



<!DOCTYPE html>
<html lang="en">
<head>  
		<meta charset="UTF-8">   
		<title>Specials</title> 
		<meta name="description" content="Index" >  
		<meta name="author" content="Eden Johns" >
		<meta name="robots" content= "noindex, nofollow" >
		<link rel="stylesheet" type="text/css" href="styles.css"> 
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
	</head>
	<body>
	<header>
				<h1>Weekly Specials</h1>
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
			<h2>Select Special</h2>
			<br>
			<br>
			
    <!-- Dropdown Specials form-->
    <!--name for php; id for css; action page we go to when button clicked-->
    <form name='specials_form' id='specials_form' method='get' action='specials.php'>
        <!--Dropdown menu-->
        <select name='special_sel' id='special_sel'>
            <!--Options-->

            <?php
            /* Display the query results into an option tag*/
            while($all_specials_record = mysqli_fetch_assoc($all_specials_result)){
                echo "<option value ='".$all_specials_record['special_id'] ."'>";
                echo $all_specials_record['day'];   // Show the drink name in the option box
                echo "</option>";
            }
            ?>
        </select>
        <!--specials button-->
        <input type="submit" name="specials_button" value="Show specials info">
    </form>
		
			<br>
			<h2>Special Information</h2>
			
	<?php
			echo"<p> Food: " . $this_special_info['food'] . "</p>";
			echo"<p> Drink: " . $this_special_info['drink'] . "</p>";
			echo "<p> Cost: $" . $this_special_info['cost'] . "</p>";
		?>
				
    
       
       
    
			
	</article>
		</div>
</main>
	<footer>
			<p>&copy; Eden Johns, 2022 </p>
	</footer>
	</body>
</html>