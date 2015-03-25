<?php
	require_once('config.php');
	
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	@mysql_select_db(DB_DATABASE) or die( "Unable to select database");
	if (!$link) {
		printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
		exit;
	}
	
	//$email = mysql_escape_String($email);
	//$email = $_GET['email'];
//	echo $email;
	if($_POST['email'])
	{	
		$email=$_POST['email'];
		$email = mysql_escape_String($email);
		$query = mysql_query("INSERT INTO emails( email_address ) VALUES ('$email')");
		mysql_query( $query);
	}
?>