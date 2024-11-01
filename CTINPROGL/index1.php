<?php

function Greeting(){
	echo "Hello world";
}

function Greetings($specific){
	echo "Hello world " . $specific;
}

function redirect_to($page){
	header("location: " . $page);
	exit();
}

?>