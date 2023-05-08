<?php
// variable declaration
$errors = array(); 

echo '<link rel="stylesheet" type="text/css" href="style.css">';

$db = mysqli_connect('localhost', 'root', '72147214', 'item');

if (isset($_POST['verfiy_category'])) {
	// receive input value from the form
    $category = mysqli_real_escape_string($db, $_POST['category']);
    
	// form validation: ensure that the form is correctly filled
    if (empty($category)) { array_push($errors, "Category is required"); }
    
	// display items if there are no errors in the form
	if (count($errors) == 0) {
        $con=mysql_connect("localhost","root","72147214");

        mysql_select_db("item");

        $q=mysql_query("select * from item where category='$category'");

        while($row=mysql_fetch_array($q))
        {
            $id=$row["ID"];
            $password=$row["pass"];
            echo "<form class='theform' method='post' action='deletethis.php'>";
            echo " <img src='$row[photo]' >"."<br>" ;   
            echo $row["DESC_"]."<br>";
            echo $row["category"]."<br>";
            echo "<a href='$row[formlink]' target='_blank' >Claim</a>"."<br>";
            echo "<td><a href='delete.php?id2=$id&Pass=$password'>Delete</a></td>";
            echo "</form>";
            echo "<br>"."<br>"."<br>";  
        }
        mysql_close($con);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Browse by category</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Select category</h2>
	</div>
	
	<form action = "<?php $_PHP_SELF ?>" method = "POST">

		<?php include('errors.php'); ?>
      
		<!__ Category __>        
		<div class="input-group">
			<label>Category</label>
			<select style="width: 150px"  name="category">
                <option></option>
                <option value="Wallet">Wallet</option>
                <option value="Phone">Phone</option>
                <option value="Bag">Bag</option>
                <option value="Money">Money</option>
                <option value="Charger">Charger</option>
                <option value="HeadPhone">HeadPhone</option>
                <option value="Book">Book</option>
                <option value="Clothes">Clothes</option>
                <option value="USB">USB</option>
                <option value="FlashMemory">FlashMemory</option>
                <option value="CoverPhone">CoverPhone</option>
            </select>    
        </div>
		
        <div class="input-group">
			<button type="submit" class="btn" name="verfiy_category">Submit</button>

		</div>
		
	</form>
</body>
</html>