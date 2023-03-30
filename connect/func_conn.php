<?php
require_once('config.php');

function execute($sql){
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function executeResultFor($sql){
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$results = mysqli_query($conn, $sql);
	$data = [];
	foreach($results as $row){
		$data[] = $row;
	}
	mysqli_close($con);
	return $data;
}

function executeResult($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = [];
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}
	mysqli_close($con);
	return $data;
}

function executeSingleResult($sql)
{
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result, 1);
	mysqli_close($con);
	return $row;
}
?> 