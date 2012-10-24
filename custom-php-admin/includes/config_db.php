<?php
		$server = "localhost";
		$username = "root";
		$password = ""; // password if any
		$database = "custom_php_admin"; // where you want your table to save
		$limit = 8;

		//connecting to database

		$connection = mysql_connect($server, $username, $password) or die(mysql_error());
		$select = mysql_select_db($database) or die(mysql_error());		// selecting database


?>