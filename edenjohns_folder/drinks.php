
<?php
/* Connect to the database */
$dbcon = mysqli_connect("localhost", "edenjohns", "catananch5", "edenjohns_assessment");

if($dbcon == NULL) {
    echo "Could not connect to database";
    exit();
}
/*SQL query to return all drinks*/
$drink_query = "SELECT customers.fname, customers.lname, drinks.drink
                FROM customers, drinks, orders
                WHERE customers.cust_id = orders.cust_id
                AND orders.drink_id = drinks.drink_id";

/*query the database*/
$drink_result = mysqli_query($dbcon, $drink_query);

/*count our results*/
$drink_rows = mysqli_num_rows($drink_result);

if($drink_rows > 0) {
    echo "There were ".$drink_rows." results returned.";
} else {
    echo "No results found.";
}

/*Drinks query - SELECT drink id, item from drinks */
$all_drinks_query = "SELECT drink_id, drink FROM drinks";
$all_drinks_result = mysqli_query($dbcon, $all_drinks_query);

/* Store the query results*/
/* Remove if in while loop*/
/*$all_drinks_record = mysqli_fetch_assoc($all_drinks_result);*/

/* Query the database */
$all_orders_query = "SELECT order_id FROM orders ORDER BY order_id ASC";
$all_orders_result = mysqli_query($dbcon, $all_orders_query);

/* Store the query results*/
/* Remove if in while loop*/
/*$all_orders_record = mysqli_fetch_assoc($all_orders_result);*/


?>

<?php
$name = "teacher";
$email = "teacher@school.com";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Info</title>
</head>
<body>
<?php
echo "<h1>Welcome ".$name." </h1>";
echo "<p>Hello ".$name." your email address is recorded as ".$email."</p>";
?>

<main>
    <nav>
        <a href="drinks.php">Drinks</a>
    </nav>
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
        </select>
        <!--drink button-->
        <input type="submit" name="drinks_button" value="Show drink info">
    </form>

    <!--Orders form-->
    <form name='orders_form' id='orders_form' method='get' action='orders.php'>
        <select name='order_sel' id='order_sel'>
            <!--Options-->
            <?php
            while($all_orders_record = mysqli_fetch_assoc($all_orders_result)){
                echo "<option value = '". $all_orders_record['order_id'] . "'>";
                echo $all_orders_record['order_id'];
                echo "</option>";
            }
            ?>
        </select>
        <input type="submit" name="orders_button" value="Show order info">
    </form>
</main>
</body>
</html>