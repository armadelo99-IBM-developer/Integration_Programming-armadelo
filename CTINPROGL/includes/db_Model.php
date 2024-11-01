<?php
define("DB_SERVER", "localhost");
define("DB_USER", "myRoot");
define("DB_PASS", "123456");
define("DB_NAME", "mystore_corp");


	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        "(" . mysqli_connect_errno() . ")"
    );
	}       

function redirect_to($new_location) {
    header("Location: ".$new_location);
    exit();
}

function confirm_query ($result_set) {
    if (!$result_set) {
        die("Database query failed.");
    }
}

// Version 1
/* function save ($insertQuery){
	global $connection;
	$sql = mysqli_query($connection, $insertQuery) or die (mysql_error());
    $pid = mysqli_insert_id($connection);
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
	confirm_query($sql);
	mysqli_close($connection);
}  */

 
//Version 2
/* function save ($insertQuery){
	//$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	 global $connection;
    $sql = mysqli_query($connection, $insertQuery) or die(mysqli_error($connection));
    $pid = mysqli_insert_id($connection);
    if (isset($_FILES['productfileField'])) {
        $newname = "$pid.jpg";
        move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
    }if isset(customerfield)
    confirm_query($sql);
    mysqli_close($connection);
} */


//Version 3
 function save ($insertQuery, $entity){
	 global $connection;
    $sql = mysqli_query($connection, $insertQuery) or die(mysqli_error($connection));
    $pid = mysqli_insert_id($connection);
    if (isset($_FILES['fileField'])) {
        $newname = "$pid.jpg";
        move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$entity$newname");
    }
    confirm_query($sql);
    mysqli_close($connection);
} 
function save1 ($insertQuery, $entity){
	 global $connection;
    $sql = mysqli_query($connection, $insertQuery) or die(mysqli_error($connection));
    $pid = mysqli_insert_id($connection);
    if (isset($_FILES['fileField'])) {
        $newname = "$entity._$pid.jpg";
        move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
    }
    confirm_query($sql);
    mysqli_close($connection);
}

// this function will be used when displaying records that is editable and deletable
function display_all($sql, $column_mappings, $url){
	global $connection;
    $output_list = "";

    $result = mysqli_query($connection, $sql);

    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        while($row = mysqli_fetch_array($result)){ 
            foreach ($column_mappings as $column_name => $label) {
                $value = $row[$column_name];
                if (strpos($column_name, 'date') !== false) {
                    $value = strftime("%b %d, %Y", strtotime($value));
                }
                $output_list .= "<strong>$label </strong> $value &nbsp; ";
            }
            
            $id = $row['id'];
            $output_list .= "<a href='edit.php?id=$id'>edit</a> &bull; <a href='$url?deleteid=$id'>delete</a><br />";
        }
    } else {
        $output_list = "No records found.";
    }
    echo $output_list;
}

function delete_record($sql, $id_to_delete, $entity){
	global $connection;
	$del_record = mysqli_query($connection, $sql) or die (mysqli_error($connection));
	// unlink the image from server
	// Remove The Pic -------------------------------------------
	$pictodelete = ("../inventory_images/$entity$id_to_delete.jpg");
	if (file_exists($pictodelete)) {
				unlink($pictodelete);
	}
	confirm_query($del_record);
	mysqli_close($connection);
}

// other functionality
function display_by_id($id){
	
}
//
function display_by_table($table_map){
	
}
?>




