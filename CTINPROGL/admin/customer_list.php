
<?php 
require_once "../includes/db_Model.php";
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete customer with ID of ' . $_GET['deleteid'] . '? <a href="customer_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="customer_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	$id_to_delete = $_GET['yesdelete'];
	delete_record("DELETE FROM customer WHERE id='$id_to_delete' LIMIT 1", $id_to_delete,"Customer_");
	redirect_to("customer_list.php");
}

// Parse the form data and add inventory item to the system
if (isset($_POST['cust_name'])) {
	
    $cust_name = ($_POST['cust_name']);
	$cust_address = ($_POST['cust_address']);
	
	// Add this product into the database now
	$newCustomer = "INSERT INTO customer (fullname, adres, last_log_date) 
        VALUES('$cust_name','$cust_address',now())";
	 save1($newCustomer, "Customer_");
	// Place image in the folder 
	redirect_to("customer_list.php");
}
?>

<html>
<head>
<title>Customer List</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("../header.php");?>
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="customer_list.php#customerForm">+ Add New Customer</a></div>
<div align="left" style="margin-left:24px;">
      <h2>Customer list</h2>
      <?php 
			$sql = "SELECT * FROM customer";
			$column_mappings = [
				"id" => "Customer ID: ",
				"fullname" => " Name: "
			];
		display_all($sql, $column_mappings, "customer_list.php");
		
	  ?>
    </div>
    <hr />
    <a name="adminForm" id="adminForm"></a>
    <h3>
    &darr; Add New Customer &darr;
    </h3>
    <form action="customer_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Fullname</td>
        <td width="80%"><label>
          <input name="cust_name" type="text" id="cust_name" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Address</td>
        <td> 
          <input name="cust_address" type="text" id="cust_address" size="12" />
        </td>
      </tr>   
	  <tr>
        <td align="right">Picture</td>
        <td><label>
          <input type="file" name="fileField" id="fileField" />
        </label></td>
      </tr> 
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Create Customer" />
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