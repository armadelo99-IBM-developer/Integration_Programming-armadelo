<?php
 
require "connect_to_mysql.php";  

$sqlCommand = "CREATE TABLE customer (
		 		 id int(11) NOT NULL auto_increment,
				 fullname varchar(24) NOT NULL,
		 		 adres varchar(24) NOT NULL,
		 		 last_log_date date NOT NULL,
		 		 PRIMARY KEY (id),
		 		 UNIQUE KEY fullname (fullname)
		 		 ) ";
if (mysqli_query($connection, $sqlCommand)){ 
    echo "Your customer table has been created successfully!"; 
} else { 
    echo "CRITICAL ERROR: customer table has not been created.";
}
?>

