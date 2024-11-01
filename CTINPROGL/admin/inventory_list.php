

<?php 
require_once "../includes/db_Model.php";

// Delete Item Question to Admin, and Delete Product if they choose
/* if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	// remove item from system and delete its picture
	// delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysqli_query($connection, "DELETE FROM products WHERE id='$id_to_delete' LIMIT 1") or die (mysqli_error());
	// unlink the image from server
	// Remove The Pic -------------------------------------------
    $pictodelete = ("../inventory_images/$id_to_delete.jpg");
    if (file_exists($pictodelete)) {
       		    unlink($pictodelete);
    }
	confirm_query($sql);
	mysqli_close($connection);
} */

if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	$id_to_delete = $_GET['yesdelete'];
	delete_record("DELETE FROM products WHERE id='$id_to_delete' LIMIT 1", $id_to_delete, "Product_");
	redirect_to("inventory_list.php");
}
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
	
    $product_name = ($_POST['product_name']);
	$price = ($_POST['price']);
	$category = ($_POST['category']);
	$subcategory = ($_POST['subcategory']);
	$details = ($_POST['details']);
	
	// Add this product into the database now
	$newProduct = "INSERT INTO products (product_name, price, details, category, subcategory, date_added) 
        VALUES('$product_name','$price','$details','$category','$subcategory',now())";
	 save1($newProduct, "Product_");
	// Place image in the folder 
	redirect_to("inventory_list.php");
}
?>
 <?php 
// This block grabs the whole list for viewing
	/* $product_list = "";
	$sql = mysqli_query($connection, "SELECT * FROM products ORDER BY date_added DESC")or die (mysql_error());
	$productCount = mysqli_num_rows($sql); // count the output amount
	if ($productCount > 0) {
		while($row = mysqli_fetch_array($sql)){ 
				 $id = $row["id"];
				 $product_name = $row["product_name"];
				 $price = $row["price"];
				 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
				 $product_list .= "Product ID: $id - <strong>$product_name</strong> - $$price - <em>Added $date_added</em> &nbsp; &nbsp; &nbsp; <a href='inventory_edit.php?pid=$id'>edit</a> &bull; <a href='inventory_list.php?deleteid=$id'>delete</a><br />";
		}
	} else {
		$product_list = "You have no products listed in your store yet";
	} */
?> 
<html>
<head>
<title>Inventory List</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("../header.php");?>
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="inventory_list.php#inventoryForm">+ Add New Inventory Item</a></div>
<div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
      <?php 
			$sql = "SELECT * FROM products ORDER BY id DESC";
			$column_mappings = [
				"id" => "Product ID: ",
				"product_name" => " | ",
				"price" => "Price:",
				"date_added" => "Date Added: "
			];
		display_all($sql , $column_mappings, "inventory_list.php");
		
	  ?>
	  <?php //echo $product_list; ?>
    </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Add New Inventory Item Form &darr;
    </h3>
    <form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="product_name" type="text" id="product_name" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          Php
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="category" id="category">
          <option value="Clothing">Electrical</option>
		  <option value="Clothing">Machine parts</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td align="right">Subcategory</td>
        <td><select name="subcategory" id="subcategory">
        <option value=""></option>
          <option value="Hats">Sample1</option>
          <option value="Pants">Sample2</option>
          <option value="Shirts">Sample3</option>
		  <option value="Hats">Sample4</option>
          <option value="Pants">Sample5</option>
          <option value="Shirts">Sample6</option>
          </select></td>
      </tr>
      <tr>
        <td align="right">Product Details</td>
        <td><label>
          <textarea name="details" id="details" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="file" name="fileField" id="fileField" />
        </label></td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Add This Item Now" />
        </label></td>
      </tr>
    </table>
    </form>
    <br />
  <br />
  </div>
  <?php include_once("../footer.php");?>
</div>
</body>
</html>