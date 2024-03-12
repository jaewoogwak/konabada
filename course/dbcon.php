<?php
ini_set( 'display_errors', '0' );//혹시나 warning 메세지가 뜨는 사람들을 위해 추가
$hostname="localhost";
$dbuserid="pma";
$dbpasswd="";
$dbname="test";

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);
if ($mysqli->connect_errno) {
    die('Connect Error: '.$mysqli->connect_error);
}


// echo "<pre>";
// print_r($rsc);
?>