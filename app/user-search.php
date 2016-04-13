<?php
require('db.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:index.php');
    exit(5);
}
require("status.php");
if ($_SESSION['enabled'] != 'true') { // non-enabled account tried to access page
    header('location:index.php');
    exit(5);
}
if ($_SESSION['admin'] != 'true') {
	echo '<H1>Access Denied</H1>';
	exit(2);
}
$data = array();
parse_str( file_get_contents( 'php://input' ), $data );
$_POST = array_merge( $data, $_POST ); // merge parsed login data with _POST session values
$_SESSION['lastsearch'] = mysqli_real_escape_string($mysqli, $_POST['searchUsers']);
header("location:view/user-results.php");