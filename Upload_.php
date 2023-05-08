<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Lost Item</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>ADD LOST ITEM</h2>
	</div>
	
	<form method="post" action="Upload_.php">

		<?php include('errors.php'); ?>
      <!__ desc __>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="Description" value="<?php echo $Description; ?>">
		</div>
        
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
        
		<!__ formlink __>
        <div class="input-group">
            <label>
                <a href="https://docs.google.com/forms/u/0/" target="_blank">
                    Google FormLink
                </a>
            </label>
			<input type="text" name="FormLink" placeholder="put Google FormLink here">
		</div>
    
        <!__ Photo __>
        <div class="input-group">
			<label>Photo</label>
            <input type="file" name="ph">
        </div>
		
        
		<!__ password __>
        <div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		
        <div class="input-group">
			<button type="submit" class="btn" name="reg_user">ADD</button>
		</div>
		
	</form>
</body>
</html>